<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminDashboard extends CI_Model {
    public function getCountAllMerk(){
        return $this->db->count_all('mstr_merk');
    }

    public function getCountAllUnits(){
        return $this->db->count_all('units');
    }

    public function getCountAllSlider(){
        return $this->db->count_all('sliders');
    }
}