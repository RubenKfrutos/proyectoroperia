<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Login extends CI_Controller {
 
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('getmenu','url'));
        $this->load->library(array('form_validation','session'));
        $this->load->helper(array('auth/login_rules'));
        $this->load->model('Auth');
    }
    public function index(){
        // $data['menu'] = main_menu();
        $this->load->view('login');
        //para llamar a las funciones del helper e imprimir la funcion del helper
    }
    public function validate(){
        $this->form_validation->set_error_delimiters('','');
        $rules =getLoginRules();
        $this->form_validation->set_rules($rules);
        if($this->form_validation->run()===FALSE){
            // echo "hola";
            $errors = array(
                'user'=> form_error('user'),
                'password'=> form_error('password')

            );
            echo json_encode($errors);
            $this->output->set_status_header(400);
        }else {
            $usr = $this->input->post('username');
            $pass = $this->input->post('password');
            if(!$res=$this->Auth->login($usr, $pass)){
                echo json_encode(array('msg' => 'Verifique sus credenciales'));
                $this->output->set_status_header(401);
                exit ;
                
            }
            $data = array(
                'id' =>$res->id,
                'username' =>$res->username,
                'is_logged'=>TRUE,

            );

            $this->session->set_userdata($data);
            $this->session->set_flashdata('msg','Bienvenido al sistema'.$data['username']);
            echo json_encode(array("url" => site_url('dashboard/index/')));


        }
    }
    public function logout(){
        $vars = array('id','username','is_logged');
        $this->session->unset_userdata($vars);
        $this->session->sess_destroy();
        redirect('login/index');
    }



    }
   


    

    




