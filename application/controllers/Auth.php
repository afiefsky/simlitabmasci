<?php

/**
 * DEVELOPMENT DOCUMENTATION
 * Typing PHP using 4 spaces
 * Typing HTML using 2 spaces
 */
class Auth extends CI_Controller
{
    /**
     * The Constructor
     * 'camelCase' for functions / methods
     * 'snake_case' for variables
     * 'Pascal case' + 'snake_case' for entities / files (i.e: Auth_model)
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
            $this->session->set_userdata(['login_button_active' => 0]);
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $result = $this->auth->login($username, $password);

            if ($result == 1) {
                $user_data = $this->user->getUserRole($username)->row_array();

                /**
                 * level 1 is admin
                 * level 2 is lecturer
                 */
                $level_number = $user_data['level_number'];
                $user_id = $user_data['user_id'];

                /**
                 * login status only to decide if one is logged in or not
                 * 1 means logged in
                 * 0 means logged out / not logged in
                 */
                $this->session->set_userdata([
                    'login_status' => 1,
                    'user_id' => $user_id,
                    'username' => $username,
                    'level_number' => $level_number
                ]);

                redirect('dashboard');
            } else {
                echo "Login error!!!";
            }
        } else {
            $this->session->set_userdata([
                'active_page' => 'login_page'
            ]);
            $this->session->set_userdata(['login_button_active' => 1]);
            $this->template->load('template/main', 'login/index');
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
