<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function index()
    {
        $data['page_title'] = "Admin Dashboard";
        $data['active_menu'] = "dashboard";


        $this->load->view('templates/admin/admin_top', $data);
        $this->load->view('templates/admin/admin_aside');
        $this->load->view('templates/admin/admin_wrapper_header', $data);
        $this->load->view('admin/index');
        $this->load->view('templates/admin/admin_wrapper_footer');
        $this->load->view('templates/admin/admin_bottom');
        
    }
}