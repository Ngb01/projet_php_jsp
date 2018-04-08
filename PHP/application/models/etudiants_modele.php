<?php

class Etudiants_modele extends CI_MODEL{
	
	public function __construct(){
		$this->load->database();
	}

	
	//Retourne le ou les étudiants portant un nom donné
	public function find_by_name($nom){
		$query = $this->db->get_where('etudiants', array('NOMET'=>$nom));
		return $query->result_array();
	}

	//Retourne l'étudiant à partir de son id
	public function find_by_id($code){
		$query = $this->db->get_where('etudiants', array('NUMETUDIANT'=>$code));
		return $query->row_array();
	}

	//Pour afficher tous les diplômes
	public function get_all_diplomes(){
		$query = $this->db->get('diplomes');
		return $query->result_array();
	}

	//Pour récupérer le diplome préparé par un étudiant
	public function get_diplome($codeE){
		$this->db->select('diplomes.CODEDIP, INTITULEDIP');
		$this->db->from('diplomes');
		$this->db->join('diplomesactuels', 'diplomes.CODEDIP = diplomesactuels.CODEDIP');
		$this->db->where(array('diplomesactuels.NUMETUDIANT'=>$codeE));
		$query = $this->db->get();
		return $query->row_array();
	}


	//Pour insérer un nouvel étudiant
	public function insert($numero, $nom, $prenom, $mail, $cv, $diplome){
		$data_etudiant = array(
	        'NUMETUDIANT' => $numero,
	        'NOMET' => $nom,
	        'PRENOMET' => $prenom,
	        'EMAIL' => $mail
		);

		if($cv !== null){
			$data_etudiant['CV'] = $cv;
		}

		$data_diplome =  array(
			'CODEDIP' => $diplome,
			'NUMETUDIANT' => $numero
		);

		$this->db->insert('etudiants', $data_etudiant);
		$this->db->insert('diplomesactuels', $data_diplome);
	}

	//Pour mettre à jour un étudiant
	public function update($numero, $nom, $prenom, $mail, $cv, $diplome){
		$data_etudiant = array(
	        'NUMETUDIANT' => $numero,
	        'NOMET' => $nom,
	        'PRENOMET' => $prenom,
	        'EMAIL' => $mail
		);

		if($cv !== null){
			$data_etudiant['CV'] = $cv;
		}

		$data_diplome =  array(
			'CODEDIP' => $diplome,
			'NUMETUDIANT' => $numero
		);

		$this->db->where('NUMETUDIANT', $numero);
		$this->db->update('etudiants', $data_etudiant);

		$this->db->where('NUMETUDIANT', $numero);
		$this->db->update('diplomesactuels', $data_diplome);
	}

	//Pour supprimer un étudiant
	public function delete($code){
		$this->db->where('NUMETUDIANT', $code);
		$this->db->delete('etudiants');
	}

}

?>