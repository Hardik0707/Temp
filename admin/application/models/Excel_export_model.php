<?php
class Excel_export_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}
 public function fetch_data()
 {
  $this->db->order_by("roll", "DESC");
  $query = $this->db->get("temp");
  return $query->result();
 }
}