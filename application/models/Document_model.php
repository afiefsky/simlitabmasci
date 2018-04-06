<?php

class Document_model extends CI_Model
{
    public function upload($data)
    {
        $record = [
            'file_name' => $data['upload_data']['file_name'],
            'full_path' => $data['upload_data']['full_path'],
            'title' => $this->input->post('title'),
            'ppm_type' => $this->input->post('ppm_type'),
            'submitted_fund' => str_replace(['Rp. ', '.'], ['', ''], $this->input->post('submitted_fund')),
            'period_type' => $this->input->post('period_type'),
            'user_id' => $this->session->userdata('user_id')
        ];
        
        $this->db->insert('documents', $record);
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
