<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

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

    public function updateStatusUnit($id_unit){
        $this->db->where('id_unit', $id_unit);
        $this->db->update('units', ['status' => 'published']);
    }




    public function getAllProducts(){
        $this->db->select('
        u.id_unit,
        m.nama_merk,
        u.nama_unit,
        u.warna,
        u.transmisi,
        u.harga,
        g.nama_gambar AS thumbnail,
        u.status,
        u.tahun
    ');
    $this->db->from('units u');
    $this->db->join('mstr_merk m', 'u.id_merk = m.id_merk', 'left');
    $this->db->join('gambar g', 'u.id_unit = g.id_unit AND g.thumbnail = "set"', 'left');
    $this->db->order_by('u.id_unit', 'DESC');
    return $this->db->get()->result();
    }

    public function delete_unit($id_unit){
        // ambil dulu semua gambar biar bisa hapus file fisiknya
        $this->db->select('nama_gambar');
        $this->db->where('id_unit', $id_unit);
        $gambar = $this->db->get('gambar')->result();

        // hapus file di folder storage
        if (!empty($gambar)) {
            foreach ($gambar as $g) {
                $path = FCPATH . 'storage/units/' . $g->nama_gambar;
                if (file_exists($path)) {
                    unlink($path);
                }
            }
        }

        // hapus data gambar di database
        $this->db->where('id_unit', $id_unit);
        $this->db->delete('gambar');

        // hapus data unit di database
        $this->db->where('id_unit', $id_unit);
        $this->db->delete('units');

        return $this->db->affected_rows();
    }



    public function getUnitById($id_unit){
        $this->db->where('id_unit', $id_unit);
        return $this->db->get('units')->row();
    }

    public function updateUnit($id_unit){
        $data = [
            'nama_unit'   => $this->input->post('namaUnit'),
            'id_merk'     => $this->input->post('merk'),
            'warna'       => $this->input->post('warna'),
            'tahun'       => $this->input->post('tahun'),
            'harga'       => $this->input->post('harga'),
            'transmisi'   => $this->input->post('transmisi'),
            'deskripsi'   => $this->input->post('deskripsi')
        ];

        $this->db->where('id_unit', $id_unit);
        return $this->db->update('units', $data);
    }

    public function getUnitByIdJoinMerk($id_unit){
        $this->db->select('units.*, mstr_merk.nama_merk as merk');
        $this->db->from('units');
        $this->db->join('mstr_merk', 'mstr_merk.id_merk = units.id_merk', 'left');
        $this->db->where('units.id_unit', $id_unit);
        return $this->db->get()->row();
    }
}
