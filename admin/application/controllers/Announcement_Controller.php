<?php
ob_start();
ini_set('display_errors','1');
error_reporting(E_ALL);
if( ! ini_get('date.timezone') )
{
	date_default_timezone_set('GMT');
}
defined('BASEPATH') OR exit('No direct script access allowed');

class Announcement_Controller extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('Announcement_Model');
	}


	public function ViewPublic()
	{
		$result['AllPublic'] = $this->Announcement_Model->FetchAllPublic();
		$this->load->view('public_announce_view', $result);
	}

	public function DeletePublic($id) {
		if (!empty($id)) {
			$success = $this->Announcement_Model->DeletePublic($id);
			$_SESSION['DeletePublic'] = $success;
			redirect('Announcement_Controller/ViewPublic');
		}
	}

	public function AddPublic() {
		$this->load->view('AddPublicAC');
	}

	public function InsertPublic()
	{
		echo "1";

		if(isset($_POST['AddPublic']))
		{
			echo "2";
			$title = $_POST['title'];
			$description = $_POST['description'];
			$date = date("Y-m-d");
			$new_file_name = $title."_".time() . ".jpeg";

			if ($this->input->post('AddPublic') && !empty($_FILES['ImageUpload']['name'])) {
				$uploadPath = 'panel/img/Announcement/Public/';
				$config['upload_path'] = $uploadPath;
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['file_name'] = $new_file_name;
                $config['max_size']	= '500'; //500 Kb
                // $config['max_width'] = '400';
                // $config['max_height'] = '400';
                // $config['min_width'] = '400';
                // $config['min_height'] = '400';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                echo "yaha";
                if ($this->upload->do_upload('ImageUpload')){ 
                	echo "kider";
                	$fileData =$this->upload->data();
                	$data = array('date'=>$date, 'title' => $title, 'description' => $description, 'photo' => $fileData['file_name']);
                }
                else{
                	$error = array('error' => $this->upload->display_errors());
                	$_SESSION['InsertPublicData'] = $error;
                    $this->load->view('public_announce_view');
                }	

                if(!empty($data))	
                {	
                	$success = $this->Announcement_Model->InsertPublic($data);
                	$_SESSION['InsertPublicsData'] = $success;
                	redirect("Announcement_Controller/ViewPublic");
                }
            }
        }
    }
}
?>