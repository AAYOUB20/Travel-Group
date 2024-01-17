<!DOCTYPE html>
<html>

<style>
      .navbar.fixed {
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }
        ul.navbar {
            list-style-type: none;
            margin: 0;
            padding: 0;
            background-color: #333;
            overflow: hidden;
        }

        ul.navbar li {
            float: right;
        }

        

        ul.navbar a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        ul.navbar a:hover {
            background-color: #555555;
        }
     

         .subnav {
             display: none;
             position: absolute;
             background-color: #333;
              min-width: 160px;
              box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
              z-index: 1;
            }
            
         .username-item:hover .subnav {
             display: block;
            }
        
</style>

<header>
<ul class="navbar">
  
      <li><a href="project.php">Home</a></li>
      <li><a href="project.php#contact">Contact Us</a></li>
      <li><a href="project.php#about">About</a></li>

      <li class="username-item">
        
          <?php

          if (isset($_SESSION['username'])) {
              echo '<a class="username" href="#">' . $_SESSION['username'] . '</a>';
              echo '<div class="subnav">';
              echo '<a href="profile.php">profile</a>';
              if($_SESSION['admin'] == 1){
                echo '<a href="admin.php">Admin</a>';
           }
              echo '<a href="logout.php">Logout</a>';
             echo '</div>';
          
          } else {
              echo '<a href="login.html">Login</a>';
          }
          ?>
           
      </li>

</form>
  </ul>
</header>
</html>