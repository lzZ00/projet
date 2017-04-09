<?php
class Affiche_Client extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Affiche_Client_Model');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $data['client'] = $this->Affiche_Client_Model->get_client();
        if (empty($data['client']))
        {
            show_404();
        }
        $data['title'] = 'Information de Client';
        $this->load->view('templates/header', $data);
        $this->load->view('Affiche_Client/index', $data);
        $this->load->view('templates/footer');
    }

}