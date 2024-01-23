<?php
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
    <h1>Sri Lanka</h1>

    <div class="card-container">
        <div class="card">
            <img src="https://www.jacadatravel.com/wp-content/uploads/2017/04/sri-lanka-tea-plantations.jpg" alt="Image 1">
            <p>Date: <?php echo $dates[0]; ?></p>
            <p>Price: <?php echo $prices[0]; ?></p>
        </div>

        <div class="card">
            <img src="https://www.planetware.com/wpimages/2020/01/sri-lanka-best-places-to-visit-kandy.jpg" alt="Image 2">
            <p>Date: <?php echo $dates[1]; ?></p>
            <p>Price: <?php echo $prices[1]; ?></p>
        </div>

        <div class="card">
            <img src="https://franks-travelbox.com/wp-content/uploads/2017/11/sri-lanka-der-hocc88hlentempel-von-dambulla-liegt-etwa-150km-occ88stlich-der-hauptstadt-colombo-sri-lanka-er-ist-der-grocc88sste-und-besterhaltene-buddhistische-hocc88hlentempel-des-landes-2048x1365.jpg" alt="Image 3">
            <p>Date: <?php echo $dates[2]; ?></p>
            <p>Price: <?php echo $prices[2]; ?></p>
        </div>
    </div>
</body>

</html>
