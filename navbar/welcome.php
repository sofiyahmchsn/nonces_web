<!-- welcome guest start -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <div class="navbar-nav me-auto mx-4">
          <ul class="navbar-nav">
            <?php
              if(!isset($_SESSION['username'])){
                echo "
                <li class='nav-item'>
                  <a class='nav-link' href='#'>Welcome Guest</a>
                </li>";
              } else {
                echo "
                <li class='nav-item'>
                  <a class='nav-link' href='profile.php'>Welcome ".$_SESSION['username']."</a>
                </li>";
              }
              if(!isset($_SESSION['username'])){
                echo "
                <li class='nav-item'>
                  <a class='nav-link' href='./users_area/user_login.php'>Login</a>
                </li>";
              } else {
                echo "
                <li class='nav-item'>
                  <a class='nav-link' href='./users_area/logout.php'>Logout</a>
                </li>";
              }
            ?>
            
          </ul>
        </div>
      </nav>
      <!-- welcome guest end -->