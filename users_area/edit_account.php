<?php
  if(isset($_GET['edit_account'])){
    $user_session_name = $_SESSION['username'];
    $select_query = "Select *from `daftar_user` where username = $username";
    
    $result_query = mysqli_query($conn, $select_query);
    $row_fetch = mysqli_fetch_assoc($result_query);
   
    $user_id = $row_fetch['id_user'];
    $username = $row_fetch['username'];
    $user_email = $row_fetch['email_user'];
    $user_address = $row_fetch['alamat_user'];
    $user_mobile = $row_fetch['no_telp_user'];
    
    if(isset($_POST['user_update'])){
      $update_id = $user_id;
      $user_id = $_POST['id_user'];
      $username = $_POST['username'];
      $user_email = $_POST['email_user'];
      $user_address = $_POST['alamat_user'];
      $user_mobile = $_POST['no_telp_user'];

      // update query
      $update_data = "update `daftar_user` set username = '$username', email_user = '$user_email', alamat_user = '$user_address', no_telp_user = '$user_mobile' where id_user = $user_id";
      $result_query_update = mysqli_query($conn, $update_data);
      if($result_query_update){
        echo "<script>alert('Data updated successfully')</script>";
        // echo "<script>window.open('logout.php', '_self')</script>";

      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit Account | Nonces Cakes and Bakery</title>
    <!-- link bootstrap css -->
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
    <h3 class="mb-4">Edit Account</h3>
    <form action="" method="post" class="align-items-center justify-content-center">
        <div class="form-outline mb-4 m-auto">
          <label for="user_username" class="form-lable">Username</label>
          <input type="text" class="form-control w-50 m-auto" name="user_username" value="<?php $username ?>">
        </div>
        <div class="form-outline mb-4 m-auto">
          <label for="user_username" class="form-lable">Email</label>
          <input type="email" class="form-control w-50 m-auto" name="user_email" value="<?php $user_email ?>">
        </div>
        <div class="form-outline mb-4 m-auto">
          <label for="user_username" class="form-lable">Address</label>
          <input type="text" class="form-control w-50 m-auto" name="user_address" value="<?php $user_address ?>">
        </div>
        <div class="form-outline mb-4 m-auto">
          <label for="user_username" class="form-lable">Mobile Phone</label>
          <input type="text" class="form-control w-50 m-auto" name="user_mobile" value="<?php $user_mobile ?>">
        </div>
        <input type="submit" value="Update" class="bg-info py-2 px-3 border-0" name="user_update">
    </form>

    <!-- link bootstrap js -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
