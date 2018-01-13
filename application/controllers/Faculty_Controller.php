<?php

defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
if (!ini_get('date.timezone')) {
    date_default_timezone_set('GMT');
}

class Faculty_Controller extends CI_Controller {

    public function Faculty_Login() {
            $this->load->view('Faculty_Login');
        }
    }
