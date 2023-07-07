<?php
    include('../includes/connect.php');

    if(isset($_POST['insert_product'])){
      $product_title= $_POST['product_title'];
      $product_desc = $_POST['product_desc'];
      // $product_keyword = $_POST['product_keyword'];
      $product_category = $_POST['product_category'];
      $product_price = $_POST['product_price'];
      $product_status = 'true';
      
      // access image
      $product_image = $_FILES['product_image']['name'];
      
      // accessing image temp name
      $temp_image = $_FILES['product_image']['tmp_name'];
    
      // (kalo mau nambahin search bar pake ini)
      // if($product_title == '' || $product_desc == '' || $product_keyword == '' ||$product_category == ''|| $product_price == '' || $product_image == '' || $temp_image == '') 
      // $insert_product = "insert into `kelola_produk` (nama_produk, desk_produk, id_cat, img_produk, harga_produk, date, status) ('$product_title','$product_desc', '$product_keyword', '$product_category', '$product_category', '$product_image', '$product_price', NOW(), '$product_status')";

      // checking empty condition
      if($product_title == '' || $product_desc == '' || $product_category == '' || $product_price == '' || $product_image == '' || $temp_image == ''){
        echo "<script> alert ('Please fill all the variable fields')</script>";
        exit();
      }else {
        move_uploaded_file($temp_image,"./product_images/$product_image");

        // insert query "insert into `nama_db`(nama_tabel) values ('$nama_var') "
        $insert_product = "insert into `kelola_produk` (nama_produk, desk_produk, id_cat, img_produk, harga_produk, date, status) values ('$product_title','$product_desc', '$product_category', '$product_image', '$product_price', NOW(), '$product_status')";

        $result_query = mysqli_query($conn, $insert_product);
        
        if($result_query){
          echo "<script>alert ('Successfully inserted the products')</script>";
        }
      }
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Insert Produk - Admin Dashboard</title>
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
    <div class="bg-light">
      <div class="container mt-3">
        <h1 class="text-center">Insert Product</h1>
        <form action="" method="post" enctype="multipart/form-data">
          <!-- insert tittle -->
          <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_title" class="form-label">Product Title</label>
            <input
              type="text"
              name="product_title"
              id="product_title"
              class="form-control"
              placeholder="Enter product title"
              autocomplete="off"
              required="required"
            />
          </div>
          <!-- description -->
          <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_desc" class="form-label"
              >Product Description</label
            >
            <input
              type="text"
              name="product_desc"
              id="product_desc"
              class="form-control"
              placeholder="Enter product description"
              autocomplete="off"
              required="required"
            />
          </div>
          <!-- keyword -->
          <!-- <div class="form-outline mb-4 w-50 m-auto">
              <label for="product_keyword" class="form-label">Product Keyword</label>
              <input type="text" name="product_keyword" id="product_keyword" class="form-control" placeholder="Enter product keyword" autocomplete="off" required="required"/>
            </div> -->

          <!-- select category -->
          <div class="form-outline mb-4 w-50 m-auto">
            <select name="product_category" id="" class="form-select">
              <option value="">Select a Category</option>
              <?php
                $select_query = "Select * from `categories`";
                $result_query = mysqli_query($conn, $select_query);

                while($row = mysqli_fetch_assoc($result_query)){
                    $nama_cat = $row['nama_cat'];
                    $id_cat = $row['id_cat'];

                    echo "<option value='$id_cat'>$nama_cat</option>";
                }
              ?>
            </select>
          </div>

          <!-- image -->
          <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_image" class="form-label">Product Image</label>
            <input
              type="file"
              name="product_image"
              id="product_image"
              class="form-control"
              required="required"
            />
          </div>
          <!-- price -->
          <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_price" class="form-label">Product Price</label>
            <input
              type="text"
              name="product_price"
              id="product_price"
              class="form-control"
              placeholder="Enter product price"
              autocomplete="off"
              required="required"
            />
          </div>
          <!-- submit button -->

          <div class="form-outline mb-4 w-50 m-auto">
            <input
              type="submit"
              name="insert_product"
              id=""
              class="btn btn-info mb-3 px-3 text-light"
              value="Insert product"
            />
          </div>
        </form>
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
