<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2017/4/20
 * Time: 23:20
 */
class painer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Affiche_Produit_Model');
        $this->load->model('Affiche_Panier_Model');
        $this->load->model('Signup_Signin_Model');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $user = $this->session->userdata('user');
        $data['paniers'] = $this->Affiche_Panier_Model->getAllPanier($user);
        $this->load->view('templates/header', $data);
        $this->load->view('Affiche_Produit/index', $data);
        $this->load->view('templates/footer');
    }

    function addProduit()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        if (isset($_POST['Ajouter'])) {
            echo 'success';
            echo $_POST['idA'];
            $user = $this->session->userdata('user');
            $produit = $this->Affiche_Produit_Model->get_unProduits($_POST['idA']);;
            $this->Affiche_Panier_Model->addProduit($user, $produit);
            $this->load->view('templates/header');
            $this->load->view('Affiche_Produit/index');
            $this->load->view('templates/footer');
            redirect(base_url('/index.php/Affiche_Produit/'));

        } else {
            $data['title'] = 'Information de Client';
            $this->load->view('templates/header');
            $this->load->view('Affiche_Produit/index');
            $this->load->view('templates/footer');
        }
    }
}

