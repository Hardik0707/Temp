<?php

defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
if (!ini_get('date.timezone')) {
    date_default_timezone_set('GMT');
}
class Announcement_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Announcement_Model');
    }
    public function PublicAC() {
        $Public['AllPublic'] = $this->Announcement_Model->fetchAllPublic();
        $this->load->view('Announcements',$Public);
    }

    public function PrivateAC() {
         $id =$_SESSION['studentid']; 
         $standard_id =$_SESSION['standard_id'];
         $subject = $_SESSION['subject'];
         $subject = "('".str_replace(',',"','", $subject)."')";
         
        $Private['AllPrivate'] = $this->Announcement_Model->fetchAllPrivate($id,$standard_id,$subject);
        $this->load->view('PrivateAnnouncements',$Private);
    }
}