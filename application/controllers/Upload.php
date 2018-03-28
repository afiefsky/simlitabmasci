<?php  

class Upload extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if (isset($_POST['submit'])) {
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png|doc|docx|pdf';
            $config['max_size']             = 1000000;
            $config['max_width']            = 102400;
            $config['max_height']           = 76800;

            $this->load->library('upload', $config);

            $this->upload->do_upload('userfile'); // this is a must

            $data = array('upload_data' => $this->upload->data());

            echo "Upload success!!!";
            echo "<br />";
            echo "Kembali ke ".anchor("dashboard", "Beranda");;

        } else {
            $this->session->set_userdata([
                'active_page' => 'upload'
            ]);
            
            $this->template->load('template/main', 'upload/index');
        }
    }
}