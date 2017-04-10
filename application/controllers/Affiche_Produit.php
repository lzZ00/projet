<?php

/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2017/4/10
 * Time: 12:47
 */
class Affiche_Produit extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Affiche_Produit_Model');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $data['produits'] = $this->Affiche_Produit_Model->get_produit();
        if (empty($data['produits']))
        {
            show_404();
        }
        $data['title'] = 'Information de Client';
        $this->load->view('templates/header', $data);
        $this->load->view('Affiche_Produit/index', $data);
        $this->load->view('templates/footer');
    }

}