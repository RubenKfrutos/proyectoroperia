<?php
class Proveedores extends CI_Controller
{

        public function __construct()
        {
                parent::__construct();
                $this->load->model('proveedores_model');
                $this->load->helper('url_helper');
                if (!$this->session->userdata("is_logged")) {
                    redirect(site_url() . '/login/index');
                }
        }
        //metodos
        public function index()
        {
                $data['proveedores'] = $this->proveedores_model->get_proveedor();
                $data['title'] = 'Proveedores';

                $this->load->view('templates/header', $data);
                $this->load->view('proveedores/index', $data);
                $this->load->view('templates/footer');
        }
        //metodos
        public function view($id_proveedor = NULL)
        {
                $data['proveedor'] = $this->proveedores_model->get_proveedor($id_proveedor);
                if (empty($data['proveedor'])) {
                       show_404();
                }

                $data['title'] = $data['proveedor']['razon_social'];

                $this->load->view('templates/header', $data);
                $this->load->view('proveedores/view', $data);
                $this->load->view('templates/footer');
        }
        //metodos
        public function create()
        {
                $this->load->helper('form');
                $this->load->library('form_validation');

                $data['title'] = 'Crear un proveedor';
                
                //los parametros que reciben set_rules son 
                //1 el nombre del campo input que esta en el formulario de la vista
                //2 un nombre para el campo para mostrar en un mensaje de error para mostrar al usuario
                //3 la regla ejemplo en este caso se usa required pero puede ser unico , email etccc
                $this->form_validation->set_rules('razon_social', 'Razon Social', 'required');
                
                $this->form_validation->set_rules('tipo_documento', 'Tipo de Documento', 'required');
                $this->form_validation->set_rules('numero_contacto', 'Numero de Contacto', 'required');




                if ($this->form_validation->run() === FALSE) {
                        $this->load->view('templates/header', $data);
                        $this->load->view('proveedores/create');
                        $this->load->view('templates/footer');
                } else {
                        $this->proveedores_model->set_proveedor();
                        // $this->load->view('proveedores/success');
                        redirect('/proveedores/index/');

                }
        }

        //la priemra manera de llegar a este metodo es desde el index boton editar que tiene la url /proveedores/edit/id_cliente
        //la segunda manera de llegar a este metodo es con el boton guardar de la vista proveedores/edit

        //metodos
        public function edit($id_proveedor = NULL)
        {
                // carga el helper y la libreria .
                $this->load->helper('form');
                $this->load->library('form_validation');

                // a la propiedad title del array data le asigna el string editar un proveedor
                $data['title'] = 'Editar un proveedor';
                
                
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
                        //esta parte del codigo consulta a la base de datos para obtener un proveedor 
                        //para luego poder editar 
                        $data['proveedor'] = $this->proveedores_model->get_proveedor($id_proveedor);
                        if (empty($data['proveedor'])) {
                               show_404();
                        }
                        //carga la vista editar
                        $this->load->view('templates/header', $data);
                        $this->load->view('proveedores/edit',$data);
                        $this->load->view('templates/footer');
                        //aca probe si direcciona al index
                        //redirect('/proveedores/index/');

                } 
        }       
        public function update() //metodos 
        {
                //se le llama al update_proveedor del modelo proveedores_model
                echo $this->proveedores_model->update_proveedor();
                // $this->load->view('proveedores/success');
                redirect('/proveedores/index/');

        }

        public function delete($id) //metodos
        {
                //se le llama al delete_proveedor del modelo proveedores_model
                echo $this->proveedores_model->delete_proveedor($id);
                redirect('/proveedores/index/');
                //$this->load->view('proveedores/success');
        }
}

