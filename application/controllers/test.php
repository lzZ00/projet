<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2017/4/20
 * Time: 23:10
 */class test extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Affiche_Produit_Model');
        $this->load->model('Signup_Signin_Model');
        $this->load->model('Affiche_Panier_Model');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        if ($user = $this->Signup_Signin_Model->get_user($email,$password)) {
            #成功，将用户信息保存至session
            $this->session->set_userdata('user',$user);
        } else {
            # error
            echo 'error';
        }
    }

    public function login(){
        $this->load->helper('form');
        $this->load->library('form_validation');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        if ($user = $this->Signup_Signin_Model->get_user($email,$password)) {
            #成功，将用户信息保存至session
            $this->session->set_userdata('user',$user);
            redirect('Affiche_Produit');
        } else {
            # error
            echo 'error';
        }
    }

    public function logout(){
        $this->session->unset_userdata('user');
        redirect('Affiche_Produit');
    }
}