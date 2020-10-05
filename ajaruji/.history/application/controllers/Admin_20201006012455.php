<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    
    public function index(){
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $this->load->view('temp/dashboard_top', $data);
        $this->load->view('temp/dashboard_side', $data);
        $this->load->view('temp/dashboard', $data);
        $this->load->view('temp/dashboard', $data);
        
    }


}