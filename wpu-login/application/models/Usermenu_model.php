<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usermenu_model extends CI_model {
    public function getAllUser($id){
        $this->db->where('id', $id);
        $this->db->get('user_menu')->row_array();
    }
}