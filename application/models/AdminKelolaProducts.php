<?php 

class AdminKelolaProducts extends CI_Model {

    public function insertUnit(){
        $data = [
            'nama_unit'   => $this->input->post('namaUnit'),
            'id_merk'     => $this->input->post('merk'),
            'warna'       => $this->input->post('warna'),
            'tahun'       => $this->input->post('tahun'),
            'harga'       => $this->input->post('harga'),
            'transmisi'   => $this->input->post('transmisi'),
            'deskripsi'   => $this->input->post('deskripsi'),
            'create_at'  => date('Y-m-d H:i:s'),
            'status'     => 'draft'
        ];

        $this->db->insert('units', $data);
        return $this->db->insert_id();
    }


    public function GetNameUnit($id_unit){
        $this->db->select('id_unit, nama_unit');
        $this->db->from('units');
        $this->db->where('id_unit', $id_unit);
        $query = $this->db->get();
        return $query->row();
    }

}
