<?php 


class AdminMerk extends CI_Model {
    public function getAllMerk(){
        return $this->db->get('mstr_merk')->result_array();
    }
}