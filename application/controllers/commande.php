<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2017/4/20
 * Time: 23:10
 */
class commande extends CI_Controller
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
        $user = $this->session->userdata('user');
        $data['commande'] = $this->Affiche_Commande_Model->getCommande($user);
        $this->load->view('templates/header', $data);
        $this->load->view('Affiche_Commande/index', $data);
        $this->load->view('templates/footer');
    }
    public function showUserCommande()
    {
        $user = $this->session->userdata('user');
        $data['commande'] = $this->Affiche_Commande_Model->getCommande($user);

    }
    public function creerCommande(){
        $this->load->helper('form');
        $this->load->library('form_validation');
        $user = $this->session->userdata('user');
        $prix = $this->Affiche_Commande_Model->getPrixTotal($user);
        $date = date('Y-m-d H;i;s');
        $this->Affiche_Commande_Model->updateDispo($user);
        $this->Affiche_Commande_Model->creerCommande($user,$prix['prix'],$date);
        redirect(base_url('/index.php/Affiche_Produit/'));
    }

    function test(){
        $this->load->helper('form');
        $this->load->library('form_validation');
        $user = $this->session->userdata('user');
        $data = $this->Affiche_Commande_Model->test($user);
        var_dump($data);
        die();
        $this->load->view('Affiche_Commande/test', $data);

    }

    function detail(){
        $this->load->helper('form');
        $this->load->library('form_validation');
        $id = $this->input->get('id');
        $data['commande'] = $this->Affiche_Commande_Model->getCommandeDetail($id);
        $this->load->view('templates/header', $data);
        $this->load->view('Affiche_Commande/detail', $data);
        $this->load->view('templates/footer');
    }

    function allCommande(){
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['commande'] = $this->Affiche_Commande_Model->getAllCommande();
        $this->load->view('templates/header', $data);
        $this->load->view('Affiche_Commande/index', $data);
        $this->load->view('templates/footer');
    }

    function valideCommande(){
        $this->load->helper('form');
        $this->load->library('form_validation');
        $id = $this->input->get('id');
        $this->Affiche_Commande_Model->valideCommande($id);
        redirect(site_url('commande/allCommande/'));
    }

}