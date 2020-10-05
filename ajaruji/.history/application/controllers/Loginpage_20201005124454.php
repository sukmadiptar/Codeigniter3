<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loginpage extends CI_Controller {

	public function index()
	{
        $this->load->view('templates/auth');
		$this->load->view('auth/login');
	}
}
