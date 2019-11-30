<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemateri extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('mAll');
	}
	public function index(){
        $result['data'] = $this->mAll->showData('*','tbl_pemateri');
		$this->load->view('admin/vPemateri',$result);
    }
    public function addPemateri(){
        $nama_pemateri = $this->input->post('nama_pemateri');
        $desc_pemateri = $this->input->post('desc_pemateri');
        $img_pemateri = $this->input->post('img_pemateri');
        $data = array (
            'nama_pemateri' => $nama_pemateri,
            'desc_pemateri' => $desc_pemateri,
            'img_pemateri' => $img_pemateri
            );
        $this->mAll->inputData($data, 'tbl_pemateri');
        redirect('admin/Pemateri/index');
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
        $this->mmAll->updateData($where, $data, 'tbl_ruang');
        redirect('admin/Ruangan/index');
    }
    public function deleteRuang(){
        $id= $this->input->post('id');
        $where = array(
            'id_ruang' => $id
        );
        $this->mmAll->deleteData($where,'tbl_ruang');
        redirect('admin/Ruangan/index');
    }
}
?>