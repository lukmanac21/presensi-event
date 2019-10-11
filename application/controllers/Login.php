<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Login extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('mLogin');
        //if($this->session->userdata('status') != "login"){
            //redirect(base_url("login"));
        //}
    }
	public function index(){
        $this->load->helper('url');
        $this->session->userdata('nama_siswa');
		$this->load->view('login');
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
            'nrp_siswa' => $nrp,
            'password_siswa' => md5($password)
        );
        $check = $this->mLogin->login_checker("tbl_siswa",$where)->num_rows();
        if($check > 0){
            $data_session = array(
                'nrp' => $nrp,
                'status' => "Login"
            );
            $this->session->set_userdata($data_session);
            redirect(site_url('admin/overview'));
        }else{
            echo"nrp atau password salah";
        }
    }
    public function logout(){
        $this->session->sess_destroy();
        redirect(site_url("login"));
    }
}
