<?php

class Diplomes_modele extends CI_MODEL{
	
	public function __construct(){
		$this->load->database();
	}

	//Pour afficher tous les diplômes
	public function show(){
		$query = $this->db->get('diplomes');
		return $query->result_array();
	}

	//Pour afficher les informations d'un diplome selon son ID
	public function find_by_id($code){
		$query = $this->db->get_where('diplomes', array('CODEDIP'=>$code));
		return $query->row_array();
	}

	//Pour afficher tous les diplomes d'une universite
	public function find_by_universite($nom){
		$this->db->select('*');
		$this->db->from('diplomes');
		$this->db->where(array('NOMU'=>$nom));
		$query = $this->db->get();
		return $query->result_array();
	}

	//Retourne toutes les universites
	public function find_all_universites(){
		$query = $this->db->get('universites');
		return $query->result_array();
	}

	//Retourne le nom du diplôme selon son ID
	public function find_name_universite($nomU){
		$this->db->select('NOMU');
		$this->db->from('universites');
		$this->db->where(array('NOMU'=>$nomU));
		$query = $this->db->get();
		return $query->row_array();
	}

	//Pour insérer un nouveau diplome
	public function insert($nomU, $nomD, $site, $niveau){
		$data = array(
			'NOMU' => $nomU,
	        'INTITULEDIP' => $nomD,
	        'ADRESSEWEBD' => $site,
	        'NIVEAU' => $niveau
		);

		$this->db->insert('diplomes', $data);
	}

	//Pour mettre à jour une diplome
	public function update($code, $nom, $site, $niveau){
		$data = array(
	        'CODEDIP' => $code,
	        'NOMU' => $nomU,
	        'INTITULEDIP' => $nom,
	        'ADRESSEWEBD' => $site,
	        'NIVEAU' => $niveau
		);

		$this->db->where('CODEDIP', $code);
		$this->db->update('diplomes', $data);
	}

	//Pour supprimer un diplome
	public function delete($code){
		$this->db->where('CODEDIP', $code);
		$this->db->delete('diplomes');
	}

}

?>