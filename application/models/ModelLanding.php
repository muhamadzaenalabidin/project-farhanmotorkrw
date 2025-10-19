<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelLanding extends CI_Model {
    public function getAllSliders(){
        return $this->db->get('sliders')->result_array();
    }

    public function getAllUnits(){
        $this->db->select('
            u.id_unit,
            m.nama_merk,
            u.nama_unit,
            u.warna,
            u.tahun,
            u.transmisi,
            u.harga,
            u.deskripsi,
            g_thumb.nama_gambar AS thumbnail
        ');
        $this->db->from('units u');
        $this->db->join('mstr_merk m', 'u.id_merk = m.id_merk', 'left');
        $this->db->join('gambar g_thumb', 'u.id_unit = g_thumb.id_unit AND g_thumb.thumbnail = "set"', 'left');
        $this->db->order_by('u.create_at', 'DESC');
        $produk = $this->db->get()->result_array();

        // Ambil semua gambar per unit juga
        foreach ($produk as &$item) {
            $item['semua_gambar'] = $this->db
                ->select('nama_gambar')
                ->from('gambar')
                ->where('id_unit', $item['id_unit'])
                ->get()
                ->result_array();
        }

        return $produk;
    }

    public function getUnitById($id_unit){
        $this->db->select('
            u.id_unit,
            u.id_merk,   
            m.nama_merk,
            u.nama_unit,
            u.warna,
            u.tahun,
            u.transmisi,
            u.harga,
            u.deskripsi,
            g_thumb.nama_gambar AS thumbnail
        ');
        $this->db->from('units u');
        $this->db->join('mstr_merk m', 'u.id_merk = m.id_merk', 'left');
        $this->db->join('gambar g_thumb', 'u.id_unit = g_thumb.id_unit AND g_thumb.thumbnail = "set"', 'left');
        $this->db->where('u.id_unit', $id_unit);
        $unit = $this->db->get()->row_array();

        // Ambil semua gambar per unit juga
        if ($unit) {
            $unit['semua_gambar'] = $this->db
                ->select('nama_gambar')
                ->from('gambar')
                ->where('id_unit', $unit['id_unit'])
                ->get()
                ->result_array();
        }

        return $unit;
    }

    public function getRelatedUnits($id_merk, $id_unit) {
        return $this->db
            ->select('
                u.id_unit,
                m.nama_merk,
                u.nama_unit,
                u.harga,
                g_thumb.nama_gambar AS thumbnail
            ')
            ->from('units u')
            ->join('mstr_merk m', 'u.id_merk = m.id_merk', 'left')
            ->join('gambar g_thumb', 'u.id_unit = g_thumb.id_unit AND g_thumb.thumbnail = "set"', 'left')
            ->where('u.id_merk', $id_merk)
            ->where('u.id_unit !=', $id_unit)
            ->limit(8)
            ->get()
            ->result_array();
    }

    public function getAllMerks(){
        return $this->db->get('mstr_merk')->result_array();
    }

    public function getMerkById($id_merk){
        return $this->db
            ->where('id_merk', $id_merk)
            ->get('mstr_merk')
            ->row_array();
    }

    public function getUnitsByMerk($id_merk){
        $this->db->select('
            u.id_unit,
            m.nama_merk,
            u.nama_unit,
            u.warna,
            u.tahun,
            u.transmisi,
            u.harga,
            u.deskripsi,
            g_thumb.nama_gambar AS thumbnail
        ');
        $this->db->from('units u');
        $this->db->join('mstr_merk m', 'u.id_merk = m.id_merk', 'left');
        $this->db->join('gambar g_thumb', 'u.id_unit = g_thumb.id_unit AND g_thumb.thumbnail = "set"', 'left');
        $this->db->where('u.id_merk', $id_merk);
        $this->db->order_by('u.create_at', 'DESC');
        $produk = $this->db->get()->result_array();

        // Ambil semua gambar per unit juga
        foreach ($produk as &$item) {
            $item['semua_gambar'] = $this->db
                ->select('nama_gambar')
                ->from('gambar')
                ->where('id_unit', $item['id_unit'])
                ->get()
                ->result_array();
        }

        return $produk;
    }

    public function getMyProfile(){
        return $this->db->get('profiles')->row_array();
    }

    public function getActiveNumber(){
        return $this->db->get_where('contacts', ['status' => 'on'])->result_array();
    }

    public function getActiveWhatsapp(){
        return $this->db->get_where('contacts', ['wa_floating' => 'set'])->row();
    }
}