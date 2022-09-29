<?php
if ( ! defined('BASEPATH')) exit('No direct script access
allowed');

class Recrutement_model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model(array(
            'global_model' => 'Global'
        )) ;
    }

    /*if(!empty($this->input->get("search")))
        {
          $this->db->like('title', $this->input->get("search"));
          $this->db->or_like('description', $this->input->get("search")); 
        }*/
        //$array = array('RECRUTEMENT_TRAITE' => '0');
        //$this->db->where($array);

    public function getAllRecrutement(){ //les demandes en cours
        $query = $this->db->query('SELECT * FROM recrutement WHERE RECRUTEMENT_TRAITE="0" AND RECRUTEMENT_ABANDON="0" ' );
        //$this->db->where("RECRUTEMENT_TRAITE = '0' AND RECRUTEMENT_ABANDON = '0'");
        //$query = $this->db->get("recrutement");
        return $query->result();
    }

    public function getMesDemandes($id){

        $array = array('USER_ID' => $id);
        $this->db->where($array);
        $query = $this->db->get("recrutement");
        $row = $query->result();
        return $row;
    }

    public function getRecrutementencours(){
        //recrutement en cours si recrutement traité =1
        $array = array('RECRUTEMENT_TRAITE' => '1');
        $this->db->where($array);
        $query = $this->db->get("recrutement");
        return $query->result();
    }

    public function getCV($id){

        $array = array('RECRUTEMENT_ID' => $id);
        $this->db->where($array);
        $query = $this->db->get("cvtheque");
        $row = $query->result();
        return $row;
    }

    public function getRecrutement($id){

        $array = array('RECRUTEMENT_ID' => $id);
        $this->db->where($array);
        $query = $this->db->get("recrutement");
        $row = $query->row_array();
        return $row;
    }

    public function getDemandeurRecrutement($id){
        $array = array('USER_ID' => $id);
        $this->db->where($array);
        $query = $this->db->get("utilisateurs");
        $row = $query->row_array();
        return $row;
        
    }    


    public function insert($data)
    {    
        $data = array(
        //'RECRUTEMENT_ABANDON' => '', RECRUTEMENT_ID aussi miala
            'USER_ID' => $data['id']
            ,'RECRUTEMENT_POSTE' => $data['poste']
            ,'RECRUTEMENT_CAMPAGNE' => $data['campagne']
            ,'RECRUTEMENT_NOMBRE' => $data['nombre']
            ,'RECRUTEMENT_TYPE_CONTRAT' => $data['contrat']
            ,'RECRUTEMENT_HORAIRE_MENSUEL' => $data['horaire']
            ,'RECRUTEMENT_DEMANDEUR' => $data['demandeur']
            ,'RECRUTEMENT_QUALIFICATION' => $data['qualification']
            ,'RECRUTEMENT_COMPETENCE' => $data['competences']
            ,'RECRUTEMENT_ATOUT' => $data['atout']
            ,'RECRUTEMENT_DEADLINE' => $data['deadline']
        );
        return $this->db->insert('recrutement', $data);
    }

    public function insert_newcv($data)
    {    
        $data = array(
        //'RECRUTEMENT_ABANDON' => '', RECRUTEMENT_ID aussi miala
            'RECRUTEMENT_ID' => $data['recrutement_id']
            ,'CV_NOM' => $data['nom']
            ,'CV_NOM_FICHIER' => $data['nom_fichier']
            ,'CV_TAILLE' => $data['taille']
            ,'CV_CHEMIN' => $data['chemin']
        );
        return $this->db->insert('cvtheque', $data);
    }


    public function update_recrutement($data,$id) 
    {
        $data = array(
        //'RECRUTEMENT_ABANDON' => '', RECRUTEMENT_ID aussi miala
            'USER_ID' => $data['id']
            ,'RECRUTEMENT_POSTE' => $data['poste']
            ,'RECRUTEMENT_CAMPAGNE' => $data['campagne']
            ,'RECRUTEMENT_NOMBRE' => $data['nombre']
            ,'RECRUTEMENT_TYPE_CONTRAT' => $data['contrat']
            ,'RECRUTEMENT_HORAIRE_MENSUEL' => $data['horaire']
            ,'RECRUTEMENT_DEMANDEUR' => $data['demandeur']
            ,'RECRUTEMENT_QUALIFICATION' => $data['qualification']
            ,'RECRUTEMENT_COMPETENCE' => $data['competences']
            ,'RECRUTEMENT_ATOUT' => $data['atout']
            ,'RECRUTEMENT_DEADLINE' => $data['deadline']
        );
        //$this->db->where('RECRUTEMENT_ID',$id);
         //$this->db->update('recrutement',$data);  
        //print_r($data);
        return $this->Global->update('recrutement', $data, array('RECRUTEMENT_ID' => $id)); 
    }
    

    public function valid_recrutement($data,$id) 
    {
        $data = array(
        //'RECRUTEMENT_ABANDON' => '', RECRUTEMENT_ID aussi miala
            'RECRUTEMENT_DEBUT' => $data['debut']
            ,'RECRUTEMENT_TRAITE' => $data['traite']
        );
        //$this->db->where('RECRUTEMENT_ID',$id);
         //$this->db->update('recrutement',$data);  
        //print_r($data);
        return $this->Global->update('recrutement', $data, array('RECRUTEMENT_ID' => $id)); 
    }


    public function refus_recrutement($data,$id) 
    {
        $data = array(
        //'RECRUTEMENT_ABANDON' => '', RECRUTEMENT_ID aussi miala
            'RECRUTEMENT_MOTIF_ABANDON' => $data['motif_abandon']
            ,'RECRUTEMENT_ABANDON' => $data['abandon']
            ,'RECRUTEMENT_CLOTURE' => $data['cloture']
            ,'RECRUTEMENT_TRAITE' => $data['traite']
        );
        //$this->db->where('RECRUTEMENT_ID',$id);
         //$this->db->update('recrutement',$data);  
        //print_r($data);
        return $this->Global->update('recrutement', $data, array('RECRUTEMENT_ID' => $id)); 
    }

    public function delete($id)
    {
        return $this->db->delete('recrutement', array('RECRUTEMENT_ID' => $id));
    }

    public function annul_demande($id) 
    {   
        $this->db->set('date_compta',$date);    
        $this->db->where('id_cmd',$id);
        $this->db->limit(1);
        return $this->db->update($this->table2);
    }


    public function find($id)
    {
        return $this->db->get_where('recrutement', array('RECRUTEMENT_ID' => $id))->row();
    }


    public function getRecrutementabandon()
    {
        //recrutement en cours si recrutement traité =1
        $array = array('RECRUTEMENT_ABANDON' => '1');
        $this->db->where($array);
        $query = $this->db->get("recrutement");
        return $query->result();   
    }

     public function getRecrutementencoursabandon() 
     {
        //recrutement en cours si recrutement traité =1
        $array = array('RECRUTEMENT_ABANDON' => '1', 'RECRUTEMENT_TRAITE' => '1');
        $this->db->where($array);
        $query = $this->db->get("recrutement");
        return $query->result();   
    }

   
}
?>