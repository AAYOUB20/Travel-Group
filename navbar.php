<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/navbar.css">

<header>
<ul class="navbar">
  
      <li><a href="project.php">Home</a></li>
      <li><a href="project.php#contact">Contact Us</a></li>
      <li><a href="about.php">About</a></li>

      <li class="username-item">
        
          <?php
    
          if (isset($_SESSION['email'])) {
              echo '<a class="email" href="#">' . $_SESSION['email'] . '</a>';
              echo '<div class="subnav">';
              echo '<a href="show_profile.php">profile</a>';
              if($_SESSION['admin'] == 1){
                echo '<a href="admin.php">Admin</a>';
           }
              echo '<a href="logout.php">Logout</a>';
             echo '</div>';
          
          } else {
              echo '<a href="login.php">Login</a>';
          }
          ?>
           
      </li>

</form>
  </ul>
</header>
</html>