<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_model {
    public function getMale(){
        $query = ["SELECT * 
                   FROM `employee` 
                   WHERE `gender` = `male`"];
        //return $this->db->query($query)->result_array();
    }
    
    public function getFemale(){
        $query = ["SELECT * 
                   FROM `employee` 
                   WHERE `gender` = `female`"];
        //return $this->db->query($query)->result_array();
    }

    public function getGender(){
        return $this->db->get('employee')->result_array(); 
    }


}