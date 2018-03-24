<?php
class Login_Model extends CI_Model
{
    function __construct() {
        parent::__construct();
    }
    public function AdminLogin(){
        $this->db->select('*');
        $result=$this->db->get('admin');
        return $result->result();
    }
    public function UpdateAdmin($data)
    {
    	$this->db->set('email',$data['email']);
    	$this->db->set('user_name',$data['user_name']);
    	$this->db->set('password',$data['password']);
    	$this->db->where('admin_id',$data['admin_id']);
    	$this->db->update('admin');
    }
}
?>  




