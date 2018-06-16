<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
if (!ini_get('date.timezone')) {
    date_default_timezone_set('GMT');
}
class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	  function __construct() {
        parent::__construct();
        $this->load->model('Faculty_Profile_Model');
        $this->load->model('Student_Model');
        $this->load->model('Announcement_Model');
    }
	public function index()
	{
		$_SESSION['login']=1;
		$Result['AllFaculty'] = $this->Faculty_Profile_Model->fetchAll();
		$Result['AllPublic'] = $this->Announcement_Model->fetchTopPublic();
        $this->load->view('index',$Result);

	}
 //       public function AboutUs()
	// {
	// 	$_SESSION['login']=1;
	// 	$this->load->view('AboutUs');
	// }
	
	// public function LoginStaff()
	// {
	// 	$_SESSION['login']=1;
	// 	$this->load->view('LoginStaff');
	// }
 //        public function SyllabusStandard()
	// {
	// 	$_SESSION['login']=1;
	// 	$this->load->view('SyllabusStd');
	// }
	
	// public function TopperYear()
	// {
	// 	$_SESSION['login']=1;
	// 	$this->load->view('TopperYears');
	// }
	// public function Toppers()
	// {
	// 	$_SESSION['login']=1;
	// 	$this->load->view('Toppers');
	// }
	// public function Schedule()
	// {
	// 	$_SESSION['login']=1;
	// 	$this->load->view('Schedule');
	// }
	public function FacultyProfile()
	{
		$_SESSION['login']=1;
		$this->load->view('FacultyProfile');
	}
}
