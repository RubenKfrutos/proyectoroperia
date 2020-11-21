<?php
class Articulos_model extends CI_Model
{

   public function __construct()
   {
       $this->load->database();
   }

    public function get_articulo($id_articulo = FALSE)
    {
        if ($id_articulo === FALSE) {
            $query = $this->db->get('articulos');
            return $query->result_array();
        }

        $query = $this->db->get_where('articulos', array('id' => $id_articulo));
        return $query->row_array();
    }

    public function set_articulo()
    {
        $data = array(
            //la llave del array debe ser igual al nombre del campo de base de datos 
            //el valor debe contener el name del input que esta en la vista create ...
            'codigo_interno' => $this->input->post('codigo_interno'),

            'codigo_barras' => $this->input->post('codigo_barras'),

            'nombre_articulo' => $this->input->post('nombre_articulo'),

            'descripcion' => $this->input->post('descripcion'),

            'precio' => $this->input->post('precio'),


            'iva' => $this->input->post('iva'),


        );

        return $this->db->insert('articulos', $data);
    }
    public function update_articulo()
    {  
        $data = array(
            
            //la llave del array debe ser igual al nombre del campo de base de datos 
            //el valor debe contener el name del input que esta en la vista create ...
            'codigo_interno' => $this->input->post('codigo_interno'),

            'codigo_barras' => $this->input->post('codigo_barras'),

            'nombre_articulo' => $this->input->post('nombre_articulo'),

            'descripcion' => $this->input->post('descripcion'),

            'precio' => $this->input->post('precio'),

            'iva' => $this->input->post('iva'),

        );
        $id = $this->input->post("id");
         $this->db->update('articulos', $data, "id =".$id);
        
    }
    public function delete_articulo($id)
    {
         $this->db->where("id" , $id);
         $this->db->delete('articulos');
    }

    public function update($id,$data){
		$this->db->where("id",$id);
		return $this->db->update("articulos",$data);
    }
    

	public function setear_stock_negative($data){

		$this->db->where("stock <", 0);
		return $this->db->update("articulos", $data);
    }
    public function getArticulo($id){
		$this->db->select("a.*");
		$this->db->from("articulos a");
		$this->db->where("a.id",$id);
		$resultado = $this->db->get();
		return $resultado->row();
	}
}
