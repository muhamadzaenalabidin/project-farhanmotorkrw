<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminGambar extends CI_Model {

    public function insert_gambar($data){
        return $this->db->insert('gambar', $data);
    }

    public function getGambarByUnit($id_unit){
        return $this->db->get_where('gambar', ['id_unit' => $id_unit])->result();
    }

    public function delete_gambar($id_gambar)
    {
        return $this->db->delete('gambar', ['id_gambar' => $id_gambar]);
    }


    public function getThumbnailByUnit($id_unit){
        $this->db->where('id_unit', $id_unit);
        $this->db->where('thumbnail', 'set');
        return $this->db->get('gambar')->row();
    }
}
