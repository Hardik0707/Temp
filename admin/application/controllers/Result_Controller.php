<?php
ob_start();
if( ! ini_get('date.timezone') ) {
    date_default_timezone_set('GMT');
}

defined('BASEPATH') OR exit('No direct script access allowed');

class Result_Controller extends CI_Controller {

	public function TestResult($roll) {
        $this->load->model('Result_Model');
        $result['StudentDetails'] = $this->Result_Model->FetchStudentDetails($roll);
        $result['AllTests'] = $this->Result_Model->FetchStudentsAllTest($roll);
        $result['AllTestSubjects'] = $this->Result_Model->FetchTestSubjects($roll);
        //print_r($result['AllTests']); die();
        $this->load->view('TestResult',$result);
    }

    public function ViewResult() {
        $this->load->model('Result_Model');
        $result['AllStudents'] = $this->Result_Model->FetchAllStudents();
        foreach($result['AllStudents'] as $student) {
    
            $result['t_'.$student->stud_id] = $this->Result_Model->FetchResult($student->roll_no);
            //print_r($result['t_'.$student->stud_id]);
            //die();
        }
        $this->load->view('ViewResult', $result);
    }

 //    public function ViewTests() {
 //        $result['AllTests'] = $this->Result_Model->FetchAllTests();
 //        foreach($result['AllStudents'] as $student) {
 //            $result['t_'.$student->stud_id] = $this->Result_Model->FetchResult($student->roll_no);
 //            //print_r($result['t_'.$student->stud_id]);
 //            //die();
 //        }
 //        $this->load->view('ViewResult', $result);
 //    }

 //    public function FetchSubjects() {
 //        $id = $this->input->post('id');
 //        $subjects = $this->Result_Model->FetchSubjects($id);
 //        foreach ($subjects as $subject) {
 //            echo "<option value='".$subject->sub_name."'>".$subject->sub_name."</option>";
 //            //$result['subject_id'] = $subject->sub_id;
 //        }
 //    }

 //    public function FetchTests() {
 //        $id = $this->input->post('id');
 //        $tests = $this->Result_Model->FetchAllTestsWithStandards($id);
 //        if(!empty($tests)) {
 //            echo "<option value=''>Select Test</option>";
 //            foreach ($tests as $test) {
 //                echo "<option value='".$test->test_id."'>".$test->test_name."</option>";
 //                //$result['subject_id'] = $subject->sub_id;
 //            }
 //        } else {
 //            echo "<option value=''>No Tests for selected standard</option>";
 //        }
 //        //print_r($tests); die();

 //    }

    // public function InsertResult() {
    //     if (isset($_POST['AddResults'])) {
    //         //print_r($_POST);
    //         //print_r($_FILES);
    //         $new_test_name = $_POST['NewTestName'];
    //         $existing_test = $_POST['ExistingTest'];
    //         $standard = $_POST['Standard'];
    //         $subject = $_POST['Subject'];
    //         $file_name= '';
    //         $extension = '';

    //         if(isset($_POST['NewTestName']) && !empty($_POST['NewTestName'])) {
    //             $testData = array('test_name'=>$new_test_name);
    //             $testDetails = $this->Result_Model->InsertTest($testData);
    //         } else {
    //             $testDetails = $existing_test;
    //         }

    //         if(isset($_POST['ExistingTest']) && !empty($_POST['ExistingTest'])) {
    //             $result = $this->Result_Model->CheckResultData($existing_test,$subject);
    //             if($result > 0) {
    //                 $result['Updated'] = $this->Result_Model->DeleteExistingResults($existing_test,$subject);
    //             }
    //         }

    //         if ($this->input->post('AddResults') && !empty($_FILES['MarksExcelUpload']['name'])) {
    //             $_FILES['Excel']['name'] = $_FILES['MarksExcelUpload']['name'];
    //             $_FILES['Excel']['type'] = $_FILES['MarksExcelUpload']['type'];
    //             $_FILES['Excel']['tmp_name'] = $_FILES['MarksExcelUpload']['tmp_name'];
    //             $_FILES['Excel']['error'] = $_FILES['MarksExcelUpload']['error'];
    //             $_FILES['Excel']['size'] = $_FILES['MarksExcelUpload']['size'];
    //             $uploadPath = 'panel/results/';
    //             $config['upload_path'] = $uploadPath;
    //             $config['allowed_types'] = 'xls|xlsx';
    //             //$new_file_name = $test_name."_".$standard."_".$subject."_".time()."xlsx";
    //             //$config['file_name'] = $new_file_name;

