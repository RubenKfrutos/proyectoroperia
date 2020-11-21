<?php
class Articulos extends CI_Controller
{
// test
    public function __construct()
    {
        parent::__construct();
        $this->load->model('articulos_model');
        $this->load->helper('url_helper');
        if (!$this->session->userdata("is_logged")) {
            redirect(site_url() . '/login/index');
        }
    }
    //metodos
    public function index()
    {
        $data['articulos'] = $this->articulos_model->get_articulo();
        $data['title'] = 'Articulos';

        $this->load->view('templates/header', $data);
        $this->load->view('articulos/index', $data);
        $this->load->view('templates/footer');
    }
    //metodos
    public function view($articulo = NULL)
    {
        $data['articulo'] = $this->articulos_model->get_articulo($articulo);
        if (empty($data['articulo'])) {
            show_404();
        }

        $data['title'] = $data['articulo']['nombre_articulo'];

        $this->load->view('templates/header', $data);
        $this->load->view('articulos/view', $data);
        $this->load->view('templates/footer');
    }
    //metodos
    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Crear un articulo';

        //los parametros que reciben set_rules son 
        //1 el nombre del campo input que esta en el formulario de la vista
        //2 un nombre para el campo para mostrar en un mensaje de error para mostrar al usuario
        //3 la regla ejemplo en este caso se usa required pero puede ser unico , email etccc
        $this->form_validation->set_rules('codigo_interno', 'Codigo Interno', 'required');
        $this->form_validation->set_rules('codigo_barras', 'Codigo de Barras', 'required');
        $this->form_validation->set_rules('nombre_articulo', 'Nombre del Articulo', 'required');
        $this->form_validation->set_rules('precio', 'Precio', 'required');
        $this->form_validation->set_rules('iva', 'Iva', 'required');




        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('articulos/create');
            $this->load->view('templates/footer');
        } else {
            $this->articulos_model->set_articulo();
            $this->load->view('articulos/success');
            redirect('/articulos/index/');
        }
    }

    //la priemra manera de llegar a este metodo es desde el index boton editar que tiene la url /clientes/edit/id_cliente
    //la segunda manera de llegar a este metodo es con el boton guardar de la vista clientes/edit

    //metodos
    public function edit($id_articulo = NULL)
    {
        // carga el helper y la libreria .
        $this->load->helper('form');
        $this->load->library('form_validation');

        // a la propiedad title del array data le asigna el string editar un cliente
        $data['title'] = 'Editar un articulo';


        //validaciones de formulario 
        //los parametros que reciben set_rules son 
        //1 el nombre del campo input que esta en el formulario de la vista
        //2 un nombre para el campo para mostrar en un mensaje de error para mostrar al usuario
        //3 la regla ejemplo en este caso se usa required pero puede ser unico , email etccc
        $this->form_validation->set_rules('codigo_interno', 'Codigo Interno', 'required');
        $this->form_validation->set_rules('codigo_barras', 'Codigo de Barras', 'required');
        $this->form_validation->set_rules('nombre_articulo', 'Nombre del Articulo', 'required');
        $this->form_validation->set_rules('precio', 'Precio', 'required');
        $this->form_validation->set_rules('iva', 'Iva', 'required');


        //
        if ($this->form_validation->run() === FALSE) {
            //esta parte del codigo consulta a la base de datos para obtener un cliente 
            //para luego poder editar 
            $data['articulo'] = $this->articulos_model->get_articulo($id_articulo);
            if (empty($data['articulo'])) {
                show_404();
            }
            //carga la vista editar
            $this->load->view('templates/header', $data);
            $this->load->view('articulos/edit', $data);
            $this->load->view('templates/footer');
            //aca probe si direcciona al index
            //redirect('/clientes/index/');

        }
    }
    public function update() //metodos 
    {
        //se le llama al update_cliente del modelo clientes_model
        echo $this->articulos_model->update_articulo();
        // $this->load->view('clientes/success');
        redirect('/articulos/index/');
    }

    public function delete($id) //metodos
    {
        //se le llama al delete_cliente del modelo clientes_model
        echo $this->articulos_model->delete_articulo($id);
        redirect('/articulos/index/');
        //$this->load->view('clientes/success');
    }
}
