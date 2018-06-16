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

	

	public function feedback(){

		$this->load->library('email');
		$name= $this->input->post('name');
		$email = $this->input->post('email');
		$message = $this->input->post('message');

		

		$result = $this->email
    		->from('Venomenous.viper@gmail.com','JD Tutorials')   // Optional, an account where a human being reads.
    		->to('Venomenous.viper@gmail.com','JD Tutorials')
    		->subject('Feedback About Classes')
    		->message('Feedback From <b>'.$name.'<b>,<br>Email: <b>'.$email.'<b> <br> Message: '.$message)
    		->send();
    		var_dump($result);
    		echo '<br />';
			echo $this->email->print_debugger();

    		$result = $this->email
    		->to($email)
    		->subject('Feedback About Classes')
    		->message('We Have Received Your Feedback <br> <b>Thank You For Giving Us Feedback !</b>')
    		->send();
    		var_dump($result);
    		echo '<br />';
			$success=$this->email->print_debugger();

			if($success==true)
				$this->session->set_userdata('feedback',true);
			else
				$this->session->set_userdata('feedbackfail',true);

			redirect('/ContactUs_Controller/ContactUs');
}
	public function ContactUs()
	{
        $Branches['AllBranch'] = $this->ContactUs_Model->fetchAllBranches();
        $this->load->view('ContactUs',$Branches);

	}
}
