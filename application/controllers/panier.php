<?php

/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2017/5/3
 * Time: 11:05
 */
class panier extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Affiche_Produit_Model');
        $this->load->model('Signup_Signin_Model');
        $this->load->model('Affiche_Panier_Model');
        $this->load->model('Affiche_Commande_Model');
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('url_helper');

        $this->config->set_item('language', $_SESSION['language']);
        $this->lang->load('menu');
        $this->load->helper('language');
    }

    public function index()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $user = $this->session->userdata('user');
        $data['paniers'] = $this->Affiche_Panier_Model->getAllPanier($user);
        $data['prix'] = $this->Affiche_Commande_Model->getPrixTotal($user);
        $this->load->view('templates/header',$data);
        $this->load->view('Affiche_Panier/index',$data);
        $this->load->view('templates/footer');

    }
}