<?php
class Usuarios extends CI_Controller
{

        public function __construct()
        {
                parent::__construct();
                $this->load->model('usuarios_model');
                $this->load->helper('url_helper');
                if (!$this->session->userdata("is_logged")) {
                    redirect(site_url() . '/login/index');
                }
        }
        //metodos
        public function index()
        {
                $data['usuarios'] = $this->usuarios_model->get_usuario();
                $data['title'] = 'Usuarios';

                $this->load->view('templates/header', $data);
                $this->load->view('usuarios/index', $data);
                $this->load->view('templates/footer');
        }
        //metodos
        public function view($id_usuario = NULL)
        {
                $data['usuario'] = $this->usuarios_model->get_usuario($id_usuario);
                if (empty($data['usuario'])) {
                       show_404();
                }

                $data['title'] = $data['usuario']['nombre']; //corregir ..

                $this->load->view('templates/header', $data);
                $this->load->view('usuarios/view', $data);
                $this->load->view('templates/footer');
        }
        //metodos
        public function create()
        {
                $this->load->helper('form');
                $this->load->library('form_validation');

                $data['title'] = 'Crear un Usuario';
                
                //
                //los parametros que reciben set_rules son 
                //1 el nombre del campo input que esta en el formulario de la vista
                //2 un nombre para el campo para mostrar en un mensaje de error para mostrar al usuario
                //3 la regla ejemplo en este caso se usa required pero puede ser unico , email etccc
                $this->form_validation->set_rules('username', 'Usuario', 'required');
                
                $this->form_validation->set_rules('password', 'Contraseña', 'required');




                if ($this->form_validation->run() === FALSE) {
                        $this->load->view('templates/header', $data);
                        $this->load->view('usuarios/create');
                        $this->load->view('templates/footer');
                } else {
                        $this->usuarios_model->set_usuario();
                        redirect('/usuarios/index/');

                }
        }

        //la priemra manera de llegar a este metodo es desde el index boton editar que tiene la url /proveedores/edit/id_cliente
        //la segunda manera de llegar a este metodo es con el boton guardar de la vista proveedores/edit 

        //metodos
        public function edit($id_usuario = NULL)
        {
                // carga el helper y la libreria .
                $this->load->helper('form');
                $this->load->library('form_validation');

                // a la propiedad title del array data le asigna el string editar un proveedor
                $data['title'] = 'Editar un usuario';
                
                
                //validaciones de formulario 
                //los parametros que reciben set_rules son 
                //1 el nombre del campo input que esta en el formulario de la vista
                //2 un nombre para el campo para mostrar en un mensaje de error para mostrar al usuario
                //3 la regla ejemplo en este caso se usa required pero puede ser unico , email etccc
                $this->form_validation->set_rules('username', 'Usuario', 'required');
                
                $this->form_validation->set_rules('password', 'Contraseña', 'required');
                
                //
                if ($this->form_validation->run() === FALSE) {
                        //esta parte del codigo consulta a la base de datos para obtener un proveedor 
                        //para luego poder editar 
                        $data['usuario'] = $this->usuarios_model->get_usuario($id_usuario);
                        if (empty($data['usuario'])) {
                               show_404();
                        }
                        //carga la vista editar
                        $this->load->view('templates/header', $data);
                        $this->load->view('usuarios/edit',$data);
                        $this->load->view('templates/footer');
                        //aca probe si direcciona al index
                        //redirect('/proveedores/index/');

                } 
        }       
        public function update() //metodos 
        {
                //se le llama al update_proveedor del modelo proveedores_model
                echo $this->usuarios_model->update_usuario();
                // $this->load->view('proveedores/success');
                redirect('/usuarios/index/');

        }

        public function delete($id) //metodos
        {
                //se le llama al delete_proveedor del modelo proveedores_model
                echo $this->usuarios_model->delete_usuario($id);
                redirect('/usuarios/index/');
                //$this->load->view('proveedores/success');
        }
}

