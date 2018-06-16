<?php

defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
if (!ini_get('date.timezone')) {
    date_default_timezone_set('GMT');
}

class Faculty_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Faculty_Model');
    }


    public function Staff_Login() {
        if (isset($_POST['email'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $flag = 0;
            $res = $this->Faculty_Model->StaffLogin();
            foreach ($res as $value) {
                if ($value->email == $email && $value->password == $password) {
                    $id = $value->faculty_id;
                    $facultyname = $value->faculty_name;
                    $flag = 1;
                    break;
                }
            }
            if ($flag == 1) {
                $_SESSION['isFacLoggedIn'] = '1';
                $_SESSION['facultyid'] = $id;
                $_SESSION['facultyname'] = $facultyname;
                redirect('Faculty_Controller/ViewResults');
            } else {
                $data = "Invalid Email Id and Password";
                $this->session->set_userdata('sent',$data);
                redirect('/welcome');
            }
        } else {
            redirect('/welcome');
        }
    }

     public function LogOut() {
        unset($_SESSION['facultyid']);
        unset($_SESSION['facultyname']);
        unset($_SESSION['isFacLoggedIn']);
        $data = "Session Logged Out.";
        $this->session->set_userdata('sent',$data);
        redirect('/welcome');
    }

		// Dashboard of Faculty

    public function ViewResults() {  
        if (isset($_SESSION['isFacLoggedIn']) && $_SESSION['isFacLoggedIn'] == 1) {
            $id = $_SESSION['facultyid'];
            $name = $_SESSION['facultyname'];
            $result['FacultyTeaches'] = $this->Faculty_Model->FacultyTeaches($id);
            //$result['AllTestSubjects']= $this->Faculty_Model->FetchTestSubjects($roll_no);
            //$result['AllTests']= $this->Faculty_Model->FetchStudentsAllTest($roll_no);
            $this->load->view('Faculty',$result);
        } else {
            redirect('/welcome');
        }
    }


    public function SearchResults(){

        if (isset($_SESSION['isFacLoggedIn']) && $_SESSION['isFacLoggedIn'] == 1) {
       $std_id = $this->input->post('standard');
       $subject = $this->input->post('subject');
       $standard = $this->input->post('standard_name');

       $this->session->set_userdata('standard',$standard); 
       $this->session->set_userdata('subject',$subject);
       $result['Students'] = $this->Faculty_Model->FetchStudents($std_id,$subject);
       $result['AllTests'] = $this->Faculty_Model->FetchAllTests($std_id,$subject);

       if(!empty($result['AllTests'])){
       foreach ($result['Students'] as $value) {
           
        $result['StudentResult_'.$value->stud_id] = $this->Faculty_Model->FetchResult($value->roll_no,$std_id,$subject);

       }
        $this->load->view('FacultyResult',$result);
   }else{
    $result['Students'] = '0';
    $result['AllTests'] = '0';      
    $this->load->view('FacultyResult',$result);      
    }
    }else
    redirect('/welcome');
}

    

    public function FetchSubjects() {
        $std_id = $this->input->post('id');
        $fac_id = $_SESSION['facultyid'];
        $all_subjects = $this->Faculty_Model->FacultyWiseSubjects($std_id,$fac_id);
        //print_r($subjects); die();
        if(!empty($all_subjects)) {
            foreach ($all_subjects as $subject) {
                $sub_array = explode(',',$subject->subjects);
                foreach ($sub_array as $sub) {
                    echo "<option value='".$sub."'>".$sub."</option>";
                }
                
            }
        } else {
            echo "<option value=''>No Subjects Found.</option>";;
        }

    }
    }
