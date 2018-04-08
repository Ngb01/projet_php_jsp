<?php

class Cours extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('cours_modele');
        $this->load->helper('url_helper');
    }

    //Génère la page qui permet d'afficher le formulaire de recherche de cours par diplome
    public function search(){
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['diplomes'] = $this->cours_modele->find_all_diplome();

        $this->load->view('header');
        $this->load->view('cours/search', $data);
        $this->load->view('footer');
    }

    //Génére la page d'affichage de tous les cours d'un diplome donné par formulaire
    public function find(){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $diplome = $this->input->post('diplome');

        $data['cours'] = $this->cours_modele->find_by_diplome($diplome);
        $data['nomD'] = $this->cours_modele->find_name_diplome($diplome);
        $data['diplome'] = $diplome;

        $this->load->view('header');
        $this->load->view('cours/allbydiplome', $data);
        $this->load->view('footer');
    }

    //Génére la page d'affichage de tous les cours d'un diplome donné par son id
    public function find_by_id($diplome){
        $data['cours'] = $this->cours_modele->find_by_diplome($diplome);
        $data['nomD'] = $this->cours_modele->find_name_diplome($diplome);
        $data['diplome'] = $diplome;

        $this->load->view('header');
        $this->load->view('cours/allbydiplome', $data);
        $this->load->view('footer');
    }

    //Génère la page de création de cours
    public function insertform($codeD){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['cours'] = $this->cours_modele->find_by_diplome($codeD);
        $data['nomD'] = $this->cours_modele->find_name_diplome($codeD);
        $data['codeD'] = $codeD;

        $this->load->view('header');
        $this->load->view('cours/add', $data);
        $this->load->view('footer');
    }

    //Génère la page de modification d'un diplome
    public function updateform($code){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['cours'] = $this->cours_modele->find_by_id($code);
        $this->load->view('header');
        $this->load->view('cours/update', $data);
        $this->load->view('footer');
    }

    //Insére un nouveau cours dans la base
    public function insert_db($codeD){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('code', 'Code cours', 'required');
        $this->form_validation->set_rules('nom', 'Nom du cours', 'required');
        $this->form_validation->set_rules('credits', 'Crédits ECTS', 'required');

        if($this->form_validation->run() === FALSE){
            $this->insertform($codeD);
        }else{
            $codeC = $this->input->post('code');
            $nom = $this->input->post('nom');
            $credits = $this->input->post('credits');
            $this->cours_modele->insert($codeD, $codeC, $nom, $credits);
            $this->insert_success();
        }
    }

    //Met à jour le diplome dans la base de données
    public function update_db($code){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('code', 'Code du cours', 'required');
        $this->form_validation->set_rules('nom', 'Nom du cours', 'required');
        $this->form_validation->set_rules('credits', 'Crédits ECTS', 'required');

        if($this->form_validation->run() === FALSE){
            $this->updateform($code);
        }else{
            $code = $this->input->post('code');
            $nom = $this->input->post('nom');
            $credits = $this->input->post('credits');
            $this->cours_modele->update($code, $nom, $credits);
            $this->update_success();
        }
    }

    //Supprime le cours dans la base de données
    public function delete_db($code){
        $this->cours_modele->delete($code);
        $this->delete_success();
    }

    //Signifie à l'utilisateur que l'entrée a bien été ajoutée
    public function insert_success(){
        $data['entree'] = 'Le cours';
        $this->load->view('header');
        $this->load->view('success/insert_success', $data);
        $this->load->view('footer');
    }

    //Signifie à l'utilisateur que l'entrée a bien été mise à jour
    public function update_success(){
        $data['entree'] = 'Le cours';
        $this->load->view('header');
        $this->load->view('success/update_success', $data);
        $this->load->view('footer');
    }

    //Signifie à l'utilisateur que l'entrée a bien été supprimée
    public function delete_success(){
        $data['entree'] = 'Le cours';
        $this->load->view('header');
        $this->load->view('success/delete_success', $data);
        $this->load->view('footer');
    }


}

?>