  
    <?php 

$message_sent = false;
if(isset($_POST['email']) && $_POST['email'] != ''){
    
    // validate email (make sure that the format of the email is correct) *does not check if email is working
    if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        if(!empty($_POST['website'])){
            die();
        }
        else {
        // submit the form
        $messageSubject = "New contact form submission (www.michelleflandin.com)";
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
    
        $to = "mvflandin@gmail.com";
        $body = "";
    
        $body .= "From: ".$name. "\r\n";
        $body .= "Email: ".$email. "\r\n";
        $body .= "Message: ".$message. "\r\n";
        
        // mail($to,$messageSubject,$body);
        $message_sent = true;
        }
    }
    // if email was invalid
    else {
        $invalid_class_name = "form-invalid";
    }

}

?>  

<html lang="en">
    <head>
        <link rel="stylesheet" href="contact.css">
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

<div class="grid-container">
  <div class="grid-one"></div>
  <div class="grid-two"></div>
  <div class="grid-three"></div>  
  <div class="grid-four"></div>
  <div class="grid-five">
  <?php
        if($message_sent): 
        ?>
        <h3>Thanks, I'll be in touch.</h3>
        <?php
        else: 
        ?>
    <div id="email-form">
        <h1>Contact Me</h1>
        <form action="contact.php" method="POST">
            <input type="text" name="name" placeholder="Name" tabindex="1"><p>
            <input type="email" name="email" placeholder="Email" class="<?= $invalid_class_name ?? ''?>" tabindex="2" required><p>
            <input type="text" name="message" placeholder="Message" id="msg" tabindex="3" required><p>
            <input type="text" id="website" name="website"/> 
            <input type="submit" value="Submit" class="button-59" role="button">
            <p><p>
        </form>
        <br>
    </div>
    <?php
        endif; 
    ?>
  </div>
  <div class="grid-six"></div>  
  <div class="grid-seven"></div>
  <div class="grid-eight"></div>
  <div class="grid-nine"></div>  
</div>




    </body>
</html>
