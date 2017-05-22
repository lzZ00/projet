<?php

/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2017/5/18
 * Time: 13:36
 */
class UniqueLogin extends CI_Controller
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
        $nom = $this->input->post('nom');
        echo 'ok';
     /*   $login = $this->Signup_Signin_Model->loginUnique($_POST['nom']);
        if(empty($donnees)){
            echo 'login ok';
        }
        else {
            echo 'login exist';
        }*/
    }
    public function test(){

// get the q parameter from URL
        $q = $_REQUEST["q"];

        $hint = "";
        $user=$this->Signup_Signin_Model->loginUnique($q);
        if($user==NULL){
            echo 'ok';
        }
        else{
            echo 'already exist';
        }


// lookup all hints from array if $q is different from ""
        /*if ($q !== "") {
            $q = strtolower($q);
            $len=strlen($q);
            foreach($a as $name) {
                /*if (stristr($q, substr($name, 0, $len))) {
                    if ($hint === "") {
                        $hint = $name;
                    } else {
                        $hint .= ", $name";
                    }
                }
            }
        }*/

// Output "no suggestion" if no hint was found or output correct values
       // echo $hint === "" ? "no suggestion" : $hint;
    }

    public function testEmail(){
        $q = $_REQUEST["q"];
        $user=$this->Signup_Signin_Model->emailUnique($q);
        if($user==NULL){
            echo 'ok';
        }
        else{
            echo 'already exist';
        }

    }
}