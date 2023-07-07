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
    <title>Cart Details | Nonces Cakes and Bakery</title>
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
    <style>
      .cart_img {
        width: 80px;
        height: 80px;
        object-fit: contain;
      }
    </style>
  </head>
  <body>
    <div class="container-fluid p-0">
      <!-- navbar start -->
      <?php include("./navbar/navbar_no_price.php") ?>
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

      <!-- cart detail start -->
      <div class="container">
        <div class="row">
          <form action="" method="post">
            <table class="table table-bordered text-center">
              <!-- php code to display dynamic data start -->
              <?php
              global $conn;
              $getIPAdd = getIPAddress();
              $total_price = 0;
              
              $cart_query = "Select * from `cart_detail` where ip_address = '$getIPAdd'";
              $result = mysqli_query($conn, $cart_query);
              $result_count = mysqli_num_rows($result);
              
              if($result_count > 0 ){
                echo 
                "<thead>
                  <tr>
                    <th>Product Title</th>
                    <th>Product Image</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th colspan='2'>Operation</th>
                  </tr>
                </thead>";
                while($row = mysqli_fetch_array($result)){
                    // fetch product_id 
                    $product_id = $row['id_produk'];
                    $select_product = "Select * from `kelola_produk` where id_produk = $product_id";
                    $result_products= mysqli_query($conn, $select_product);
            
                    // fetch total_price
                    while($row_product_price = mysqli_fetch_array($result_products)){
                        $product_price = array($row_product_price['harga_produk']);
                        $price_table = $row_product_price['harga_produk'];
                        $product_title = $row_product_price['nama_produk'];
                        $product_img = $row_product_price['img_produk'];
                        $product_value = array_sum($product_price);
                        $total_price += $product_value;
                ?>
                <!-- php code to display dynamic data end -->
                <tbody>
                  <tr>
                    <td><?php echo $product_title ?></td>
                    <td>
                      <img src="./admin_area/product_images/<?php echo $product_img ?>" alt="<?php echo $product_title ?>" class="cart_img "/>
                    </td>
                    <td><input type="text" name="qty" class="form-input w-50"/></td>
                    <!-- update qty cart -->
                    <?php 
                      $getIPAdd = getIPAddress();
                      if(isset($_POST['update_cart'])){
                        $quantity = $_POST['qty'];
                        $update_cart = "update `cart_detail` set quantity = $quantity where ip_address ='$getIPAdd'";
                        $result_products_quantity= mysqli_query($conn, $update_cart);
                        $total_price = $total_price*$quantity;
                      }
                    ?>
                    <!-- delete cart -->
                    <!-- <?php
                      $getIPAdd = getIPAddress();
                      if(isset($_GET['remove_cart'])){
                        $get_product_id = $_GET['remove_cart'];
                        $delete_query = "Delete from `cart_detail` where id_produk = $get_product_id";
                        $run_delete = mysqli_query($conn, $delete_query);
                        if($run_delete){
                          echo "<script>window.open('cart.php', '_self')</script>";
                        }
                      }
                    ?> -->
                    <td>Rp.<?php echo $price_table ?></td>
                    <td>
                      <input type="submit" value="Update" class="bg-info px-3 py-2 mx-3 border-0 text-light" name="update_cart">
                      <input type="submit" value="Remove" class="bg-danger px-3 py-2 mx-3 border-0 text-light" name="remove_cart">
                    </td>
                  </tr>
                <?php 
                    }
                }
              } else {
                echo "<h2 class='text-center text-danger'>Cart Is Empty</h2>";
              }
              ?>
              </tbody>
            </table>
            <!-- subtotal start-->
            <div class="d-flex">
              <?php
                $getIPAdd = getIPAddress();
                
                $cart_query = "Select * from `cart_detail` where ip_address = '$getIPAdd'";
                $result = mysqli_query($conn, $cart_query);
                $result_count = mysqli_num_rows($result);
                
                if($result_count > 0 ){
                  echo "<h5 class='px-3'>Subtotal: Rp. <strong> $total_price </strong></h5>
                  <input type='submit' value='Back to menu' class='bg-info px-3 py-2 mx-3 border-0 text-light' name='back_to_menu'>
                  <button class='bg-secondary px-3 py-2 border-0'>
                    <a href='./users_area/checkout.php' class='text-light text-decoration-none'>Checkout</a>
                  </button>";
                } else {
                  echo "
                  <input type='submit' value='Back to menu' class='bg-info px-3 py-2 mx-3 border-0 text-light' name='back_to_menu'>
                  ";
                }
                if(isset($_POST['back_to_menu'])){
                  echo "<script>window.open('index.php', '_self')</script>";
                }
              ?>
            <!-- subtotal end-->
            </div>
          </form>

          <!-- funtion to remove item start -->
          <!-- <?php
          function removeCartItems(){
            global $conn;
            if(isset($_POST['remove_cart'])){
              $getIPAdd = getIPAddress();
              $get_product_id = $_POST['remove_cart'];

              $delete_query = "Delete from `cart_detail` where ip_address = '$getIPAdd' && id_produk = $get_product_id";
              $run_delete = mysqli_query($conn, $delete_query);
              if($run_delete){
                echo "<script>window.open('cart.php', '_self')</script>";
              }
            }
          }
          echo $remove_item = removeCartItems();
          ?> -->
          <!-- funtion to remove item end-->
        </div>
      </div>
      <!-- cart detail end-->

      <!-- include footer start -->
      <?php include("./includes/footer.php") ?>
      <!-- include footer end -->
    </div>

    <!-- link bootstrap js -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