    //             $this->load->library('upload', $config);
    //             $this->upload->initialize($config);
    //             if ($this->upload->do_upload('Excel')) {
    //                 $fileData = $this->upload->data();
    //                 $file_path=$fileData['full_path']; //uploaded file path
    //                 chmod($file_path,0777); //change permissions
    //             } else {
    //                 $error = array('error' => $this->upload->display_errors());
    //                 $this->load->view('AddResult', $error);
    //             }

    //             $objReader= PHPExcel_IOFactory::createReader('Excel2007');	// For excel 2007
    //             //Set to read only
    //             $objReader->setReadDataOnly(true);
    //             //Load excel file
    //             $objPHPExcel=$objReader->load($file_path);
    //             $totalrows=$objPHPExcel->setActiveSheetIndex(0)->getHighestRow();   //Count Numbe of rows avalable in excel
    //             $objWorksheet=$objPHPExcel->setActiveSheetIndex(0);
    //                 //loop from first data untill last data
    //                 for($i=2;$i<=$totalrows;$i++)
    //                 {
    //                     $RollNo= $objWorksheet->getCellByColumnAndRow(0,$i)->getValue();
    //                     $Marks= $objWorksheet->getCellByColumnAndRow(1,$i)->getValue(); //Excel Column 1
    //                     echo $RollNo;
    //                     echo $Marks;
    //                     $resultData=array('roll_no'=>$RollNo, 'test_id'=>$testDetails, 'standard_id'=>$standard ,'subject'=>$subject ,'marks'=>$Marks);
    //                     $success = $this->Result_Model->InsertResultData($resultData);
    //                 }
    //                 unlink($file_path); //File Deleted After uploading in database .

    //                 if($result['Updated'] != '' ) {
    //                     $_SESSION["ResultsUpdated"] = $success;
    //                 } else {
    //                     $_SESSION["ResultsAdded"] = $success;
    //                 }

    //                 redirect("Result_Controller/ViewResult");
    //         }
    //     }
    // }
// ================================================================================

