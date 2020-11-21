<?php
class Ventas_model extends CI_Model
{

   public function __construct()
   {
       $this->load->database();
   }

    public function get_venta($id_venta = FALSE)
    {
        if ($id_venta === FALSE) {
           // $query = $this->db->get('ventas');
           // return $query->result_array();
            /* 
            $this->db->select("a.id as id_atributo, a.nombre as nombre_atributo, ad.valor as valor_atributodetalle,  ad.id");
            $this->db->from("atributo_detalle ad");
            $this->db->join("atributo a", " a.id = ad.id_atributo");

            $resultados = $this->db->get();
            return $resultados->result_array();
            */
            $this->db->select("v.*, c.razon_social");
            $this->db->from("ventas v");
            $this->db->join("clientes c", " c.id = v.id_cliente", "left");

            $resultados = $this->db->get();
            return $resultados->result_array();



        }

        $query = $this->db->get_where('ventas', array('id' => $id_venta));
        return $query->row_array();
    }
    public function getDetalle($id){
        $this->db->select("vd.*, a.nombre_articulo,a.precio,vd.cantidad,vd.monto_importe");
        $this->db->from("venta_detalle vd");
        $this->db->join("articulos a", " vd.articulos_id = a.id");
        $this->db->where("vd.venta_id",$id);
        return $resultados->result();


    }

    public function set_venta()
    {
        $data = array(
            //la llave del array debe ser igual al nombre del campo de base de datos 
            //el valor debe contener el name del input que esta en la vista create ...
            'fecha_venta' => $this->input->post('fecha_venta'),
            'id_cliente' => $this->input->post('id_cliente'),
            'id_usuario' => $this->input->post('id_usuario'),
            'subtotal' => $this->input->post('subtotal'),
            'descuento' => $this->input->post('descuento'),
            'iva_5' => $this->input->post('iva_5'),
            'iva_10' => $this->input->post('iva_10'),
            'total' => $this->input->post('total'),
            'numero_comprobante' => $this->input->post('numero_comprobante'),

        );

        return $this->db->insert('ventas', $data);
    }
    public function update_venta()
    {  
        $data = array(
            
            //la llave del array debe ser igual al nombre del campo de base de datos 
            //el valor debe contener el name del input que esta en la vista create ...
            'fecha_venta' => $this->input->post('fecha_venta'),
            'id_cliente' => $this->input->post('id_cliente'),
            'id_usuario' => $this->input->post('id_usuario'),
            'subtotal' => $this->input->post('subtotal'),
            'descuento' => $this->input->post('descuento'),
            'iva_5' => $this->input->post('iva_5'),
            'iva_10' => $this->input->post('iva_10'),
            'total' => $this->input->post('total'),
            'numero_comprobante' => $this->input->post('numero_comprobante'),
        );
        $id = $this->input->post("id");
         $this->db->update('ventas', $data, "id =".$id);
        
    }
    public function delete_venta($id)
    {
         $this->db->where("id" , $id);
         $this->db->delete('ventas');
    }
}
