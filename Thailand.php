<?php
session_start();
include "SQL_connection.php"; 

$sql = "SELECT * FROM query WHERE destination = 'Thailand'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $destination = $row['destination'];
    $dates = json_decode($row['date']);
    $prices = json_decode($row['price']);
} else {
    $destination = "N/A";
    $dates = [];
    $prices = [];
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rome</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        h1 {
            text-align: center;
        }

        .card-container {
            display: flex;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card {
            width: 200px;
            border: 3px solid ;
            padding: 10px;
            text-align: center;
            background-color: white;
            margin: 10px;
            border-color: green;
            border-radius: 20px;
        
        }
        .card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-bottom: 1px solid #ddd;
            margin-bottom: 10px;
        }

        .back {
            color: white;
            background-color: black ;
            position: absolute;
            top: 10px;
            left: 10px;
            font-size: 30px;
            cursor: pointer;
        }
        .back:hover {
            background-color: green;
        }

    </style>
</head>
<body>
   <a href="project.php"> <button class="back">Back Home</button></a>
    <h1>Thailand</h1>

    <div class="card-container">
        <div class="card">
            <img src="https://th.bing.com/th/id/R.03ef2e3873dca778936d8ba802ed3a44?rik=7wbNEwajYBVhXA&pid=ImgRaw&r=0" alt="Image 1">
            <p>Date: <?php echo $dates[0]; ?></p>
            <p>Price: <?php echo $prices[0]; ?></p>
            <button class="book-button" onclick="book('<?php echo $destination; ?>', '<?php echo $dates[0]; ?>', '<?php echo $prices[0]; ?>')">Book</button>
        </div>

        <div class="card">
            <img src="https://facts.net/wp-content/uploads/2019/12/mathew-schwartz-gsllxmVO4HQ-unsplash.jpg" alt="Image 2">
            <p>Date: <?php echo $dates[1]; ?></p>
            <p>Price: <?php echo $prices[1]; ?></p>
            <button class="book-button" onclick="book('<?php echo $destination; ?>', '<?php echo $dates[1]; ?>', '<?php echo $prices[1]; ?>')">Book</button>
        </div>

        <div class="card">
            <img src="https://static.toiimg.com/photo/77705127/oie_231564pB5vhUD9.jpg?width=748&resize=4" alt="Image 3">
            <p>Date: <?php echo $dates[2]; ?></p>
            <p>Price: <?php echo $prices[2]; ?></p>
            <button class="book-button" onclick="book('<?php echo $destination; ?>', '<?php echo $dates[2]; ?>', '<?php echo $prices[2]; ?>')">Book</button>
        </div>
    </div>

    <script>
        document.querySelectorAll('.book-button').forEach(function(button) {
            button.addEventListener('click', function () {
                <?php
                if (isset($_SESSION['email'])) {
                    echo 'window.location.href = "booknow.php";';
                } else {
                    echo 'var confirmRedirect = confirm("You need to log in first. Continue or cancel?");
                            if (confirmRedirect) {
                                window.location.href = "login.php";
                            }';
                }
                ?>
            });
        });
    </script>
</body>

</html>
