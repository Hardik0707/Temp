<?php 

class Gallery_Model extends CI_Model { // Start of Gallery_Model class

	  function __construct() {
        parent::__construct();
    }

    // Start of FetchAllImages()

    public function FetchAllImages() {
        $this->db->select('*');
        $result = $this->db->get('gallery_mst');
        return $result->result();
    }	
    
    // End of FetchallImages()

    public function DeleteImage($id) {
        $this->db->where('photo', $id);
        return $this->db->delete('gallery_mst');
    }
} 
// End of Gallery_Model Class 
 ?>