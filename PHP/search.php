
<?php
include "SQL_connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['query'])) {
        $search_query = $_GET['query'];
        $search_query = '%' . $search_query . '%';

        if (!$conn) {
            die("Database connection failed: " . mysqli_connect_error());
        }

        $sql_query = "SELECT * FROM query WHERE destination LIKE ? OR date LIKE ? OR price LIKE ?";//SQL LIKE 
        
        $stmt_query = mysqli_prepare($conn, $sql_query);+//preparazione della query
        mysqli_stmt_bind_param($stmt_query, "sss", $search_query, $search_query, $search_query);//bind dei parametri  
        mysqli_stmt_execute($stmt_query);
        $result_query = mysqli_stmt_get_result($stmt_query);

        if (mysqli_num_rows($result_query) > 0) {
            echo "<div class='card-container'>";
            while ($row_query = mysqli_fetch_assoc($result_query)) {
                echo "<div class='swiper-slide'>";
                echo "<div class='card'>";
                echo "<h2>{$row_query['destination']}</h2>";
                $dates_query = json_decode($row_query['date']);
                $prices_query = json_decode($row_query['price']);
                for ($i = 0; $i < count($dates_query); $i++) {
                    echo "<p>Date: {$dates_query[$i]}, Price: {$prices_query[$i]}</p>";
                }
                echo "<button class='book-button'
                        onclick()>Book</button>";
                echo "</div>";
                echo "</div>";

            }
            echo "</div>";
        } else {
            echo "No results found in queries!";
        }

        mysqli_stmt_close($stmt_query);
        mysqli_close($conn);
    } else {
        echo "No query provided!";
    }
}
?>
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
            </script>";