<?php

class Accueil extends CI_Controller{

	public function __construct(){
	    parent::__construct();
	    $this->load->model('diplomes_modele');
	    $this->load->helper('url_helper');
	}

	public function view ($page='home'){
		
		if(!file_exists(APPPATH.'views/accueil/'.$page.'.php')){
			show_404();
		}

		$data['universites'] = $this->diplomes_modele->find_all_universites();

        $this->load->view('header');
        $this->load->view('accueil/home', $data);
        $this->load->view('footer');
	}

}
?>