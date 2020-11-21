<?php
class Clientes extends CI_Controller
{

        public function __construct() 
        {
                parent::__construct();
                $this->load->model('clientes_model');
                $this->load->helper('url_helper');
                if (!$this->session->userdata("is_logged")) {
                   redirect(site_url().'/login/index');
                      
                }
        }
        //metodos
        public function index()
        {
                $data['clientes'] = $this->clientes_model->get_cliente();
                $data['title'] = 'Clientes';

                $this->load->view('templates/header', $data);
                $this->load->view('clientes/index', $data);
                $this->load->view('templates/footer');
        }
        //metodos
        public function view($id_cliente = NULL)
        {
                $data['cliente'] = $this->clientes_model->get_cliente($id_cliente);
                if (empty($data['cliente'])) {
                        show_404();
                }

                $data['title'] = $data['cliente']['razon_social'];

                $this->load->view('templates/header', $data);
                $this->load->view('clientes/view', $data);
                $this->load->view('templates/footer');
        }
        //metodos
        public function create()
        {
                $this->load->helper('form');
                $this->load->library('form_validation');

                $data['title'] = 'Crear un cliente';

                //los parametros que reciben set_rules son 
                //1 el nombre del campo input que esta en el formulario de la vista
                //2 un nombre para el campo para mostrar en un mensaje de error para mostrar al usuario
                //3 la regla ejemplo en este caso se usa required pero puede ser unico , email etccc
                $this->form_validation->set_rules('razon_social', 'Razon Social', 'required');

                $this->form_validation->set_rules('tipo_documento', 'Tipo de Documento', 'required');
                $this->form_validation->set_rules('numero_contacto', 'Numero de Contacto', 'required');




                if ($this->form_validation->run() === FALSE) {
                        $this->load->view('templates/header', $data);
                        $this->load->view('clientes/create');
                        $this->load->view('templates/footer');
                } else {
                        $this->clientes_model->set_cliente();
                        // $this->load->view('clientes/success');
                        redirect('/clientes/index/');
                }
        }

        //la priemra manera de llegar a este metodo es desde el index boton editar que tiene la url /clientes/edit/id_cliente
        //la segunda manera de llegar a este metodo es con el boton guardar de la vista clientes/edit

        //metodos
        public function edit($id_cliente = NULL)
        {
                // carga el helper y la libreria .
                $this->load->helper('form');
                $this->load->library('form_validation');

                // a la propiedad title del array data le asigna el string editar un cliente
                $data['title'] = 'Editar un cliente';


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
                        $data['cliente'] = $this->clientes_model->get_cliente($id_cliente);
                        if (empty($data['cliente'])) {
                                show_404();
                        }
                        //carga la vista editar
                        $this->load->view('templates/header', $data);
                        $this->load->view('clientes/edit', $data);
                        $this->load->view('templates/footer');
                        //aca probe si direcciona al index
                        //redirect('/clientes/index/');

                }
        }
        public function update() //metodos 
        {
                //se le llama al update_cliente del modelo clientes_model
                echo $this->clientes_model->update_cliente();
                // $this->load->view('clientes/success');
                redirect('/clientes/index/');
        }

        public function delete($id) //metodos
        {
                //se le llama al delete_cliente del modelo clientes_model
                echo $this->clientes_model->delete_cliente($id);
                redirect('/clientes/index/');
                //$this->load->view('clientes/success');
        }
}
