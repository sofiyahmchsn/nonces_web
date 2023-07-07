<?php
  include('../includes/connect.php');
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Checkout | Nonces Cakes and Bakery</title>
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
    <div class="container-fluid p-0">
      <!-- navbar start -->
      <?php include("../navbar/navbar_no_price.php") ?>
      <!-- navbar end -->

      <!-- welcome guest start -->
      <?php include("../navbar/welcome.php") ?>
      <!-- welcome guest end -->

      <!-- Title Menu start -->
      <div class="bg-light p-3">
        <h3 class="text-center">Menu</h3>
        <p class="text-center">
          Lorem ipsum dolor sit, amet consectetur adipisicing.
        </p>
      </div>
      <!-- Title Menu end -->

      <!-- content start -->
      <div class="row m-4">
        <div class="col-md-12">
          <div class="row">
            <?php
            if(!isset($_SESSION['username'])){
                include('user_login.php');
            } else {
                include('payment.php');
            }
            ?>
          </div>
        </div>
      </div>
      <!-- content end -->

      <!-- footer start -->
      <?php include("../includes/footer.php") ?>
      <!-- footer end -->
    </div>

    <!-- link bootstrap js -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
