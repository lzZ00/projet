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
        $query = $this->db->query($sql,array( $user['id']));
        return $query->result_array();
    }
    public function getUnPanier($id,$user){
        $this->db->select('*');
        $this->db->from('paniers');
        $this->db->Where('produit_id',$id);
        $this->db->Where('user_id',$user['id']);
        $query=$this->db->get();
        return $query->row_array();
    }
    public function addProduit($user,$produit){
        $this->load->helper('url');
        $this->db->set('quantite', '1');
        $this->db->set('prix',$produit['prix']);
        $this->db->set('produit_id',  $produit['id']);
        $this->db->set('user_id', $user['id']);
        $this->db->insert('paniers');
    }
    public function deleteProduit($id){
        $this->db->simple_query('DELETE FROM paniers WHERE id='.$id.'');
    }

    public function updatePanier($panier,$quantite,$produit)
    {
        $this->load->helper('url');
        $this->db->set('quantite', $panier['quantite']+$quantite);
        $this->db->set('prix',$produit['prix'] * ($panier['quantite']+$quantite));
        $this->db->set('dateAjoutPanier',date('Y-m-d H:i:s'));
        $this->db->Where('produit_id',$produit['id']);
        $this->db->update('paniers');
    }


}