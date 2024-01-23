<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <link rel="stylesheet" href="css/profile.css"> 
</head>
<body>
<div class="profile-container">
    <div class="profile-info">
    <?php
        include "SQL_connection.php"; // include il connection al database

        session_start();
        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];

            if (!$conn) {
                die("Database connection failed: " . mysqli_connect_error());
            }

            $query = "SELECT name, lastname, email FROM user WHERE username = ?";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            if (mysqli_stmt_num_rows($stmt) == 1) {
                mysqli_stmt_bind_result($stmt, $name, $lastname, $email);
                mysqli_stmt_fetch($stmt);
            }

            mysqli_close($conn);
        }

        echo '<h1>Your Profile</h1>';
        echo '<form id="profileForm" method="post" action="update_profile.php">';
        echo '<p><strong>Name:</strong> <span id="name">' . $name . '</span></p>';
        echo '<p><strong>Lastname:</strong> <span id="lastname">' . $lastname . '</span></p>';
        echo '<p><strong>Username:</strong> <span id="username">' . $username . '</span></p>';
        echo '<p><strong>Email:</strong> <span id="email">' . $email . '</span></p>';
        echo '<div class="profile-change">';
        echo '<button type="button" onclick="editProfile()">Change</button>';
        echo '</div>';
        echo '<div class="profile-update" style="display: none;">';
        echo '<button type="submit">Update</button>';
        echo '</div>';
        echo '</form>';
        ?>
    </div>
</div>

<script>
  function editProfile() {
    const nameSpan = document.getElementById('name');
    const lastnameSpan = document.getElementById('lastname');
    const emailSpan = document.getElementById('email');

    nameSpan.innerHTML = '<input type="text" name="editName" id="editName" value="' + nameSpan.textContent + '">';
    lastnameSpan.innerHTML = '<input type="text" name="editLastname" id="editLastname" value="' + lastnameSpan.textContent + '">';
    emailSpan.innerHTML = '<input type="text" name="editEmail" id="editEmail" value="' + emailSpan.textContent + '">';

    document.querySelector('.profile-change button').style.display = 'none';
    document.querySelector('.profile-update').style.display = 'block';
}

</script>
<div class="my-booking">
<h1>Your Bookings : --------------------------------------------------------------------------------------------- </h1>

    <table id="mybooking">

        <thead>
            <tr>
                <th>Booking Destination</th>
                <th>Booking Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "SQL_connection.php";


            if (isset($_SESSION['username'])) {
                $username = $_SESSION['username'];


                if (!$conn) {
                    die("Database connection failed: " . mysqli_connect_error());
                }

                $query = "SELECT destination, date FROM booking WHERE username = ?";
                $stmt = mysqli_prepare($conn, $query);
                mysqli_stmt_bind_param($stmt, "s", $username);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>' . $row['destination'] . '</td>';
                    echo '<td>' . $row['date'] . '</td>';
                    echo '</tr>';
                }

                mysqli_close($conn);
            }
            ?>
        </tbody>
    </table>
</div>
</div>
</body>
</html>
