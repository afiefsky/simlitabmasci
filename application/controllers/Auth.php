<?php

class Auth extends CI_Controller
{
    /**
     * The Constructor
    */
    public function __construct()
    {
        parent::__construct();

        $this->load->model([
            'Auth_model',
            'User_model'
        ]);

        $this->auth = $this->Auth_model;
        $this->user = $this->User_model;
    }

    /**
     * Index
     * var username
     * var password
     */
    public function index()
    {
        if (isset($_POST['submit'])) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $result = $this->auth->login($username, $password);

            if ($result == 1) {

                $userData = $this->user->getUserRole($username)->row_array();

                /**
                 * level 1 is admin
                 * level 2 is lecturer
                 */ 
                $levelNumber = $userData['level_number'];

                $this->session->set_userdata([
                    'login_status' => 1,
                    'username' => $username,
                    'level_number' => $levelNumber
                ]);

                redirect('dashboard');
            } else {
                echo "Login error!!!";
            }

        } else {
            $this->load->view('login/index');
        }
    }
    /* End of Index */

    /**
     * Logout
     */
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
}