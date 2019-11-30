<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class LoginUser extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('mLogin');
        $this->load->library('session');
    }
	public function index(){
		if (isset($this->session->userdata['logged_in']))
        {
            redirect(site_url("Home"));
        }
        $this->load->helper('url');
		$this->load->view('LoginUser');
    }
    public function signup(){
        $this->load->helper('url');
        $data['jurusan'] = $this->mLogin->show_jurusan()->result();
        $this->load->view('signup',$data);
    }
    public function login_action(){
        $nrp = $this->input->post('nrp');
        $password = $this->input->post('password');
        $where = array(
            'nrp_siswa' => $email,
            'password_siswa' => md5($password)
        );
        $check = $this->mLogin->login_checker("tbl_siswa",$where)->num_rows();
        if($check > 0){
            $data = array(
                'logged_in' => TRUE,
                'username' => $check->name_admin
            );
            $this->session->set_userdata($data);
            redirect(site_url('home'));
        }else{
            echo"nrp atau password salah";
        }
    }
    public function logout(){
        $this->session->sess_destroy();
        redirect(site_url("Home"));
    }
}

?>