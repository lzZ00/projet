<?php

/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2017/4/10
 * Time: 12:48
 */
class Signup_Signin_Model extends CI_Model {
    const TBL_USER = 'users';

    public function __construct()
    {
        $this->load->database();
    }

    public function Signup($nom,$mail,$mdp,$adresse,$tel){

        $this->db->simple_query("INSERT INTO `users` (`id`, `email`, `password`, `nom`, `adresse`, `droit`, `tel`)
                                 VALUES (NULL, '$mail', '$mdp', '$nom', '$adresse', '' , '$tel')");
    }

    public function get_user($email,$password){
        $condition['email'] = $email;
        $condition['password'] =$password;
        $query = $this->db->where($condition)->get(self::TBL_USER);
        return $query->row_array();
    }
}
