<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class mRuangan extends CI_MODEL{
    function showData(){
        $query = $this->db->query("select * from tbl_ruang");
        return $query->result();
    }
    function inputData($data, $table){
        $this->db->insert($table,$data);
    }
    function updateData($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    function deleteData($id){
        $this->db->where('id_ruangan',$id);
        $this->db->delete('tbl_ruang');
    }
}

?>