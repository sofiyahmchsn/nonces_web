<?php
include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login | Nonces Cakes and Bakery</title>
    <!-- bootstrap css link -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
      crossorigin="anonymous"
    />
    <!-- link font awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <!-- css file -->
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="container-fluid">
      <h2 class="text-center my-2">User Login</h2>
      <div class="row d-flex align-items-center justify-content-center mt-4">
        <div class="col-lg-12 col-xl-6">
          <form action="" method="post">
            <!-- username -->
            <div class="form-outline mb-4">
              <label for="user_username" class="form-lable">Username</label>
              <input
                type="text"
                id="user_username"
                class="form-control"
                placeholder="Enter Your Username"
                autocomplete="off"
                required="required"
                name="user_username"
              />
            </div>
            <!-- password -->
            <div class="form-outline mb-4">
              <label for="user_password" class="form-lable">Password</label>
              <input
                type="password"
                id="user_passwordl"
                class="form-control"
                placeholder="Enter Your Password"
                autocomplete="off"
                required="required"
                name="user_password"
              />
            </div>
            <!-- submit -->
            <div class="mt-4 pt-2">
              <input
                type="submit"
                value="Login"
                class="bg-info py-2 px-3 border-0 text-light"
                name="user_login"
              />
              <p class="small fw-bold mt-2 pt-1">
                Don't have an account? <a href="user_registration.php">Register</a>
              </p>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- bootstrap js link -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>

<?php
// check condition 
if(isset($_POST['user_login'])){
  $user_username = $_POST['user_username'];
  $user_password = $_POST['user_password'];
  $user_ip = getIPAddress();

  $select_query = "Select * from `daftar_user` where username = '$user_username'";
  $result = mysqli_query($conn, $select_query);
  $row_count = mysqli_num_rows($result);
  $row_data = mysqli_fetch_assoc($result);

  // cart item
  $select_query_cart = "Select * from `cart_detail` where ip_address = '$user_ip'";
  $select_cart = mysqli_query($conn, $select_query_cart);
  $row_count_cart = mysqli_num_rows($select_cart);
  
  if($row_count > 0){
    $_SESSION['username'] = $user_username;
    if(password_verify($user_password, $row_data['pass_user'])){
      if($row_count == 1 && $row_count_cart == 0){
        $_SESSION['username'] = $user_username;
        echo "<script>alert('Login Successfully')</script>";
        echo "<script>window.open('profile.php', '_self')</script>";
      }else {
        $_SESSION['username'] = $user_username;
        echo "<script>alert('Login Successfully')</script>";
        echo "<script>window.open('payment.php', '_self')</script>";
      }
    } else{
      echo "<script>alert('Invalid password')</script>";
    }
  } else{
    echo "<script>alert('Username not registered')</script>";
  }
  
}
?>