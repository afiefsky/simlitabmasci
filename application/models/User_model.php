<?php

class User_model extends CI_Model {    

    public function getUser() {
        $this->db->select('*');
        $this->db->from('roles');
        $this->db->join('users', 'users.role_id = roles.id');
        $query = $this->db->get();

        return $query;
    }

    public function getUserRole($username) {
        $this->db->select('
            users.username,
            roles.level_number
        ');
        $this->db->from('roles');
        $this->db->join('users', 'users.role_id = roles.id');
        $this->db->where('users.username', $username);
        $query = $this->db->get();

        return $query;
    }
}