<?php
session_start();
include 'database.php'; 
 $o=$_POST["product_category_id"];
$a=$_POST["prod_category_name"];
$sql="UPDATE tbl_product_category set prod_category_name='$a' where product_category_id='$o'";
$res=mysqli_query($con,$sql);
header("location:addcat.php");?>
<script>
alert("Succesfully Updated");
</script>
