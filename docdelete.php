<?php
session_start();
include 'database.php'; 
 $o=$_POST["product_category_id"];

$sql="DELETE from tbl_product_category where product_category_id='$o'";
$res=mysqli_query($con,$sql);

header("location:addcat.php");?>
<script>
alert("Successfully Updated");
</script>
