<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Delete Account | Nonces Cakes and Bakery</title>
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
    <h3 class="mb-4">Edit Account</h3>
    <form action="" method="post" class="align-items-center justify-content-center">
        <div class="form-outline mb-4 m-auto">
            <input type="submit" value="Delete Account " name="delete" class="form-control w-50 m-auto" >
        </div>
        <div class="form-outline mb-4 m-auto">
            <input type="submit" value="Don't Delete Account " name="dont_delete" class="form-control w-50 m-auto" >
        </div>
    </form>

    <!-- link bootstrap js -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>

<?php
$username_session = $_SESSION['username'];
if(isset($_POST['delete'])){
    $delete_query = "Delete from `daftar_user` where username = '$username_session'";
    $result = mysqli_query($conn, $delete_query);
    if($result){
        session_destroy();
        echo "<script>alert('Account deleted successfully')</script>";
        echo "<script>window.open('../index.php', '_self'</script>";
    }
}
if(isset($_POST['dont_delete'])){
    echo "<script>window.open('profile.php', '_self'</script>";
}
?>