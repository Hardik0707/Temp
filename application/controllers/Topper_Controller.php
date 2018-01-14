<?php

defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
if (!ini_get('date.timezone')) {
    date_default_timezone_set('GMT');
}
class Topper_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Topper_Model');
    }
    public function Toppers() {
        $years = $this->Topper_Model->fetchAllYears();
        foreach ($years as $year) {
            $result['a_'.$year->year_id] = $this->Topper_Model->fetchAllToppers($year->year_id);
        }
        $result['AllYears'] = $years;
        $this->load->view('Toppers',$result);
    }

    // public function Toppers() {
    //     $this->load->view('Toppers');
    // }
}
