<?php 

class Test_Model extends CI_Model { // Start of Test_Model class

	  function __construct() {
        parent::__construct();
    }

    public function FetchAllTests(){
    	$this->db->select('*');
        $result = $this->db->get('test');
        return $result->result();
    }

    public function InsertTest($data)
    {
    	if($this->db->insert('test', $data)) {
            return $success = 1;
        } else {
            return $error = $this->db->error();
            //return $error = $this->db->_error_number();
        }
    }
    public function DeleteTest($id)
    {
    	 $this->db->where('id', $id);
        return $this->db->delete('test');
    }

    public function FetchTest($id)
    {
        $this->db->select('*');
        $this->db->where('id',$id);
        $result = $this->db->get('test');
        return $result->result();
    }

    public function FetchStudents($standard_id,$subject)
    {
        $this->db->select('*')->from('student_mst');
        $array = array('student_mst.standard_id' =>$standard_id ,'student_mst.subject LIKE' =>"%".$subject."%");
        $this->db->where($array);
        $query=$this->db->get();
        return $query->result();
    }
}   