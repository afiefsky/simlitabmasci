<?php

class Proposal_model extends CI_Model
{
    public function getPosts()
    {
        $this->db->select("doc.user_id, usr.username, created_at, title, ppm_type, submitted_fund, period_type, file_name"); 
        $this->db->from("documents AS doc");
        $this->db->join('users AS usr','usr.id = doc.user_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function getById($id)
    {
        $this->db->select("doc.id, doc.user_id, usr.username, created_at, title, ppm_type, submitted_fund, period_type, file_name"); 
        $this->db->from("documents AS doc");
        $this->db->join('users AS usr','usr.id = doc.user_id');
        $this->db->where('doc.id = ', $id);
        $query = $this->db->get();
        return $query;
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
}