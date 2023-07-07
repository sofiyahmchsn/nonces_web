<?php
  include('includes/connect.php');
  include('functions/common_function.php');
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>All Menu | Nonces Cakes and Bakery</title>
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
      <?php include("./navbar/navbar.php") ?>
      <!-- navbar end -->

      <!-- calling cart function -->
      <?php
        cart();
      ?>

      <!-- welcome guest start -->
      <?php include("./navbar/welcome.php") ?>
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
        <div class="col-md-10">
          <!-- products -->
          <div class="row">
            <!-- fetching products start-->
            <?php
            // calling function
              getAllProducts();
              getUnikCategories();
            ?>
            <!-- fetching products end-->
          </div>
        </div>
        <!-- sidenav -->
        <div class="col-md-2 bg-secondary p-0">
          <ul class="navbar-nav me-auto text-center">
            <li class="nav-item bg-info">
              <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
            </li>

            <?php 
            getcategories();
            ?>

          </ul>
        </div>
      </div>
      <!-- content end -->

      <!-- footer start -->
      <!-- include footer -->
      <?php include("./includes/footer.php") ?>
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
