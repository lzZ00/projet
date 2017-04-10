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

}
