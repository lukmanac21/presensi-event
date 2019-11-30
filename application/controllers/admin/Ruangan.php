<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruangan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('mAll');
	}
	public function index(){
        $result['data'] = $this->mAll->showData('*','tbl_ruang');
		$this->load->view('admin/vRuangan',$result);
    }
    public function addRuang(){
        $nama_ruang = $this->input->post('nama_ruang');
        $data = array (
            'nama_ruang' => $nama_ruang
            );
        $this->mAll->inputData($data, 'tbl_ruang');
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
        $this->mAll->updateData($where, $data, 'tbl_ruang');
        redirect('admin/Ruangan/index');
    }
    public function deleteRuang(){
        $id= $this->input->post('id');
        $where = array(
            'id_ruang' => $id
        );
        $this->mAll->deleteData($where,'tbl_ruang');
        redirect('admin/Ruangan/index');
    }
}
?>