<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
<script src="../sweetalert/sweetalert/dist/sweetalert.min.js"></script>
<script src="../sweetalert2/sweetalert2/dist/sweetalert2.all.js"></script>
</head>
<body>
    
</body>
</html>
<?php
    //PHP MAILER ...
//Include required PHPMailer files


require '../phpMailer/PHPMailer.php';
require '../phpMailer/SMTP.php';
require '../phpMailer/Exception.php';
//Define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$errors = false;

if(isset( $_POST['btn'])){

    $errors = true;
    //variables declarations
    $email_name = $_POST['name'];
    $email_sender = $_POST['email'];
    $email_subject = $_POST['subject'];
    $email_message = $_POST['message'];

         if($errors == true){
             $newMessage = [
                $email_name,
                $email_sender,
                $email_message
             ];
             foreach ($newMessage as $key => $value) {
              # code...
             
            // $to = $email;
            $subject = $email_subject;
            $message = $value."<br>";
            $headers = "From: muhammaduisa1122@gmail.com" . "\r\n" .
            "CC: muhammaduisa1122@gmail.com";
            $new = "muhammaduisa1122@gmail.com";
             }


            //Create instance of PHPMailer
            $mail = new PHPMailer();
            //Set mailer to use smtp
            $mail->isSMTP();
            //Define smtp host
            $mail->Host = "smtp.gmail.com";
            //Enable smtp authentication
            $mail->SMTPAuth = true;
            //Set smtp encryption type (ssl/tls)
            $mail->SMTPSecure = "ssl";
            //Port to connect smtp
            $mail->Port = "465";
            //Set gmail username
            $mail->Username = "muhammaduisa1122@gmail.com";
            //Set gmail password
            $mail->Password = "pwkaqwlsqysftxat";
            //Email subject
            $mail->Subject = $subject;
            //Set sender email
            $mail->setFrom($email_sender, "From: ".$email_sender." ".$email_name);
            //Enable HTML
            $mail->isHTML(true);
            //Attachment
            // $mail->addAttachment('img/attachment.png');
            //Email body
            $mail->Body = $message;
            //Add recipient
            $mail->addAddress($new);
            //Finally send email
            if ( $mail->send() ) {
            // $_SESSION['sent'] = $subject2;
            

            header("location: ../");
            // echo "Registration Successful
            //     <script>
            //         // alert('Registration Successful')
            //         // swal.fire('Done','Registration Successful, please check your to verify.', 'success')
            //     </script>
            // ";
            }else{
            echo "OTP could not be sent. Mailer Error: ".$mail->ErrorInfo;
            }
            //Closing smtp connection
            $mail->smtpClose();  


        }

            // header("Location: login.php");
        }
?>
