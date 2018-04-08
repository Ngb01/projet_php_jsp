<?php

class Programmes_modele extends CI_MODEL{
	
	public function __construct(){
		$this->load->database();
	}

	//Pour afficher tous les programmes proposés avec leur université
	public function show(){
		$this->db->select('programmes.INTITULEP, programmes.EXPLICATION, universites.NOMU');
		$this->db->from('programmes');
		$this->db->from('universites');
		$this->db->from('impliqueu');
		$this->db->where('programmes.INTITULEP = impliqueu.INTITULEP AND universites.NOMU = impliqueu.NOMU');
		$query = $this->db->get();
		return $query->result_array();
	}

	//Retourne le programme portant un nom donné
	public function find_by_name($nomP){
		$query = $this->db->get_where('programmes', array('INTITULEP'=>$nomP));
		return $query->row_array();
	}

	//Pour insérer un nouvel programme
	public function insert($nom, $description){
		$data_programme = array(
	        'INTITULEP' => $nom,
	        'EXPLICATION' => $description
		);

		$this->db->insert('programmes', $data_programme);
	}

	//Pour mettre à jour un programme
	public function update($nomP, $description){
		$data_programme = array(
	        'INTITULEP' => $nomP,
	        'EXPLICATION' => $description
		);

		$this->db->where('INTITULEP', $nomP);
		$this->db->update('programmes', $data_programme);
	}

	//Pour supprimer un programme
	public function delete($nomP){
		$this->db->where('INTITULEP', $nomP);
		$this->db->delete('programmes');
	}

}

?>