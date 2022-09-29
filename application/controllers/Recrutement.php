<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recrutement extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// Maintenant, ce code sera exécuté chaque fois que ce contrôleur sera appelé.
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->database();
		$this->load->model(array(
			'Recrutement_model' => 'Recrutement',
			'global_model' => 'Global'
		));
		$this->load->library('form_validation');
		$data = array();

		if ($this->session->userdata('logged_in')['id'] == '') 
		{
			redirect("Login");
		}
	}
	
	public function index()//menu recruter
	{
		$data['msg'] = (empty($_GET['msg'])) ? '' : $_GET['msg'];
		$data['titre']='ERP_BPO | Vos demandes de recrutement';
		$data['row']=$this->Recrutement->getMesDemandes($this->session->userdata('logged_in')['id']);
		$this->template->load('themes/template_table', 'content/recrutement/table_recrutement',$data);
		
	}

	public function demande_encours() //les demandes à valider par le responsable
	{
		$data['titre']='ERP_BPO | Tous les demandes de recrutement en cours';
		$data['msg'] = (empty($_GET['msg'])) ? '' : $_GET['msg'];
		$data['row']=$this->Recrutement->getAllRecrutement();
		$this->template->load('themes/template_table', 'content/recrutement/table_tout_recrutement',$data);
		//toutess les demandes
	}

	public function recrutement_encours() //les demandes déjà validés
	{
		$data['titre']='ERP_BPO | Les recrutements en cours';
		$data['msg'] = (empty($_GET['msg'])) ? '' : $_GET['msg'];
		$data['row']=$this->Recrutement->getRecrutementencours() ;
		$data['abandon']=0;
		$this->template->load('themes/template_table', 'content/recrutement/table_recrutement_encours',$data);
		//print_r($data);
	}

	public function recrutement_abandon() //les demandes déjà validés
	{
		$data['titre']='ERP_BPO | Les recrutements abandonnés';
		$data['msg'] = (empty($_GET['msg'])) ? '' : $_GET['msg'];
		$data['row']=$this->Recrutement->getRecrutementabandon() ;
		$data['abandon']=1;
		$this->template->load('themes/template_table', 'content/recrutement/table_recrutement_encours',$data);
		//print_r($data);
	}

	public function recruteur_abandon() //en cours puis abandon
	{
		$data['titre']='ERP_BPO | Les recrutements abandonnés';
		$data['msg'] = (empty($_GET['msg'])) ? '' : $_GET['msg'];
		$data['row']=$this->Recrutement->getRecrutementencoursabandon() ;
		$data['abandon']=1;
		$this->template->load('themes/template_table', 'content/recrutement/table_recrutement_encours',$data);
		//print_r($data);
	}

	public function demande_recrutement()
	{
		$data['titre']='ERP_BPO | Formulaire de demande recrutement';
		$this->template->load('themes/template_table', 'content/recrutement/form_recrutement',$data);
		
	}

	public function demander()//pr ajout et modification
	{
		$data['titre']='ERP_BPO | Soumettre Formulaire de demande recrutement';
		$statut = $this->input->post('statut') ;
		$id_demandeur = $this->input->post('id_demandeur') ;
		$nom_demandeur = $this->input->post('nom_demandeur') ; $fonction_demandeur = $this->input->post('fonction_demandeur') ;
		$poste = $this->input->post('poste') ; $campagne = $this->input->post('campagne') ;
		$nombre = $this->input->post('nombre') ; $contrat = $this->input->post('contrat') ;
		$horaire = $this->input->post('horaire') ; $qualification = $this->input->post('qualification') ;
		$competences = $this->input->post('competences') ; $atout = $this->input->post('atout') ;
		$deadline = $this->input->post('deadline') ;
		$data = array(
				'demandeur' => $this->session->userdata('logged_in')['login']
				,'fonction_demandeur' => $fonction_demandeur
				,'id' => $id_demandeur
				,'poste' => $poste
				,'campagne' => $campagne
				,'nombre' => $nombre
				,'contrat' => $contrat
				,'horaire' => $horaire
				,'qualification' => $qualification
				,'competences' => $competences
				,'atout' => $atout
				,'deadline' => $deadline
			);

		switch ($statut) {
		    case 'ajout':
		    	//insertion dans bdd
				$this->Recrutement->insert($data) ;
				$msg='Votre demande a été enregistrée avec succès';
				redirect("recrutement/?msg=$msg");        
				        break;
		    case 'modification':
		    	$id=$this->input->post('id_recrutement') ;
		        $this->Recrutement->update_recrutement($data,$id) ;
				$msg='La modification a été enregistrée avec succès';
				redirect("recrutement/?msg=$msg");
		        break;
		    default:
		        break;
		} 
		//print_r($data);
	}

	public function modif_demande()
	{
		$data['titre']='ERP_BPO | Modifier la demande de recrutement';
		$data['id']=$this->input->get('id');
		$data['row']=$this->Recrutement->getRecrutement($data['id']) ;
		$this->template->load('themes/template_table', 'content/recrutement/modif_recrutement',$data);
		
	}

	public function annuler_demande()
	{
		$data['titre']='ERP_BPO | Annuler une demande de recrutement';
		$id=$this->input->get('id');
		$this->Recrutement->delete($id) ;
		$msg='La demande a été annulée';
		redirect("recrutement/?msg=$msg");
	}


	public function traiter()
	{
		$data['status']=$this->input->get('status');
		//$data['retour']=$this->input->get('retour');
		switch ($data['status']) {
		    case 'traiter':
			    $data['titre']='ERP_BPO | Traitement de la demande de recrutement';
				$data['id']=$this->input->get('id');
				$data['row']=$this->Recrutement->getRecrutement($data['id']) ;
				$data['demandeur']=$this->Recrutement->getDemandeurRecrutement($data['row']['USER_ID']) ;
				$this->template->load('themes/template_table', 'content/recrutement/traiter_recrutement',$data);
				break;

			case 'traiterparrecruteur':
			    $data['titre']='ERP_BPO | Traitement de la demande de recrutement';
				$data['id']=$this->input->get('id');
				$data['row']=$this->Recrutement->getRecrutement($data['id']) ;
				$data['rowcv']=$this->Recrutement->getCV($data['id']) ;
				$data['demandeur']=$this->Recrutement->getDemandeurRecrutement($data['row']['USER_ID']) ;
				$this->template->load('themes/template_table', 'content/recrutement/traiter_demande1',$data);
				break;	

		    case 'afficher':
			    $data['titre']='ERP_BPO | Détails de la demande de recrutement';
				$data['id']=$this->input->get('id');
				$data['row']=$this->Recrutement->getRecrutement($data['id']) ;
				$data['demandeur']=$this->Recrutement->getDemandeurRecrutement($data['row']['USER_ID']) ;
				if ($data['row']['RECRUTEMENT_TRAITE']=='1')
				{
					$data['msg']='Cette demande est en cours de traitement';
					$data['motif']='';
				} else if ($data['row']['RECRUTEMENT_ABANDON']=='1')
				{
					$data['msg']='Cette demande a été abandonnée';
					$data['motif']=$data['row']['RECRUTEMENT_MOTIF_ABANDON'];
				}
				$this->template->load('themes/template_table2', 'content/recrutement/affiche_recrutement',$data);
			    break;
		    default:
		    	break;
		} 

		//print_r($data);
	}

	public function reponse_demande()
	{
		$data['titre']='ERP_BPO | Réponse à la demande de recrutement';
		//envoi par mail de la réponse pour aviser
		$id_demande = $this->input->post('id') ;
		$nom_demandeur = $this->input->post('nom_demandeur') ; $fonction_demandeur = $this->input->post('fonction_demandeur') ;
		$reponse= $this->input->post('validation') ; $motif=$this->input->post('motif') ;
		
		if ($reponse=='valide')
		{
			$data = array(
				'debut' => date('Y-m-d')
				,'traite' => '1'
			);
			$this->Recrutement->valid_recrutement($data,$id_demande);
			$msg='La demande de recrutement a été validée';
			redirect("recrutement/recrutement_encours?msg=$msg");

		} else if ($reponse=='refus') {
			$data = array(
				'motif_abandon' => $motif
				,'abandon' => '1'
				,'traite' => '0'
				,'cloture' => date('Y-m-d')
			);
			$this->Recrutement->refus_recrutement($data,$id_demande);
			$msg='La demande de recrutement a été refusée';
			redirect("recrutement/recrutement_encours?msg=$msg");

		}


	}

	public function debut_recrutement()
	{
		$id_demande = $this->input->post('id') ;
		$this->Global->update("recrutement",array('RECRUTEMENT_DEBUT'=>date('Y-m-d H:i:s', time())),'RECRUTEMENT_ID='.$id_demande);
		$msg='La demande est en cours de traitement';
		redirect("recrutement/recrutement_encours?msg=$msg");
	}

	public function terminer()
	{
		
	}

	public function uploadCV()
	{
		//if ($_FILES['icone']['size'] > $maxsize) $erreur = "Le fichier est trop gros";

		//mkdir('fichier/1/', 0777, true);
		//Créer un identifiant difficile à deviner
		//$nom = md5(uniqid(rand(), true));
		//$nom = "avatars/{$id_membre}.{$extension_upload}";
		$nom_postulant=$this->input->post('nom_postulant');
		$id=$this->input->post('recrutement_id');

		if(isset($_FILES['cv']))
		{ 
		     $dossier = 'upload/cv/';
		     $fichier = basename($_FILES['cv']['name']);
		     $nomchoisi = 'cv'.$id.'_'.$nom_postulant.'.pdf';
		     //if ($_FILES['cv']['error'] > 0) $erreur = "Erreur lors du transfert";
		     $data = array(
				'recrutement_id' => $id
				,'nom' => $nom_postulant
				,'nom_fichier' => $nomchoisi
				,'taille' => $_FILES['cv']['size']
				,'chemin' => 'upload/cv/'.$nomchoisi
			);	
		     if(move_uploaded_file($_FILES['cv']['tmp_name'], $dossier.$nomchoisi)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
		     {
		        $this->Recrutement->insert_newcv($data);
		        redirect("recrutement/traiter?id=$id&status=traiterparrecruteur");  
		     }
		     else //Sinon (la fonction renvoie FALSE).
		     {
		          echo 'Echec de l\'upload !';
		     }
		}
		else{
			//erreur sur le formulaire
			echo 'non';
		}

	}

	public function afficheCV()
	{
		$rep=base_url().$this->input->get('chemin');
		

	}

}