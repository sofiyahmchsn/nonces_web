<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Dashboard</title>
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
    <link rel="stylesheet" href="../style.css" />
  </head>
  <body>
    <!-- navbar start -->
    <div class="container-fluid p-0">
      <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <div class="container-fluid">
          <a class="navbar-brand text-light fs-3" href="#">nonces</a>
          <nav class="navbar navbar-expand-l">
            <ul class="navbar-nav">
              <li class="nav-item">
                <!-- <a href="#"><img src="" alt="" class="admin_img"></a> -->
                <a href="" class="nav-link">Welcome Guest</a>
              </li>
            </ul>
          </nav>
        </div>
      </nav>
      <!-- welcome h3 -->
      <div class="bg-light">
        <div class="text-center p-2">
          <h2>Welcome Admin</h2>
          <p class="fs-5">Manage Details</p>
        </div>
      </div>
    </div>
    <!-- navbar end -->

    <!-- menu-menu navbar start -->
    <div class="row">
      <div
        class="col-md-12 bg-secondary p-2 d-flex justify-content-center align-items-center"
      >
        <div class="px-5">
          <a href="#"
            ><img src="../img/admin.jpg" alt="" class="admin_img"
          /></a>
          <p class="text-light text-center">Admin Name</p>
        </div>
        <div class="button text-center">
          <button>
            <a href="index.php" class="nav-link text-light bg-info p-1 m-1"
              >Home</a
            ></button
          ><button>
            <a href="insert_product.php" class="nav-link text-light bg-info p-1 m-1"
              >Instert Products</a
            ></button
          ><button>
            <a href="" class="nav-link text-light bg-info p-1 m-1"
              >View Products</a
            ></button
          ><button>
            <a
              href="index.php?insert_category"
              class="nav-link text-light bg-info p-1 m-1"
              >Insert Categories</a
            ></button
          ><button>
            <a href="" class="nav-link text-light bg-info p-1 m-1"
              >View Categories</a
            ></button
          ><button>
            <a href="" class="nav-link text-light bg-info p-1 m-1"
              >All Orders</a
            ></button
          ><button>
            <a href="" class="nav-link text-light bg-info p-1 m-1"
              >All Payments</a
            ></button
          ><button>
            <a href="" class="nav-link text-light bg-info p-1 m-1"
              >List User</a
            ></button
          ><button>
            <a href="" class="nav-link text-light bg-info p-1 m-1">Logout</a>
          </button>
        </div>
      </div>
    </div>

    <!-- insert category php start -->
    <div class="container my-4">
      <?php 
        if(isset($_GET['insert_category'])){
          include('insert_categories.php');
        }
      ?>
    </div>
    <!-- insert category php end -->

    <!-- menu-menu navbar end -->

    <!-- footer start -->
    <!-- <div class="bg-primary p-1 text-center">
        <p>&copy Copy Right 2023 - Design By Sofiyah</p>
    </div> -->
    <!-- footer end -->

    <!-- bootstrap js link -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
