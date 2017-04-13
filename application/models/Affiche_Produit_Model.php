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
            'typeProduit_id' => $this->input->post('type'),
            'prix' => $this->input->post('prix'),
            'photo' => $this->input->post('photo')
        );

        return $this->db->insert('produits', $data);
    }

    public function get_unProduits($id)
    {
        /*$query = $this->db->simple_query('SELECT id,nom,prix,photo FROM produits WHERE id = '.$id.'');
        return $query->row_array();*/
      $this->db->select('id,nom,prix,photo,typeProduit_id');
        $this->db->from('produits');
        $this->db->where('id',$id);
        $query=$this->db->get();
        return $query->row_array();
   /*     $sql = "SELECT * FROM produits WHERE id = '.$id' ";
        $query = $this->db->query($sql);
        return $query->row_array();*/


    }

    public function supprimer_unProduits($id)
    {
        $this->db->simple_query('DELETE FROM paniers WHERE paniers.produit_id = '.$id.'');
        $this->db->simple_query('DELETE FROM produits WHERE id='.$id.'');
    }
    public function get_typeProduits($slug = FALSE)
    {
        if ($slug === FALSE)
        {
            $query = $this->db->get('typeProduits');
            return $query->result_array();
        }
        $query = $this->db->get_where('produits', array('slug' => $slug));
        return $query->row_array();
    }
    public function updateProduit($id)
    {
        $this->load->helper('url');
        $data = array(
            'nom' => $this->input->post('nom'),
            'typeProduit_id' => $this->input->post('type'),
            'prix' => $this->input->post('prix'),
            'photo' => $this->input->post('photo')
        );
        $this->db->where('id', $id);
        $this->db->update('produits', $data);
    }
}
