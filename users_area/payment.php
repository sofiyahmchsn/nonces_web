<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Payment | Nonces Cakes and Bakery</title>
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
    <!-- php code to access user id -->
    <?php 
      $user_ip = getIPAddress();
      $get_user = "Select * from `daftar_user` where ip_user = '$user_ip'";
      $result = mysqli_query($conn, $get_user);
      $run_query = mysqli_fetch_array($result);
      $user_id = $run_query['id_user'];
    ?>
    <div class="container">
        <h2 class="text-center text-info pb-2">Payment Info</h2>
        <div class="row d-flex justify-content-center align-items-center my-3 mx-5">
          <div class="col-md-6 text-center">
            <img src="../img/bank.png" alt="">
          </div>
          <div class="col-md-6 text-center">
            <h4>Bank Mandiri</h4>
            <p>Fatma Albar</p>
            <p>No.Rek : </p>
            <h4>Bank BCA</h4>
            <p>Fatma Albar</p>
            <p>No.Rek : </p>
          </div>
        </div>
        <h4 class="text-center text-secondary"><a href="order.php?user_id=<?php $user_id ?>">Pay Now</a></h4>
        
    </div>

    <!-- bootstrap js link -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>

