
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
        $this->load->library('email');
        $this->load->model('Login_Model');
        $this->load->library('session');
    }
    public function index(){
        if(isset($_SESSION['Admin'])) {
            $this->load->view('Home');
        } 
        else 
        {
        $this->load->view('Index');
    }

    }
    public function Home() {
        if(isset($_SESSION['Admin'])) {
            $this->load->view('Home');
        } 
        else 
        {
            if (isset($_POST['username'])) 
            {
                $email = $_POST['username'];
                $flag = 0;
                $password = $_POST['password'];
                $result = $this->Login_Model->AdminLogin();

                foreach ($result as $value) {
                    if ($value->email == $email && $value->password == $password) {

                        $hashPassword = hash('sha256',$value->password);
                        $admin = array('id'=>$value->admin_id,'user_name' => $value->user_name,'email' =>$value->email,'password' => $hashPassword);
                       
                        $name = $value->user_name;
                        $flag = 1;
                        break;
                    }
                }

                if ($flag == 1) {
                    $this->session->set_userdata('Admin', $admin); 
                    $this->session->set_userdata('isAdminLoggedIn', 1);
                    $this->load->view('Home');  

                } else {
                    $msg['msg']="Invalid Username And Password";
                    $this->load->view('Index',$msg);
                }
            } else {
                redirect('Login_Controller');
            }
        }
    }

    public function Update()
    {
        if(!isset($_SESSION['Admin'])) {
            $this->load->view('Index');
        } 
        else 
        {
        if(isset($_POST['update']))
        {
            $user_name = $_POST['user_name'];
            $email = $_POST['email'];
            $password = hash('sha256',$_POST['password']);
            $npassword = $_POST['npassword'];
            $admin_id = $_SESSION['Admin']['id'];
            $old_password= $_SESSION['Admin']['password'];
            if($password == $old_password)
            {
                $data = array('admin_id'=>$admin_id,'user_name' =>$user_name ,'email'=>$email,'password'=>$npassword );
                $this->load->model('Login_Model');
                $success=$this->Login_Model->UpdateAdmin($data);
                
                $this->session->unset_userdata('Admin');
                $this->session->unset_userdata('isAdminLoggedIn');
                redirect('Login_Controller/Home');
            }    
        }
    }
}

    public function Logout(){

        $this->session->unset_userdata('Admin');
        $this->session->unset_userdata('isAdminLoggedIn');
        redirect('Login_Controller');
    }
        
public function ForgotPassword() {
            $email = $this->input->post('email');
            $flag = 0;
            $data = array(0,0,0);
                $result = $this->Login_Model->AdminLogin();
                    foreach ($result as $value) {
                        if ($value->email == $email) {
                                $name = $value->user_name;
                                $id= $value->admin_id;
                                $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
                                $password = substr( str_shuffle( $chars ), 0, 8 );
                                $flag =1; 
                            break;
                }   
            }
                if($flag==1)
                $success = $this->Login_Model->UpdatePassword($id,$password);

            if(isset($success)){
                $result = $this->email
            ->from('Venomenous.viper@gmail.com','JD Tutorials')   // Optional, an account where a human being reads.
            ->to($email,'JD Tutorials')
            ->subject('Forgot Password of Admin')
            ->message('Dear <b>'.$name.'<b>,<br>Your New Password is '.$password)
            ->send();
            $data = "Password has been sent to your registerd Email-ID";
            $this->session->set_userdata('sentAdmin',$data);
            $success=$this->email->print_debugger();
            
            }   
            else if($flag == 0)
            {   
                $data = "We are unable to find Username";
                $this->session->set_userdata('sentAdmin',$data);
            }
            else{
                $data = "Unable to send password. Please try again after sometime";
                $this->session->set_userdata('sentAdmin',$data);
            }
            redirect('/Login_Controller');
        }
}