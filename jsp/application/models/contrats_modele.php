<?php

class Contrats_modele extends CI_MODEL{
	
	public function __construct(){
		$this->load->database();
	}

	//Pour afficher les informations d'un contrat selon son ID
	public function find_by_id($code){
		$query = $this->db->get_where('contrats', array('IDCONTRAT'=>$code));
		return $query->row_array();
	}

	//Retourne toutes les universités
	public function find_all_universites(){
		$query = $this->db->get('universites');
		return $query->result_array();
	}

	//Retourne tous les diplomes
	public function find_all_diplomes(){
		$query = $this->db->get('diplomes');
		return $query->result_array();
	}

	//Retourne tous les programmes de mobilités
	public function find_all_programmes(){
		$query = $this->db->get('programmes');
		return $query->result_array();
	}

	//Retourne toutes les demandes de mobilités
	public function find_all_demandes(){
		$query = $this->db->get('demandesmobiles');
		return $query->result_array();
	}

	//Retourne tous les contrats d'une université
	public function find_by_universite($universite){
		$this->db->select('*');
		$this->db->from('contrats');
		$this->db->join('diplomes', 'contrats.CODEDIP = diplomes.CODEDIP');
		$this->db->where(array('diplomes.NOMU'=>$universite));
		$query = $this->db->get();
		return $query->result_array();
	}

	//Retourne l'ID d'un contrat
	public function get_id($diplome, $programme, $demande, $duree, $etat){
		$this->db->select('IDCONTRAT');
		$this->db->from('contrats');
		$this->db->where('CODEDIP', $diplome);
		$this->db->where('REFDEMMOB', $demande);
		$this->db->where('INTITULEP', $programme);
		$this->db->where('DUREE', $duree);
		$this->db->where('ETATCONTRAT', $etat);
		$query = $this->db->get();
		return $query->row_array();
	}

	//Pour afficher tous les cours d'un diplome
	public function get_cours_by_diplome($diplome){
		$this->db->select('*');
		$this->db->from('cours');
		$this->db->join('prodiplome', 'cours.CODECOURS = prodiplome.CODECOURS');
		$this->db->where(array('prodiplome.CODEDIP'=>$diplome));
		$query = $this->db->get();
		return $query->result_array();
	}

	//Pour insérer un nouveau contrat
	public function insert($diplome, $programme, $demande, $duree, $etat){
		$data_contrat = array(
	        'CODEDIP' => $diplome,
	        'REFDEMMOB' => $demande,
	        'INTITULEP' => $programme,
	        'DUREE' => $duree,
	        'ETATCONTRAT' => $etat
		);

		$this->db->insert('contrats', $data_contrat);

		$cours = $this->get_cours_by_diplome($diplome);
		$contrat = $this->get_id($diplome, $programme, $demande, $duree, $etat);
		
		foreach ($cours as $cour) {
			$data_cours = array(
				'CODECOURS' => $cour['CODECOURS'],
				'IDCONTRAT' => $contrat['IDCONTRAT']
			);
			
			$this->db->insert('composercontrat', $data_cours);
		}
	}

	//Pour mettre à jour un contrat
	public function update($idcontrat, $diplome, $programme, $demande, $duree, $etat){
		
		$contrat = $this->find_by_id($idcontrat);
		
		$data_contrat = array(
	        'CODEDIP' => $diplome,
	        'REFDEMMOB' => $demande,
	        'INTITULEP' => $programme,
	        'DUREE' => $duree,
	        'ETATCONTRAT' => $etat
		);

		$this->db->where('IDCONTRAT', $idcontrat);
		$this->db->update('contrats', $data_contrat);

		if($contrat['CODEDIP'] !== $diplome){

			$this->db->where('IDCONTRAT', $idcontrat);
			$this->db->delete('composercontrat');

			$cours = $this->get_cours_by_diplome($diplome);
			
			foreach ($cours as $cour) {
				$data_cours = array(
					'CODECOURS' => $cour['CODECOURS'],
					'IDCONTRAT' => $contrat['IDCONTRAT']
				);
				
				$this->db->insert('composercontrat', $data_cours);
			}

		}
	}

	//Pour supprimer un contrat
	public function delete($code){
		$this->db->where('IDCONTRAT', $code);
		$this->db->delete('contrats');

		$this->db->where('IDCONTRAT', $code);
		$this->db->delete('composercontrat');
	}

}

?>