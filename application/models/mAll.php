<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class mAll extends CI_MODEL{
    function __construct(){
		parent::__construct();
        if ($this->session->userdata['logged_in'] == FALSE)
        {
            redirect('login');
        }
    }
    function showData($data,$table){
        $this->db->select($data);
        $this->db->from($table);
        $query = $this->db->get();
        return $query->result();
    }
    function showDataHome($data,$table,$where){
        $this->db->select($data);
        $this->db->from($table);
        $this->db->where($where);
        $this->db->join('tbl_kategori','tbl_slider.id_kategori = tbl_kategori.id_kategori');
        $query = $this->db->get();
        return $query->result();
    }
    function showDataEvent(){
        $this->db->select('*');
        $this->db->from('tbl_event');
        $this->db->join('tbl_kategori', 'tbl_event.id_kategori = tbl_kategori.id_kategori');
        $this->db->join('tbl_ruang', 'tbl_event.id_ruang = tbl_ruang.id_ruang');
        $query = $this->db->get();
        return $query->result();
    }
    function inputData($data, $table){
        $this->db->insert($table,$data);
    }
    function updateData($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    function deleteData($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }
    function showJurusan(){
        $query = $this->db->get('tbl_jurusan');
        return $query;
    }
    function showRuangan(){
        $query = $this->db->get('tbl_ruang');
        return $query;
    }
    function showKategori(){
        $query = $this->db->get('tbl_kategori');
        return $query;
    }
}

?>