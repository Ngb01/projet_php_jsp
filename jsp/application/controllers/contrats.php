<?php

class Contrats extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('contrats_modele');
        $this->load->helper('url_helper');
    }

    // Retourne tous les cours d'un diplome donnée
    public function all_cours_by_diplome($codeD){
        $this->get_all_cours_by_diplome($codeD);
    }

    //Génère la page qui permet d'afficher le formulaire de recherche de contrats par université
    public function searchform(){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['universites'] = $this->contrats_modele->find_all_universites();

        $this->load->view('header');
        $this->load->view('contrats/search', $data);
        $this->load->view('footer');
    }

    //Génère la page de création de diplômes
    public function insertform(){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['diplomes'] = $this->contrats_modele->find_all_diplomes();
        $data['programmes'] = $this->contrats_modele->find_all_programmes();
        $data['demandes'] = $this->contrats_modele->find_all_demandes();

        $this->load->view('header');
        $this->load->view('contrats/add', $data);
        $this->load->view('footer');
    }

    //Génére la page d'affichage de tous les cours d'un diplome donné par formulaire
    public function search(){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $universite = $this->input->post('universite');

        $data['contrats'] = $this->contrats_modele->find_by_universite($universite);
        $data['universite'] = $universite;

        $this->load->view('header');
        $this->load->view('contrats/all', $data);
        $this->load->view('footer');
    }

    //Génère la page de modification d'un contrat
    public function updateform($code){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['diplomes'] = $this->contrats_modele->find_all_diplomes();
        $data['programmes'] = $this->contrats_modele->find_all_programmes();
        $data['demandes'] = $this->contrats_modele->find_all_demandes();

        $data['contrat'] = $this->contrats_modele->find_by_id($code);

        $this->load->view('header');
        $this->load->view('contrats/update', $data);
        $this->load->view('footer');
    }

    //Insére un nouveau contrat dans la base
    public function insert_db(){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('diplome', 'Diplome', 'required');
        $this->form_validation->set_rules('programme', 'Programme', 'required');
        $this->form_validation->set_rules('demande', 'Demande', 'required');
        $this->form_validation->set_rules('duree', 'Durée du contrat', 'required');
        $this->form_validation->set_rules('etat', 'Etat du contrat', 'required');

        if($this->form_validation->run() === FALSE){
            $this->insertform();
        }else{
            $diplome = $this->input->post('diplome');
            $programme = $this->input->post('programme');
            $demande = $this->input->post('demande');
            $duree = $this->input->post('duree');
            $etat = $this->input->post('etat');
            $this->contrats_modele->insert($diplome, $programme, $demande, $duree, $etat);
            $this->insert_success();
        }
    }

    //Met à jour le diplome dans la base de données
    public function update_db($code){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('diplome', 'Diplome', 'required');
        $this->form_validation->set_rules('programme', 'Programme', 'required');
        $this->form_validation->set_rules('demande', 'Demande', 'required');
        $this->form_validation->set_rules('duree', 'Durée du contrat', 'required');
        $this->form_validation->set_rules('etat', 'Etat du contrat', 'required');

        if($this->form_validation->run() === FALSE){
            $this->updateform($code);
        }else{
            $diplome = $this->input->post('diplome');
            $programme = $this->input->post('programme');
            $demande = $this->input->post('demande');
            $duree = $this->input->post('duree');
            $etat = $this->input->post('etat');
            $this->contrats_modele->update($code, $diplome, $programme, $demande, $duree, $etat);
            $this->update_success();
        }
    }

    //Supprime le cours dans la base de données
    public function delete_db($code){
        $this->contrats_modele->delete($code);
        $this->delete_success();
    }

    //Signifie à l'utilisateur que l'entrée a bien été ajoutée
    public function insert_success(){
        $data['entree'] = 'Le contrat';
        $this->load->view('header');
        $this->load->view('success/insert_success', $data);
        $this->load->view('footer');
    }

    //Signifie à l'utilisateur que l'entrée a bien été mise à jour
    public function update_success(){
        $data['entree'] = 'Le contrat';
        $this->load->view('header');
        $this->load->view('success/update_success', $data);
        $this->load->view('footer');
    }

    //Signifie à l'utilisateur que l'entrée a bien été supprimée
    public function delete_success(){
        $data['entree'] = 'Le contrat';
        $this->load->view('header');
        $this->load->view('success/delete_success', $data);
        $this->load->view('footer');
    }


}

?>