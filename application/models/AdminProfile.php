<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminProfile extends CI_Model {

    public function getProfiles() {
        return $this->db->get_where('profiles', ['id_profile' => 1])->row_array();
        
    }
    
}