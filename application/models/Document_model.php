<?php

class Document_model extends CI_Model
{
    public function upload($file_name, $full_path, $note)
    {
        $user_id = $this->session->userdata('user_id');
        $data = [
            'file_name' => $file_name,
            'full_path' => $full_path,
            'user_id' => $user_id,
            'note' => $note,
            'acceptance_status' => '2'
        ];
        
        $this->db->insert('documents', $data);
    }

    public function get()
    {
        $this->db->select('
            documents.*,
            users.*,
            documents.id AS document_id
        ');
        $this->db->from('users');
        $this->db->join('documents', 'documents.user_id = users.id');
        return $this->db->get();
    }

    public function getAccepted()
    {
        $this->db->select('
            documents.*,
            users.*,
            documents.id AS document_id
        ');
        $this->db->from('users');
        $this->db->join('documents', 'documents.user_id = users.id');
        $this->db->where('documents.acceptance_status', '1');
        return $this->db->get();
    }

    public function getByKeyword($keyword)
    {
        $this->db->select('
            documents.*,
            users.*,
            documents.id AS document_id
        ');
        $this->db->from('users');
        $this->db->join('documents', 'documents.user_id = users.id');
        $this->db->like('file_name', $keyword);
        return $this->db->get();
    }

    public function getAcceptedByKeyword($keyword)
    {
        $this->db->select('
            documents.*,
            users.*,
            documents.id AS document_id
        ');
        $this->db->from('users');
        $this->db->join('documents', 'documents.user_id = users.id');
        $this->db->like('file_name', $keyword);
        $this->db->where('documents.acceptance_status', '1');
        return $this->db->get();
    }

    public function accept($id)
    {
        $this->db->set('acceptance_status', '1');
        $this->db->where('id', $id);
        $this->db->update('documents');
    }

    public function reject($id)
    {
        $this->db->set('acceptance_status', '0');
        $this->db->where('id', $id);
        $this->db->update('documents');
    }
}
