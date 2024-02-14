<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <link rel="stylesheet" href="../css/showprofile.css">
</head>
<body>
    <header>
        <?php
            session_start();
            include "navbar.php";
        ?>
    </header>
    <div class="profile-container">
        <div class="profile-info">
            <?php
                include "SQL_connection.php";

                if (isset($_SESSION['email'])) {
                    $email = $_SESSION['email'];

                    if (!$conn) {
                        die("Database connection failed: " . mysqli_connect_error());
                    }

                    $sql = "SELECT firstname, lastname, email FROM user WHERE email = ?";
                    $stmt = mysqli_prepare($conn, $sql);
                    mysqli_stmt_bind_param($stmt, "s", $email);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);

                    if (mysqli_stmt_num_rows($stmt) == 1) {
                        mysqli_stmt_bind_result($stmt, $first_name, $last_name, $email);
                        mysqli_stmt_fetch($stmt);
                    }

                    mysqli_close($conn);
                }

                echo '<h1>Your Profile</h1>';
                echo '<form id="profileForm" method="post" action="update_profile.php">';
                echo '<p><strong>Name:</strong> <span id="firstname">' . $first_name . '</span></p>';
                echo '<p><strong>Lastname:</strong> <span id="lastname">' . $last_name . '</span></p>';
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
            const nameSpan = document.getElementById('firstname');
            const lastnameSpan = document.getElementById('lastname');
            const emailSpan = document.getElementById('email');

            nameSpan.innerHTML = '<input type="text" name="firstname" id="firstname" value="' + nameSpan.textContent + '" required>';
            lastnameSpan.innerHTML = '<input type="text" name="lastname" id="lastname" value="' + lastnameSpan.textContent + '" required>';
            emailSpan.innerHTML = '<input type="text" name="email" id="email" value="' + emailSpan.textContent + '" required>';

            document.querySelector('.profile-change button').style.display = 'none';
            document.querySelector('.profile-update').style.display = 'block';
        }
    </script>

    <div class="my-booking">
        <h1>Your Bookings : ------------------------------------------------------------------------------------------ </h1>

        <table id="mybooking">
            <thead>
                <tr>
                    <th>Booking Destination</th>
                    <th>Booking Date</th>
                    <th>PromoCode</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include "SQL_connection.php";

                    if (isset($_SESSION['email'])) {
                        $email = $_SESSION['email'];

                        if (!$conn) {
                            die("Database connection failed: " . mysqli_connect_error());
                        }

                        $sql = "SELECT destination, date, promoCode FROM booking WHERE email = ?";
                        $stmt = mysqli_prepare($conn, $sql);
                        mysqli_stmt_bind_param($stmt, "s", $email);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            echo '<td>' . $row['destination'] . '</td>';
                            echo '<td>' . $row['date'] . '</td>';
                            echo '<td>' . $row['promoCode'] . '</td>';
                            echo '</tr>';
                        }

                        mysqli_close($conn);
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

