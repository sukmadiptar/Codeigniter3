<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {
    public function __construct(){
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->helper('form_helper');
    }

    public function charts(){

        $data['title'] = 'Charts'; 
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $this->load->model('Employee_model', 'gender');
        $data['gender'] = $this->db->get('employee')->result_array();
        $data['male'] = $this->gender->getMale();
        $data['female'] = $this->gender->getFemale();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('employee/charts', $data);
        $this->load->view('templates/footer');
        
    }

    public function list(){
        $data['title'] = 'List of Employee'; 
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('employee/list', $data);
        $this->load->view('templates/footer');
        
    }

}