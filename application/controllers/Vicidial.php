<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vicidial extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// Maintenant, ce code sera exécuté chaque fois que ce contrôleur sera appelé.
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->database();
		$this->load->library('form_validation');
		$data = array();

		if ($this->session->userdata('logged_in')['id'] == '') 
		{
			redirect("Login");
		}

	}

	public function enregistrement()
	{
		$this->template->set('titre', 'Enregistrements sur Vicidial');
		$this->template->load('themes/template', '404');
		//home dans la place du content du fichier layout
	}

}