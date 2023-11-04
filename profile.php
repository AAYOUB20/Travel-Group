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
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px;
        }

        .profile-info {
            text-align: center;
        }

        .profile-info img {
            max-width: 200px;
            border-radius: 50%;
        }

        .profile-actions {
            border-left: 2px solid #ccc;
            padding-left: 20px;
        }

        h1, h2 {
            color: #333;
        }

        form {
            margin-top: 20px;
        }

        form input[type="text"],
        form input[type="email"],
        form input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }

        form input[type="submit"] {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        form input[type="submit"]:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
<div class="profile-container">
    <div class="profile-info">
        <img src="c:\Users\FUJITSU\Pictures\notification.png" alt="Profile Picture">
        <!-- ho provato di crearli in un altro file ma non funziona l'import -->
        <?php
        session_start();
        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];

            // Database connection parameters (update with your database credentials)
            $dbHost = "localhost";
            $dbUser = "prova1";
            $dbPass = "123";
            $dbName = "user";

            // Create a database connection
            $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

            if (!$conn) {
                die("Database connection failed: " . mysqli_connect_error());
            }

            // Prepare a SQL query to retrieve user data based on the provided username
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
    </div>
    <div class="profile-actions">
        <h2>Actions</h2>
        <form action="upload_profile_picture.php" method="post" enctype="multipart/form-data">
            <input type="file" name="new-profile-picture" accept="image/*">
            <input type="submit" value="Upload Profile Picture">
        </form>
        <form action="modify_user_info.php" method="post">
            <label for="new-name">New Name: </label>
            <input type="text" id="new-name" name="new-name">
            <br>
            <label for "new-email">New Email: </label>
            <input type="email" id="new-email" name="new-email">
            <br>
            <input type="submit" value="Modify Information">
        </form>
    </div>
</div>
</body>
</html>
