<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>My Profile | Nonces Cakes and Bakery</title>
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
    <?php
      $username = $_SESSION['username'];
      $get_user = "Select * from `daftar_user` where username = $username";
      
      $result = mysqli_query($conn, $get_user);
      $row_fetch = mysqli_fetch_assoc($result);
      $user_id = $row_fetch['id_user'];
    ?>
    <h3 class="mb-4">Edit Account</h3>
    <table class="tabel tabel-bordered mt-5">
        <thead class="bg-info text-light">
            <tr>
               <th>SI no</th>
               <th>Amount Due</th>
               <th>Total Products</th>
               <th>Invoice Number</th>
               <th>Date</th>
               <th>Complete/Incomplete</th>
               <th>Status</th>
           </tr>
        </thead>
        <tbody class="bg-light">
          <?php
          $get_order_detail = "Select * from `order_user` where id_user = $id_user";
          $result_order = mysqli_query($conn, $get_order_detail);

          while($row_order = mysqli_fetch_assoc($result_order)){
            $order_id = $row_order['id_order'];
            $amount_due = $row_order['jatuh_tempo_bayar'];
            $total_product = $row_order['total_produk'];
            $invoice_number = $row_order['no_invoice'];
            $order_date = $row_order['tgl_order'];
            $order_status = $row_order['status_order'];
            if($order_status == 'pending'){
              $order_status = 'Incomplete';
            }else{
              $order_status = 'Complete';
            }
            $number = 1;

            echo "
              <tr>
                <td>$number</td>
                <td>$amount_due</td>
                <td>$total_product</td>
                <td>$invoice_number</td>
                <td>$order_date</td>
                <td>$order_status</td>
                <td><a href='confirm_payment.php'></a></td>
              </tr>";
          }
          $number++;
          ?>
        </tbody>
    </table>

    <!-- link bootstrap js -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
