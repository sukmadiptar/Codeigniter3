<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authpage extends CI_Controller {

	public function auth()
	{
        $this->load->view('templates/auth_header');
        $this->load->view('auth/login');
        $this->load->view('templates/auth_footer');
        }
        
        public function register(){
        $this->load->view('templates/auth_header');
        $this->load->view('auth/register');
        $this->load->view('templates/auth_footer');        
        }
}
