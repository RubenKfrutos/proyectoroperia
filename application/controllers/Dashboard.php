<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library(array('session'));
    }
    //seguridad
    public function index(){
        if($this->session->userdata('is_logged')){
            $this->load->view('templates/header');
            $this->load->view('dashboard.php');
            $this->load->view('templates/footer');
        }else{
            show_404();
        }

    }
}