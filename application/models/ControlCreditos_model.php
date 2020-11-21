<?php
class ControlCreditos_model extends CI_Model
{

   public function __construct()
   {
       $this->load->database();
   }

    public function get_controlCreditos($id_controlCreditos = FALSE)
    {
        if ($id_controlCreditos=== FALSE) {
           // $query = $this->db->get('control_credito');
           // return $query->result_array();
            $this->db->select("cc.*, c.razon_social, v.id as id_venta");
            $this->db->from("control_credito cc");
            $this->db->join("clientes c", " c.id = cc.id_cliente", "left");
            $this->db->join("ventas v", " c.id = v.id_cliente", "left");
            

            $resultados = $this->db->get();
            return $resultados->result_array();
        }

        $query = $this->db->get_where('control_credito', array('id' => $id_controlCreditos));
        return $query->row_array();
    }

    public function set_cliente()
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

        return $this->db->insert('clientes', $data);
    }
    public function update_cliente()
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
         $this->db->update('clientes', $data, "id =".$id);
        
    }
    public function delete_cliente($id)
    {
         $this->db->where("id" , $id);
         $this->db->delete('clientes');
    }
}
