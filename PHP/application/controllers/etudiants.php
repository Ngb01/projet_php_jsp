<?php
class Etudiants extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('etudiants_modele');
        $this->load->helper('url_helper');
    }

    //Génère la page qui permet d'afficher le formulaire de recherche des étudiants
    public function searchform(){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->load->view('header');
        $this->load->view('etudiants/search');
        $this->load->view('footer');
    }

    //Génére la page de résultat de la recherche d'étudiants
    public function find(){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nom', 'Nom de l\'étudiant', 'required');

        if($this->form_validation->run() === FALSE){
            $this->searchform();
        }else{
            $nom = $this->input->post('nom');
            $data['etudiants'] = $this->etudiants_modele->find_by_name(strtoupper($nom));

            if($data['etudiants']){
                $this->load->view('header');
                $this->load->view('etudiants/results', $data);
                $this->load->view('footer');
            }else{
                $this->load->view('header');
                $this->load->view('etudiants/noresults');
                $this->load->view('footer');
            }
        }
    }

    
    //Génère la page de création d'un nouvel étudiant
    public function insertform(){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['diplomes'] = $this->etudiants_modele->get_all_diplomes();

        $this->load->view('header');
        $this->load->view('etudiants/add', $data);
        $this->load->view('footer');
    }

    //Génère la page de modification d'un étudiant
    public function updateform($code){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['etudiant'] = $this->etudiants_modele->find_by_id($code);
        $data['diplomes'] = $this->etudiants_modele->get_all_diplomes();
        $data['diplome_prepare'] = $this->etudiants_modele->get_diplome($code);

        $this->load->view('header');
        $this->load->view('etudiants/update', $data);
        $this->load->view('footer');
    }

    //Insére un nouvel étudiant dans la base
    public function insert_db(){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('numero', 'Numero etudiant', 'required');
        $this->form_validation->set_rules('nom', 'Nom de l\'étudiant', 'required');
        $this->form_validation->set_rules('prenom', 'Prénom de l\'étudiant', 'required');
        $this->form_validation->set_rules('mail', 'Email de l\'étudiant', 'required');
        $this->form_validation->set_rules('diplome', 'Diplome actuel de l\'étudiant', 'required');

        if($this->form_validation->run() === FALSE){
            $this->insertform();
        }else{
            $numero = $this->input->post('numero');
            $nom = $this->input->post('nom');
            $prenom = $this->input->post('prenom');
            $mail = $this->input->post('mail');
            $cv = $this->input->post('cv');
            $diplome = $this->input->post('diplome');
            $this->etudiants_modele->insert($numero, strtoupper($nom), $prenom, $mail, $cv, $diplome);
            $this->insert_success();
        }
    }

    //Met à jour l'étudiant dans la base de données
    public function update_db($code){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('numero', 'Numero etudiant', 'required');
        $this->form_validation->set_rules('nom', 'Nom de l\'étudiant', 'required');
        $this->form_validation->set_rules('prenom', 'Prénom de l\'étudiant', 'required');
        $this->form_validation->set_rules('mail', 'Email de l\'étudiant', 'required');
        $this->form_validation->set_rules('diplome', 'Diplome actuel de l\'étudiant', 'required');

        if($this->form_validation->run() === FALSE){
            $this->updateform($code);
        }else{
            $numero = $this->input->post('numero');
            $nom = $this->input->post('nom');
            $prenom = $this->input->post('prenom');
            $mail = $this->input->post('mail');
            $cv = $this->input->post('cv');
            $diplome = $this->input->post('diplome');
            $this->etudiants_modele->update($numero, strtoupper($nom), $prenom, $mail, $cv, $diplome);
            $this->update_success();
        }
    }

    //Supprime l'étudiant dans la base de données
    public function delete_db($code){
        $this->etudiants_modele->delete($code);
        $this->delete_success();
    }

    //Signifie à l'utilisateur que l'entrée a bien été ajoutée
    public function insert_success(){
        $data['entree'] = 'L\'étudiant';
        $this->load->view('header');
        $this->load->view('success/insert_success', $data);
        $this->load->view('footer');
    }

    //Signifie à l'utilisateur que l'entrée a bien été mise à jour
    public function update_success(){
        $data['entree'] = 'L\'étudiant';
        $this->load->view('header');
        $this->load->view('success/update_success', $data);
        $this->load->view('footer');
    }

    //Signifie à l'utilisateur que l'entrée a bien été supprimée
    public function delete_success(){
        $data['entree'] = 'L\'étudiant';
        $this->load->view('header');
        $this->load->view('success/delete_success', $data);
        $this->load->view('footer');
    }


}

?>