<?php

/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2017/4/10
 * Time: 12:44
 */
class user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Affiche_Produit_Model');
        $this->load->model('Signup_Signin_Model');
        $this->load->model('Affiche_Panier_Model');
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->library('form_validation');
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

    public function signup(){
        $this->load->helper('form');
        $this->load->library('form_validation');
  /*      $this->form_validation->set_rules('nom','Username','required|is_unique[users.nom]');
		$this->form_validation->set_rules('mdp','Password','required|min_length[6]|max_length[20]');
		$this->form_validation->set_rules('mail','Email','required|valid_email|is_unique[users.email]');*/
        if ($this->form_validation->run() == false) {
            # 未通过
            $this->load->view('templates/header');
            $this->load->view('login/index');
            $this->load->view('templates/footer');
        } else {
            # 通过,注册
            $nom = $this->input->post('nom',true);
            $mdp = $this->input->post('mdp',true);
            $mail = $this->input->post('mail',true);
            $adresse = $this->input->post('adresse',true);
            $tel = $this->input->post('tel',true);
            $mdp1=md5($mdp);
            $this->Signup_Signin_Model->Signup($nom,$mail,$mdp1,$adresse ,$tel);
            if ($user = $this->Signup_Signin_Model->get_user($mail,$mdp)) {
                #成功，将用户信息保存至session
                $this->session->set_userdata('user',$user);
                redirect('Affiche_Produit');
            }

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

    public function UniqueNom(){
        $q = $_REQUEST["q"];

        $hint = "";
        $user=$this->Signup_Signin_Model->loginUnique($q);
        if($user==NULL){
            echo 'ok';
        }
        else{
            echo 'already exist';
        }

    }

    public function logout(){
        $this->session->unset_userdata('user');
        redirect('Affiche_Produit');
    }

    public function profil(){
        $user = $this->session->userdata('user');
        $data['produit']=$this->Signup_Signin_Model->readUser($user['id']);
        $this->load->view('templates/header');
        $this->load->view('login/profil',$data);
        $this->load->view('templates/footer');
    }

    public function editProfil(){

        $user = $this->session->userdata('user');
        $data['produit']=$this->Signup_Signin_Model->readUser($user['id']);
        if (isset($_POST['Update'])) {
            $this->Signup_Signin_Model->updateUser($user['id']);
            redirect(base_url('/index.php/user/profil'));
        }
        $this->load->view('templates/header');
        $this->load->view('login/edit',$data);
        $this->load->view('templates/footer');

    }

    public function changerMdp(){
        $this->load->helper('form');
        $this->load->library('form_validation');
        $user = $this->session->userdata('user');
        $this->form_validation->set_rules('password','New Password','required|min_length[6]|max_length[20]');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
        if ($this->form_validation->run() == false) {
            # 未通过
            $this->load->view('templates/header');
            $this->load->view('login/changerMdp');
            $this->load->view('templates/footer');
        } else {
            # 通过
            $this->Signup_Signin_Model->updateUserMdp($user['id']);
            redirect(base_url('/index.php/user/profil'));
        }
    }


}