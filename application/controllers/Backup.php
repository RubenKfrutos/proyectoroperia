<?php
class Backup extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('backup_model');
        $this->load->helper('url_helper');
        if (!$this->session->userdata("is_logged")) {
            redirect(site_url() . '/login/index');
        }
    }
    //metodos
    public function index()
    {
        $data['clientes'] = $this->backup_model->get_cliente();
        $data['title'] = 'Clientes';

        $this->load->view('templates/header', $data);
        $this->load->view('backup/index', $data);
        $this->load->view('templates/footer');
    }

    public function downloadBackup()
    {
        // Load the DB utility class
        $this->load->dbutil();

        // Backup your entire database and assign it to a variable
        $backup = $this->dbutil->backup();

        // Load the file helper and write the file to your server
        $this->load->helper('file');
        write_file('/path/to/mybackup.gz', $backup);

        // Load the download helper and send the file to your desktop
        $this->load->helper('download');
        force_download('mybackup.gz', $backup);
    }

    public function restoreBackup()
    {
        $isi_file = file_get_contents(FCPATH.'backup/mybackup.sql');
$queries = explode(";", rtrim( $isi_file, "\n;" ););
foreach($queries as $query)
{
    $this->db->query($query);
}
        
    }
}
