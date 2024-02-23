
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="../css/login.css"> 
</head>
<body>
    
    <main>
        <section class="form">
           
            <h1 class="form__title">Log in to your Account</h1>
            <p class="form__description">Welcome back! Please, enter your information</p>


            <form action="login.php" method="POST">
                <label class="form-control__label" for="email">email</label>
                <input type="text" class="form-control" id="email" name="email" required>
        
                <label class="form-control__label" for="pass">Password</label>
                <div class="password-field">
                    <input type="password" class="form-control" id="password" name="pass" required>
                    <span class="toggle-password" onclick="togglePassword()">Show Password</span>
                </div>
                <div class="password__settings">
                    <label class="password__settings__remember" for="rememberMe">
                        <input type="checkbox" id="rememberMe" name="rememberMe">
                        <span class="custom__checkbox">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>                              
                        </span>
                        Remember me
                    </label>
        
                    <a href="../html/forget_password.html">Forgot Password?</a>
                </div>
        
                <button type="submit" class="form__submit" id="submit">Log In</button>
                <a href="project.php"><button type="button" class="home" id="home">Home page</button></a>

            </form>
        
            <p class="form__footer">
                Don't have an account?<br> <a href="registration.php">Create an account</a> 
            </p>
        </section>
        
        <section class="form__animation">
            <div id="ball">
                <div class="ball">
                    <div id="face">
                        <div class="ball__eyes">
                            <div class="eye_wrap"><span class="eye"></span></div>
                            <div class="eye_wrap"><span class="eye"></span></div>
                        </div>
                        <div class="ball__mouth"></div>
                    </div>
                </div>
              </div>
              <div class="ball__shadow"></div>
        </section>
    </main>
    <script src="main.js"></script>
    <script>
        function togglePassword() {
            var passwordField = document.getElementById("password");
            var toggleButton = document.querySelector(".toggle-password");

            if (passwordField.type === "password") {
                passwordField.type = "text";
                toggleButton.textContent = "Hide Password";
            } else {
                passwordField.type = "password";
                toggleButton.textContent = "Show Password";
            }
        }
    </script>
</body>
</html>


<?php
include "SQL_connection.php"; 

session_start(); 

if ($_POST) { 
    $email = $_POST["email"];
    $password = $_POST["pass"];

    if (!$conn) { 
        die("Database connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT email, password, remember_token FROM user WHERE email = ?"; 
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);

    if (!mysqli_stmt_execute($stmt)) {
        die("Error executing prepared statement: " . mysqli_stmt_error($stmt));
    }

    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) == 1) {  
        mysqli_stmt_bind_result($stmt, $dbEmail, $dbPassword, $dbRememberToken);
        mysqli_stmt_fetch($stmt);

        if (password_verify($password, $dbPassword)) { 


            if (isset($_POST['rememberMe'])) { 
                $token = hash("sha256", random_bytes(16));
                $expiration_time_unix = time();
                $expiration_time_mysql = date('Y-m-d H:i:s', $expiration_time_unix);
                setcookie("remember_token", $token, $expiration_time_unix, '/', '', false, true); 

                $updateStmt = mysqli_prepare($conn, "UPDATE user SET remember_token = ?, expiration_time = ? WHERE email = ?");
                mysqli_stmt_bind_param($updateStmt, "sss", $token, $expiration_time_mysql, $email);

                if (!mysqli_stmt_execute($updateStmt)) {
                    die("Error updating user data: " . mysqli_stmt_error($updateStmt));
                }

                mysqli_stmt_close($updateStmt);
            }
            $_SESSION["email"] = $email;  

            sleep(0.7);

            header("Location: project.php");
            exit;
        } else {
            die("Authentication failed: Invalid email or password");
        }
    } else {
        echo "Authentication failed: Invalid email or password.";
    }

    mysqli_stmt_close($stmt); 

    mysqli_close($conn);
}
?>
