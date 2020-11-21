<?php
class Atributos_model extends CI_Model
{

   public function __construct()
   {
       $this->load->database();
   }

    public function get_atributo($id_atributo = FALSE)
    {
        if ($id_atributo === FALSE) {
            $query = $this->db->get('atributo');
            return $query->result_array();
        }

        $query = $this->db->get_where('atributo', array('id' => $id_atributo));
        return $query->row_array();
    }

    public function set_atributo()
    {
        $data = array(
            //la llave del array debe ser igual al nombre del campo de base de datos 
            //el valor debe contener el name del input que esta en la vista create ...
            'codigo' => $this->input->post('codigo'),

            'nombre' => $this->input->post('nombre'),

            'descripcion' => $this->input->post('descripcion'),

            'estado' => $this->input->post('estado'),



        );

        return $this->db->insert('atributo', $data);
    }
    public function update_atributo()
    {  
        $data = array(
            
            //la llave del array debe ser igual al nombre del campo de base de datos 
            //el valor debe contener el name del input que esta en la vista create ...
            'codigo' => $this->input->post('codigo'),

            'nombre' => $this->input->post('nombre'),

            'descripcion' => $this->input->post('descripcion'),

            'estado' => $this->input->post('estado'),

        );
        $id = $this->input->post("id");
         $this->db->update('atributo', $data, "id =".$id);
        
    }
    public function delete_atributo($id)
    {
         $this->db->where("id" , $id);
         $this->db->delete('atributo');
    }
}
