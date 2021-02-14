<?php
$con=mysqli_connect("localhost","root","","organic_shop_db")or die ("Couldnt connect");
$product_category_id=$_GET['product_category_id'];
$status=$_POST['status'];
mysqli_query($con,"UPDATE tbl_product_category SET status='$status' WHERE product_category_id='$product_category_id'");
header('location:addcat.php');
?>