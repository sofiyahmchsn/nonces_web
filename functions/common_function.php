<?php
// including connect file
// include('./includes/connect.php');

// getting products
function getproducts(){
    global $conn;

    // condition to check isset or not
    if(!isset($_GET['category'])){
        $select_query = "Select * from `kelola_produk` LIMIT 0,8";
        $result_query = mysqli_query($conn, $select_query);
    
        while( $row = mysqli_fetch_assoc($result_query)){
          $product_id = $row['id_produk'];
          $product_title = $row['nama_produk'];
          $product_desc = $row['desk_produk'];
          $product_image = $row['img_produk'];
          $product_price = $row['harga_produk'];
          $category_id = $row['id_cat'];
          
          echo "
          <div class='col-md-3 mb-2'>
            <div class='card' style='width: 16rem;'>
              <img src='./admin_area/product_images/$product_image' class='card-img-top' alt='$product_title'/>
              <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_desc</p>
                <p class='card-text'>Rp. $product_price</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
              </div>
            </div>
          </div>";
        }
    }
}

// getting all products
function getAllProducts(){
    global $conn;

    // condition to check isset or not
    if(!isset($_GET['category'])){
        $select_query = "Select * from `kelola_produk`";
        $result_query = mysqli_query($conn, $select_query);
    
        while( $row = mysqli_fetch_assoc($result_query)){
          $product_id = $row['id_produk'];
          $product_title = $row['nama_produk'];
          $product_desc = $row['desk_produk'];
          $product_image = $row['img_produk'];
          $product_price = $row['harga_produk'];
          $category_id = $row['id_cat'];
          
          echo "
          <div class='col-md-3 mb-2'>
            <div class='card' style='width: 16rem;'>
              <img src='./admin_area/product_images/$product_image' class='card-img-top' alt='$product_title'/>
              <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_desc</p>
                <p class='card-text'>Rp. $product_price</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
              </div>
            </div>
          </div>";
        }
    }
}

// getting unik categories
function getUnikCategories(){
    global $conn;

    // condition to check isset or not
    if(isset($_GET['category'])){
        $category_id = $_GET['category'];
        $select_query = "Select * from `kelola_produk` where id_cat=$category_id";
        $result_query = mysqli_query($conn, $select_query);

        $num_of_rows = mysqli_num_rows($result_query);
        if($num_of_rows == 0){
            echo "<h2 class='text-center text-danger'>No stock for this category</h2>";
        }
    
        while( $row = mysqli_fetch_assoc($result_query)){
          $product_id = $row['id_produk'];
          $product_title = $row['nama_produk'];
          $product_desc = $row['desk_produk'];
          $product_image = $row['img_produk'];
          $product_price = $row['harga_produk'];
          $category_id = $row['id_cat'];
          
          echo "
          <div class='col-md-3 mb-2'>
            <div class='card' style='width: 16rem;'>
              <img src='./admin_area/product_images/$product_image' class='card-img-top' alt='$product_title'/>
              <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_desc</p>
                <p class='card-text'>Rp. $product_price</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
              </div>
            </div>
          </div>";
        }
    }
}

// displaying categories in sidenav
function getcategories() {
    global $conn;

    $select_categories = " Select * from `categories`";
    $result_categories = mysqli_query($conn, $select_categories);

    while($row_data = mysqli_fetch_assoc($result_categories)){
        $nama_cat = $row_data['nama_cat'];
        $id_cat = $row_data['id_cat'];
        echo "
        <li class='nav-item'>
            <a href='index.php?category=$id_cat' class='nav-link text-light'>$nama_cat</a>
        </li>";
    }
}

// get ip address function
function getIPAddress() {
	//whether ip is from the share internet
    if(!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
	//whether ip is from the proxy
	elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    	$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
   	}
//whether ip is from the remote address
	else{
       	$ip = $_SERVER['REMOTE_ADDR'];
   	}
   	return $ip;
}
// $ip = getIPAddress();
// echo 'User Real IP Address - '.$ip;

// cart function
function cart(){
    if(isset($_GET['add_to_cart'])){
        global $conn;
        $getIPAdd = getIPAddress();

        $get_product_id = $_GET['add_to_cart'];
        $select_query = "Select * from `cart_detail` where ip_address = '$getIPAdd' && id_produk = $get_product_id";
        $result_query = mysqli_query($conn, $select_query);

        $num_of_rows = mysqli_num_rows($result_query);
        if($num_of_rows > 0){
            echo "<script> alert('This item was successfully added to cart ')</script>";
            echo "<script>window.open('index.php', '_self')</script>";
        } else {
            $insert_query = "insert into `cart_detail` (id_produk, ip_address, quantity) values ($get_product_id, '$getIPAdd', 0)";
            $result_query = mysqli_query($conn, $insert_query);
            echo "<script> alert('Items is added to cart ')</script>";
            echo "<script>window.open('index.php', '_self')</script>";
        }
    }
}


// function to get cart numbers
function cartItems(){
    if(isset($_GET['add_to_cart'])){
        global $conn;
        $getIPAdd = getIPAddress();
    
        $select_query = "Select * from `cart_detail` where ip_address = '$getIPAdd'";
        $result_query = mysqli_query($conn, $select_query);
    
        $count_cart_items = mysqli_num_rows($result_query);
    }else {
        global $conn;
        $getIPAdd = getIPAddress();
    
        $select_query = "Select * from `cart_detail` where ip_address = '$getIPAdd'";
        $result_query = mysqli_query($conn, $select_query);
    
        $count_cart_items = mysqli_num_rows($result_query);
    }
    echo $count_cart_items;
}

// total price function
function totalCartPrice(){
    global $conn;
    $getIPAdd = getIPAddress();
    $total_price = 0;
    
    $cart_query = "Select * from `cart_detail` where ip_address = '$getIPAdd'";
    $result = mysqli_query($conn, $cart_query);
    
    while($row = mysqli_fetch_array($result)){
        // fetch product_id 
        $product_id = $row['id_produk'];
        $select_product = "Select * from `kelola_produk` where id_produk = $product_id";
        $result_products= mysqli_query($conn, $select_product);

        // fetch total_price
        while($row_product_price = mysqli_fetch_array($result_products)){
            $product_price = array($row_product_price['harga_produk']);
            $product_value = array_sum($product_price);
            $total_price += $product_value;

        }
    }
    echo $total_price;
}
    
?>