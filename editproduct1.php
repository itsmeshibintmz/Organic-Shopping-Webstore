
<?php
session_start();
include 'database.php'; 
 $o=$_POST["caid"];
$a=$_POST["cart_qunty"];
$sql="UPDATE cart set cart_qunty='$a' where caid='$o'";
$res=mysqli_query($con,$sql);
header("location:delete_cart.php");?>
<script>
alert("Succesfully Updated");
</script>
