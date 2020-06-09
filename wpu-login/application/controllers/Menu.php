<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

    public function __construct(){
        parent::__construct();
        is_logged_in();
        $this->load->model('Menu_model');
        $this->load->model('Usermenu_model');
        $this->load->library('form_validation');
        $this->load->helper('form_helper');
    }

    public function index(){

        $data['title'] = 'Menu Management'; 
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');
        // Add new menu
        if( $this->form_validation->run() == false ){
            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        }else{
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu') ]);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New menu added!
            </div>');

            redirect('menu');
        }

    }
    
    public function delete($id){

        $this->load->model('Menu_model');
        $this->Menu_model->deleteDataMenu($id);
 
        $this->session->set_flashdata('message_del', '<div class="alert alert-danger" role="alert">New menu deleted!
        </div>');

        redirect('menu');
    }

    public function edit($id){
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $data['title'] = 'Edit Menu'; 
        $data['menu' ] = $this->Menu_model->getMenuById($id);
        
        //validation
        $this->form_validation->set_rules('menu', 'Menu', 'required');
        
        //views
        if ($this->form_validation->run() == FALSE) {
            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/edit', $data);
            $this->load->view('templates/footer');
        }else{

            $this->Menu_model->editDataMenu($id);
            $this->session->set_flashdata('message_edit', '<div class="alert alert-success" role="alert">New menu Edited!
            </div>');
            redirect('menu');
        }

    }

    public function submenu(){
        $data['title'] = 'SubMenu Management'; 
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $this->load->model('Menu_model', 'menu');

        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu ID', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
            
        } else {
            $data = [
                'title'     => $this->input->post('title'),
                'menu_id'   => $this->input->post('menu_id'),
                'url'       => $this->input->post('url'),
                'icon'      => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            //$this->db->insert('user_sub_menu', ['menu' => $this->input->post('menu')]); 
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New sub menu added!
            </div>');
            redirect('menu/submenu');
        }
    }

    public function editsub($id){
        
        $data['title'] = 'Edit Sub Menu';        
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        //$data['subMenu'] = $this->Menu_model->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        // mahasiswa
        $data['subbMenu' ] = $this->Menu_model->getSubById($id);
        $data['menuid'] = $this->Menu_model->getUserMenuId($id);


        //validation
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'MenuID', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');
        
        //views
        if ($this->form_validation->run() == false) {
            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/editsub', $data);
            $this->load->view('templates/footer');
        }else{
            
            $this->Menu_model->editDataSubMenu($id);
            $this->session->set_flashdata('message_editsub', '<div class="alert alert-success" role="alert">New SubMenu Edited!
            </div>');
            redirect('menu/submenu');
        }

    }

    public function deletesub($id){
        
        //$this->load->model('Menu_model');
        $this->Menu_model->deleteSubMenu($id);
 
        $this->session->set_flashdata('message_delsub', '<div class="alert alert-danger" role="alert">New SubMenu deleted!
        </div>');

        redirect('menu/submenu');
    }

}