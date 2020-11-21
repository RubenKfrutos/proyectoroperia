<?php
class AtributoDetalle extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('atributoDetalle_model');
        $this->load->model('atributos_model');
        $this->load->helper('url_helper');
        
        if (!$this->session->userdata("is_logged")) {
            redirect(site_url() . '/login/index');
        }
    }
    //metodos
    public function index()
    { 
        $data['atributoDetalle'] = $this->atributoDetalle_model->get_atributoDetalle();
        // var_dump($data['atributoDetalle'] );
        $this->load->view('templates/header', $data); //nombre de la carpeta de donde proviene templates
        $this->load->view('atributoDetalle/index.php', $data); //nombre de la carpeta de donde proviene atributoDetalle
        $this->load->view('templates/footer');
    }
    //metodos
    public function view($id_atributoDetalle = NULL)
    {
        $data['atributos'] = $this->atributos_model->get_atributo();
        $data['atributoDetalle'] = $this->atributoDetalle_model->get_atributoDetalle($id_atributoDetalle);
        if (empty($data['atributoDetalle'])) {
            show_404();
        }
        //el elemento titulo de la variable data que se define en la liena de abajo se le asigna el valor del elemento codigo que esta adentro del elemento atributo que esta dentro de la variable data que en el bloque de codigo de arriba recibio el resultado de una consulta a la base de datos , este elemento titulo se utilizaba en el header del tutotial de codeigniter ..
        // $data['title'] = $data['atributo']['codigo'];


        $this->load->view('templates/header.php', $data);
        $this->load->view('atributoDetalle/view.php', $data);
        $this->load->view('templates/footer.php');
    }
    //metodos
    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        
        $data['atributos'] = $this->atributos_model->get_atributo();
        $data['title'] = 'Crear un Atributo Detalle';

        //los parametros que reciben set_rules son 
        //1 el nombre del campo input que esta en el formulario de la vista
        //2 un nombre para el campo para mostrar en un mensaje de error para mostrar al usuario
        //3 la regla ejemplo en este caso se usa required pero puede ser unico , email etccc
        $this->form_validation->set_rules('id_atributo', 'Atributo', 'required');

        $this->form_validation->set_rules('valor', 'Valor', 'required');




        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header.php', $data);
            $this->load->view('atributoDetalle/create.php',$data);
            $this->load->view('templates/footer.php');
        } else {
            $this->atributoDetalle_model->set_atributoDetalle();
            $this->load->view('atributoDetalle/success');
            redirect('/atributoDetalle/index/');
        }
    }

    //la priemra manera de llegar a este metodo es desde el index boton editar que tiene la url /clientes/edit/id_cliente
    //la segunda manera de llegar a este metodo es con el boton guardar de la vista clientes/edit

    //metodos , asi se declara un metodo ..
    public function edit($id_atributoDetalle = NULL)
    {
        // carga el helper y la libreria .
        $this->load->helper('form');
        $this->load->library('form_validation');

        // a la propiedad title del array data le asigna el string editar un cliente
        // $data['title'] = 'Editar un Atributo ';


        //validaciones de formulario 
        //los parametros que reciben set_rules son 
        //1 el nombre del campo input que esta en el formulario de la vista
        //2 un nombre para el campo para mostrar en un mensaje de error para mostrar al usuario
        //3 la regla ejemplo en este caso se usa required pero puede ser unico , email etccc
        $this->form_validation->set_rules('id_atributo', 'Atributo', 'required');

        $this->form_validation->set_rules('valor', 'Valor', 'required');

        //
        if ($this->form_validation->run() === FALSE) {
            //esta parte del codigo consulta a la base de datos para obtener un cliente 
            //para luego poder editar 
            $data['atributos'] = $this->atributos_model->get_atributo();
            $data['atributoDetalle'] = $this->atributoDetalle_model->get_atributoDetalle($id_atributoDetalle);
            if (empty($data['atributoDetalle'])) {
                show_404();
            }
            //carga la vista editar
            $this->load->view('templates/header', $data);
            $this->load->view('atributoDetalle/edit.php', $data);
            $this->load->view('templates/footer');
            //aca probe si direcciona al index
            //redirect('/clientes/index/');

        }
    }
    public function update() //metodos 
    {
        //se le llama al update_cliente del modelo clientes_model
        echo $this->atributoDetalle_model->update_atributoDetalle();
        // $this->load->view('clientes/success');
        redirect('/atributoDetalle/index/');
    }

    public function delete($id) //metodos
    {
        //se le llama al delete_cliente del modelo clientes_model
        echo $this->atributoDetalle_model->delete_atributoDetalle($id);
        redirect('/atributoDetalle/index/');
        //$this->load->view('clientes/success');
    }
}
