<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
        
        public function __construct(){
                parent::__construct();
                $this->load->library('form_validation');
        }

	public function index(){

                $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
                $this->form_validation->set_rules('pass', 'Password', 'trim|required');
                if($this->form_validation->run() == false) {
                
                $data['title'] = 'Login';
                $this->load->view('templates/auth_header', $data);
                $this->load->view('auth/login');
                $this->load->view('templates/auth_footer');

                }else{
                        $this->_login();
                }
                
        }

        private function _login(){
                $email = $this->input->post('email');
                $pass = $this->input->post('pass');

                $user = $this->db->get_where('user', ['email' => $email])->row_array();
                if($user){
                        if(password_verify($pass, $user['password'])){
                                $data = [
                                        'email' => $user['email'],
                                        'role'
                                ]
                        }else{
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">wrong pass</div>');
                        redirect('auth');       
                        }
                        
                }else{
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">not registered</div>');
                        redirect('auth');   
                }
        }
        
        public function register(){

                $this->form_validation->set_rules('name', 'Name', 'required|trim');
                $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
                $this->form_validation->set_rules('pass1', 'Password', 'required|trim|min_length[3]|matches[pass2]');
                $this->form_validation->set_rules('pass2', 'Password', 'required|trim|matches[pass1]');

                if($this->form_validation->run() == false){
                        
                        $data['title'] = 'Register';
                        $this->load->view('templates/auth_header', $data);
                        $this->load->view('auth/register');
                        $this->load->view('templates/auth_footer');  
                        
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed</div>');
                }else{
                        $data = [
                          'name'  => htmlspecialchars($this->input->post('name', true)),
                          'email' => htmlspecialchars($this->input->post('email', true)),
                          'img'   => 'default.jpg',
                          'pass'  => password_hash($this->input->post('pass1'), PASSWORD_DEFAULT),
                          'role_id' => 2
                        ];

                        $this->db->insert('user', $data);
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Success</div>');
                        redirect('auth');
                }
                      
        }
}
