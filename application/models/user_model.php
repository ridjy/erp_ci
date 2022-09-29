<?php if ( ! defined('BASEPATH')) exit('No direct script access
allowed');
 
class user_model extends CI_Model
{
	protected $table = 'utilisateurs';
	public function __construct()
	{
		// Obligatoire
		parent::__construct();
		$this->load->database('default',TRUE);	
	}
	
	public function test_login($login,$mdp)
	{
		//$query = $this->db->query("SELECT * FROM at_user WHERE user_login='".$login."' AND user_mdp='".$mdp."' LIMIT 0,1");
		$array = array('user_login' => $login, 'user_mdp' => $mdp);
		$this->db->select('*');
		$this->db->from('at_user');
		$this->db->where($array);
		$this->db->limit(1);

		$query = $this->db->get();
		$row=$query->result();
		return $row;
	}

	public function ajout($data)
    {    
        $data = array(
            'USER_MATRICULE' => $data['matricule']
            ,'USER_NOMCOMPLET' => $data['nom']
            ,'USER_LOGIN' => $data['login']
            ,'USER_MDP' => $data['password']
            ,'USER_LASTACTIVITY' => date('Y-m-d H:i:s')
            ,'USER_MAIL' => $data['mail']
            ,'USER_POSTE' => $data['poste']
            ,'USER_SEXE' => $data['genre']
            ,'USER_ACTIF' => $data['actif']
        );
        $this->db->insert('utilisateurs', $data);
        $insert_id = $this->db->insert_id();
   		return  $insert_id;
    }

    public function ajoutDroit($data)
    {    
        $data = array(
            'USER_ID' => $data['userid']
            ,'DROIT_RECRUTEMENT' => $data['recrutement']
            ,'DROIT_UTILISATEUR' => $data['utilisateur']
            ,'DROIT_STATISTIQUE' => $data['statistique']
            ,'DROIT_ENREGISTREMENT' => $data['enregistrement']
        );
        return $this->db->insert('droit', $data);
    }

    public function modifuser($data,$id) 
    {
        $data = array(
             'USER_MATRICULE' => $data['matricule']
            ,'USER_NOMCOMPLET' => $data['nom']
            ,'USER_LOGIN' => $data['login']
            ,'USER_MDP' => $data['password']
            ,'USER_LASTACTIVITY' => date('Y-m-d H:i:s')
            ,'USER_MAIL' => $data['mail']
            ,'USER_POSTE' => $data['poste']
            ,'USER_SEXE' => $data['genre']
            ,'USER_ACTIF' => $data['actif']
        );
        
        return $this->Global->update('utilisateurs', $data, array('USER_ID' => $id)); 
    }

    public function modifdroit($data,$id) 
    {
        $data = array(
            'USER_ID' => $data['userid']
            ,'DROIT_RECRUTEMENT' => $data['recrutement']
            ,'DROIT_UTILISATEUR' => $data['utilisateur']
            ,'DROIT_STATISTIQUE' => $data['statistique']
            ,'DROIT_ENREGISTREMENT' => $data['enregistrement']
        );
        
        return $this->Global->update('droit', $data, array('USER_ID' => $id)); 
    }
    
    public function desactiveruser($id)
    {
        $this->db->set('USER_ACTIF',0);    
        $this->db->where('USER_ID',$id);
        $this->db->limit(1);
        return $this->db->update('utilisateurs');
    }

	public function delai_activite($id)
	{
		//le delai d'activite est dépassé
		$this->db->set('user_niveau','inactif');	
		$this->db->where('user_id',$id);
		$this->db->limit(1);
		return $this->db->update($this->table);
	}
	
	public function last_activite($id)
	{
		//le delai d'activite new
		$this->db->set('user_lastActivity',time());	
		$this->db->where('user_id',$id);
		$this->db->limit(1);
		return $this->db->update($this->table);
	}

 	public function getusers()
 	{
 		$query = $this->db->get('utilisateurs');
 		return $query->result();
 	}

 	public function getuserid($id){

        $array = array('USER_ID' => $id);
        $this->db->where($array);
        $query = $this->db->get("utilisateurs");
        $row = $query->row_array();
        return $row;
    }

    public function getuserdroit($id){

        $array = array('USER_ID' => $id);
        $this->db->where($array);
        $query = $this->db->get("droit");
        $row = $query->row_array();
        return $row;
    }

}