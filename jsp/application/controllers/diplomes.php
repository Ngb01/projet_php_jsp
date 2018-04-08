<?php
class Diplomes extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('diplomes_modele');
        $this->load->helper('url_helper');
    }

    //Génére la page d'affichage de tous les diplomes
    public function all(){
        $data['diplomes'] = $this->diplomes_modele->show();
        $this->load->view('header');
        $this->load->view('diplomes/all', $data);
        $this->load->view('footer');
    }

    //Génère la page qui permet d'afficher le formulaire de recherche de diplome par universite
    public function search(){
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        $data['universites'] = $this->diplomes_modele->find_all_universites();

        $this->load->view('header');
        $this->load->view('diplomes/search', $data);
        $this->load->view('footer');
    }

    //Génére la page d'affichage de tous les diplomes d'un université donnée
    public function find_by_universite(){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $universite = $this->input->post('universite');

        $data['diplomes'] = $this->diplomes_modele->find_by_universite($universite);
        $data['nom'] = $this->diplomes_modele->find_name_universite($universite);

        $this->load->view('header');
        $this->load->view('diplomes/allbyuniversite', $data);
        $this->load->view('footer');
    }

    //Génère la page de création de diplômes
    public function insertform(){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['universites'] = $this->diplomes_modele->find_all_universites();

        $this->load->view('header');
        $this->load->view('diplomes/add', $data);
        $this->load->view('footer');
    }

    //Génère la page de modification d'un diplome
    public function updateform($code){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['diplome'] = $this->diplomes_modele->find_by_id($code);
        $this->load->view('header');
        $this->load->view('diplomes/update', $data);
        $this->load->view('footer');
    }

    //Insére un nouveau diplôme dans la base
    public function insert_db(){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('intitule', 'Intitule', 'required');
        $this->form_validation->set_rules('adresseweb', 'Adresse Web', 'required');
        $this->form_validation->set_rules('niveau', 'Niveau', 'required');
        $this->form_validation->set_rules('universite', 'universite', 'required');

        if($this->form_validation->run() === FALSE){
            $this->insertform();
        }else{
            $intitule = $this->input->post('intitule');
            $adresse = $this->input->post('adresseweb');
            $niveau = $this->input->post('niveau');
            $universite = $this->input->post('universite');
            $this->diplomes_modele->insert($universite, $intitule, $adresse, $niveau);
            $this->insert_success();
        }
    }

    //Met à jour le diplome dans la base de données
    public function update_db($code){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('intitule', 'Intitule', 'required');
        $this->form_validation->set_rules('adresseweb', 'Adresse Web', 'required');
        $this->form_validation->set_rules('niveau', 'Niveau', 'required');

        if($this->form_validation->run() === FALSE){
            $this->updateform($code);
        }else{
            $intitule = $this->input->post('intitule');
            $adresse = $this->input->post('adresseweb');
            $niveau = $this->input->post('niveau');
            $this->diplomes_modele->update($code, $intitule, $adresse, $niveau);
            $this->update_success();
        }
    }

    //Supprime le diplome dans la base de données
    public function delete_db($code){
        $this->diplomes_modele->delete($code);
        $this->delete_success();
    }

    //Signifie à l'utilisateur que l'entrée a bien été ajoutée
    public function insert_success(){
        $data['entree'] = 'Le diplome';
        $this->load->view('header');
        $this->load->view('success/insert_success', $data);
        $this->load->view('footer');
    }

    //Signifie à l'utilisateur que l'entrée a bien été mise à jour
    public function update_success(){
        $data['entree'] = 'Le diplome';
        $this->load->view('header');
        $this->load->view('success/update_success', $data);
        $this->load->view('footer');
    }

    //Signifie à l'utilisateur que l'entrée a bien été supprimée
    public function delete_success(){
        $data['entree'] = 'Le diplome';
        $this->load->view('header');
        $this->load->view('success/delete_success', $data);
        $this->load->view('footer');
    }



}

?>