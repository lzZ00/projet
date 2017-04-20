<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2017/4/18
 * Time: 15:43
 */
class Affiche_Panier_Model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }
    public function getAllPanier($user)
    {
        $sql = "SELECT paniers.id,paniers.quantite,paniers.prix,paniers.dateAjoutPanier,produits.nom FROM 
                paniers INNER JOIN produits ON produits.id=paniers.produit_id WHERE paniers.user_id = ? and paniers.commande_id is null";
        $query = $this->db->query($sql,array($user));
        return $query->result_array();
    }
    public function addProduit($produit){
        $this->load->helper('url');
        $this->db->set('quantite', '1');
        $this->db->set('prix',$produit['prix']);
        $this->db->set('produit_id',  $produit['id']);
        $this->db->set('user_id', '1');
        $this->db->insert('paniers');
    }
}