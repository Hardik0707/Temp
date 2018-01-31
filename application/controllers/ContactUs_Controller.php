<?php

defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
if (!ini_get('date.timezone')) {
    date_default_timezone_set('GMT');
}
class ContactUs_Controller extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('ContactUs_Model');
	}

	public function ContactUs()
	{
		// $_SESSION['login']=1;
		//  $Branches['AllBranch'] = $this->Contactus_Model->contact_us();
		//  echo $Branches;
  //       $this->load->view('ContactUs',$Branches);


        // $branch = $this->ContactUs_Model->fetchAllBranches();
        $Branches['AllBranch'] = $this->ContactUs_Model->fetchAllBranches();
        $this->load->view('ContactUs',$Branches);

	}
}
