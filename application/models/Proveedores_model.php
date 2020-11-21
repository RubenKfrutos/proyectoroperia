<?php
class Proveedores_model extends CI_Model
{

   public function __construct()
   {
       $this->load->database();
   }

    public function get_proveedor($id_proveedor = FALSE)
    {
        if ($id_proveedor === FALSE) {
            $query = $this->db->get('proveedores');
            return $query->result_array();
        }

        $query = $this->db->get_where('proveedores', array('id' => $id_proveedor));
        return $query->row_array();
    }

    public function set_proveedor()
    {
        $data = array(
            //la llave del array debe ser igual al nombre del campo de base de datos 
            //el valor debe contener el name del input que esta en la vista create ...
            'razon_social' => $this->input->post('razon_social'),

            'tipo_documento' => $this->input->post('tipo_documento'),

            'numero_documento' => $this->input->post('numero_documento'),

            'numero_contacto' => $this->input->post('numero_contacto'),

            'email_contacto' => $this->input->post('email_contacto'),

            'direccion' => $this->input->post('direccion'),

        );

        return $this->db->insert('proveedores', $data);
    }
    public function update_proveedor()
    {  
        $data = array(
            
            //la llave del array debe ser igual al nombre del campo de base de datos 
            //el valor debe contener el name del input que esta en la vista create ...
            'razon_social' => $this->input->post('razon_social'),

            'tipo_documento' => $this->input->post('tipo_documento'),

            'numero_documento' => $this->input->post('numero_documento'),
          
            'numero_contacto' => $this->input->post('numero_contacto'),

            'email_contacto' => $this->input->post('email_contacto'),

            'direccion' => $this->input->post('direccion'),

        );
        $id = $this->input->post("id");
         $this->db->update('proveedores', $data, "id =".$id);
        
    }
    public function delete_proveedor($id)
    {
         $this->db->where("id" , $id);
         $this->db->delete('proveedores');
    }
}
