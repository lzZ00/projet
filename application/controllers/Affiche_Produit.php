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

    public function createProduit()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = 'Create a news item';
        $this->form_validation->set_rules('nom', 'Name', 'required');
      //  $this->form_validation->set_rules('type', 'Type', 'required');
        $this->form_validation->set_rules('prix', 'Price', 'required');
        $this->form_validation->set_rules('photo', 'Photo', 'required');
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('Affiche_Produit/create');
            $this->load->view('templates/footer');
        }
        else
        {
            //$this->Affiche_Produit_Model->set_produits();
            echo "ok";
        }
    }

    public function deleteProduit(){
        $id = $this->input->get('id');
        $this->db->where('id',$id);
        $this->db->delete('produits');

    }





}