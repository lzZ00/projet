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

}