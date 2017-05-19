<?php

/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2017/5/18
 * Time: 13:36
 */
class UniqueLogin extends CI_Controller
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

    public function index()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $nom = $this->input->post('nom');

     /*   $login = $this->Signup_Signin_Model->loginUnique($_POST['nom']);
        if(empty($donnees)){
            echo 'login ok';
        }
        else {
            echo 'login exist';
        }*/
    }
}