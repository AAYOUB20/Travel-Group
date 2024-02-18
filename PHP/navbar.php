<!DOCTYPE html>
<html>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Travel Company</title>
    <!-- Bootstrap  -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> 
   <link rel="stylesheet" href="../css/navbar.css"> 
</head>,
<body>
<nav class="navbar navbar-expand-lg  fixed-top">
        <a class="navbar-brand" href="project.php">
            <img src="../foto/logo.jpg" alt="Company Logo"> 
            <span>Travel Group</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            &#9776;
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="project.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="project.php#contact">Contact Us</a></li>
                <li class="nav-item"><a class="nav-link" href="project.php#about">About</a></li>
                <li class="nav-item">
                    <?php
                    if (isset($_SESSION['email'])) {
                        echo '<li class="nav-item dropdown">';
                        echo '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                        echo $_SESSION['email'];
                        echo '</a>';
                        echo '<div class="dropdown-menu" aria-labelledby="navbarDropdown">';
                        echo '<a class="dropdown-item" href="show_profile.php">Profile</a>';
                        if ($_SESSION['admin'] == 1) {
                            echo '<a class="dropdown-item" href="admin.php">Admin</a>';
                        }
                        echo '<a class="dropdown-item" href="logout.php">Logout</a>';
                        echo '</div>';
                        echo '</li>';
                    } else {
                        echo '<a class="nav-link" href="login.php">Login</a>';
                    }
                    ?>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="search.php" method="GET">
                <input class="form-control mr-sm-2" type="text" name="query" placeholder="Search travel">
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
</body>

</html>
