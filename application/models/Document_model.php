<?php

class Document_model extends CI_Model
{
    public function upload($file_name, $full_path)
    {
        $data = [
            'file_name' => $file_name,
            'full_path' => $full_path
        ];
        
        $this->db->insert('documents', $data);
    }
}