<?php
class ContactUs_Model extends CI_Model
{
    function __construct() {
        parent::__construct();
    }
    public function fetchAllBranches(){
        $this->db->select('*');
        $this->db->from('branch_mst');
        $res=$this->db->get();
       // echo $result;
        return $res->result();
    }
}



