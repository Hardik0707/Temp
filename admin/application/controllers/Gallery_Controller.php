<?php
ob_start();
ini_set('display_errors','1');
error_reporting(E_ALL);
if( ! ini_get('date.timezone') )
{
    date_default_timezone_set('GMT');
}
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery_Controller extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('Gallery_Model');
    }


	public function ViewGallery()
	{
		$result['AllImages'] = $this->Gallery_Model->FetchAllImages();
        $this->load->view('Gallery_View', $result);
	}

	 public function DeleteImage($id) {
        if (!empty($id)) {
            $succes = $this->Gallery_Model->DeleteImage($id);
            $_SESSION['DeleteImage'] = $succes;
            redirect('Gallery_Controller/ViewGallery');
        }
    }

     public function AddImage() {
        $this->load->view('AddImage');
    }

    public function InsertImage()
    {
    	if(isset($_POST['AddImage']))
    }
}
?>