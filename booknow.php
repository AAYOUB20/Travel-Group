<!DOCTYPE html>
<html>
<head>
    <title>Book Your Trip</title>
    <style>
          body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: #14e459;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            padding: 40px;
            height: 280px;
            width: 400px;
            text-align: center;
        }
        label {
            display: block;
            text-align: left;
            margin-bottom: 9px;
            font-weight: bold;
            font-size: 14px;
        }

        button{
            margin-top: 25px;
            color: white;
            background-color: black ;
            cursor: pointer;
            
        }
    </style>
</head>
<body>
    <div class="container">
    <h1>Book Your Trip</h1>
    <form action="booknow.php" method="post">
        <label for="destination">Choose your destination:</label>
        <select name="destination" id="destination">
            <option value="Thailand">Thailand</option>
            <option value="Sri Lanka">Sri Lanka</option>
            <option value="Rome">Rome</option>
        </select>
        <br>

        <label for="date">Select a date:</label>
        <select name="date" id="date">
            <option value="10/02/2024">10/02/2024</option>
            <option value="17/02/2024">17/02/2024</option>
            <option value="24/02/2024">24/02/2024</option>
        </select>
        <br>

        <label for="promoCode">Enter your promo code:</label>
        <input type="text" name="promoCode" id="promoCode">
        <br>
        <button >BookNow</button>
    </form>
</body>
</html>

<?php
 include "SQL_connection.php" ; // include il connection al database

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $destination = $_POST["destination"];
    $date = $_POST["date"];
    $promoCode = $_POST["promoCode"];


    if (isset($_SESSION["email"])) {
        $email = $_SESSION["email"];

    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }
    
    $sql = "INSERT INTO booking (email, destination, date, promoCode) VALUES (?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "ssss", $email, $destination, $date, $promoCode);
        
        if (mysqli_stmt_execute($stmt)) {
            echo "Booking successful!";
            sleep(1); // attesa di 1 secondo
            header("Location: project.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error preparing the statement: " . mysqli_error($conn);
    }
    
    } else {
        echo "Database connection not found in the session.";
    }
}
?>

