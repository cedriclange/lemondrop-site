<?php

    // Here we get all the information from the fields sent over by the form.
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = ( $_POST['subject'] ) ? $_POST['subject'] : 'Contact Form';
    $message = ( $_POST['message'] ) ? $_POST['message'] : '';

    $to = 'info@lemondropsarl.com';
    $message = 'Name: '.$name.'<br /> Email: '.$email.'<br /> Telephone: '.$phone.'<br /> Message: '.$message;

    $headers = "From: $name <".$email.">". "\r\n" .
                  "Return-Path: LEMONDROP SARL <info@lemondropsarl.com>\r\n".
                  "Reply-To: $name <".$email.">" . "\r\n" .
                  "MIME-Version: 1.0\r\n".
                  "Content-type: text/html; charset=iso-8859-1\r\n".
                  "X-Priority: 3\r\n" .
                  'X-Mailer: PHP/' . phpversion();

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) { // shis line checks that we have a valid email address
        mail($to, $subject, $message, $headers); // this method sends the mail.
         ob_start();
        $url ='https://www.lemondropsarl.com/contact_response.php';
        while(ob_get_status())
        {
            ob_end_clean();
        }
        header("Location:$url");// success message
        exit;
    }else{
        echo "error"; //error
    }

?>
