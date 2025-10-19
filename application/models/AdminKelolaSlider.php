<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminKelolaSlider extends CI_Model {

    public function getAllSliders(){
        return $this->db->get('sliders')->result_array();
    }

    public function insertSlider($data){
        $this->db->insert('sliders', $data);
    }

    public function getSliderById($id_slider){
        return $this->db->get_where('sliders', ['id_slider' => $id_slider])->row_array();
    }

    public function deleteSlider($id_slider){
        $this->db->where('id_slider', $id_slider);
        $this->db->delete('sliders');
    }

    public function insertUnit(){
        $data = [
            'nama_unit'   => $this->input->post('namaUnit'),
            'id_merk'     => $this->input->post('merk'),
            'warna'       => $this->input->post('warna'),
            'tahun'       => $this->input->post('tahun'),
            'harga'       => $this->input->post('harga'),
            'transmisi'   => $this->input->post('transmisi'),
            'deskripsi'   => $this->input->post('deskripsi'),
        ];

        $this->db->insert('units', $data);
        return $this->db->insert_id();
    }
}