<?php
class Auth extends CI_Model {
    function __construct(){
        $this->load->database();

    }
    public function login ($username, $password){
        $data =$this->db->get_where('usuarios',array('username'=> $username,'password'),1);
        if(!$data->result()){
            return false;  
        }
        return $data->row();
    }
}