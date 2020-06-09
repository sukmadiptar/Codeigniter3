<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct(){
        parent::__construct();
        is_logged_in();
        $this->load->helper('string');
    }

    public function index(){
        $data['title'] = 'Dashboard'; 

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');

    }

    public function addIntegrasi(){
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];
        
        $result = $this->db->get_where('user_access_menu', $data);

        if( $result->num_rows() < 1){
            $this->db->insert('user_access_menu', $data);
        }else{
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed!
            </div>');
    }
    
    


}