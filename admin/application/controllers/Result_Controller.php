    <?php
    ob_start();
    if( ! ini_get('date.timezone') ) {
        date_default_timezone_set('GMT');
    }

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Result_Controller extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
            $this->load->library('excel');
            $this->load->library('form_validation');
            $this->load->model('Test_Model');
            $this->load->model('Result_Model');
        
        }
        public function TestResult($roll,$standard_id) {
            if(!isset($_SESSION['Admin'])) {
                $this->load->view('Index');
            } 
            else 
            {

                $result['StudentDetails'] = $this->Result_Model->FetchStudentDetails($roll,$standard_id);
                $result['AllTests'] = $this->Result_Model->FetchStudentsAllTest($roll,$standard_id);
                $result['AllTestSubjects'] = $this->Result_Model->FetchTestSubjects($roll,$standard_id);
                $this->load->view('TestResult',$result);
            }
        }

        public function ViewResult() {

            if(!isset($_SESSION['Admin'])) {
                $this->load->view('Index');
            } 
            else 
            {

                $result['AllStudents'] = $this->Result_Model->FetchAllStudents();
                foreach($result['AllStudents'] as $student) {

                    $result['t_'.$student->stud_id] = $this->Result_Model->FetchResult($student->roll_no);
                }
                $this->load->view('ViewResult', $result);
            }
        }


        public function AddTestResult(){
            if(!isset($_SESSION['Admin'])) {
                $this->load->view('Index');
            } 
            else 
            {

                $result['AllTests'] = $this->Test_Model->FetchAllTests();
                $this->load->view('AddTestResult',$result);
            }
        }
        public function DownloadTemplate($id){
            if(!isset($_SESSION['Admin'])) {
                $this->load->view('Index');
            } 
            else 
            {
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
            //$object->getActiveSheet()->setCellValueByColumnAndRow(,$row,$value->stud_id);
               $object->getActiveSheet()->setCellValueByColumnAndRow(0,$row,$value->stud_name);
               $object->getActiveSheet()->setCellValueByColumnAndRow(1,$row,$value->roll_no);
               $row++;
           }

           $object_writer = PHPExcel_IOFactory::createWriter($object, 'CSV');
           header('Content-Type: application/vnd.ms-excel');
           header("Content-Disposition: attachment;filename='Result.csv'");
           $object_writer->save('php://output');
       }
   } 


   public function DownloadResult($id){
    if(!isset($_SESSION['Admin'])) {
        $this->load->view('Index');
    } 
    else 
    {
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

    $object_writer = PHPExcel_IOFactory::createWriter($object, 'CSV');
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="Update.csv"');
    header('Cache-Control: max-age=0');
    $object_writer->save('php://output');

}
} 

