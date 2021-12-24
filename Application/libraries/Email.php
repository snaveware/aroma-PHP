<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

class Email{

    public function sendEmail($email=null,$subject,$name=null,$message){
 
        //Create an instance; passing `true` enables exceptions
        if(!isset($email)){
            $email = "servital.mail.server@gmail.com";
        }
        if(!isset($name)){
            $name= "website Visitor";
        }
        //echo $email;
        $mail = new PHPMailer(true);

        try {
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'metametaross@gmail.com';                     //SMTP username
            $mail->Password   = 'metameta@2021';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom($email, "$name Via Aroma Website Website");
            $mail->addAddress('work.evans020@gmail.com');               //Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            // //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = "<p style='padding: 5px;'>$message</p>";
            $mail->AltBody = $message;

            $mail->send();
            return true;

        } catch (Exception $e) {
            print_r($e);
        //    $file = fopen('errors.txt');
        //     $fwrite($file, "Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
            
            return false;
            
        }
      
    }
}

?>