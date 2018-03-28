<?php

class Auth extends CI_Controller
{
    /**
     * The Constructor
    */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->auth = $this->Auth_model;
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
                $this->session->set_userdata([
                    'login_status' => 1,
                    'username' => $username
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