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
        $this->load->model('Affiche_Commande_Model');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

      // $data['produits'] = $this->Affiche_Produit_Model->get_produit();

        $this->load->library('pagination');
        $config['base_url'] = base_url().'index.php/Affiche_Produit/index';
        $config['total_rows'] = $this->Affiche_Produit_Model->count_produit();
        $config['per_page'] = 5;
        // Bootstrap for CodeIgniter pagination.
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        // *************
        $this->pagination->initialize($config);
        $data['produits'] = $this->Affiche_Produit_Model->fetch_produit($config['per_page'],$this->uri->segment(3));
        $user = $this->session->userdata('user');
        $data['paniers'] = $this->Affiche_Panier_Model->getAllPanier($user);
        $data['prix'] = $this->Affiche_Commande_Model->getPrixTotal($user);



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
            $this->load->view('Affiche_Produit/test', $data);
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
            echo $_POST['idA'];
            $user = $this->session->userdata('user');
            $quantite=$_POST['quantite'];
            $dispo=$_POST['dispo'];
            $panier = $this->Affiche_Panier_Model->getUnPanier($_POST['idA'],$user);
            if (($panier ==null) || ($panier['commande_id'] != null )){
                $produit = $this->Affiche_Produit_Model->get_unProduits($_POST['idA']);
                $this->Affiche_Panier_Model->addProduit($user,$produit,$quantite,$dispo);
            }
            else{
                $quantite=$_POST['quantite'];
                $panier = $this->Affiche_Panier_Model->getUnPanier($_POST['idA'],$user);
                $produit = $this->Affiche_Produit_Model->get_unProduits($_POST['idA']);
                $this->Affiche_Panier_Model->updatePanier($panier,$quantite,$produit);
            }
            $this->load->view('templates/header');
           // $this->load->view('Affiche_Produit/index');
            $this->load->view('templates/footer');
            redirect(base_url('/index.php/Affiche_Produit/index'));

        } else {
            $data['title'] = 'Information de Client';
            $this->load->view('templates/header');
            $this->load->view('Affiche_Produit/index');
            $this->load->view('templates/footer');
        }
    }
    function delete_PanierProduit(){
        $id = $this->input->get('id');
        echo $id;
        $this->Affiche_Panier_Model->deleteProduit($id);
        redirect(base_url('/index.php/Affiche_Produit/'));
    }

    public function search_produit(){
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('pagination');
        $nom = $this->input->post('search');
        if (isset($nom) and !empty($nom)){
            $data['produits']= $this->Affiche_Produit_Model->search_produitByName($nom);
            $this->load->view('templates/header');
            $this->load->view('Affiche_Produit/search_produit',$data);
            $this->load->view('templates/footer');
        }
        else{
            redirect(base_url('/index.php/Affiche_Produit/'));
        }
    }

    public function pagination(){
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('pagination');
        $config['base_url'] = base_url().'index.php/Affiche_Produit/pagination';
        $config['total_rows'] = $this->Affiche_Produit_Model->count_produit();
        $config['per_page'] = 2;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        $data['produits'] = $this->Affiche_Produit_Model->fetch_produit($config['per_page'],$this->uri->segment(3));
        $this->load->view('templates/header');
        $this->load->view('Affiche_Produit/test',$data);
        $this->load->view('templates/footer');

    }

}

