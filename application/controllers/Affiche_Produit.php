<?php

/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2017/4/10
 * Time: 12:47
 */
class Affiche_Produit extends CI_Controller
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
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['produits'] = $this->Affiche_Produit_Model->get_produit();
        $data['paniers'] = $this->Affiche_Panier_Model->getAllPanier(1);
        //$this->form_validation->set_rules('title', 'Title', 'required');
        //if (empty($data['produits'])) {
        //   show_404();
        //}
        if (isset($_POST['Supprimer'])) {
            echo 'success';
            echo $_POST['idS'];
            $this->Affiche_Produit_Model->supprimer_unProduits($_POST['idS']);
            $this->load->view('templates/header', $data);
            $this->load->view('Affiche_Produit/index', $data);
            $this->load->view('templates/footer');
            redirect(base_url('/index.php/Affiche_Produit/'));

        } else {
            $data['title'] = 'Information de Client';
            $this->load->view('templates/header', $data);
            $this->load->view('Affiche_Produit/index', $data);
            $this->load->view('templates/footer');
        }
/*        if (isset($_POST['Ajouter'])) {
            echo 'success';
            echo $_POST['idA'];
            $produit = $this->Affiche_Produit_Model->get_unProduits($_POST['idA']);;
            $this->Affiche_Panier_Model->addProduit($produit);
            $this->load->view('templates/header', $data);
            $this->load->view('Affiche_Produit/index', $data);
            $this->load->view('templates/footer');
            redirect(base_url('/index.php/Affiche_Produit/'));

        } else {
            $data['title'] = 'Information de Client';
            $this->load->view('templates/header', $data);
            $this->load->view('Affiche_Produit/index', $data);
            $this->load->view('templates/footer');
        }*/
    }

    public function createProduit()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = 'Create a news item';
        $data['typeProduits'] = $this->Affiche_Produit_Model->get_typeProduits();
        $this->form_validation->set_rules('nom', 'Name', 'required');
        $this->form_validation->set_rules('type', 'Type', 'required');
        $this->form_validation->set_rules('prix', 'Price', 'required');
        $this->form_validation->set_rules('photo', 'Photo', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('Affiche_Produit/create');
            $this->load->view('templates/footer');
        } else {
            $this->Affiche_Produit_Model->set_produits();
            redirect(base_url('/index.php/Affiche_Produit/'));
        }
    }

    function type1Produit()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['produits'] = $this->Affiche_Produit_Model->get_Type1Produits(1);
        //$this->form_validation->set_rules('title', 'Title', 'required');
        //if (empty($data['produits'])) {
        //   show_404();
        //}
            $data['title'] = 'Information de Client';
            $this->load->view('templates/header', $data);
            $this->load->view('Affiche_Produit/type1', $data);
            $this->load->view('templates/footer');
        }

    function type2Produit()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['produits'] = $this->Affiche_Produit_Model->get_Type1Produits(2);
        //$this->form_validation->set_rules('title', 'Title', 'required');
        //if (empty($data['produits'])) {
        //   show_404();
        //}
        $data['title'] = 'Information de Client';
        $this->load->view('templates/header', $data);
        $this->load->view('Affiche_Produit/type1', $data);
        $this->load->view('templates/footer');
    }

    function type3Produit()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['produits'] = $this->Affiche_Produit_Model->get_Type1Produits(3);
        //$this->form_validation->set_rules('title', 'Title', 'required');
        //if (empty($data['produits'])) {
        //   show_404();
        //}
        $data['title'] = 'Information de Client';
        $this->load->view('templates/header', $data);
        $this->load->view('Affiche_Produit/type1', $data);
        $this->load->view('templates/footer');
    }



    function editProduit()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        if (isset($_POST['Modifier'])) {
            $data['produit']= $this->Affiche_Produit_Model->get_unProduits($_POST['idM']);
            $data['typeProduits'] = $this->Affiche_Produit_Model->get_typeProduits();
            $this->load->view('templates/header', $data);
            $this->load->view('Affiche_Produit/edit', $data);
            $this->load->view('templates/footer');
        }
        if (isset($_POST['Update'])) {
            $id = $this->input->post('idM');
            $this->Affiche_Produit_Model->updateProduit($id);
            redirect(base_url('/index.php/Affiche_Produit/'));
        }
    }

    function addProduit(){
        $this->load->helper('form');
        $this->load->library('form_validation');
        if (isset($_POST['Ajouter'])) {
            echo 'success';
            echo $_POST['idA'];
            $produit = $this->Affiche_Produit_Model->get_unProduits($_POST['idA']);;
            $this->Affiche_Panier_Model->addProduit($produit);
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

