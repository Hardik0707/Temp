<?php

defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
if (!ini_get('date.timezone')) {
	date_default_timezone_set('GMT');
}

class Student_Controller extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Student_Model');
	}

	public function LogOut() {
		unset($_SESSION['studentid']);
		unset($_SESSION['roll_no']);
		unset($_SESSION['isLoggedIn']);
		$data = "Session Logged Out.";
        $this->session->set_userdata('sent',$data);
		redirect('/welcome');
	}

	public function Student() {
		if (isset($_POST['email'])) {
			$email = $_POST['email'];
			$password = $_POST['password'];
			$flag = 0;
			$res = $this->Student_Model->StudentLogin();
			foreach ($res as $value) {
				if ($value->email_id == $email && $value->password == $password) {
					$id = $value->stud_id;
					$roll_no = $value->roll_no;
					$student_name = $value->stud_name;
					$student_photo = $value->photo;
					$standard_id = $value->standard_id;
					$subject = $value->subject;
					$flag = 1;
					break;
				}
			}
			if ($flag == 1) {
				$_SESSION['isLoggedIn'] = '1';
				$_SESSION['studentid'] = $id;
				$_SESSION['stud_name'] = $student_name;
				$_SESSION['roll_no'] = $roll_no;
				$_SESSION['standard_id'] = $standard_id;
				$_SESSION['subject']=$subject;
				redirect('Student_Controller/ViewResults');
			} else {
				$data = "Invalid Email Id and Password";
                $this->session->set_userdata('sent',$data);
				redirect('/welcome');
			}

		}

	}

	public function ViewResults(){
		if(isset($_SESSION['studentid']) && $_SESSION['isLoggedIn']=='1')
		{
		$roll_no = $_SESSION['roll_no'];
		$standard_id = $_SESSION['standard_id'];
		$this->load->model('Result_Model');
        $result['StudentDetails'] = $this->Result_Model->FetchStudentDetails($roll_no,$standard_id);

        $result['AllTests'] = $this->Result_Model->FetchStudentsAllTest($roll_no,$standard_id);
        $result['AllTestSubjects'] = $this->Result_Model->FetchTestSubjects($roll_no,$standard_id);
        $result['get_max'] = $this->Result_Model->FetchMax($standard_id);
        
        // print_r($result['get_max']);
        // exit(0);
        $this->load->view('Student_Dashboard',$result);
    	}
    	else{
    		redirect('/welcome','2');
    	}
	}
	
	}
