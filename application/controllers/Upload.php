<?php 

class Upload extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Document_model');
        $this->document = $this->Document_model;
    }

    public function index()
    {
        if (isset($_POST['submit'])) {
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'doc|docx|pdf|txt';
            $config['max_size']             = 1000000;

            $this->load->library('upload', $config);

            $this->upload->do_upload('userfile'); // this is a must, this is the uploading to drive action

            $data = array('upload_data' => $this->upload->data());

            // below is adding the upload data to db
            $this->document->upload($data);

            echo "Upload success!!!";
            echo "<br />";
            echo "Kembali ke ".anchor("dashboard", "Beranda");
            ;
        } else {
            $this->session->set_userdata([
                'active_page' => 'upload'
            ]);

            $this->template->load('template/main', 'upload/index');
        }
    }
}
