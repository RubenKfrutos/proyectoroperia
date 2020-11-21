<?php
class atributoDetalle_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function get_atributoDetalle($id_atributoDetalle = FALSE)
    {
        if ($id_atributoDetalle === FALSE) {
            //$query = $this->db->get('atributo_detalle');
            //return $query->result_array();

            $this->db->select("a.id as id_atributo, a.nombre as nombre_atributo, ad.valor as valor_atributodetalle,  ad.id");
            $this->db->from("atributo_detalle ad");
            $this->db->join("atributo a", " a.id = ad.id_atributo");

            $resultados = $this->db->get();
            //return $resultados->result();
            return $resultados->result_array();
        }

        $query = $this->db->get_where('atributo_detalle', array('id' => $id_atributoDetalle));

        return $query->row_array();
    }

    public function set_atributoDetalle()
    {
        $data = array(
            //la llave del array debe ser igual al nombre del campo de base de datos 
            //el valor debe contener el name del input que esta en la vista create ...
            'id_atributo' => $this->input->post('id_atributo'),

            'valor' => $this->input->post('valor'),

            'estado' => $this->input->post('estado'),




        );

        return $this->db->insert('atributo_detalle', $data);
    }
    public function update_atributoDetalle()
    {
        $data = array(

            //la llave del array debe ser igual al nombre del campo de base de datos 
            //el valor debe contener el name del input que esta en la vista create ...
            'id_atributo' => $this->input->post('id_atributo'),

            'valor' => $this->input->post('valor'),

            'estado' => $this->input->post('estado'),

        );
        $id = $this->input->post("id");
        $this->db->update('atributo_detalle', $data, "id =" . $id);
    }
    public function delete_atributoDetalle($id)
    {
        $this->db->where("id", $id);
        $this->db->delete('atributo_detalle');
    }
}
