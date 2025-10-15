<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminKelolaMerk extends CI_Model {
    
    public function getAllMerk(){
        return $this->db->get('mstr_merk')->result_array();
    }

    public function getMerkById($id_merk){
        return $this->db->get_where('mstr_merk', ['id_merk' => $id_merk])->row_array();
    }

    public function insertMerk(){
        $data = [
            'nama_merk'   => $this->input->post('namaMerk'),
            'create_at'  => date('Y-m-d H:i:s')
        ];

        $this->db->insert('mstr_merk', $data);
        return $this->db->insert_id();
    }

    public function updateMerk($id_merk){
        $data = [
            'nama_merk'   => $this->input->post('namaMerk')
        ];

        $this->db->where('id_merk', $id_merk);
        return $this->db->update('mstr_merk', $data);
    }

    public function delete_merk($id_merk){
        // Cek apakah merk masih dipakai di tabel units
    $used = $this->db->where('id_merk', $id_merk)->count_all_results('units');

        if ($used > 0) {
            return false;
        } else {
            $this->db->where('id_merk', $id_merk);
            return $this->db->delete('mstr_merk');
        }
    }
}