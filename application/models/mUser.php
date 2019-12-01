<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class mUser extends CI_MODEL{
    function __construct(){
        parent::__construct();
        
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
        $query = $this->db->get();
        return $query->result();
    }
    function showDataProfile($id){
        $this->db->select('*');
        $this->db->from('tbl_siswa');
        $this->db->where('tbl_siswa.id_siswa =',$id);
        $query = $this->db->get();
        return $query->result();
    }
    function showDataEvent($id){
        $this->db->select('*');
        $this->db->from('tbl_siswa');
        $this->db->join('tbl_pendaftaran','tbl_siswa.id_siswa = tbl_pendaftaran.id_siswa');
        $this->db->join('tbl_event','tbl_event.id_event = tbl_pendaftaran.id_event');
        $this->db->join('tbl_kategori','tbl_kategori.id_kategori = tbl_event.id_kategori');
        $this->db->join('tbl_ruang', 'tbl_event.id_ruang = tbl_ruang.id_ruang');
        $this->db->where('tbl_siswa.id_siswa =',$id);
        $query = $this->db->get();
        return $query->result();
    }
    function showUpcomingEvent(){
        $this->db->select('*');
        $this->db->from('tbl_event');
        $this->db->join('tbl_kategori', 'tbl_event.id_kategori = tbl_kategori.id_kategori');
        $this->db->join('tbl_ruang', 'tbl_event.id_ruang = tbl_ruang.id_ruang');
        $this->db->where('tbl_event.tanggal_event >=',date('Y-m-d'));
        $query = $this->db->get();
        return $query->result();
       
    }
       function showPastEvent(){
        $this->db->select('*');
        $this->db->from('tbl_event');
        $this->db->join('tbl_kategori', 'tbl_event.id_kategori = tbl_kategori.id_kategori');
        $this->db->join('tbl_ruang', 'tbl_event.id_ruang = tbl_ruang.id_ruang');
        $this->db->where('tbl_event.tanggal_event <',date('Y-m-d'));
        $query = $this->db->get();
        return $query->result();
    }
    function showDataDetailEvent($id){
        $this->db->select('*');
        $this->db->from('tbl_event');
        $this->db->join('tbl_kategori', 'tbl_event.id_kategori = tbl_kategori.id_kategori');
        $this->db->join('tbl_ruang', 'tbl_event.id_ruang = tbl_ruang.id_ruang');
        $this->db->where('tbl_event.id_event = $id');
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
	function login_checker($table,$where){
        return $this->db->get_where($table,$where);
    }
	function getLogindata($table,$where){
        $query = $this->db->get_where($table,$where);
		return $query->row_array();
    }
	function input_daftar($data,$table){
		$this->db->insert($table,$data);
	}
}

?>