    public function AddTestResult(){
       // $this->$this->load->library('form_validation');
        $this->load->model('Test_Model');
        $result['AllTests'] = $this->Test_Model->FetchAllTests();
        $this->load->view('AddTestResult',$result);
    }
    public function DownloadTemplate($id){

      $this->load->model("Test_Model");
      $this->load->library("excel");
      $object = new PHPExcel();

      $object->setActiveSheetIndex(0);
      $result= $this->Test_Model->FetchTest($id);

      foreach ($result as $value) {

        $object->getActiveSheet()->setCellValueByColumnAndRow(0, 1,"Test ID:");
        $object->getActiveSheet()->setCellValueByColumnAndRow(0, 2,"Date:");       
        $object->getActiveSheet()->setCellValueByColumnAndRow(0, 3,"Standard:");
        $object->getActiveSheet()->setCellValueByColumnAndRow(0, 4,"Test Type");

        $object->getActiveSheet()->setCellValueByColumnAndRow(1, 1,$value->id);
        $object->getActiveSheet()->setCellValueByColumnAndRow(1, 2,$value->date);       
        $object->getActiveSheet()->setCellValueByColumnAndRow(1, 3,$value->standard_id);
        $object->getActiveSheet()->setCellValueByColumnAndRow(1, 4,$value->test_type);

        $object->getActiveSheet()->setCellValueByColumnAndRow(3, 1,"Subject:");
        $object->getActiveSheet()->setCellValueByColumnAndRow(3, 2,"Chapter Name:");
        $object->getActiveSheet()->setCellValueByColumnAndRow(3, 3,"Total Marks:");
        $object->getActiveSheet()->setCellValueByColumnAndRow(3, 4,"Duration"); 

        $object->getActiveSheet()->setCellValueByColumnAndRow(4, 1,$value->subject);
        $object->getActiveSheet()->setCellValueByColumnAndRow(4, 2,$value->chapter);       
        $object->getActiveSheet()->setCellValueByColumnAndRow(4, 3,$value->total_marks);
        $object->getActiveSheet()->setCellValueByColumnAndRow(4, 4,$value->duration);

        $standard_id = $value->standard_id;
        $subject = $value->subject;
    }
        // End of Excel Headers

    // Column Headers 
    $ColumnName = array('Student Name','Roll Number','Marks Obtained');
    $col = 0;
    foreach ($ColumnName as $value) {
        $object->getActiveSheet()->setCellValueByColumnAndRow($col,6,$value);
        $col++;
    }

    $studDetails = $this->Test_Model->FetchStudents($standard_id,$subject);
    // $studDetails = $this->Test_Model->FetchStudents();
    $row=7;
    foreach ($studDetails as $value) {   
       //$object->getActiveSheet()->setCellValueByColumnAndRow(,$row,$value->stud_id);
     $object->getActiveSheet()->setCellValueByColumnAndRow(0,$row,$value->stud_name);
     $object->getActiveSheet()->setCellValueByColumnAndRow(1,$row,$value->roll_no);
     $row++;
 }

 $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
 header('Content-Type: application/vnd.ms-excel');
 header('Content-Disposition: attachment;filename="Employee Data.xls"');
 $object_writer->save('php://output');

} 


public function DownloadResult($id){

  $this->load->model("Test_Model");
     // $this->load->model("Result_Model");
  $this->load->library("excel");
  $object = new PHPExcel();

  $object->setActiveSheetIndex(0);
  $result= $this->Test_Model->FetchTest($id);

  foreach ($result as $value) {

    $object->getActiveSheet()->setCellValueByColumnAndRow(0, 1,"Test ID:");
    $object->getActiveSheet()->setCellValueByColumnAndRow(0, 2,"Date:");       
    $object->getActiveSheet()->setCellValueByColumnAndRow(0, 3,"Standard:");
    $object->getActiveSheet()->setCellValueByColumnAndRow(0, 4,"Test Type");

    $object->getActiveSheet()->setCellValueByColumnAndRow(1, 1,$value->id);
    $object->getActiveSheet()->setCellValueByColumnAndRow(1, 2,$value->date);       
    $object->getActiveSheet()->setCellValueByColumnAndRow(1, 3,$value->standard_id);
    $object->getActiveSheet()->setCellValueByColumnAndRow(1, 4,$value->test_type);

    $object->getActiveSheet()->setCellValueByColumnAndRow(3, 1,"Subject:");
    $object->getActiveSheet()->setCellValueByColumnAndRow(3, 2,"Chapter Name:");
    $object->getActiveSheet()->setCellValueByColumnAndRow(3, 3,"Total Marks:");
    $object->getActiveSheet()->setCellValueByColumnAndRow(3, 4,"Duration"); 

    $object->getActiveSheet()->setCellValueByColumnAndRow(4, 1,$value->subject);
    $object->getActiveSheet()->setCellValueByColumnAndRow(4, 2,$value->chapter);       
    $object->getActiveSheet()->setCellValueByColumnAndRow(4, 3,$value->total_marks);
    $object->getActiveSheet()->setCellValueByColumnAndRow(4, 4,$value->duration);

    $standard_id = $value->standard_id;
    $subject = $value->subject;
}
        // End of Excel Headers

    // Column Headers 
$ColumnName = array('Student Name','Roll Number','Marks Obtained');
$col = 0;
foreach ($ColumnName as $value) {
    $object->getActiveSheet()->setCellValueByColumnAndRow($col,6,$value);
    $col++;
}

$studDetails = $this->Test_Model->FetchStudents($standard_id,$subject);

$row=7;
foreach ($studDetails as $value) {   
       
 $object->getActiveSheet()->setCellValueByColumnAndRow(0,$row,$value->stud_name);
 $object->getActiveSheet()->setCellValueByColumnAndRow(1,$row,$value->roll_no);   
       
 $row++;
}

$row = 7;
$marks_obtained = $this->Test_Model->FetchMarks($id);

foreach ($marks_obtained as $value ) {

 if($value->marks != 'N/A'){
     $mark = explode('/', $value->marks);
     $object->getActiveSheet()->setCellValueByColumnAndRow(2,$row,$mark[0]);
 }else{
    $object->getActiveSheet()->setCellValueByColumnAndRow(2,$row,$value->marks);
}
$row++;
}

$object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Update.xls"');
$object_writer->save('php://output');


} 

public function InsertTest($id,$total_marks,$standard_id,$subject)
{
    $this->load->library('excel');//load PHPExcel library 
    $this->load->library('form_validation');
    $this->load->model('Result_Model');
    $this->load->model('Test_Model');
    $configUpload['upload_path'] = FCPATH.'uploads\\';
    $configUpload['allowed_types'] = 'xls|xlsx|csv';
    $configUpload['max_size'] = '5000';
    $this->load->library('upload', $configUpload);
    $this->upload->do_upload('userfile');  
         $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
          $file_name = $upload_data['file_name']; //uploded file name
        $extension=$upload_data['file_ext'];    // uploded file extension

        echo $file_name;
//$objReader =PHPExcel_IOFactory::createReader('Excel5');     //For excel 2003 
 $objReader= PHPExcel_IOFactory::createReader('Excel5'); // For excel 2007     
          //Set to read only
 $objReader->setReadDataOnly(true);          
        //Load excel file
 $objPHPExcel=$objReader->load(FCPATH.'uploads\\'.$file_name);      
         $totalrows=$objPHPExcel->setActiveSheetIndex(0)->getHighestRow();   //Count Numbe of rows avalable in excel         
         $objWorksheet=$objPHPExcel->setActiveSheetIndex(0);                


    // Fetch Test ID from the Excel file and Match With Table ID
         $excel_id= $objWorksheet->getCellByColumnAndRow(1,1)->getValue();


         if ($id != $excel_id) {
        // display error message 
           redirect(base_url() . "index.php/");
           exit(0);
       }

    //loop from first data untill last data
       for($i=7;$i<=$totalrows;$i++)
       {
            // $stud_id= $objWorksheet->getCellByColumnAndRow(0,$i)->getValue();            
            $stud_name= $objWorksheet->getCellByColumnAndRow(0,$i)->getValue(); //Excel Column 1
            $roll_no = $objWorksheet->getCellByColumnAndRow(1,$i)->getValue();
            $marks = $objWorksheet->getCellByColumnAndRow(2,$i)->getValue();

            if($marks >= $total_marks && $marks !='N/A') 
            {
                // display error message
                exit(0);
            }
            else
            { 
                if($marks !='N/A')
                {   
                    $marks = $marks.'/'.$total_marks;
                }       
                $data_user=array('roll_no'=>$roll_no,'test_id'=>$id,'standard_id'=>$standard_id,'subject'=>$subject,'marks'=>$marks);

                $this->Result_Model->InsertResultData($data_user);
            }
        }
             unlink('././uploads/'.$file_name); //File Deleted After uploading in database          
             $this->Test_Model->UploadResult($id);   
             redirect(base_url() . "index.php/Result_Controller/AddTestResult");
         }

