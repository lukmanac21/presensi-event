<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('mAll');
	}
	public function index(){
        $result['data'] = $this->mAll->showData('*','tbl_slider');
        $result['kategori'] = $this->mAll->showKategori()->result();
		$this->load->view('admin/vSlider',$result);
    }
    public function addSlider(){
        $config['upload_path']          = "assets/images";
        $config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 500000;
		$config['max_width']            = 0;
		$config['max_height']           = 0;
        $this->load->library('upload', $config);

        $title_slider = $this->input->post('title_slider');
        $ket_slider = $this->input->post('ket_slider');
        $status_slider = $this->input->post('status_slider');

        if ( ! $this->upload->do_upload('file_name'))
        {
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('admin/Slider/index', $error);
        }
        else
        {
            $data = $this->upload->data();
			$img_slider = $data['file_name'];
            $data = array (
                'title_slider' => $title_slider,
                'ket_slider' => $ket_slider,
                'img_slider' => $img_slider,
                'status_slider' => $status_slider
                );
                $this->mAll->inputData($data, 'tbl_slider');
                redirect('admin/Slider/index');
        }
    }
    public function editSlider(){
        $config['upload_path']          = "assets/images";
        $config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 500000;
		$config['max_width']            = 0;
		$config['max_height']           = 0;
        $this->load->library('upload', $config);

        $id= $this->input->post('id');
        $title_slider = $this->input->post('title_slider');
        $ket_slider = $this->input->post('ket_slider');
        $status_slider = $this->input->post('status_slider');
        $where = array(
            'id_slider' => $id
        );
        if ( ! $this->upload->do_upload('file_name'))
        {
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('admin/slider', $error);
        }
        else
        {
            $data = $this->upload->data();
			$img_slider = $data['file_name'];
            $data = array (
                'title_slider' => $title_slider,
                'ket_slider' => $ket_slider,
                'img_slider' => $img_slider,
                'status_slider' => $status_slider
                );
            $this->mAll->updateData($where, $data, 'tbl_slider');
            redirect('admin/Slider/index');
        }
    }
    public function deleteSlider(){
        $id= $this->input->post('id');
        $where = array(
            'id_slider' => $id
        );
        $this->mAll->deleteData($where,'tbl_slider');
        redirect('admin/Slider/index');
    }
}
?>