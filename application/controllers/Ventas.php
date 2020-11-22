<?php
class Ventas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ventas_model');
        $this->load->model("clientes_model");
        $this->load->model("articulos_model");
        $this->load->helper('url_helper');
        if (!$this->session->userdata("is_logged")) {
            redirect(site_url() . '/login/index');
        }
    }
    //metodos
    public function index()
    {
        $data['ventas'] = $this->ventas_model->get_venta();
        $this->load->view('templates/header');
        $this->load->view('ventas/index', $data);
        $this->load->view('templates/footer');
    }
    //metodos
    public function viewX($id_venta = NULL)
    {
        $data['venta'] = $this->ventas_model->get_venta($id_venta);
        if (empty($data['venta'])) {
            show_404();
        }

        $data['title'] = $data['venta']['fecha_venta'];
        $data['title'] = $data['venta']['id_cliente'];
        $data['title'] = $data['venta']['total'];

        $this->load->view('templates/header', $data);
        $this->load->view('ventas/view.php', $data);
        $this->load->view('templates/footer');
    }
    //metodos
    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['clientes'] = $this->clientes_model->get_cliente();
        $data['articulos'] = $this->articulos_model->get_articulo();

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('ventas/create', $data);
            $this->load->view('templates/footer');
        } else {
            $this->clientes_model->set_venta();
            $this->load->view('ventas/success');
            redirect('/ventas/index/');
        }
    }


    //metodos
    public function edit($id_venta = NULL)
    {
        // carga el helper y la libreria .
        $this->load->helper('form');
        $this->load->library('form_validation');

        // a la propiedad title del array data le asigna el string editar un cliente
        $data['title'] = 'Editar una Venta';


        //validaciones de formulario 
        //los parametros que reciben set_rules son 
        //1 el nombre del campo input que esta en el formulario de la vista
        //2 un nombre para el campo para mostrar en un mensaje de error para mostrar al usuario
        //3 la regla ejemplo en este caso se usa required pero puede ser unico , email etccc
        $this->form_validation->set_rules('id_venta', 'Venta', 'required');


        //
        if ($this->form_validation->run() === FALSE) {
            //esta parte del codigo consulta a la base de datos para obtener un cliente 
            //para luego poder editar 
            $data['venta'] = $this->ventas_model->get_venta($id_venta);
            if (empty($data['venta'])) {
                show_404();
            }
            //carga la vista editar
            $this->load->view('templates/header', $data);
            $this->load->view('ventas/edit', $data);
            $this->load->view('templates/footer');
            //aca probe si direcciona al index
            //redirect('/clientes/index/');

        }
    }
    public function update() //metodos 
    {
        //se le llama al update_cliente del modelo clientes_model
        echo $this->ventas_model->update_venta();
        // $this->load->view('clientes/success');
        redirect('/ventas/index/');
    }

    public function delete($id) //metodos
    {
        //se le llama al delete_cliente del modelo clientes_model
        echo $this->ventas_model->delete_venta($id);
        redirect('/ventas/index/');
        //$this->load->view('clientes/success');
    }
    public function getArticulo($id = NULL)
    {
        //$valor = $this->input->post("valor");
        //$articulo = $this->articulos_model->get_articulo($valor);
        $articulo = $this->articulos_model->get_articulo($id);
        echo json_encode($articulo);
    }

    public function store(){
		//la fecha se guarda en base de datos, current timestamp
		$subtotal = $this->input->post("subtotal");
		$iva5 = $this->input->post("iva_5");
		$iva10 = $this->input->post("iva_10");
		$descuento = $this->input->post("descuento");
		$total = $this->input->post("total");
		$idcliente = $this->input->post("id_cliente");
		$idusuario = $_SESSION["id"];

		$data = array(
			'subtotal' => $subtotal,
			'iva_5' => $iva5,
			'iva_10' => $iva10,
			'descuento' => $descuento,
			'total' => $total,
			'id_cliente' => $idcliente,
			'id_usuario' => $idusuario,
        );

		$idarticulos = $this->input->post("idarticulos");
		$precios = $this->input->post("precios");
		$cantidades = $this->input->post("cantidades");
        $importes = $this->input->post("importes");

        if ($this->ventas_model->save($data)) {
            $idventa = $this->ventas_model->lastID();
			$this->save_detalle($idarticulos,$idventa,$precios,$cantidades,$importes);
			redirect('/ventas/index/');
		}else{
            //redirect(base_url()."movimientos/ventas/add");
			echo "0";
		}
    }

    protected function save_detalle($articulos,$idventa,$precios,$cantidades,$importes){
        for ($i=0; $i < count($articulos); $i++) { 
			$data  = array(
				'id_articulo' => $articulos[$i], 
				'id_venta' => $idventa,
				'precio_unitario' => $precios[$i],
				'cantidad' => $cantidades[$i],
				'monto_importe'=> $importes[$i],
			);
			$this->ventas_model->save_detalle($data);
			$this->updateStockProducto($articulos[$i],$cantidades[$i]);
		}
		$this->reset_stock_negative();
    }
    
    protected function updateStockProducto($idarticulo,$cantidad){
        $infoproducto = $this->articulos_model->getArticulo($idarticulo);
        
		$data = array(
			'stock' => $infoproducto->stock - $cantidad, 
		);
		$this->articulos_model->update($idarticulo, $data);
    }
    
    protected function reset_stock_negative(){
		$data = array(
			"stock" => 0
		);
		$this->articulos_model->setear_stock_negative($data);
    }

    public function getVenta($idVenta = NULL){
        
        $venta = $this->ventas_model->getVenta($idVenta);
        echo json_encode($venta);
    }

    public function getVentaDetalle($idVenta = NULL){
        $ventaDetalle = $this->ventas_model->getVentaDetalle($idVenta);
        echo json_encode($ventaDetalle);
    }

    public function getVentas($iclienteID = NULL){
        $ventas = $this->ventas_model->getVentas($iclienteID);
        echo json_encode($ventas);
    }
}
