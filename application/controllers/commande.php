<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2017/4/20
 * Time: 23:10
 */class commande extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Affiche_Produit_Model');
        $this->load->model('Signup_Signin_Model');
        $this->load->model('Affiche_Panier_Model');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/footer');
    }

}