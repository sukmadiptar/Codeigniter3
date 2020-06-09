<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Integrasi extends CI_Controller {

    public function __construct(){
        parent::__construct();
        is_logged_in();
        $this->load->helper('string');
    }


    public function add(){
        $data['title'] = 'Add Integrasi'; 

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');
        if( $this->form_validation->run() == false ){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('integrasi/add', $data);
            $this->load->view('templates/footer');
        }else{
            $this->db->insert('tbi', ['menu' => $this->input->post('menu') ]);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New menu added!
            </div>');

            redirect('integrasi/add');
        }
    }
    
    


}