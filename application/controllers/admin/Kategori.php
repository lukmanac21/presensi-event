<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('mKategori');
	}
	public function index(){
        $result['data'] = $this->mKategori->showData();
		$this->load->view('admin/vKategori',$result);
    }
    public function addKategori(){
        $nama_kategori = $this->input->post('nama_kategori');
        $data = array (
            'nama_kategori' => $nama_kategori
            );
        $this->mKategori->inputData($data, 'tbl_kategori');
        redirect('admin/Kategori/index');
    }
    public function editKategori(){
        $id= $this->input->post('id');
        $nama_kategori = $this->input->post('nama_kategori');
        $data = array (
            'nama_kategori' => $nama_kategori
        );
        $where = array(
            'id_kategori' => $id
        );
        $this->mKategori->updateData($where, $data, 'tbl_kategori');
        redirect('admin/Kategori/index');
    }
    public function deleteKategori(){
        $id= $this->input->post('id');
        $this->mKategori->deleteData($id);
        redirect('admin/Kategori/index');
    }
}
?>