public function InsertTest($test_id,$total_marks,$standard_id,$subject)
{
    if(!isset($_SESSION['Admin'])) {
        $this->load->view('Index');
    } 
    else 
    {
        $configUpload['upload_path'] = FCPATH.'uploads\\';
        $configUpload['allowed_types'] = 'xls|xlsx|csv';
        $configUpload['max_size'] = '5000';

        $this->load->library('upload', $configUpload);
        
        $this->upload->do_upload('userfile');  
         $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
        $file_name = $upload_data['file_name']; //uploded file name
        $extension=$upload_data['file_ext'];    // uploded file extension    
        $objReader= PHPExcel_IOFactory::createReader('CSV'); // For excel 2007     
          //Set to read only
        $objReader->setReadDataOnly(true);          
        //Load excel file
        $objPHPExcel=$objReader->load(FCPATH.'uploads\\'.$file_name);      
         $totalrows=$objPHPExcel->setActiveSheetIndex(0)->getHighestRow();   //Count Number of rows avalable in excel         
         $objWorksheet=$objPHPExcel->setActiveSheetIndex(0);                


    // Fetch Test ID from the Excel file and Match With Table ID
         $excel_id= $objWorksheet->getCellByColumnAndRow(1,5)->getValue();


         if ($test_id != $excel_id) {
            echo "ERRPR GO BACK AND UPLOAD AGAIN";  
              
             // redirect(base_url() . "index.php/Result_Controller/AddTestResult");
             exit(0);
         }

    //loop from first data untill last data
         for($i=11;$i<=$totalrows;$i++)
         {
            // $stud_id= $objWorksheet->getCellByColumnAndRow(0,$i)->getValue();            
            $stud_name= $objWorksheet->getCellByColumnAndRow(0,$i)->getValue(); //Excel Column 1
            $roll_no = $objWorksheet->getCellByColumnAndRow(1,$i)->getValue();
            $marks = $objWorksheet->getCellByColumnAndRow(2,$i)->getValue();

            if($marks > $total_marks && ($marks !='N/A' || !empty($marks))) 
            {
                exit(0);
            }
            else
            { 
                if($marks !='N/A')
                {   
                    $marks = $marks.'/'.$total_marks;
                }       
                $data_user=array('roll_no'=>$roll_no,'test_id'=>$test_id,'standard_id'=>$standard_id,'subject'=>$subject,'marks'=>$marks);

                $this->Result_Model->InsertResultData($data_user);
            }
        }
             unlink('././uploads/'.$file_name); //File Deleted After uploading in database          
             $success = $this->Test_Model->UploadResult($test_id); 
             $_SESSION['InsertTestResult'] = $success;  
             redirect(base_url() . "index.php/Result_Controller/AddTestResult");
         }
     }

     public function UpdateTestResult($id){
        if(!isset($_SESSION['Admin'])) {
            $this->load->view('Index');
        } 
        else 
        {
            $configUpload['upload_path'] = FCPATH.'uploads\\';
            $configUpload['allowed_types'] = 'xls|xlsx|csv';
            $configUpload['max_size'] = '5000';
            $this->load->library('upload', $configUpload);
            $this->upload->do_upload('userfile');  
         $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
          $file_name = $upload_data['file_name']; //uploded file name
        $extension=$upload_data['file_ext'];    // uploded file extension

        // echo $file_name;
    //$objReader =PHPExcel_IOFactory::createReader('Excel5');     //For excel 2003  
    $objReader= PHPExcel_IOFactory::createReader('CSV'); // For excel 2007     
          //Set to read only
    $objReader->setReadDataOnly(true);          
        //Load excel file
    $objPHPExcel=$objReader->load(FCPATH.'uploads\\'.$file_name);      
         $totalrows=$objPHPExcel->setActiveSheetIndex(0)->getHighestRow();   //Count Numbe of rows avalable in excel         
         $objWorksheet=$objPHPExcel->setActiveSheetIndex(0);                


    // Fetch Test ID from the Excel file and Match With Table ID
         $excel_id= $objWorksheet->getCellByColumnAndRow(1,5)->getValue();
         if ($id != $excel_id) {
            
             exit(0);
         }

         $total_marks=$objWorksheet->getCellByColumnAndRow(4,7)->getValue(); 
    //loop from first data untill last data
         for($i=11;$i<=$totalrows;$i++)
         {
            // $stud_id= $objWorksheet->getCellByColumnAndRow(0,$i)->getValue();            
            $stud_name= $objWorksheet->getCellByColumnAndRow(0,$i)->getValue(); //Excel Column 1
            $roll_no = $objWorksheet->getCellByColumnAndRow(1,$i)->getValue();
            $marks = $objWorksheet->getCellByColumnAndRow(2,$i)->getValue();

            if($marks > $total_marks && ($marks !='N/A' || !empty($marks))) 
            {
                echo "ERRPR GO BACK AND UPLOAD AGAIN";
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
             $_SESSION['InsertTestResult'] = 1;     
             redirect(base_url() . "index.php/Result_Controller/AddTestResult/");
         }
     }
 }
 ?>