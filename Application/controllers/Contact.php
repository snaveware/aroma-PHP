<?php 
class Contact extends Loader
{
   public function __construct(){
      $this->model('Message');
      $this->messageModel = new Message();
   }
   public function index()
   {
      $data = array();
      
      if(isset($_SESSION['form-success'])){
         $data['success'] = $_SESSION['form-success'];

         $_SESSION['form-success'] = null;
      }

      $this->view('contact',$data);
   }

   public function message(){

      /*
         TODO
         -insert the message into database
         -connect to phpmailer
         -send an email
      */


      if(!isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['message'])){
        
         $data = array();
         $data['errors'] = array('Name, Email and Message are required');

         return $this->view('contact',$data);
      }

      $message = array();

      $message['name']= $_POST['name'];
      $message['email'] = $_POST['email'];
      $message['message'] = $_POST['message'];
     
      $this->messageModel->insertMessage($message);

      $name= $_POST['name'];
      $email = $_POST['email'];
      $message = $_POST['message'];
      $subject = "Message From Servital Website Sent By $name with email $email";

      $this->library('Email');

      $mailer = new Email();

      $isSent = $mailer->sendEmail($email,$subject,$name,$message);

      if(!$isSent){
         $data = array();
         $data['errors'] = array('Failed to send the message. Please call us or send us an email');

         $_SESSION['data'] = data;

         return header("location: $this->base_url#contact-form");
      }

      $_SESSION['form-success'] = true;

      header("location: $this->base_url/contact#contact-form");
   }
}
?>