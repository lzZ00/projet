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
    public function addProduit($user,$produit,$quantite,$dispo){
        $this->load->helper('url');
        $sql="select id,produit_id,quantite,prix from paniers where  user_id=".$user['id']." and commande_id is NULL and produit_id=".$produit['id']."";
        $query = $this->db->query($sql,array($user['id']));

        if($query->row_array()!=null){
            foreach ($query->result_array() as $produit_old){
                $id=$produit_old['id'];
                $quantite_old=$produit_old['quantite'];

            }
            $quantite=$quantite_old+$quantite;
            $prix = $produit['prix'] *  $quantite;
            if ($quantite > $dispo){
                return false;
            }


            $data = array(
                'quantite'  => $quantite,
                'prix' =>$prix
            );
            $this->db->where('id', $id);
            $this->db->update('paniers', $data);

        }else {
            $this->db->set('quantite', $quantite);
            $this->db->set('prix', $produit['prix'] * $quantite);
            $this->db->set('produit_id', $produit['id']);
            $this->db->set('user_id', $user['id']);
            $this->db->insert('paniers');
        }
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