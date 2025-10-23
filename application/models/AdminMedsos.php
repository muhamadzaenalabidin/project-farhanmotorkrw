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

    public function getMedsosById($id_sosmed){
        $this->db->select('sosmed.id_sosmed, sosmed.id_platform, sosmed.username, sosmed.url, sosmed.create_at, platforms.name');
        $this->db->from('sosmed');
        $this->db->join('platforms', 'platforms.id_platform = sosmed.id_platform');
        $this->db->where('sosmed.id_sosmed', $id_sosmed);
        return $this->db->get()->row(); 
    }

    public function UpdateSosmed($update, $id_sosmed){
        return $this->db->update('sosmed', $update, ['id_sosmed' => $id_sosmed]);
    }

    public function deleteSosmed($id_sosmed){
        return $this->db->delete('sosmed', ['id_sosmed' => $id_sosmed]);
    }
}