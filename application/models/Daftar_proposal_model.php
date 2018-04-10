<?php

class Daftar_proposal_model extends CI_Model
{


    public function getPosts()
    {

  $this->db->select("documents.user_id,created_at,title,ppm_type,submitted_fund,period_type,file_name"); 
  $this->db->from('documents');
  $this->db->join('roles','roles.id=documents.user_id');
  $query = $this->db->get();
  return $query->result();
 
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
	public function edit_data($id){
        $query=$this->db->query("SELECT ud.*
                                 FROM user_data ud 
                                 WHERE ud.id = $id");
        return $query->result_array();
}
}