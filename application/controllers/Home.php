<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Home extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('mUser');
        $this->load->library('session');
    }
    public function loginUser(){
		if ($this->session->userdata['logged_in'] == TRUE)
        {
            redirect(site_url("Home"));
        }
        $this->load->helper('url');
        $this->load->view('LoginUser');
    }
	public function index(){
		if ($this->session->userdata['logged_in'] == FALSE)
        {
            redirect(site_url("Home/LoginUser"));
        }
        $status= "Aktif";
        $where =array(
            'status_slider' => $status
        );
        $result['slider'] = $this->mUser->showDataHome('*','tbl_slider',$where);
        $result['upcoming'] = $this->mUser->showUpcomingEvent();
        $result['past'] = $this->mUser->showPastEvent();
		$result['id'] = $this->session->userdata('id');
		$result['nrp'] = $this->session->userdata('nrp');
		$result['username'] = $this->session->userdata('username');
        $this->load->helper('url');
		$this->load->view('home',$result);
    }
    public function login_action(){
        $nrp = $this->input->post('nrp');
        $password = $this->input->post('password');
        $where = array(
            'nrp_siswa' => $nrp,
            'password_siswa' => md5($password)
        );
        $check = $this->mUser->login_checker("tbl_siswa",$where)->num_rows();
        if($check > 0){
            $data = $this->mUser->getLogindata("tbl_siswa",$where);
            $this->session->set_userdata('logged_in', TRUE);
            $this->session->set_userdata('username',$data['nama_siswa']);
			$this->session->set_userdata('nrp',$nrp);
			$this->session->set_userdata('id',$data['id_siswa']);
            redirect(site_url('home'));
        }else{
            echo"nrp atau password salah";
        }
    }
	public function daftar_action(){
        $id = $this->input->post('id');
		$id_event = $this->input->post('id_event');
		$data = array(
			'id_siswa' => $id,
			'id_event' => $id_event,
		);
		$this->mUser->input_daftar($data,'tbl_pendaftaran');
		redirect(site_url('home'));
    }
    public function load_profile(){ 
        $id = $this->session->userdata('id');
        $data['profile']=$this->mUser->showDataProfile($id);
        $data['event']=$this->mUser->showDataEvent($id);
        $this->load->view('profile',$data);
    }
    public function check_in(){
        date_default_timezone_set('Asia/Jakarta');
        $jam_check = date('h:i:s a');
        $id_pendaftaran = $this->input->post('id_pendaftaran');
		$where = array(
			'id_pendaftaran' => $id_pendaftaran
        );
        $data = array(
            'jam_checkin' => $jam_check
        );
        $this->mUser->updateData($where, $data,'tbl_pendaftaran');
        redirect(site_url('home/load_profile'));
    }
    public function check_out(){
        date_default_timezone_set('Asia/Jakarta');
        $jam_check = date('h:i:s a');
        $id_pendaftaran = $this->input->post('id_pendaftaran');
		$where = array(
			'id_pendaftaran' => $id_pendaftaran
        );
        $data = array(
            'jam_checkout' => $jam_check
        );
        $this->mUser->updateData($where, $data,'tbl_pendaftaran');
        redirect(site_url('home/load_profile'));
    }
}