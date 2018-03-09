<?php
class Excel_export_model extends CI_Model
{
 function fetch_data()
 {
  $this->db->order_by("roll", "DESC");
  $query = $this->db->get("temp");
  return $query->result();
 }
public function FetchTest($id)
    {
        $this->db->select('*');
        $this->db->where('id',$id);
        $result = $this->db->get('test');
        return $result->result();
    }
 
}