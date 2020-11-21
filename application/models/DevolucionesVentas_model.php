<?php
class DevolucionesVentas_model extends CI_Model
{

   public function __construct()
   {
       $this->load->database();
   }

    public function get_devolucionesVentas($id_devolucionesVentas = FALSE)
    {
        if ($id_devolucionesVentas === FALSE) {
            $this->db->select("dv.*, c.razon_social,a.nombre_articulo");
            $this->db->from("devolucion_venta dv");
            $this->db->join("clientes c", " c.id = dv.id_cliente", "left");
            $this->db->join("articulos a", " a.id = dv.id_producto", "left");


            $query = $this->db->get('devolucion_venta');
            return $query->result_array();
        }

        $query = $this->db->get_where('devolucion_venta', array('id' => $id_devolucionesVentas));
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
