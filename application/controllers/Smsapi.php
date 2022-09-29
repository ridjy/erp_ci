<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Smsapi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// Maintenant, ce code sera exécuté chaque fois que ce contrôleur sera appelé.
		$this->load->helper('url');
		$this->load->library('session');
		//$this->load->library('Isendpro/autoload.php');
		$this->load->database();
		$this->load->model(array(
			'sms_model' => 'Sms',
			'global_model' => 'Global'
		));
		$data = array();

		if ($this->session->userdata('logged_in')['id'] == '') 
		{
			redirect("Login");
		}

	}

	public function index()
	{
		$data['msg'] = (empty($_GET['msg'])) ? '' : $_GET['msg'];
		$data['rowsms']=$this->Sms->getSmsUsers($this->session->userdata('logged_in')['id']);
		$data['nbr']=count($data['rowsms']);
		$this->template->set('titre', 'Plateforme envoi SMS');
		$this->template->load('themes/template_table', 'content/smsapi/liste_sms',$data);
		//home dans la place du content du fichier layout
	}

	public function affiche()
	{
		$data['type'] = $_GET['type'];
		$data['msg'] = (empty($_GET['msg'])) ? '' : $_GET['msg'];
		$data['id'] = (empty($_GET['id'])) ? '' : $_GET['id'];
		switch ($data['type']) {
			case 'nouveau':
				$data['titre'] = 'Envoyer un sms';
				$data['action'] = 'smsapi/newsms';
				$data['bouton'] = 'Valider';
				$data['rowsms']=$this->Global->select('sms_modele','*','1=1');
				$this->template->load('themes/template_table', 'content/smsapi/new_sms',$data);
				break;
			case 'visualiser':
				# code...
				$data['titre'] = 'Lecture d\'un sms envoyé';
				$data['action'] = 'smsapi';
				$data['row'] = $this->Sms->getSms($data['id']);
				$data['bouton'] = 'Valider';
				$this->template->load('themes/template_table', 'content/smsapi/form_sms',$data);
				break;
			
			default:
				# code...
				break;
		}
		//home dans la place du content du fichier layout
	}

	public function newsms()
	{
		//envoi du sms via l'API et test
		$table='smsapi'; 
		$data_insert = array(
				'sms_tel' => $this->input->post('tel')
				,'sms_dest' => $this->input->post('nomdest')
				,'sms_codeIBAN' => $this->input->post('IBAN')
				,'sms_email' => $this->input->post('emaildest')
				,'sms_contenu' => $this->input->post('sms_contenu')
				,'USER_ID' => $this->session->userdata('logged_in')['id']
				,'sms_emetteur' => $this->input->post('emetteur')
			); 
		

		require_once(APPPATH.'libraries\Isendpro\autoload.php');
		$api_instance = new Isendpro\Api\SmsApi();
		$smsrequest = new Isendpro\Model\SmsUniqueRequest(); 
		$smsrequest["keyid"]='05dfe858180f709b7c10281bbb1087be';
		$smsrequest["num"]=$data_insert['sms_tel'];
		$smsrequest["sms"]=$data_insert['sms_contenu'];
		//$smsrequest["ucs2"]="1";
		$smsrequest["emetteur"] = (empty($_POST['emetteur'])) ? 'Oceancallcentre' : $_POST['emetteur'];
		try {
		    $result = $api_instance->sendSms($smsrequest);
		    $id=$this->Global->insert($table,$data_insert);
		    echo $result;
		} catch (Exception $e) {
		    echo 'Exception when calling SmsApi->sendSms: ', $e->getMessage(), PHP_EOL;
		    $reponse_erreur=$e->getResponseBody();
		    echo json_encode($reponse_erreur);
		}
		//$msg='SMS envoyé avec succès';
		//redirect("smsapi?msg=$msg");
		//redirect("http://localhost/isendpro/testSms.php?");
	}

	public function modelesms()
	{
		$data['msg'] = (empty($_GET['msg'])) ? '' : $_GET['msg'];
		$data['rowsms']=$this->Global->select('sms_modele','*','1=1');
		$data['nbr']=count($data['rowsms']);
		$this->template->set('titre', 'ERP_OCC | Les modèles de SMS');
		$this->template->load('themes/template_table', 'content/smsapi/liste_modele_sms',$data);
		//home dans la place du content du fichier layout
	}

	public function affichemodel()
	{
		$data['type'] = $_GET['type'];
		$data['msg'] = (empty($_GET['msg'])) ? '' : $_GET['msg'];
		$data['id'] = (empty($_GET['id'])) ? '' : $_GET['id'];
		switch ($data['type']) {
			case 'nouveau':
				$data['titre'] = 'Enregistrer un modèle de sms';
				$data['action'] = 'smsapi/newmodelesms';
				$data['bouton'] = 'Enregistrer';
				$this->template->load('themes/template_table', 'content/smsapi/new_modele_sms',$data);
				break;
			case 'visualiser':
				# code...
				$data['titre'] = 'Affichage du modèle de sms';
				$data['action'] = 'smsapi/modifmodelesms';
				$data['row'] = $this->Sms->getSmsModele($data['id']);
				$data['bouton'] = 'Modifier';
				$this->template->load('themes/template_table', 'content/smsapi/form_modele_sms',$data);
				break;
			
			default:
				# code...
				break;
		}
		//home dans la place du content du fichier layout
	}

	public function newmodelesms()
	{
		//envoi du sms via l'API et test
		$table='sms_modele'; 
		$data_insert = array(
				'emetteur_modele' => $this->input->post('emetteur')
				,'nom_modele' => $this->input->post('nom_modele')
				,'date_heure_creation_modele' => date('Y-m-d H:i:s')
				,'createur_modele' => $this->input->post('createur')
				,'contenu_modele' => $this->input->post('modele_contenu')
			); 
		$res=$this->Global->insert($table,$data_insert);
		$msg='Modèle de SMS enregistré avec succès';
		redirect("smsapi/modelesms?msg=$msg");
	}


	public function modifmodelesms()
	{
		$table='sms_modele'; 
		$id=$this->input->post('id');
		$data_modif = array(
				'emetteur_modele' => $this->input->post('emetteur')
				,'nom_modele' => $this->input->post('nom_modele')
				,'createur_modele' => $this->input->post('createur')
				,'contenu_modele' => $this->input->post('modele_contenu')
			); 
		$this->Global->update($table,$data_modif,'id_modele='.$id);
		$msg='Modification effectuée';
		redirect("smsapi/modelesms?msg=$msg");
	}

	public function get_smsmodelajax()
	{
		$data['id'] = $_GET['f'];
		$row = $this->Sms->getSmsModele($data['id']);
		echo json_encode($row);
	}

	public function multiple()
	{
		$data['type'] = $_GET['type'];
		$data['msg'] = (empty($_GET['msg'])) ? '' : $_GET['msg'];
		$data['id'] = (empty($_GET['id'])) ? '' : $_GET['id'];
		switch ($data['type']) {
			case 'nouveau':
				$data['titre'] = 'Envoyer des sms multiples';
				$data['action'] = 'smsapi/newsmsmultiple';
				$data['bouton'] = 'Envoyer';
				$data['rowsms']=$this->Global->select('sms_modele','*','1=1');
				$this->template->load('themes/template_table', 'content/smsapi/new_sms_multiple',$data);
				break;
			/*case 'visualiser':
				# code...
				$data['titre'] = 'Lecture d\'un sms envoyé';
				$data['action'] = 'smsapi';
				$data['row'] = $this->Sms->getSms($data['id']);
				$data['bouton'] = 'Valider';
				$this->template->load('themes/template_table', 'content/smsapi/form_sms',$data);
				break;
			*/
			default:
				# code...
				break;
		}
		//home dans la place du content du fichier layout
	}

	public function newsmsmultiple()
	{
		//envoi du sms via l'API et test
		$table='smsapi'; 
		/*$data_insert = array(
				'sms_tel' => $this->input->post('tel')
				,'sms_dest' => $this->input->post('nomdest')
				,'sms_contenu' => $this->input->post('sms_contenu')
				,'USER_ID' => $this->session->userdata('logged_in')['id']
				,'sms_emetteur' => $this->input->post('emetteur')
			); */
		
		/*code sms multiple*/
		/*require_once("Isendpro/autoload.php");
		$api_instance = new Isendpro\Api\SmsApi();
		$smsrequest = new Isendpro\Model\SMSRequest(); // \Swagger\Client\Model\SMSRequest | sms request
		include("keyid.php");
		$smsrequest["keyid"]=$keyid;
		$smsrequest["num"]=["0695208432","0600123456"];
		$smsrequest["sms"]=["Ceci est un test avec un envoi multiple éàè!"]; // 1 message ou autant de message que de destinataires
		$smsrequest["emetteur"]="iSendPro";
		try {
		    $result = $api_instance->sendSmsMulti($smsrequest);
		    echo $result;
		} catch (Exception $e) {
		    echo 'Exception when calling SmsApi->sendSms: ',print_r($e), PHP_EOL;
		    $reponse_erreur=$e->getResponseBody();
		    echo json_encode($reponse_erreur);
		}*/
		/*fin code sms multiple*/

		//$msg='SMS envoyé avec succès';
		//redirect("smsapi?msg=$msg");
		

		echo $_FILES['fichecsv']['tmp_name'];echo'<br>';
		echo $_FILES['fichecsv']['error'];echo'<br>';
		/*if(isset($_FILES['fichecsv']))
		{
			$upload='C:/wamp/www/bpooi/upload/csv';
		   $temp=$_FILES['fichecsv']['tmp_name'];
		   if(move_uploaded_file($temp, $upload.'/'.$_FILES['fichecsv']['name']))
		   {
		            $handle=fopen($upload.'/'.$_FILES['fichecsv']['name'], 'r');//read
		            while (($line = fgetcsv($handle, 1000, ";")) !== FALSE)//test si csv non vide
		            {
		                $i=0;
		                //echo count($line);
						while($i<count($line))//$line le nombre de colonne on test si ttes les cols ont étés parcourues
						{
						echo $line[$i].' ';

		                $i++;
						}
						echo '<br/>';
						$line[0];
						$line[1];
						$line[2];
						$line[3];
		            }
		            fclose($handle);
		            //echo 'ok';
		   }
	       else
	       {
	           echo 'Echec lors de l\'envoie du fichier';
	       }

		}*/
		//$smsrequest["num"]=["0695208432","0600123456"];
		//echo $smsrequest["num"][$i]=;
		//echo $smsrequest["sms"][$i];
	}

}