<?php
class Gallery_Model extends CI_Model
{
    function __construct() {
        parent::__construct();
    }

    //Select all Images
    public function FetchAllImages() {
       $this->db->select('*');
        $result = $this->db->get('gallery_mst');
        return $result->result();
    }
}