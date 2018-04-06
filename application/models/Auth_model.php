<?php

class Auth_model extends CI_Model
{
    public function login($username, $password)
    {
        $auth = $this->db->get_where(
            'users',
            [
                'username' => $username,
                'password' => md5($password)
            ]
        );

        if ($auth->num_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }
}
