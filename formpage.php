<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>HTML Email Form With Attachment - reusable form</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <link rel="stylesheet" href="form.css" >
        <script src="form.js"></script>
    </head>
    <body >
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h2>Contact Us</h2> Got a question ? Feedback? Awesome! 
                    <p> Send your message in the form below and we will get back to you as early as possible. </p>
                    <form role="form" method="post" id="reused_form" enctype=&quot;multipart/form-data&quot; >
                        <div class="form-group">
                            <label for="name"> Name:</label>
                            <input type="text" class="form-control" id="name" name="name" required maxlength="50">
                        </div>
                        <div class="form-group">
                            <label for="email"> Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required maxlength="50">
                        </div>
                        <div class="form-group">
                            <label for="name"> Message:</label>
                            <textarea class="form-control" type="textarea" name="message" id="message" placeholder="Your Message Here" maxlength="6000" rows="7"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="name"> File Upload</label>
                            <input type="file" class="form-control" id="image" name="uploaded_file" required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-lg btn-success pull-right" id="btnContactUs">Send &rarr;</button>
                    </form>
                    <div id="success_message" style="width:100%; height:100%; display:none; "> <h3>Sent your message successfully!</h3> </div>
                    <div id="error_message" style="width:100%; height:100%; display:none; "> <h3>Error</h3> Sorry there was an error sending your form. </div>
                </div>
            </div>
        </div>
    </body>
</html>

<?php
if(isset($_POST['submit'])) {
 $emailAddress = 'jerryraj40@gmail.com';
 require "class.phpmailer.php";
$msg = 'First Name:'.$_POST['firstName'].'<br /> Last name:'.$_POST['lastName'].'<br /> Email:'.$_POST['email'].'<br />';
move_uploaded_file($_FILES["uploaded_file"]["tmp_name"], $_FILES["uploaded_file"]["name"]);
  $mail = new PHPMailer();
  $mail->IsMail();

  $mail->AddReplyTo($_POST['email'], $_POST['name']);
  $mail->AddAddress($emailAddress);
  $mail->SetFrom($_POST['email'], $_POST['name']);
  $mail->Subject = "Data";
  $mail->MsgHTML($msg);
  $mail->AddAttachment( $_FILES["uploaded_file"]["name"]);
  $mail->Send();

  echo "Done";
}
  ?>