<?php

class Auth_dosen_model extends CI_Model
{
    public function login_dosen($username, $password)
    {
        $auth = $this->db->get_where(
            'users',
            [
                'username' => $username,
                'password' => md5($password)
            ]
        );

        if ($auth->num_rows() > 1) {
            return 2;
        } else {
            return 0;
        }
    }
}
