<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminGambar extends CI_Model {

    public function insert_gambar($data){
        return $this->db->insert('gambar', $data);
    }

    public function get_gambar_by_unit($id_unit){
        return $this->db->get_where('gambar', ['id_unit' => $id_unit])->result();
    }

    public function delete_gambar($id_gambar)
    {
        return $this->db->delete('gambar', ['id_gambar' => $id_gambar]);
    }
}
