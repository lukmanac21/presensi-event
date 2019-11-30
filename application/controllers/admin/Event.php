<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('mAll');
	}
	public function index(){
        $result['data'] = $this->mAll->showDataEvent();
        $result['ruang'] = $this->mAll->showRuangan()->result();
        $result['kategori'] = $this->mAll->showKategori()->result();
		$this->load->view('admin/vEvent',$result);
    }
    public function addEvent(){
        $id_kategori = $this->input->post('id_kategori');
        $nama_event = $this->input->post('nama_event');
        $tanggal_event = $this->input->post('tanggal_event');
        $jam_event = $this->input->post('jam_event');
        $id_ruang = $this->input->post('id_ruang');
        $kuota_event = $this->input->post('kuota_event');

        $data = array (
            'id_kategori' => $id_kategori,
            'nama_event' => $nama_event,
            'tanggal_event' => $tanggal_event,
            'jam_event' => $jam_event,
            'id_ruang' => $id_ruang,
            'kuota_event' => $kuota_event
            );
        $this->mAll->inputData($data, 'tbl_event');
        redirect('admin/Event/index');
    }
    public function editJurusan(){
        $id= $this->input->post('id');
        $nama_event = $this->input->post('nama_event');
        $data = array (
            'nama_event' => $nama_event
        );
        $where = array(
            'id_event' => $id
        );
        $this->mJurusan->updateData($where, $data, 'tbl_jurusan');
        redirect('admin/Event/index');
    }
    public function deleteEvent(){
        $id= $this->input->post('id');
        $where = array(
            'id_event' => $id
        );
        $this->mAll->deleteData($where, 'tbl_event');
        redirect('admin/Event/index');
    }
}
?>