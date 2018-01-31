<?php 

class Announcement_Model extends CI_Model { // Start of Announcement_Model class

	  function __construct() {
        parent::__construct();
    }

    // Start of FetchAllPublic()

    public function FetchAllPublic() {
        $this->db->select('*');
        $result = $this->db->get('public_announcement');
        return $result->result();
    }	
    
    // End of FetchAllPublic()

    public function DeletePublic($id) {
        $this->db->where('photo', $id);
        return $this->db->delete('public_announcement');
    }

    public function InsertPublic($data)
    {
    	 return $this->db->insert('public_announcement', $data);
    }
} 
// End of Gallery_Model Class 
 ?>