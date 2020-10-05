<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    
    public function index(){
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $this->load->view('temp/header');
        $this->load->view('templates/navbar');
        $this->load->view('index/home');
        $this->load->view('templates/footer');
    }


}