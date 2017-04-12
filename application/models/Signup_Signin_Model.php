<?php

/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2017/4/10
 * Time: 12:48
 */
class Signup_Signin_Model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function Signup($nom,$mail,$mdp,$adresse,$tel){

        $this->db->simple_query("INSERT INTO `users` (`id`, `email`, `password`, `nom`, `adresse`, `droit`, `tel`)
                                 VALUES (NULL, '$mail', '$mdp', '$nom', '$adresse', '' , '$tel')");

        /*
        $this->db->simple_query("INSERT INTO `users` (`id`, `email`, `password`, `nom`, `adresse`, `droit`, `tel`) 
                                 VALUES (NULL, 'liao', 'sqdf', 'qdf', 'qefezf','' , 'qsdfsqdf')");
        */
    }
}
