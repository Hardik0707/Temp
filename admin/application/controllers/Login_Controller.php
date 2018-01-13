
<?php
ob_start();
if( ! ini_get('date.timezone') )
{
    date_default_timezone_set('GMT');
}
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Login_Model');
    }
    //public function functionName();
    public function index(){
    if (isset($_SESSION['isAdminLoggedIn']) && $_SESSION['isAdminLoggedIn'] == 1) {
            $this->load->view('Home');
        }else{
            $this->load->view('Index');
        }
    }
    public function Home() {
        //session_destroy();
        if (isset($_SESSION['isAdminLoggedIn'])) {
            $this->load->view('Home');
        } else {
            if (isset($_POST['username'])) {
                $email = $_POST['username'];
                $flag = 0;
                $password = $_POST['password'];
                $result = $this->Login_Model->AdminLogin();
                foreach ($result as $value) {
                    if ($value->email == $email && $value->password == $password) {
                        $name = $value->user_name;
                        $flag = 1;
                        break;
                    }
                }
                if ($flag == 1) {
                    $this->session->set_userdata('Admin', $name);
                    $this->session->set_userdata('isAdminLoggedIn', 1);
                    $this->load->view('Home');
                } else {
                    $msg['msg']="Invalid Username And Password";
                    $this->load->view('Index',$msg);
                }
            } else {
                redirect('welcome');
            }
        }
    }
    public function Logout(){
        $this->session->unset_userdata('Admin');
        $this->session->unset_userdata('isAdminLoggedIn');
        redirect('welcome');
    }

}
