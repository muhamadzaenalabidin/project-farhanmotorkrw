<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminMedsos extends CI_Model {


    public function GetAllPlatform(){
        return $this->db->get('platforms')->result_array();
    }

    public function insertMedsos($dataInsert){
        return $this->db->insert('sosmed', $dataInsert);
    }

    public function getAllMedsos(){
            $this->db->select('
            s.id_sosmed,
            s.username,
            s.url,
            s.create_at,
            p.name,
            p.icon
        ');
        $this->db->from('sosmed s');
        $this->db->join('platforms p', 'p.id_platform = s.id_platform');
        $this->db->order_by('s.create_at', 'DESC');

        return $this->db->get()->result_array();
    }
}