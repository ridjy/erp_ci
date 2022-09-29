<?php if ( ! defined('BASEPATH')) exit('No direct script access
allowed');
 
class sms_model extends CI_Model
{
	protected $table = 'smsapi';
	public function __construct()
	{
		// Obligatoire
		parent::__construct();
		$this->load->database('default',TRUE);	
	}

    public function getSmsUsers($id_user){

        $array = array('USER_ID' => $id_user);
        $this->db->where($array);
        $query = $this->db->get("smsapi");
        $data = $query->result();
        return $data;
    }

    public function getSms($id){

        $array = array('id_sms' => $id);
        $this->db->where($array);
        $query = $this->db->get("smsapi");
        $data = $query->row_array();
        return $data;
    }

    public function getSmsModele($id){

        $array = array('id_modele' => $id);
        $this->db->where($array);
        $query = $this->db->get("sms_modele");
        $data = $query->row_array();
        return $data;
    }

}