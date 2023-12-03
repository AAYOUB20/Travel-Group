<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];

    // Generate a unique password reset token
    $passwordResetToken = generateUniquePasswordResetToken();

    // Update the user's password reset token in the database
    updatePasswordResetToken($username, $passwordResetToken);

    // Send the password reset token to the user's email address
    sendPasswordResetTokenEmail($username, $passwordResetToken);

    // Redirect the user to a confirmation page
    header("Location: reset_password_confirmation.php");
    exit;
}

function generateUniquePasswordResetToken() {
    $token = md5(uniqid(rand(), true));
    return $token;
}

function updatePasswordResetToken($username, $passwordResetToken) {
    global $dbConnection;

    $query = "UPDATE user SET password_reset_token = ? WHERE username = ?";
    $stmt = $dbConnection->prepare($query);
    $stmt->bind_param("ss", $passwordResetToken, $username);
    $stmt->execute();
    $stmt->close();
}

function sendPasswordResetTokenEmail($username, $passwordResetToken) {
    $emailBody = "Your password reset token is: " . $passwordResetToken;

   
    $mail = new PHPMailer();
    $mail->setFrom("brahim2001hmd@icloud.com", "Your Name");
    $mail->addAddress($email);

    // Set email subject and body
    $mail->Subject = "Password Reset Token";
    $mail->Body = $emailBody;

    // Send the email
    if (!$mail->send()) {
        echo "Error sending email: " . $mail->ErrorInfo;
    } else {
        echo "Email sent successfully.";
    }
}


