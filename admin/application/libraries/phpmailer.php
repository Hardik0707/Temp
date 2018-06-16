<?php

class phpmailer
{
    public function __construct()
    {
        log_message('Debug', 'PHPMailer class is loaded.');
    }

    public function load()
    {

        require_once(APPPATH."third_party/vendor/autoload.php");
        require_once(APPPATH."third_party/vendor/phpmailer/phpmailer/PHPMailerAutoload.php");
        $objMail = new PHPMailer;
        return $objMail;
    }
}
?>