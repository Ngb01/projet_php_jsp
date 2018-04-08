<?php

class Cours_modele extends CI_MODEL{
	
	public function __construct(){
		$this->load->database();
	}

	//Pour afficher tous les cours d'un diplome
	public function find_by_diplome($diplome){
		$this->db->select('*');
		$this->db->from('cours');
		$this->db->join('prodiplome', 'cours.CODECOURS = prodiplome.CODECOURS');
		$this->db->where(array('prodiplome.CODEDIP'=>$diplome));
		$query = $this->db->get();
		return $query->result_array();
	}

	//Pour afficher les informations d'un cours grâce son id
	public function find_by_id($code){
		$query = $this->db->get_where('cours', array('CODECOURS'=>$code));
		return $query->row_array();
	}

	//Retourne tous les diplomes
	public function find_all_diplome(){
		$query = $this->db->get('diplomes');
		return $query->result_array();
	}

	//Retourne le nom du diplôme selon son ID
	public function find_name_diplome($codeD){
		$this->db->select('INTITULEDIP');
		$this->db->from('diplomes');
		$this->db->where(array('CODEDIP'=>$codeD));
		$query = $this->db->get();
		return $query->row_array();
	}

	//Pour insérer un nouveau diplome
	public function insert($codeD, $codeC, $nom, $credits){
		$data_cours = array(
	        'CODECOURS' => $codeC,
	        'LIBELLECOURS' => $nom,
	        'NBECTS' => $credits
		);

		$data_prog = array(
	        'CODECOURS' => $codeC,
	        'CODEDIP' => $codeD
		);

		$this->db->insert('cours', $data_cours);
		$this->db->insert('prodiplome', $data_prog);
	}

	//Pour mettre à jour un cours
	public function update($code, $nom, $credits){
		$data = array(
	        'CODECOURS' => $code,
	        'LIBELLECOURS' => $nom,
	        'NBECTS' => $credits
		);

		$this->db->where('CODECOURS', $code);
		$this->db->update('cours', $data);
	}

	//Pour supprimer un cours
	public function delete($code){
		$this->db->where('CODECOURS', $code);
		$this->db->delete('cours');
	}

}

?>