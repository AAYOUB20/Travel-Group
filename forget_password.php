<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = $_GET["token"]; // Get the token from the URL

    // Verify the token's validity (check expiration and existence in the database)
    // If the token is valid, continue to reset the password

    $newPassword = $_POST["new_password"]; // Get the new password from the form

    // Hash the new password using the same algorithm and parameters as used for regular passwords
    $hashedNewPassword = password_hash($newPassword, PASSWORD_BCRYPT);

    // Update the user's hashed password in the database
    // You should use a prepared statement for security
    $query = "UPDATE user SET password = ? WHERE email = ?";
    // Execute the query with the hashed new password and user's email

    // Send a password reset confirmation email
    $to = $userEmail; // Use the user's email address
    $subject = "Password Reset Successful";
    $message = "Your password has been successfully reset.";

    // You can add more information or a link to your login page in the email content

    mail($to, $subject, $message);

    // Redirect the user to a password reset confirmation page
    header("Location: reset_password_confirmation.php");
    exit;
}

?>
