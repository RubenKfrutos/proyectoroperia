<?php
class Usuarios_model extends CI_Model
{

   public function __construct()
   {
       $this->load->database();
   }

    public function get_usuario($id_usuario = FALSE)
    {
        if ($id_usuario === FALSE) {
            $query = $this->db->get('usuarios');
            return $query->result_array();
        }

        $query = $this->db->get_where('usuarios', array('id' => $id_usuario));
        return $query->row_array();
    }

    public function set_usuario()
    {
        $data = array(
            //la llave del array debe ser igual al nombre del campo de base de datos 
            //el valor debe contener el name del input que esta en la vista create ...

            //llave ↓                                  ↓ nombre del input
            //'razon_social' => $this->input->post('razon_social'),
            
            'nombre' => $this->input->post('nombre'),

            'numero_documento' => $this->input->post('numero_documento'),

            'numero_contacto' => $this->input->post('numero_contacto'),

            'email_contacto' => $this->input->post('email_contacto'),

            'direccion' => $this->input->post('direccion'),

            'username' => $this->input->post('username'),

            'password' => $this->input->post('password'),

            

        );

        return $this->db->insert('usuarios', $data);
    }
    public function update_usuario()
    {  
        $data = array(
            
            //la llave del array debe ser igual al nombre del campo de base de datos 
            //el valor debe contener el name del input que esta en la vista create ...
            'nombre' => $this->input->post('nombre'),

            'numero_documento' => $this->input->post('numero_documento'),

            'numero_contacto' => $this->input->post('numero_contacto'),

            'email_contacto' => $this->input->post('email_contacto'),

            'direccion' => $this->input->post('direccion'),

            'username' => $this->input->post('username'),

            'password' => $this->input->post('password'),

            
        );
        $id = $this->input->post("id");
         $this->db->update('usuarios', $data, "id =".$id);
        
    }
    public function delete_usuario($id)
    {
         $this->db->where("id" , $id);
         $this->db->delete('usuarios');
    }
}
