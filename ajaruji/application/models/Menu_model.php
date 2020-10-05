<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_model {


    // START SUBMENU
    public function getSubMenu(){
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu` 
                    FROM `user_sub_menu` 
                    JOIN `user_menu` 
                      ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                ";

        return $this->db->query($query)->result_array();
    }

    public function getData() {
        $this->db->select('*');
        $this->db->from('blogs');
        $this->db->join('user_menu', 'user_menu.id = blogs.id');
        $query = $this->db->get();
    }

    public function getSubById($id){
        return $this->db->get_where('user_sub_menu', ['id' => $id])->row_array();
    }

    public function getUserMenuId($id){
        return $this->db->get_where('user_menu', ['id' => $id])->row_array();
    }

    public function editDataSubMenu($id){
        $data = [
            "menu_id"   => $this->input->post('menu_id', true),
            "title"     => $this->input->post('title', true),
            "url"       => $this->input->post('url', true),
            "icon"      => $this->input->post('icon', true),
            "is_active" => $this->input->post('is_active', true)
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user_sub_menu', $data);
    }

    public function deleteSubMenu($id){
        $this->db->where('id', $id);
        $this->db->delete('user_sub_menu');
    }

    public function getAllMenu($id){

        $this->db->get('user_menu')->result_array();
    }

}
