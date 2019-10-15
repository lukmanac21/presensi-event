<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruangan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('mRuangan');
	}
	public function index(){
        $result['data'] = $this->mRuangan->showData();
		$this->load->view('admin/vRuangan',$result);
    }
    public function addRuang(){
        $nama_ruang = $this->input->post('nama_ruang');
        $data = array (
            'nama_ruang' => $nama_ruang
            );
        $this->mRuangan->inputData($data, 'tbl_ruang');
        redirect('admin/Ruangan/index');
    }
    public function editRuang(){
        $id= $this->input->post('id');
        $nama_ruang = $this->input->post('nama_ruang');
        $data = array (
            'nama_ruang' => $nama_ruang
        );
        $where = array(
            'id_ruang' => $id
        );
        $this->mRuangan->updateData($where, $data, 'tbl_ruang');
        redirect('admin/Ruangan/index');
    }
    public function deleteRuang(){
        $id= $this->input->post('id');
        $this->mRuangan->deleteData($id);
        redirect('admin/Ruangan/index');
    }
}
?>