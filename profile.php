<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #f0f0f0;
        }

        .profile-container {
            justify-content: space-between;
            align-items: center;
            background-color: floralwhite;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px;
            width : 350px;
            margin-left: auto;
            margin-right: auto;
        }

        .profile-info {
            text-align: center;
        }


        .profile-actions {
            border-left: 2px solid #ccc;
            padding-left: 20px;
        }

        h1, h2 {
            color: #333;
        }


    </style>
</head>
<body>
<div class="profile-container">
    <div class="profile-info">
        <?php
         include "SQL_connection.php" ;

        session_start();
        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];



            if (!$conn) {
                die("Database connection failed: " . mysqli_connect_error());
            }

            $query = "SELECT name, email FROM user WHERE username = ?";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            if (mysqli_stmt_num_rows($stmt) == 1) {
                mysqli_stmt_bind_result($stmt, $name, $email);
                mysqli_stmt_fetch($stmt);
            }
            
            mysqli_close($conn);
        }

        echo '<h1>Your Profile</h1>';
        echo '<p><strong>Name:</strong> ' . $name . '</p>';
        echo '<p><strong>Username:</strong> ' . $username . '</p>';
        echo '<p><strong>Email:</strong> ' . $email . '</p>';
        ?>
    <div class="profile-update">
        <button>update</button>
    </div>
    </div>

   
</div>
</body>
</html>
