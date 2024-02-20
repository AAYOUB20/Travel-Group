<!DOCTYPE html>
<html>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Travel Company</title>
    <!-- Bootstrap  -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">  <!-- il moodel di navabar e preso da boostrap -->
   <link rel="stylesheet" href="../css/navbar.css"> <!-- alcuni altri style sono nell csss -->
</head>,
<body>
<nav class="navbar navbar-expand-lg  fixed-top">
        <a class="navbar-brand" href="project.php"> 
            <img src="../foto/logo.jpg" alt="Company Logo"> 
            <span>Travel Group</span> <!-- questo e il logo della e quando viene gigitat porta a progect.php -->
        </a>
 
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="project.php">Home</a></li><!-- button home con link al project.php -->
                <li class="nav-item"><a class="nav-link" href="project.php#contact">Contact Us</a></li></li>
                <li class="nav-item"><a class="nav-link" href="project.php#about">About</a></li></li>
                <li class="nav-item">
                    <?php
                    if (isset($_SESSION['email'])) { // qua stiamo vedendo se la sessione e settata (utente ha fatto login)
                        echo '<li class="nav-item dropdown">';
                        echo '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                        echo $_SESSION['email']; 
                        echo '</a>';
                        echo '<div class="dropdown-menu" aria-labelledby="navbarDropdown">';
                        echo '<a class="dropdown-item" href="show_profile.php">Profile</a>';// qua mettiamo button profile con il link per vedere il mio profilo (show_profile.php)

                        if ($_SESSION['admin'] == 1) { // qua e importante per vedere se il utente e admin o no
                            echo '<a class="dropdown-item" href="admin.php">Admin</a>'; // se session admin = 1 allora mi fa vedere il button admin con il link per vedere la pagina admin.php
                        }
                        echo '<a class="dropdown-item" href="logout.php">Logout</a>';// logout button 
                        echo '</div>';
                        echo '</li>';
                    } else { // else se la sessione non e settata (utente non ha fatto login)
                        echo '<a class="nav-link" href="login.php">Login</a>';// login button
                    }
                    ?>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="search.php" method="GET"><!-- questo e per fare la ricerca , abbiamo un form con il action search.php e method GET -->
                <input class="form-control mr-sm-2" type="text" name="query" placeholder="Search travel"> 
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button><!-- questo e il button search per fare la ricerca -->
            </form>
        </div>
    </nav>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
</body>

</html>
