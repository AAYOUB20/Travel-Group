<?php
session_start();

include "SQL_connection.php";

$adminQuery = "SELECT * FROM messages ORDER BY timestamp DESC";
$adminResult = mysqli_query($conn, $adminQuery);

if (!$adminResult) {
    die("Error executing the admin query: " . mysqli_error($conn));
}

$userQuery = "SELECT firstname, lastname, email  FROM user ORDER BY email"; 
$userResult = mysqli_query($conn, $userQuery);

if (!$userResult) {
    die("Error executing the user query: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<?php
    include "navbar.php";
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Messages</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table-container {
            display: none;
        }

        .table-btn {
            background: none;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #333;
            font-weight: bold;
        }
    </style>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
</head>
   

<body>
    
   
    <div class="container mt-5">
        <button id="showAdminMessagesBtn" class="btn btn-primary table-btn" onclick="toggleTable('adminTableContainer')">
            <i class="fas fa-envelope" style="font-size: 24px;"></i> Admin Messages
        </button>
        <div class="table-container" id="adminTableContainer">
            <h2 class="mt-3">Admin Messages</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Timestamp</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($adminResult)) {
                            echo "<tr>";
                            echo "  <td>{$row['Name']}</td>";
                            echo "  <td>{$row['Email']}</td>";
                            echo "  <td>{$row['Messages']}</td>";
                            echo "  <td>{$row['timestamp']}</td>"; 
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <button id="showUserMessagesBtn" class="btn btn-success table-btn" onclick="toggleTable('userTableContainer')">
              <img src="https://www.logolynx.com/images/logolynx/4b/4beebce89d681837ba2f4105ce43afac.png" alt="User Icon" style="width: 24px; height: 24px;">
               Registered Users
        </button>

        <div class="table-container" id="userTableContainer">
            <h2 class="mt-3">Registred Users</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>firstname</th>
                            <th>Lastname</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($userResult)) {
                            echo "<tr>";
                            echo "  <td>{$row['firstname']}</td>";
                            echo "  <td>{$row['lastname']}</td>";
                            echo "  <td>{$row['email']}</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function toggleTable(tableId) {
            var tableContainer = document.getElementById(tableId);
            tableContainer.style.display = (tableContainer.style.display === 'none' || tableContainer.style.display === '') ? 'block' : 'none';
        }
    </script>
</body>

</html>

<?php
mysqli_close($conn);
?>
