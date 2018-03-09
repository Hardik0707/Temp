<?php
class Announcement_Model extends CI_Model
{
    function __construct() {
        parent::__construct();
    }

    //Select all Images
    public function FetchAllPublic() {
       $this->db->select('*');
        $result = $this->db->get('public_announcement');
        return $result->result();
    }
}