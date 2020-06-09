<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role_model extends CI_model {
    public function deleteRolee($id){

        $this->db->where('id', $id);
        $this->db->delete('user_role');
    }

    public function getRoleById($id){
        return $this->db->get_where('user_role', ['id' => $id])->row_array();
    }

    public function editRoles($id){

        $data = [
            "role" => $this->input->post('role', true)
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user_role', $data);
    }
}