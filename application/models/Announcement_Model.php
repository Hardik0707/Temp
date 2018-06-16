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

    public function fetchAllPrivate($id,$standard_id,$subject){
    	
        $result = $this->db->query("SELECT * FROM private_announcement where (standard_id=".$standard_id." OR standard_id=0) AND ((subject IN".$subject." AND (student_id='all' OR student_id LIKE '%,".$id.",%')) OR subject='all')");
        //print_r($result->result_array());
        
    	return $result->result();
    }

    public function FetchTopPublic(){
        $result = $this->db->query("SELECT * FROM public_announcement ORDER BY id DESC LIMIT 3");
        return $result->result();
    
    }
}