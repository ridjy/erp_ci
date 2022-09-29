<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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

		if ($this->session->userdata('logged_in')['id'] == '') 
		{
			redirect("Login");
		}

	}

	public function index()
	{
		$data['msg'] = (empty($_GET['msg'])) ? '' : $_GET['msg'];
		$data['rowusers']=$this->Users->getusers();
		$this->template->set('titre', 'Utilisateurs');
		$this->template->load('themes/template_table', 'content/user/liste_user',$data);
		//home dans la place du content du fichier layout
	}

	public function affiche()
	{
		$data['type'] = $_GET['type'];
		$data['msg'] = (empty($_GET['msg'])) ? '' : $_GET['msg'];
		$data['id'] = (empty($_GET['id'])) ? '' : $_GET['id'];
		switch ($data['type']) {
			case 'nouveau':
				$data['titre'] = 'Ajouter un utilisateur';
				$data['action'] = 'user/newuser';
				$data['bouton'] = 'Valider';
				$this->template->load('themes/template_table', 'content/user/new_user',$data);
				break;
			case 'modif':
				# code...
				$data['titre'] = 'Modifier un utilisateur';
				$data['action'] = 'user/modifuser';
				$data['row'] = $this->Users->getuserid($data['id']);
				$data['rowdroit'] = $this->Users->getuserdroit($data['id']);
				$data['modif'] = '1';
				$data['bouton'] = 'Modifier';
				$this->template->load('themes/template_table', 'content/user/form_user',$data);
				break;
			case 'suppr':
				# desactiver l'user
				$this->Users->desactiveruser($data['id']);
				$msg='utilisateur désactivé';
				redirect("user?msg=$msg");
				break;
			
			default:
				# code...
				break;
		}
		//home dans la place du content du fichier layout
	}

	public function newuser()
	{
		//ajout de l'utilisateur avec test
		$login = $this->input->post('login') ;
		$actif = $this->input->post('actif') ;
		$matricule = $this->input->post('matricule') ; 
		$nom = $this->input->post('nom') ; 
		$poste = $this->input->post('poste') ;
		$email = $this->input->post('email') ; 
		$password = $this->input->post('password') ;
		$confirmPassword = $this->input->post('confirmPassword') ;
		$genre = $this->input->post('genre') ;
		if($confirmPassword!=$password) {
			$msg='Les mots de passe ne sont pas identiques';
			redirect("user/affiche?msg=$msg&type=nouveau");
		} else {
			$data = array(
					'login' => $login
					,'actif' => $actif
					,'poste' => $poste
					,'matricule' => $matricule
					,'nom' => $nom
					,'mail' => $email
					,'password' => $password
					,'genre' => $genre
				); 
			$id=$this->Users->ajout($data);
			$datadroit= array(
					'userid' => $id
					,'recrutement' => $this->input->post('accesrecrutement')
					,'utilisateur' => $this->input->post('accesuser')
					,'statistique' => $this->input->post('accesstat')
					,'enregistrement' => $this->input->post('accesenr')
				);
			$this->Users->ajoutDroit($datadroit);
			$msg='utilisateur enregistré';
			redirect("user?msg=$msg");
		}
	
	}

	public function modifuser()
	{
		//ajout de l'utilisateur avec test
		$id= $this->input->post('id') ;
		$login = $this->input->post('login') ;
		$actif = $this->input->post('actif') ;
		$matricule = $this->input->post('matricule') ; 
		$nom = $this->input->post('nom') ; 
		$poste = $this->input->post('poste') ;
		$email = $this->input->post('email') ; 
		$password = $this->input->post('password') ;
		$confirmPassword = $this->input->post('confirmPassword') ;
		$genre = $this->input->post('genre') ;
		if($confirmPassword!=$password) {
			$msg='Les mots de passe ne sont pas identiques';
			redirect("user/affiche?msg=$msg&type=modif");
		} else {
			$data = array(
					'login' => $login
					,'actif' => $actif
					,'poste' => $poste
					,'matricule' => $matricule
					,'nom' => $nom
					,'mail' => $email
					,'password' => $password
					,'genre' => $genre
				); 
			$datadroit= array(
					'userid' => $id
					,'recrutement' => $this->input->post('accesrecrutement')
					,'utilisateur' => $this->input->post('accesuser')
					,'statistique' => $this->input->post('accesstat')
					,'enregistrement' => $this->input->post('accesenr')
				);
			$this->Users->modifuser($data,$id);
			$this->Users->modifdroit($datadroit,$id);
			$msg='modification enregistrée';
			redirect("user?msg=$msg");
		}
	}

	public function moncompte()
	{
		$data['msg'] = (empty($_GET['msg'])) ? '' : $_GET['msg'];
		$data['titre'] = 'Votre compte';
		$data['type'] = 'compte';
		$data['action'] = 'user/modifuser';
		$data['row'] = $this->Users->getuserid($this->session->userdata('logged_in')['id']);
		$data['rowdroit'] = $this->Users->getuserdroit($this->session->userdata('logged_in')['id']);
		$data['modif'] = '1';
		$data['bouton'] = 'Modifier';
		$this->template->load('themes/template_table', 'content/user/form_user',$data);
	}

}