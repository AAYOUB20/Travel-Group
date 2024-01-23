<?php
include "SQL_connection.php"; 

$sql = "SELECT * FROM query WHERE destination = 'Rome'";
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
    <h1>Rome</h1>

    <!-- Display three horizontal cards -->
    <div class="card-container">
        <div class="card">
            <img src="https://th.bing.com/th/id/R.80e6b3a518b346f780765e31cadac3f0?rik=Bl50elVZk5W9fw&riu=http%3a%2f%2ftraveldigg.com%2fwp-content%2fuploads%2f2016%2f05%2fColosseum-Photography.jpg&ehk=ur%2f0Y%2b9nXJUjyQaxWD6Zl555nZ7hdmVIT5h95013QY8%3d&risl=&pid=ImgRaw&r=0" alt="Image 1">
            <p>Date: <?php echo $dates[0]; ?></p>
            <p>Price: <?php echo $prices[0]; ?></p>
        </div>

        <div class="card">
            <img src="https://th.bing.com/th/id/R.4db521bb8c58be68f59ac7620529bb19?rik=Jt6A6Km%2bSv5TnA&pid=ImgRaw&r=0" alt="Image 2">
            <p>Date: <?php echo $dates[1]; ?></p>
            <p>Price: <?php echo $prices[1]; ?></p>
        </div>

        <div class="card">
            <img src="https://www.wallpaperup.com/uploads/wallpapers/2013/07/30/125364/afd2f789efbdbb65de050872a480f0cb.jpg" alt="Image 3">
            <p>Date: <?php echo $dates[2]; ?></p>
            <p>Price: <?php echo $prices[2]; ?></p>
        </div>
    </div>
</body>

</html>
