<?php
require_once 'C:\Users\FUJITSU\Desktop\xampp\htdocs\PHPMailer-master\src\PHPMailer.php';
require_once 'C:\Users\FUJITSU\Desktop\xampp\htdocs\PHPMailer-master\src\SMTP.php';
require_once 'C:\Users\FUJITSU\Desktop\xampp\htdocs\PHPMailer-master\src\Exception.php';
session_start();

if (isset($_POST['submit_email']) && $_POST['email']) {
    $email = $_POST['email'];
    
    $select = mysqli_query($conn, "SELECT email, password FROM user WHERE email='$email'");
    if (mysqli_num_rows($select) == 1) {
        while ($row = mysqli_fetch_array($select)) {
            $email = md5($row['email']);
            $pass = md5($row['password']);
        }
        $link = "<a href='www.samplewebsite.com/reset.php?key=".$email."&reset=".$pass."'>Click To Reset password</a>";
        
         $mail = new PHPMailer();
         $mail->isSMTP(); // Use SMTP
         $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP server
         $mail->SMTPAuth = true;
         $mail->Username = 'brahim2001hmd@gmail.com'; // Replace with your SMTP username
         $mail->Password = 'braxhim123'; // Replace with your SMTP password
         $mail->SMTPSecure = 'tls'; // Enable TLS encryption
         $mail->Port = 587; // Set the appropriate SMTP por

        $mail->setFrom("brahim2001hmd@gmail.com", "your_name");
        $mail->addAddress($email, $username);
        $mail->Subject = "Password Reset";
        $mail->Body = "Click On This Link to Reset Password: ".$pass."";

        if ($mail->Send()) {
            echo "Check Your Email and Click on the link sent to your email";
        } else {
            echo "Mail Error: ".$mail->ErrorInfo;
        }
    } else {
        echo "Username not found or email not associated with the username.";
    }
}
?>
