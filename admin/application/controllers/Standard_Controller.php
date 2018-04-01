<?php
ob_start();
if( ! ini_get('date.timezone') )
{
    date_default_timezone_set('GMT');
}
defined('BASEPATH') OR exit('No direct script access allowed');

class Standard_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Standard_Model');
    }

    public function DeleteStandard($id){
        if(!isset($_SESSION['Admin'])) {
            $this->load->view('Index');
        } 
        else 
        {
            $success=$this->Standard_Model->DeleteStandard($id);
            $_SESSION['StandardDeleted']=$success;
            redirect('Standard_Controller/ViewStandard');
        }
    }

    public function ViewStandard() {
        if(!isset($_SESSION['Admin'])) {
            $this->load->view('Index');
        } 
        else 
        {
            $result['res']=$this->Standard_Model->FetchRecord();
            $this->load->view('ViewStandard',$result);
        }
    }

    public function InsertStandard() {
        if(!isset($_SESSION['Admin'])) {
            $this->load->view('Index');
        } 
        else 
        {
            if(isset($_POST['add_standard'])) {
    //print_r($_POST);
                $subject = $_POST['StandardName'];
                $data = array('standard' => $subject);
                $success=$this->Standard_Model->InsertStandard($data);
                $_SESSION['StandardAdded']=$success;
                redirect('Standard_Controller/ViewStandard');
            }
        }
    }
    public function EditStandard($id){
        if(!isset($_SESSION['Admin'])) {
            $this->load->view('Index');
        } 
        else 
        {
            $result['res']=  $this->Standard_Model->FetchRecord1($id);
            $this->load->view('EditStandard',$result);
        }
    }
    public function UpdateStandard(){
        if(!isset($_SESSION['Admin'])) {
            $this->load->view('Index');
        } 
        else 
        {
            if(isset($_POST['UpdateStandard'])){
                $stdid=$_POST['stdid'];
                $StandardName=$_POST['StandardName'];
                $data=array('standard'=>$StandardName);
                $success=$this->Standard_Model->UpdateStandard($stdid,$data);
                $_SESSION['StandardUpdated']=$success;
                redirect('Standard_Controller/ViewStandard');
            }
        }
    }
}

?>
