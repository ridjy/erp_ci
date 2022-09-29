<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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

	public function accueil()
	{
		$this->template->set('titre', 'Bienvenue dans ERP_BPO');
		$this->template->load('themes/template', 'content/home');
		//home dans la place du content du fichier layout
	}

	public function logout(){
 		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect("Login");
 	}
}