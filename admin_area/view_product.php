<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Product | Admin</title>
</head>
<body>
    <h3 class="text-center">All Products</h3>
    <table class="table tabel-border mt-5">
        <thead class="bg-info">
            <tr>
                <th>Product ID</th>
                <th>Product Title</th>
                <th>Product Image</th>
                <th>Product Price</th>
                <th>Total Sold</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="bg-light">
            <?php
            $get_product = "Select * from `kelola_produk`";
            $result = mysqli_query($conn, $get_product);
            $number =0;
            while($row = mysqli_fetch_assoc($result)){
                $product_id = $row['id_produk'];
                $product_title = $row['nama_produk'];
                $product_img = $row['img_produk'];
                $product_price = $row['harga_produk'];
                $status = $row['status'];
                $number++;
                ?>
                <tr>
                <td><?php echo $number; ?></td>
                <td><?php echo $product_title; ?></td>
                <td><img src="./product_images/<?php echo $product_img; ?>" alt="<?php echo $product_title; ?>" class="product_img"></td>
                <td><?php echo $product_price; ?></td>
                <td><?php echo $number; ?></td>
                <td><?php echo $status; ?></td>
                <td><a href='index.php?edit_product' class='text-dark'><i class='fa-solid fa-pen-to-square'></i></a></td>
                <td><a href='' class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
            </tr>
            <?php
            }
            ?>
            
        </tbody>
    </table>
</body>
</html>