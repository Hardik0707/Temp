    <?php
    ob_start();
    if( ! ini_get('date.timezone') )
    {
        date_default_timezone_set('GMT');
    }
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Subject_Controller extends CI_Controller {

        function __construct() {
            parent::__construct();
            $this->load->model('Subject_Model');
            $this->load->model('Student_Model');

        }
        public function DeleteSubject($sub_id, $std_id){
            if(!isset($_SESSION['Admin'])) {
                $this->load->view('Index');
            } 
            else 
            {
                $success=$this->Subject_Model->DeleteSubject($sub_id);
                $_SESSION['SubjectDeleted']=$success;
                $_SESSION['StandardId']= $std_id;
                redirect('Subject_Controller/ViewSubject');
            }
        }
        public function AddSubject() {
            if(!isset($_SESSION['Admin'])) {
                $this->load->view('Index');
            } 
            else 
            {
                $result['AllStandards'] = $this->Student_Model->FetchAllStandards();
                $this->load->view('AddSubject',$result);
            }
        }

        public function ViewSubject() {
            if(!isset($_SESSION['Admin'])) {
                $this->load->view('Index');
            } 
            else 
            {
                $standards=$this->Subject_Model->FetchAllStandards();
                foreach($standards as $standard) {
                    $result['s_'.$standard->standard_id]=$this->Subject_Model->FetchSubjects($standard->standard_id);
                }
                $result['AllStandards'] = $standards;
                $this->load->view('ViewSubject',$result);
            }
        }

        public function InsertSubject() {
            if(!isset($_SESSION['Admin'])) {
                $this->load->view('Index');
            } 
            else 
            {
                if(isset($_POST['SubjectName'])) {
                    $standard = $_POST['Standard'];
                    $subject = $_POST['SubjectName'];
                    $data = array('sub_name' => $subject, 'standard_id' => $standard);
                    $_SESSION['StandardId']= $_POST['Standard'];

                    $check = $this->Subject_Model->FetchAllSubject();
                    foreach ($check as $value) {
                    if($value->standard_id == $standard && $value->sub_name== $subject)
                    {
                        $_SESSION['SubjectAdded']="Subject Already present";
                        redirect('Subject_Controller/ViewSubject');
                        exit;
                    }
                }
                    $success = $this->Subject_Model->InsertSubject($data);
                    $_SESSION['SubjectAdded']= $success;
                    redirect('Subject_Controller/ViewSubject');
                }
            }
        }
        public function EditSubject($id){
            if(!isset($_SESSION['Admin'])) {
                $this->load->view('Index');
            } 
            else 
            {
              $result['res']=  $this->Subject_Model->FetchOneSubject($id);
              $this->load->view('EditSubject',$result);
          }
      }
      public function UpdateSubject(){
        if(!isset($_SESSION['Admin'])) {
            $this->load->view('Index');
        } 
        else 
        {
            if(isset($_POST['UpdateSubject'])){
                $subid=$_POST['subid'];
                $stdid = $_POST['stdid'];
                $subject=$_POST['SubjectName'];
                $data=array('sub_name'=>$subject);
                $check = $this->Subject_Model->FetchAllSubject();
                print_r($check);
                $_SESSION['StandardId']= $_POST['stdid'];
                    foreach ($check as $value) {

                    if($value->standard_id == $stdid && $value->sub_name==$subject && $value->sub_id!= $subid)
                    {
                        $_SESSION['SubjectUpdated']="Subject Already present";
                        redirect('Subject_Controller/ViewSubject');
                        exit;
                    }
                }
                $success=$this->Subject_Model->updatesubject($subid,$data);
                $_SESSION['SubjectUpdated']=$success;
                redirect('Subject_Controller/ViewSubject');
            }
        }
    }
}

?>
