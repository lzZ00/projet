<?php

/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2017/5/2
 * Time: 10:52
 */
class Affiche_Commande_Model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getAllCommande()
    {
        $sql = "SELECT commandes.id,commandes.prix,commandes.date_achat,commandes.user_id,etats.libelle FROM 
                commandes INNER JOIN etats ON etats.id=commandes.etat_id ORDER BY commandes.id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function getCommandeDetail($id) {
        $sql = "SELECT paniers.id,paniers.quantite,paniers.prix,paniers.dateAjoutPanier,produits.nom,users.login as nomClient,paniers.user_id,paniers.commande_id FROM 
                paniers INNER JOIN produits ON produits.id=paniers.produit_id 
                INNER JOIN users ON users.id=paniers.user_id
                WHERE paniers.commande_id = ?";
        $query = $this->db->query($sql,array($id));
        return $query->result_array();

    }

    function getCommande($user) {
        $sql = "SELECT commandes.id,commandes.prix,commandes.date_achat,commandes.user_id,etats.libelle FROM 
                commandes INNER JOIN etats ON etats.id=commandes.etat_id
                WHERE commandes.user_id = ?";
        $query = $this->db->query($sql,array($user['id']));
        return $query->result_array();
    }

    public function getPrixTotal($user){
        $this->db->select('SUM(prix) as prix');
        $this->db->from('paniers');
        $this->db->Where('user_id',$user['id']);
        $this->db->Where('commande_id is null');
        $query=$this->db->get();
        return $query->row_array();
    }


    public function creerCommande($user,$prix,$date){
        $this->load->helper('url');
        $this->db->set('user_id', $user['id']);
        $this->db->set('date_achat',$date);
        $this->db->set('etat_id', 1);
        $this->db->set('prix', $prix);
        $this->db->insert('commandes');

        $this->db->select('MAX(id) as dernierID');
        $this->db->from('commandes');
        $this->db->Where('user_id',$user['id']);
        $query=$this->db->get();
        $resultat = $query->row_array();
        $id = $resultat['dernierID'];

        $this->db->set('commande_id', $id);
        $this->db->Where('user_id',$user['id']);
        $this->db->Where('commande_id is null');
        $this->db->update('paniers');
    }

}