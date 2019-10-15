<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('mJurusan');
	}
	public function index(){
        $result['data'] = $this->mJurusan->showData();
		$this->load->view('admin/vJurusan',$result);
    }
    public function addJurusan(){
        $nama_jurusan = $this->input->post('nama_jurusan');
        $data = array (
            'nama_jurusan' => $nama_jurusan
            );
        $this->mJurusan->inputData($data, 'tbl_jurusan');
        redirect('admin/Jurusan/index');
    }
    public function editJurusan(){
        $id= $this->input->post('id');
        $nama_jurusan = $this->input->post('nama_jurusan');
        $data = array (
            'nama_jurusan' => $nama_jurusan
        );
        $where = array(
            'id_jurusan' => $id
        );
        $this->mJurusan->updateData($where, $data, 'tbl_jurusan');
        redirect('admin/Jurusan/index');
    }
    public function deleteJurusan(){
        $id= $this->input->post('id');
        $this->mJurusan->deleteData($id);
        redirect('admin/Jurusan/index');
    }
}
?>