         public function UpdateTestResult($id){

    $this->load->library('excel');//load PHPExcel library 
    $this->load->library('form_validation');
    $this->load->model('Result_Model');
    $this->load->model('Test_Model');
    $configUpload['upload_path'] = FCPATH.'uploads\\';
    $configUpload['allowed_types'] = 'xls|xlsx|csv';
    $configUpload['max_size'] = '5000';
    $this->load->library('upload', $configUpload);
    $this->upload->do_upload('userfile');  
         $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
          $file_name = $upload_data['file_name']; //uploded file name
        $extension=$upload_data['file_ext'];    // uploded file extension

        echo $file_name;
//$objReader =PHPExcel_IOFactory::createReader('Excel5');     //For excel 2003 
 $objReader= PHPExcel_IOFactory::createReader('Excel5'); // For excel 2007     
          //Set to read only
 $objReader->setReadDataOnly(true);          
        //Load excel file
 $objPHPExcel=$objReader->load(FCPATH.'uploads\\'.$file_name);      
         $totalrows=$objPHPExcel->setActiveSheetIndex(0)->getHighestRow();   //Count Numbe of rows avalable in excel         
         $objWorksheet=$objPHPExcel->setActiveSheetIndex(0);                


    // Fetch Test ID from the Excel file and Match With Table ID
         $excel_id= $objWorksheet->getCellByColumnAndRow(1,1)->getValue();


         if ($id != $excel_id) {
        // display error message 
           redirect(base_url() . "index.php/");
           exit(0);
       }

        $total_marks=$objWorksheet->getCellByColumnAndRow(4,3)->getValue(); 
    //loop from first data untill last data
       for($i=7;$i<=$totalrows;$i++)
       {
            // $stud_id= $objWorksheet->getCellByColumnAndRow(0,$i)->getValue();            
            $stud_name= $objWorksheet->getCellByColumnAndRow(0,$i)->getValue(); //Excel Column 1
            $roll_no = $objWorksheet->getCellByColumnAndRow(1,$i)->getValue();
            $marks = $objWorksheet->getCellByColumnAndRow(2,$i)->getValue();

            if($marks >= $total_marks && $marks !='N/A') 
            {
                // display error message
                exit(0);
            }
            else
            { 
                if($marks !='N/A')
                {   
                    $marks = $marks.'/'.$total_marks;
                }      

                // $data_user=array('roll_no'=>$roll_no,'test_id'=>$id,'standard_id'=>$standard_id,'subject'=>$subject,'marks'=>$marks);

                $this->Result_Model->UpdateResultData($id,$roll_no,$marks);
            }
        }
             unlink('././uploads/'.$file_name); //File Deleted After uploading in database          
             //$this->Test_Model->UploadResult($id);   
             redirect(base_url() . "index.php/Result_Controller/ViewResult/");
         }
 }