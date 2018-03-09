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

     public function FetchAllPrivate() {
        $this->db->select('*');
        $result = $this->db->get('private_announcement');
        return $result->result();
    }


    public function FetchStudents($id,$sub) {
        $this->db->select('*');
        $array = array('standard_id' =>$id ,'subject LIKE' =>"%".$sub."%");
        // $this->db->where('standard_id',$id);
        // $this->db->where("subject LIKE ","%".$sub."%");
        
        $this->db->where($array);
        $result = $this->db->get('student_mst');
        return $result->result();
    }

} 
// End of Gallery_Model Class 
 ?>