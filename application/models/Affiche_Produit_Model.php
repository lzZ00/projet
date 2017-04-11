<?php

/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2017/4/10
 * Time: 12:48
 */
class Affiche_Produit_Model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    public function get_produit($slug = FALSE)
    {
        if ($slug === FALSE)
        {
            $query = $this->db->get('produits');
            return $query->result_array();
        }
        $query = $this->db->get_where('produits', array('slug' => $slug));
        return $query->row_array();
    }
    public function set_produits()
    {
        $this->load->helper('url');

        $data = array(
            'nom' => $this->input->post('nom'),
          //  'type' => $this->input->post('type'),
            'prix' => $this->input->post('prix'),
            'photo' => $this->input->post('photo')
        );

        return $this->db->insert('produits', $data);
    }

    public function get_unProduits($id)
    {
        //$query = $this->db->query('SELECT id,nom FROM produits);

    }
    public function supprimer_unProduits($id)
    {
        $query=$this->db->simple_query('DELETE FROM paniers WHERE paniers.produit_id = '.$id.'');
        $query=$this->db->simple_query('DELETE FROM produits WHERE id='.$id.'');
    }
}
