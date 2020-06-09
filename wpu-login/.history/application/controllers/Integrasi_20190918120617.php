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
            $data = [
                'intcode'     => $this->input->post('title'),
                'caCode'   => $this->input->post('menu_id'),
                'subcaCode'       => $this->input->post('url'),
                'prodCode'      => $this->input->post('icon'),
                'cekDenom' => $this->input->post('is_active'),
                'portin' => $this->input->post('is_active'),
                'portout' => $this->input->post('is_active'),
                'keterangan' => $this->input->post('is_active'),
                'startDate' => $this->input->post('is_active'),
                'endDate' => $this->input->post('is_active'),
                'status' => $this->input->post('is_active'),
                'fidbit' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New sub menu added!
            </div>');
            redirect('menu/submenu');

            redirect('integrasi/add');
        }
    }
    
    


}