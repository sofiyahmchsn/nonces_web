<?php
include('../includes/connect.php');
include('../functions/common_function.php');

if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];
}

// getting total items and total price of all items 
$get_ip_address = getIPAddress();
$total_price = 0;

$cart_query_price= "Select * from `cart_detail` where ip_address = '$get_ip_address'";

$result_cart_price = mysqli_query($conn, $cart_query_price);
$count_product = mysqli_num_rows($result_cart_price);
$invoice_number = mt_rand();
$status = 'pending';

while($row_price = mysqli_fetch_array($result_cart_price)){
    $product_id = $row_price['id_produk'];
    $select_product= "Select * from `kelola_produk` where id_produk = $product_id";
    $run_price = mysqli_query($conn, $select_product);

    while($row_product_price = mysqli_fetch_array($run_price)){
        $product_price = array($row_product_price['harga_produk']);
        $product_value = array_sum($product_price);
        $total_price =+ $product_value;
    }
}

// getting quantiry from cart
$get_details = "select * from `cart_detail`";
$run_cart = mysqli_query($conn, $get_details);
$get_item_quantity = mysqli_fetch_array($run_cart);
$quanttity = $get_item_quantity['quantity'];

if($quanttity == 0){
    $quantity = 1;
    $subtotal = $total_price;
} else {
    $quanttity = $quanttity;
    $subtotal = $total_price * $quanttity;
}

$insert_orders = "Insert into `order_user` (id_user, jatuh_tempo_bayar, no_invoice, total_produk, tgl_order, status_order) values ($user_id, $subtotal, $invoice_number, $count_product, NOW(), '$status')";

$result_query = mysqli_query($conn, $insert_orders);
if($result_query){
    echo "<script>alert('Ordered successfully')</script>";
    echo "<script>window.open('profile.php', '_self')</script>";
}

// orders pending
$insert_pending_orders = "Insert into `order_pending` (id_user, no_invoice, id_produk, quantity, status_order) values ($user_id, $invoice_number, $product_id, $quantity, '$status')";

$result_pending_orders = mysqli_query($conn, $insert_pending_orders);

// delete items from cart
$empty_cart = "Delete from `cart_detail` where ip_address = $get_ip_address";
$result_delete = mysqli_query($conn, $empty_cart);
?>

