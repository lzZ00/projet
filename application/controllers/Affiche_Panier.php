<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2017/4/18
 * Time: 15:43
 */
class Affiche_Painer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Affiche_Produit_Model');
        $this->load->model('Signup_Signin_Model');
        $this->load->model('Affiche_Panier_Model');
        $this->load->model('Affiche_Commande_Model');
        $this->load->helper('url_helper');
    }
    public function index() {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $user = $this->session->userdata('user');
        $data['paniers'] = $this->Affiche_Panier_Model->getAllPanier($user);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/footer');
    }

}
