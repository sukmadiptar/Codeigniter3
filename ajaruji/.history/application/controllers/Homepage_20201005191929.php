<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {

	public function index()
	{
		$this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('index/home', $data);
        $this->load->view('templates/footer');
	}
}
