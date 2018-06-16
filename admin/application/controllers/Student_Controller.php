                    <?php
                    ob_start();
                    if( ! ini_get('date.timezone') )
                    {
                        date_default_timezone_set('GMT');
                    }

                    defined('BASEPATH') OR exit('No direct script access allowed');

                    class Student_Controller extends CI_Controller {

                        function __construct() {
                            parent::__construct();
                            $this->load->model('Student_Model');
                            $this->load->library('excel');
                            $this->load->library('form_validation');
                        }

                        public function UpdateStudentData() {
                            if(!isset($_SESSION['Admin'])) {
                                $this->load->view('Index');
                            } 
                            else 
                            {

                                if (isset($_POST['AddStudent'])) {
                                    $id = $_POST['sid'];
                                    $Rno = $_POST['Rno'];
                                    $SName = $_POST['SName'];
                                    $SchoolName = $_POST['SchoolName'];
                                    $Branch = $_POST['Branch'];
                                    $Standard = $_POST['Standard'];
                                    $subject = implode(",", $_POST['subject']);
                                    $Email = $_POST['Email'];
                                    $Password = $_POST['Password'];
                                    $gender = $_POST['gender'];
                                    $contact = $_POST['contact'];
                                    $new_file_name = $SName."_".time() . ".jpeg";



                                    $result = $this->Student_Model->FetchAllStudents();
                                    foreach ($result as $value) {
                                        if ($value->email_id == $Email && $id!=$value->stud_id)
                                        {
                                            $msg = 'Email Id already Exist';
                                            $this->session->set_userdata('msg',$msg);
                                            redirect('/Student_Controller/EditStudent/'.$id);
                                            exit;

                                        }
                                        else if($value->roll_no == $Rno && $value->standard_id==$Standard && $id!=$value->stud_id)
                                        {
                                            $msg = 'Roll Number already Exist';
                                            $this->session->set_userdata('msg',$msg);
                                            redirect('/Student_Controller/EditStudent/'.$id);
                                            exit;
                                        }
                                    }


                                                                            /*             * *****************************************image*************************************** */
                                    if ($this->input->post('AddStudent') && !empty($_FILES['ImageUpload']['name'])) {
                                        $_FILES['Topper']['name'] = $_FILES['ImageUpload']['name'];
                                        $_FILES['Topper']['type'] = $_FILES['ImageUpload']['type'];
                                        $_FILES['Topper']['tmp_name'] = $_FILES['ImageUpload']['tmp_name'];
                                        $_FILES['Topper']['error'] = $_FILES['ImageUpload']['error'];
                                        $_FILES['Topper']['size'] = $_FILES['ImageUpload']['size'];
                                        $uploadPath = 'panel/img/student';
                                        $config['upload_path'] = $uploadPath;
                                        $config['allowed_types'] = 'gif|jpg|png|jpeg';
                                        $config['file_name'] = $new_file_name;
                    $config['max_size']	= '500'; // 500 kb
                    //$config['max_width'] = '1024';
                    //$config['max_height'] = '768';
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if ($this->upload->do_upload('Topper')) {
                        $fileData = $this->upload->data();

                        $data = array('roll_no' => $Rno, 'stud_name' => $SName, 'school_name' => $SchoolName, 'branch_id' => $Branch, 'standard_id' => $Standard, 'subject' => $subject, 'email_id' => $Email, 'password' => $Password, 'photo' => $fileData['file_name'], 'contact_no' => $contact, 'gender' => $gender);
                    }
                    if (!empty($data)) {
                        $success = $this->Student_Model->updatestudent($id, $data);
                        $_SESSION["UpdateStudentData"] = $success;
                        redirect("Student_Controller/ViewStudent");
                    }
                } else {
                    $data = array('roll_no' => $Rno, 'stud_name' => $SName, 'school_name' => $SchoolName, 'branch_id' => $Branch, 'standard_id' => $Standard, 'subject' => $subject, 'email_id' => $Email, 'password' => $Password, 'contact_no' => $contact, 'gender' => $gender);
                    $success = $this->Student_Model->updatestudent($id, $data);
                    $_SESSION["UpdateStudentData"] = $success;
                    redirect("Student_Controller/ViewStudent");
                }
                /*             * *****************************************image*************************************** */
            }
        }
    }

    public function EditStudent($id) {
        if(!isset($_SESSION['Admin'])) {
            $this->load->view('Index');
        } 
        else 
        {
            $result['AllStandards'] = $this->Student_Model->FetchAllStandards();
            $result['AllBranches'] = $this->Student_Model->FetchAllBranches();

            $result['StudentDetails'] = $this->Student_Model->FetchStudentData($id);
            foreach($result['StudentDetails'] as $student) {
                $result['AllSubjects'] = $this->Student_Model->FetchSubjects($student->standard_id);
            }
            $this->load->view('AddStudent', $result);
        }
    }

    public function Deletestudent($id) {
        if(!isset($_SESSION['Admin'])) {
            $this->load->view('Index');
        } 
        else 
        {
            if (!empty($id)) {
                $succes = $this->Student_Model->Deletestudent($id);
                $_SESSION['Deletestudent'] = $succes;
                redirect('Student_Controller/ViewStudent');
            }
        }
    }

    public function ViewStudent() {
        if(!isset($_SESSION['Admin'])) {
            $this->load->view('Index');
        } 
        else 
        {
            $result['AllStudents'] = $this->Student_Model->FetchAllStudents();
            $this->load->view('ViewStudent', $result);
        }
    }

    public function DownloadList()
    {
        if(!isset($_SESSION['Admin'])) {
            $this->load->view('Index');
        } 
        else 
        {
            $object = new PHPExcel();
              $object->setActiveSheetIndex(0);
              
              $student= $this->Student_Model->FetchAllStudents();
              $ColumnName = array('Student Name','Roll Number','Gender','School Name','Branch Name','Standard','subjects','email','Contact No.');
                $col = 0;

                foreach ($ColumnName as $value) {
                $object->getActiveSheet()->setCellValueByColumnAndRow($col,1,$value);
                $col++;
            }

            $row=2;
            foreach ($student as $value) {   
               $object->getActiveSheet()->setCellValueByColumnAndRow(0,$row,$value->stud_name);
               $object->getActiveSheet()->setCellValueByColumnAndRow(1,$row,$value->roll_no);
               $object->getActiveSheet()->setCellValueByColumnAndRow(2,$row,$value->gender);
               $object->getActiveSheet()->setCellValueByColumnAndRow(3,$row,$value->school_name);
               $object->getActiveSheet()->setCellValueByColumnAndRow(4,$row,$value->branch_area);
               $object->getActiveSheet()->setCellValueByColumnAndRow(5,$row,$value->standard);
               $object->getActiveSheet()->setCellValueByColumnAndRow(6,$row,$value->subject);
               $object->getActiveSheet()->setCellValueByColumnAndRow(7,$row,$value->email_id);
               $object->getActiveSheet()->setCellValueByColumnAndRow(8,$row,$value->contact_no);
               $row++;
           }

           $object_writer = PHPExcel_IOFactory::createWriter($object, 'CSV');
           header('Content-Type: application/vnd.ms-excel');
           header("Content-Disposition: attachment;filename='Student.csv'");
           $object_writer->save('php://output');
        }
    }
    public function AddStudent() {
        if(!isset($_SESSION['Admin'])) {
            $this->load->view('Index');
        } 
        else 
        {
            $result['AllStandards'] = $this->Student_Model->FetchAllStandards();
            $result['AllBranches'] = $this->Student_Model->FetchAllBranches();
            $this->load->view('AddStudent', $result);
        }
    }

    public function FetchSubjects() {
        if(!isset($_SESSION['Admin'])) {
            $this->load->view('Index');
        } 
        else 
        {
            $id = $this->input->post('id');
            $subjects = $this->Student_Model->FetchSubjects($id);
            foreach ($subjects as $subject) {
                echo "<option value='".$subject->sub_name."'>".$subject->sub_name."</option>";
                    //$result['subject_id'] = $subject->sub_id;
            }
        }
    }

    public function InsertStudentData() {
        if(!isset($_SESSION['Admin'])) {
            $this->load->view('Index');
        } 
        else 
        {
            if (isset($_POST['AddStudent'])) {
                $Rno = $_POST['Rno'];
                $SName = $_POST['SName'];
                $SchoolName = $_POST['SchoolName'];
                $Branch = $_POST['Branch'];
                $Standard = $_POST['Standard'];
                $subject = implode(",", $_POST['subject']);
                $Email = $_POST['Email'];
                $Password = $_POST['Password'];
                $gender = $_POST['gender'];
                $contact = $_POST['contact'];
                $new_file_name = $SName."_".time() . ".jpeg";

                $result = $this->Student_Model->FetchAllStudents();
                                    foreach ($result as $value) {
                                        if ($value->email_id == $Email)
                                        {
                                            $msg = 'Email Id already Exist';
                                            $this->session->set_userdata('msg',$msg);
                                            redirect('/Student_Controller/AddStudent');
                                            exit;

                                        }
                                        else if($value->roll_no == $Rno && $value->standard_id==$Standard)
                                        {
                                            $msg = 'Roll Number already Exist';
                                            $this->session->set_userdata('msg',$msg);
                                            redirect('/Student_Controller/AddStudent');
                                            exit;
                                        }
                                    }
                /************************************************imageuploadin****************************** */
                if ($this->input->post('AddStudent') && !empty($_FILES['ImageUpload']['name'])) {
                    $_FILES['Topper']['name'] = $_FILES['ImageUpload']['name'];
                    $_FILES['Topper']['type'] = $_FILES['ImageUpload']['type'];
                    $_FILES['Topper']['tmp_name'] = $_FILES['ImageUpload']['tmp_name'];
                    $_FILES['Topper']['error'] = $_FILES['ImageUpload']['error'];
                    $_FILES['Topper']['size'] = $_FILES['ImageUpload']['size'];
                    $uploadPath = 'panel/img/student';
                    $config['upload_path'] = $uploadPath;
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['file_name'] = $new_file_name;
                    $config['max_size']	= '500'; //500 Kb
                    //$config['max_width'] = '1024';
                    //$config['max_height'] = '768';
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if ($this->upload->do_upload('Topper')) {
                        $fileData = $this->upload->data();
                        $data = array('roll_no' => $Rno, 'stud_name' => $SName, 'school_name' => $SchoolName, 'branch_id' => $Branch, 'standard_id' => $Standard, 'subject' => $subject, 'email_id' => $Email, 'password' => $Password, 'photo' => $fileData['file_name'], 'contact_no' => $contact, 'gender' => $gender);
                    }

                    if (!empty($data)) {
                        $success = $this->Student_Model->insertsubject($data);
                        $_SESSION["InsertStudentData"] = $success;
                        redirect("Student_Controller/ViewStudent");
                    }

                } else {
                    $data = array('roll_no' => $Rno, 'stud_name' => $SName, 'school_name' => $SchoolName, 'branch_id' => $Branch, 'standard_id' => $Standard, 'subject' => $subject, 'email_id' => $Email, 'password' => $Password, 'contact_no' => $contact, 'gender' => $gender);
                    $success = $this->Student_Model->insertsubject($data);
                    if($success['code'] != '') {
                        $_SESSION["InsertStudentData"] = $success['code'];
                    } else {
                        $_SESSION["InsertStudentData"] = $success;
                    }

                    redirect("Student_Controller/ViewStudent");
                }
            }
        }
    }
}
?>