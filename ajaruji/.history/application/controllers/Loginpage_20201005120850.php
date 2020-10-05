<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loginpage extends CI_Controller {

	public function login()
	{
		$this->load->view('login/auth');
	}
}
