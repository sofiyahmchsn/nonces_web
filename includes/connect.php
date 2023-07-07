<?php 
// Create connection
$conn = mysqli_connect('localhost', 'root', '','db_nonces');

// Check connection
if(!$conn){
    die(mysqli_connect_error($conn));
}
?>
