<?php
ob_start();
ini_set('display_errors','1');
error_reporting(E_ALL);
if( ! ini_get('date.timezone') )
{
    date_default_timezone_set('GMT');
}
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Test_Model');
        $this->load->model('Student_Model');
    }

    public function ViewTest(){
    	$result['AllTests'] = $this->Test_Model->FetchAllTests();
    	$this->load->view('ViewTest',$result);
    }



    public function AddTest(){
    	$result['AllStandards'] = $this->Student_Model->FetchAllStandards();
    	$this->load->view('AddTest',$result);
    }

    public function DeleteTest($id)
    {
    	if (!empty($id)) {
            $success = $this->Test_Model->DeleteTest($id);
            $_SESSION['DeleteTest'] = $success;
            redirect('Test_Controller/ViewTest');
        }
    }
    public function FetchSubjects() {
        $id = $this->input->post('id');
        $subjects = $this->Student_Model->FetchSubjects($id);
        foreach ($subjects as $subject) {
            echo "<option value='".$subject->sub_name."'>".$subject->sub_name."</option>";
           
        }
    }
   
   public function InsertTest(){
   	if (isset($_POST['AddTest'])) {
           
            $chapter = $_POST['chapter'];
            $Standard = $_POST['standard'];
            $subject = $_POST['subject'];
            $date = $_POST['date'];
            $duration = $_POST['duration'];
            $total_marks= $_POST['total_marks'];
            $test_type = $_POST['test_type'];

            $data = array('chapter' => $chapter, 'date' => $date,'standard_id' => $Standard, 'subject' => $subject, 'test_type' => $test_type, 'total_marks'=>$total_marks,'duration'=>$duration);

            $success = $this->Test_Model->InsertTest($data);
                if($success['code'] != '') {
                     $_SESSION["InsertTestData"] = $success['code'];
                 } else {
                    $_SESSION["InsertTestData"] = $success;
                 }

                redirect("Test_Controller/AddTest");
            }
   }
} 