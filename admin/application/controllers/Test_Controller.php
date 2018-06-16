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
                $this->load->model('Result_Model');
                $this->load->helper('download');
            }

            public function ViewTest(){
                if(!isset($_SESSION['Admin'])) {
                    $this->load->view('Index');
                } 
                else 
                {
                   $result['AllTests'] = $this->Test_Model->FetchAllTests();
                   $this->load->view('ViewTest',$result);
               }
           }



           public function AddTest(){
            if(!isset($_SESSION['Admin'])) {
                $this->load->view('Index');
            } 
            else 
            {
            	$result['AllStandards'] = $this->Student_Model->FetchAllStandards();
            	$this->load->view('AddTest',$result);
            }
        }

        public function DeleteTest($id)
        {
            if(!isset($_SESSION['Admin'])) {
                $this->load->view('Index');
            } 
            else 
            {
            	if (!empty($id)) {

                    $success = $this->Test_Model->DeleteTest($id);
                    $this->Result_Model->DeleteResult($id);
                    $_SESSION['DeleteTest'] = $success;
                    redirect('Test_Controller/ViewTest');
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
                $subjects = $this->Student_Model->FetchSubjects($id);
                foreach ($subjects as $subject) {
                    echo "<option value='".$subject->sub_name."'>".$subject->sub_name."</option>";
                }
            }
        }
        
        public function InsertTest(){
            if(!isset($_SESSION['Admin'])) {
                $this->load->view('Index');
            } 
            else 
            {
                if (isset($_POST['AddTest'])) {
                 
                    $chapter = $_POST['chapter'];
                    $Standard = $_POST['standard'];
                    $subject = $_POST['subject'];
                    $date = $_POST['date'];
                    $duration = $_POST['duration'];
                    $total_marks= $_POST['total_marks'];
                    $test_type = $_POST['test_type'];
                    $new_file_name = $chapter."_".$subject."_".$Standard."_".$date;

                    $_FILES['Topper']['name'] = $_FILES['ImageUpload']['name'];
                    // $_FILES['Topper']['type'] = $_FILES['ImageUpload']['type'];
                    $_FILES['Topper']['tmp_name'] = $_FILES['ImageUpload']['tmp_name'];
                    $_FILES['Topper']['error'] = $_FILES['ImageUpload']['error'];
                    $_FILES['Topper']['size'] = $_FILES['ImageUpload']['size'];
                    $uploadPath = 'panel/test/paper';
                    $config['upload_path'] = $uploadPath;
                    $config['allowed_types'] = 'jpg|png|jpeg|docx|doc|pdf';
                    $config['file_name'] = $new_file_name;
                   $config['max_size'] = '1000'; // 500 kb
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                if ($this->upload->do_upload('Topper')) {
                        $fileData = $this->upload->data();

                    $data = array('chapter' => $chapter, 'date' => $date,'standard_id' => $Standard, 'subject' => $subject, 'test_type' => $test_type, 'total_marks'=>$total_marks,'duration'=>$duration,'test_paper'=>$fileData['file_name']);
                    $success = $this->Test_Model->InsertTest($data);

                    if($success['code'] != '') {
                       $_SESSION["InsertTestData"] = $success['code'];
                   } else {
                    $_SESSION["InsertTestData"] = $success;
                    }
                    redirect("Test_Controller/ViewTest");
                }
                else{
                    $error = array('error' => $this->upload->display_errors());
                        $_SESSION['InsertTestData'] = $error['error'];
                        redirect('/Test_Controller/AddTest','refresh');
                }


            }
        }
    }


    public function Download_Paper($fileName){
            $data = file_get_contents(base_url('panel/test/paper/'.$fileName));
            force_download($fileName, $data);
            redirect ( base_url ('index.php/Test_Controller/ViewTest') );
            }
   
} 

?>