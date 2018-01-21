<?php

defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
if (!ini_get('date.timezone')) {
    date_default_timezone_set('GMT');
}
class GalleryDisplay_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Gallery_Model');
    }
    public function Gallery() {
        $Images['AllImages'] = $this->Gallery_Model->fetchAllImages();
        $this->load->view('gallery',$Images);
    }
}