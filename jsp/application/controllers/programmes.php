<?php
class Programmes extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('programmes_modele');
        $this->load->helper('url_helper');
    }

    //Génére la page d'affichage de tous les programmes disponibles
    public function all(){
        $data['programmes'] = $this->programmes_modele->show();
        $this->load->view('header');
        $this->load->view('programmes/all', $data);
        $this->load->view('footer');
    }

    
    //Génère la page de création d'un nouveau programme
    public function insertform(){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->load->view('header');
        $this->load->view('programmes/add');
        $this->load->view('footer');
    }

    //Génère la page de modification d'un programme
    public function updateform($nomP){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['programme'] = $this->programmes_modele->find_by_name($nomP);

        $this->load->view('header');
        $this->load->view('programmes/update', $data);
        $this->load->view('footer');
    }

    //Insére un nouvel étudiant dans la base
    public function insert_db(){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nom', 'Nom du programme', 'required');
        $this->form_validation->set_rules('description', 'Description du programme', 'required');

        if($this->form_validation->run() === FALSE){
            $this->insertform();
        }else{
            $nom = $this->input->post('nom');
            $description = $this->input->post('description');
            $this->programmes_modele->insert($nom, $description);
            $this->insert_success();
        }
    }

    //Met à jour le programme dans la base de données
    public function update_db($nomP){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nom', 'Nom du programme', 'required');
        $this->form_validation->set_rules('description', 'Description du programme', 'required');

        if($this->form_validation->run() === FALSE){
            $this->updateform($nomP);
        }else{
            $nom = $this->input->post('nom');;
            $description = $this->input->post('description');
            $this->programmes_modele->update($nom, $description);
            $this->update_success();
        }
    }

    //Supprime le programme dans la base de données
    public function delete_db($nomP){
        $this->programmes_modele->delete($nomP);
        $this->delete_success();
    }

    //Signifie à l'utilisateur que l'entrée a bien été ajoutée
    public function insert_success(){
        $data['entree'] = 'Le programme';
        $this->load->view('header');
        $this->load->view('success/insert_success', $data);
        $this->load->view('footer');
    }

    //Signifie à l'utilisateur que l'entrée a bien été mise à jour
    public function update_success(){
        $data['entree'] = 'Le programme';
        $this->load->view('header');
        $this->load->view('success/update_success', $data);
        $this->load->view('footer');
    }

    //Signifie à l'utilisateur que l'entrée a bien été supprimée
    public function delete_success(){
        $data['entree'] = 'Le programme';
        $this->load->view('header');
        $this->load->view('success/delete_success', $data);
        $this->load->view('footer');
    }


}

?>