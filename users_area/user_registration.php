<?php
include('../includes/connect.php');
include('../functions/common_function.php')
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Registration | Nonces Cakes and Bakery</title>
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
    <div class="container-fluid my-3">
      <h2 class="text-center my-3">User Registration</h2>
      <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-12 col-xl-6">
          <form action="" method="post">
            <!-- name -->
            <div class="form-outline mb-4">
              <label for="user_name" class="form-lable">Name</label>
              <input
                type="text"
                id="user_name"
                class="form-control"
                placeholder="Enter Your Name"
                autocomplete="off"
                required="required"
                name="user_name"
              />
            </div>
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
            <!-- email -->
            <div class="form-outline mb-4">
              <label for="user_email" class="form-lable">Email</label>
              <input
                type="email"
                id="user_email"
                class="form-control"
                placeholder="Enter Your Email"
                autocomplete="off"
                required="required"
                name="user_email"
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
            <!-- confirm password -->
            <div class="form-outline mb-4">
              <label for="user_password" class="form-lable">
                Confirm Password</label
              >
              <input
                type="password"
                id="conf_user_password"
                class="form-control"
                placeholder="Confirm Password"
                autocomplete="off"
                required="required"
                name="conf_user_password"
              />
            </div>
            <!-- address -->
            <div class="form-outline mb-4">
              <label for="user_address" class="form-lable">Address</label>
              <input
                type="text"
                id="user_address"
                class="form-control"
                placeholder="Enter Your Address"
                autocomplete="off"
                required="required"
                name="user_address"
              />
            </div>
            <!-- contact (no.hp) -->
            <div class="form-outline mb-4">
              <label for="user_contact" class="form-lable">Contact</label>
              <input
                type="text"
                id="user_contact"
                class="form-control"
                placeholder="Enter Your Mobile Phone"
                autocomplete="off"
                required="required"
                name="user_contact"
              />
            </div>
            <!-- submit -->
            <div class="mt-4 pt-2">
              <input
                type="submit"
                value="Register"
                class="bg-info py-2 px-3 border-0 text-light"
                name="user_register"
              />
              <p class="small fw-bold mt-2 pt-1">
                Already have an account? <a href="user_login.php">Login</a>
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
if(isset($_POST['user_register'])){
  $user_name = $_POST['user_name'];
  $user_username = $_POST['user_username'];
  $user_email = $_POST['user_email'];
  $user_password = $_POST['user_password'];
  $hash_password = password_hash($user_password, PASSWORD_DEFAULT);
  $conf_user_password = $_POST['conf_user_password'];
  $user_address = $_POST['user_address'];
  $user_contact = $_POST['user_contact'];
  $user_ip = getIPAddress();

  // select query
  $select_query = "Select * from `daftar_user` where username = '$user_username' or email_user = '$user_email'";
  $result = mysqli_query($conn, $select_query);
  $rows_count = mysqli_num_rows($result);

  if($rows_count > 0){
    echo "<script>alert('Username or Email allready exist!')</script>";
  } else if ($user_password != $conf_user_password){
    echo "<script>alert('Password do not match!')</script>";
  } else {
    // insert query
    $insert_query = "insert into `daftar_user` (nama_user, username, email_user, ip_user, no_telp_user, alamat_user, pass_user) values ('$user_name', '$user_username', '$user_email', '$user_ip', '$user_contact', '$user_address', '$hash_password')";
  
    $sql_execute = mysqli_query($conn, $insert_query);
  
    // if($sql_execute){
    //   echo "<script>alert('Data Inserted Successfully!')</script>";
    // } else{
    //   die(mysqli_connect_error($conn));
    // }
  }

  // select cart items 
  $select_cart_items = "Select * from `cart_detail` where ip_address = '$user_ip'";
  $result_cart = mysqli_query($conn, $select_cart_items);
  $rows_count = mysqli_num_rows($result_cart);

  if($rows_count > 0){
    $_SESSION['username'] = $user_username;
    echo "<script>alert('You have items in your cart!')</script>";
    echo "<script>window.open('checkout.php', '_self')</script>";
  } else {
    echo "<script>window.open('../index.php', '_self')</script>";
  }

}

?>