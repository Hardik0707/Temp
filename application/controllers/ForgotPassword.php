<?php

defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
if (!ini_get('date.timezone')) {
    date_default_timezone_set('GMT');
}
class ForgotPassword extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Student_Model');
        $this->load->model('Faculty_Model');
        $this->load->library('email');
    }

	    public function user() {
    		$email = $this->input->post('email');
    		$user=$this->input->post('user');
        	$flag = 0;
    		$data = array(0,0,0);
    		if($user=='faculty')
    		{
            $result = $this->Faculty_Model->StaffLogin();
            foreach ($result as $value) {
                if ($value->email == $email) {
                	$name = $value->faculty_name;
                	$id= $value->faculty_id;
					$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    				$password = substr( str_shuffle( $chars ), 0, 8 );
                    $flag=1;
                    break;
                }   
            }
                if($flag==1)
                $success = $this->Faculty_Model->UpdatePassword($id,$password);
    		}
    		elseif ($user=='student') {
    			
    			$result = $this->Student_Model->StudentLogin();
            		foreach ($result as $value) {
                		if ($value->email_id == $email) {
                				$name = $value->stud_name;
                				$id= $value->stud_id;
								$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    							$password = substr( str_shuffle( $chars ), 0, 8 );
                                $flag =1; 
                    		break;
                }   
            }
                if($flag==1)
                $success = $this->Student_Model->UpdatePassword($id,$password);
                // echo $success;
    		}


    		if(isset($success)){
    			$result = $this->email
    		->from('Venomenous.viper@gmail.com','JD Tutorials')   // Optional, an account where a human being reads.
    		->to($email,'JD Tutorials')
    		->subject('Forgot Password of '.$user)
    		->message('Dear <b>'.$name.'<b>,<br>Your New Password is '.$password)
    		->send();
            $data = "Password has been sent to your registerd Email-ID";
    		$this->session->set_userdata('sent',$data);
			$success=$this->email->print_debugger();
            }   
            else if($flag == 0)
            {   
                $data = "We are unable to find Username";
                $this->session->set_userdata('sent',$data);
            }
            else{
                $data = "Unable to send password. Please try again after sometime";
                $this->session->set_userdata('sent',$data);
            }
			redirect('/welcome');
			
			// echo "<script type='text/javascript'>alert('hello');</script>";
		}

}
?>