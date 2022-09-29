<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// Maintenant, ce code sera exécuté chaque fois que ce contrôleur sera appelé.
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->database();
		$this->load->model(array(
			'user_model' => 'Users',
			'global_model' => 'Global'
		));
		$this->load->library('form_validation');
		$data = array();

	}

	public function index()
	{
		$data['e'] = (empty($_GET['e'])) ? '' : $_GET['e'];
		$data['titre']='Login vers ERP_BPO';
		$this->load->view('template/login',$data);	
	}


	public function check()
	{	
		$login = $this->input->post('login') ;
		$password = $this->input->post('mdp') ;
		$rememberme = (int)$this->input->post('rememberme',0) ;

		if (empty($login) && empty($password)) {
			$msg = "Tous les champs sont obligatoires" ;
		}
		else{
			/*check from DB*/
			$where = "USER_LOGIN ='$login' AND USER_MDP='$password' " ;
			$check = $this->Global->selectRow("utilisateurs",'USER_ID,USER_LOGIN,USER_MDP,USER_NOMCOMPLET,USER_MATRICULE,USER_MAIL,USER_POSTE,USER_SEXE,USER_ACTIF',$where);

			if (!empty($check)) {
				$sess_array = array(
					'id'    => (int)$check->USER_ID,
					'nom'    => $check->USER_NOMCOMPLET,
					'login' => $check->USER_LOGIN,
					'mail' => $check->USER_MAIL,
					'poste' => $check->USER_POSTE,
					'sexe'  => $check->USER_SEXE
				);

				$user_id = (int)$check->USER_ID;
				//les droits de l'utilisateur
				$where_droit = "USER_ID ='$user_id'" ;
				$check_droit = $this->Global->selectRow("droit",'DROIT_RECRUTEMENT,DROIT_UTILISATEUR,DROIT_STATISTIQUE,DROIT_ENREGISTREMENT',$where_droit);
				$sess_array_droit = array(
					'droit_recrutement' => (int)$check_droit->DROIT_RECRUTEMENT,
					'droit_utilisateur' => (int)$check_droit->DROIT_UTILISATEUR,
					'droit_statistique' => (int)$check_droit->DROIT_STATISTIQUE,
					'droit_enregistrement' => (int)$check_droit->DROIT_ENREGISTREMENT
					);

				if($rememberme == 1){
				    setcookie("login_user", $login, time() + 60 * 60 * 24 * 100, "/");
				    setcookie("password_user", $password, time() + 60 * 60 * 24 * 100, "/");
				    setcookie("rememberme_user",1, time()+60*60*24*100,"/");
				}else{
				    setcookie("login_user", "", NULL, "/");
				    setcookie("password_user", "", NULL, "/");
				    setcookie("rememberme_user",0, time()+60*60*24*100,"/");
				}

				// // Création de la session
				$this->session->set_userdata('logged_in', $sess_array);
				$this->session->set_userdata('droit', $sess_array_droit);
				
				/*update last_activity*/
				$this->Global->update("utilisateurs",array('USER_LASTACTIVITY'=>date('Y-m-d H:i:s', time())),'USER_ID='.$check->USER_ID);
				
				if($check->USER_ACTIF!='1'){
					$msg = "Votre compte est désactivé" ;
					redirect("Login/?e=$msg");	
				}
				else {
				$msg = "Login avec succès" ;
				redirect('Dashboard/accueil');
				}
			}
			else{
				$msg = "Login et/ou mot de passe incorrect" ;
				redirect("Login/?e=$msg");
			}
		}

		
	}
}