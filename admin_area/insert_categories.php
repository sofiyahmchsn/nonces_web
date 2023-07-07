<?php
  include('../includes/connect.php');
  
  if(isset($_POST['insert_cat'])){
    $nama_cat = $_POST['cat_title'];

    // select data from database
    $select_query = "Select * from `categories` where nama_cat = '$nama_cat'";
    $result_select= mysqli_query($conn, $select_query);
    $number = mysqli_num_rows($result_select);

    if($number > 0){
      echo "<script>alert('This category is present inside the database')</script>";
    } else {
      $insert_query = "insert into `categories` (nama_cat) values ('$nama_cat')";
      $result = mysqli_query($conn, $insert_query);
  
      if($result){
        echo "<script>alert('Category has been inserted successfully')</script>";
      }
    }
  }
?>

<h2 class="text-center pb-4">Insert Categories</h2>
<form action="" method="post" class="mb-2">
  <div class="input-group w-90 mb-3">
    <span class="input-group-text bg-info" id="basic-addon1"
      ><i class="fa-solid fa-receipt"></i
    ></span>
    <input
      type="text"
      class="form-control"
      name="cat_title"
      placeholder="Insert Categories"
      aria-label="Categories"
      aria-describedby="basic-addon1"
    />
  </div>

  <!-- button -->
  <div class="input-group w-10 mb-2 m-auto">
    <input
      type="submit"
      class="bg-info border-0 p-2 rounded text-light "
      name="insert_cat"
      value="Insert Categories"
    />
  </div>
</form>


<!-- 
  kategori
- cake
- cookies
- hampers
- lapis legit
- pudding
- makaroni skutel
- baked potato
 -->
