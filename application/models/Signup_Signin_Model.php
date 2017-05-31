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
                                 VALUES (NULL, '$mail', '$mdp', '$nom', '$adresse', 'DROITclient' , '$tel')");
    }

    public function get_user($email,$password){
        $condition['email'] = $email;
        $condition['password'] =md5($password);
        $query = $this->db->where($condition)->get(self::TBL_USER);
        return $query->row_array();
    }

    public function loginUnique($str){
        $this->db->select('nom');
        $this->db->from('users');
        $this->db->Where('nom',$str);
        $query=$this->db->get();
        return $query->result_array();

    }

    public function emailUnique($str){
        $this->db->select('email');
        $this->db->from('users');
        $this->db->Where('email',$str);
        $query=$this->db->get();
        return $query->result_array();

    }
    public function get_all_user_name(){
        $query=$this->db->get('users');
        return $query->result_array();
    }

    public function readUser($id){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->Where('id',$id);
        $query=$this->db->get();
        return $query->row_array();
    }

    public function updateUser($id){
        $this->load->helper('url');
        $data = array(
            'adresse' => $this->input->post('adresse'),
            'tel' => $this->input->post('tel'),
        );
        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }

    public function updateUserMdp($id){
        $this->load->helper('url');
        $this->db->set('password',md5($this->input->post('password')));
        $this->db->Where('id',$id);
        $this->db->update('users');
    }


}
