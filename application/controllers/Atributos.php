<?php
class Atributos extends CI_Controller
{

        public function __construct()
        {
                parent::__construct();
                $this->load->model('atributos_model');
                $this->load->helper('url_helper');
                if (!$this->session->userdata("is_logged")) {
                    redirect(site_url() . '/login/index');
                }
        }
        //metodos
        public function index()
        {
                $data['atributos'] = $this->atributos_model->get_atributo();

                $data['title'] = 'Atributos';

                $this->load->view('templates/header', $data);
                $this->load->view('atributos/index', $data);
                $this->load->view('templates/footer');
        }
        //metodos
        public function view($id_atributo = NULL)
        {
                $data['atributo'] = $this->atributos_model->get_atributo($id_atributo);
                if (empty($data['atributo'])) {
                       show_404();
                }
                //el elemento titulo de la variable data que se define en la liena de abajo se le asigna el valor del elemento codigo que esta adentro del elemento atributo que esta dentro de la variable data que en el bloque de codigo de arriba recibio el resultado de una consulta a la base de datos , este elemento titulo se utilizaba en el header del tutotial de codeigniter ..
                // $data['title'] = $data['atributo']['codigo'];


                $this->load->view('templates/header', $data);
                $this->load->view('atributos/view', $data);
                $this->load->view('templates/footer');
        }
        //metodos
        public function create()
        {
                $this->load->helper('form');
                $this->load->library('form_validation');

                $data['title'] = 'Crear un Atributo';
                
                //los parametros que reciben set_rules son 
                //1 el nombre del campo input que esta en el formulario de la vista
                //2 un nombre para el campo para mostrar en un mensaje de error para mostrar al usuario
                //3 la regla ejemplo en este caso se usa required pero puede ser unico , email etccc
                $this->form_validation->set_rules('codigo', 'Codigo', 'required');
                
                $this->form_validation->set_rules('nombre', 'Descripcion', 'required');




                if ($this->form_validation->run() === FALSE) {
                        $this->load->view('templates/header', $data);
                        $this->load->view('atributos/create');
                        $this->load->view('templates/footer');
                } else {
                        $this->atributos_model->set_atributo();
                        $this->load->view('atributos/success');
                        redirect('/atributos/index/');

                }
        }

        //la priemra manera de llegar a este metodo es desde el index boton editar que tiene la url /clientes/edit/id_cliente
        //la segunda manera de llegar a este metodo es con el boton guardar de la vista clientes/edit

        //metodos
        public function edit($id_atributo = NULL)
        {
                // carga el helper y la libreria .
                $this->load->helper('form');
                $this->load->library('form_validation');

                // a la propiedad title del array data le asigna el string editar un cliente
                $data['title'] = 'Editar un Atributo';
                
                
                //validaciones de formulario 
                //los parametros que reciben set_rules son 
                //1 el nombre del campo input que esta en el formulario de la vista
                //2 un nombre para el campo para mostrar en un mensaje de error para mostrar al usuario
                //3 la regla ejemplo en este caso se usa required pero puede ser unico , email etccc
                $this->form_validation->set_rules('razon_social', 'Razon Social', 'required');
                
                $this->form_validation->set_rules('tipo_documento', 'Tipo de Documento', 'required');
                $this->form_validation->set_rules('numero_contactox', 'Numero de Contacto', 'required');
                
                //
                if ($this->form_validation->run() === FALSE) {
                        //esta parte del codigo consulta a la base de datos para obtener un cliente 
                        //para luego poder editar 
                        $data['atributo'] = $this->atributos_model->get_atributo($id_atributo);
                        if (empty($data['atributo'])) {
                               show_404();
                        }
                        //carga la vista editar
                        $this->load->view('templates/header', $data);
                        $this->load->view('atributos/edit',$data);
                        $this->load->view('templates/footer');
                        //aca probe si direcciona al index
                        //redirect('/clientes/index/');

                } 
        }       
        public function update() //metodos 
        {
                //se le llama al update_cliente del modelo clientes_model
                echo $this->atributos_model->update_atributo();
                // $this->load->view('clientes/success');
                redirect('/atributos/index/');

        }

        public function delete($id) //metodos
        {
                //se le llama al delete_cliente del modelo clientes_model
                echo $this->atributos_model->delete_atributo($id);
                redirect('/atributos/index/');
                //$this->load->view('clientes/success');
        }
}

