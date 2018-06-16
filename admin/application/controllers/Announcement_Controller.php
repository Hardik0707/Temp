<?php
ob_start();
ini_set('display_errors','1');
error_reporting(E_ALL);
if( ! ini_get('date.timezone') )
{
    date_default_timezone_set('GMT');
}
defined('BASEPATH') OR exit('No direct script access allowed');

class Announcement_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Announcement_Model');
        $this->load->model('Student_Model');
    }

    public function ViewPublic()
    {
        if(!isset($_SESSION['Admin'])) {
            $this->load->view('Index');
        } 
        else 
        {
            $result['AllPublic'] = $this->Announcement_Model->FetchAllPublic();
            $this->load->view('public_announce_view', $result);
        }
    }

    public function ViewPrivate()
    {
        if(!isset($_SESSION['Admin'])) {
            $this->load->view('Index');
        } 
        else 
        {
            $result['AllPrivate'] = $this->Announcement_Model->FetchAllPrivate();
            $this->load->view('private_announce_view', $result);
        }
    }

    public function DeletePublic($id) {
        if(!isset($_SESSION['Admin'])) {
            $this->load->view('Index');
        } 
        else 
        {
            if (!empty($id)) {
                $success = $this->Announcement_Model->DeletePublic($id);
                $_SESSION['DeletePublic'] = $success;
                redirect('Announcement_Controller/ViewPublic');
            }
        }
    }

    public function DeletePrivate($id) {
        if(!isset($_SESSION['Admin'])) {
            $this->load->view('Index');
        } 
        else 
        {
            if (!empty($id)) {
                $success = $this->Announcement_Model->DeletePrivate($id);
                $_SESSION['DeletePrivate'] = $success;
                redirect('Announcement_Controller/ViewPrivate');
            }
        }
    }

    public function AddPublic() {
        if(!isset($_SESSION['Admin'])) {
            $this->load->view('Index');
        } 
        else 
        {
            $this->load->view('AddPublicAC');
        }
    }

    public function AddPrivate() {
        if(!isset($_SESSION['Admin'])) {
            $this->load->view('Index');
        } 
        else 
        {
            $result['AllStandards'] = $this->Student_Model->FetchAllStandards();
            $this->load->view('AddPrivateAC',$result);
        }
    }


    public function InsertPublic()
    {
        if(!isset($_SESSION['Admin'])) {
            $this->load->view('Index');
        } 
        else 
        {
            if(isset($_POST['AddPublic']))
            {
                $title = $_POST['title'];
                $description = $_POST['description'];
                $date = date("Y-m-d");
                $new_file_name = $title."_".time() . ".jpeg";

                if ($this->input->post('AddPublic') && !empty($_FILES['ImageUpload']['name'])) {
                    $uploadPath = 'panel/img/Announcement/Public/';
                    $config['upload_path'] = $uploadPath;
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['file_name'] = $new_file_name;
                    $config['max_size'] = '500'; 
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    
                if ($this->upload->do_upload('ImageUpload')){ 
                    
                    $fileData =$this->upload->data();
                    $data = array('date'=>$date, 'title' => $title, 'description' => $description, 'photo' => $fileData['file_name']);
                }

                else{
                    
                    $error = array('error' => $this->upload->display_errors());
                    $_SESSION['InsertPublicData'] = $error;
                    echo $this->upload->display_errors();
                    redirect("Announcement_Controller/ViewPublic");
                }

                }

                if ($this->input->post('AddPublic') && empty($_FILES['ImageUpload']['name'])){
                    $data = array('date'=>$date, 'title' => $title, 'description' => $description, 'photo' => 'NULL');

                }   

                if(!empty($data))   
                {   
                    $success = $this->Announcement_Model->InsertPublic($data);
                    $_SESSION['InsertPublicData'] = $success;
                    redirect("Announcement_Controller/ViewPublic");
                }
                }
            }
        }


    public function InsertPrivate()
    {
        if(!isset($_SESSION['Admin'])) {
            $this->load->view('Index');
        } 
        else 
        {
            if(isset($_POST['AddPrivate']))
            {

                $title = $_POST['title'];
                $description = $_POST['description'];
                $date = date("Y-m-d");
                $standard_id = $_POST['standard'];
                $subject=$_POST['subject'];

                print_r($_POST['student']);
                // exit(0);
                if($_POST['student']=="all")
                    $student="all";
                else
                $students = ','.implode(",",$_POST['student']).',';
                $new_file_name = $title."_".time() . ".jpeg";

                if ($this->input->post('AddPrivate') && !empty($_FILES['ImageUpload']['name'])) {
                    $uploadPath = 'panel/img/Announcement/Private/';
                    $config['upload_path'] = $uploadPath;
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['file_name'] = $new_file_name;
                    $config['max_size']	= '500'; 
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);


                if ($this->upload->do_upload('ImageUpload')){ 
    
                    $fileData =$this->upload->data();
                    $data = array('date'=>$date, 'title' => $title, 'description' => $description, 'photo' => $fileData['file_name'],'standard_id'=>$standard_id,'subject'=>$subject,'student_id'=>$students);
                }
                else{
                    $error = array('error' => $this->upload->display_errors());
                    echo $error;
                    $_SESSION['InsertPrivateData'] = $error;
                    redirect('Announcement_Controller/ViewPrivate');
                }	
                }
                   
                if ($this->input->post('AddPrivate') && empty($_FILES['ImageUpload']['name'])) {
                    $data = array('date'=>$date, 'title' => $title, 'description' => $description, 'photo' => 'NULL','standard_id'=>$standard_id,'subject'=>$subject,'student_id'=>$students);

                }  
                if(!empty($data))	
                {	
                    $success = $this->Announcement_Model->InsertPrivate($data);
                    
                   
                    $_SESSION['InsertPrivateData'] = $success;

                    redirect("Announcement_Controller/ViewPrivate");
                }
                }
        }
    }


    public function FetchSubjects() {
        if(!isset($_SESSION['Admin'])) {
            $this->load->view('Index');
        } 
        else 
        {
            $id = $this->input->post('id');
            $_SESSION['standard_id'] = $id;
            $subjects = $this->Student_Model->FetchSubjects($id);
            echo "<option value='all'>All</option>";
            foreach ($subjects as $subject) {
                echo "<option value='".$subject->sub_name."'>".$subject->sub_name."</option>";
//$result['subject_id'] = $subject->sub_id;
            }
        }
    }

    public function FetchStudents() {
        if(!isset($_SESSION['Admin'])) {
            $this->load->view('Index');
        } 
        else 
        {
            $sub = $this->input->post('id');
            $id = $_SESSION['standard_id'];
            
            $students = $this->Announcement_Model->FetchStudents($id,$sub);
            foreach ($students as $student) {
                echo "<option value='".$student->stud_id."'>".$student->stud_name."</option>";

            }

        }
    }




// Important Note: add unset($_SESSION['standard_id']); in InsertPrivate()
}
?>