<?php
session_start();

	$mail=$_SESSION['alogin'];
	//$pname=$_SESSION['name'];
	//$id=$_GET["id"];
$id=$_SESSION['pid'];
	
?>



<?php
$con=mysqli_connect("localhost","root","","organic_shop_db")or die ("Couldnt connect");


$viewbrand="Select * from tbl_product where alogin=$mail ";

//$viewbrand="Select * from tbl_product where name=$pname ORDER BY name ASC";
$d_seller_brand=mysqli_query($con,$viewbrand);


$rowp=mysqli_fetch_array($d_seller_brand);
$rd=$rowp['mail'];
$product_category=$rowp['product_category_id'];
$price=(int)$rowp['price'];

$cart_item_qty=(int)$_POST['qt'];

$cart_total=$cart_item_qty*$price;

$q_ins1="insert into tbl_cart(mail,product_category_id,qunty,amount)values($rd,$product_category,$cart_item_qty,$cart_total)";
	
	$ins=mysqli_query($con,$q_ins1);
		
if($ins)
{
	
		echo "<script type='text/javascript'>
				
				alert('New product added successfully'); 
				window.location='cart_view.php';
				</script>";
}
else
{
	
	echo "<script type='text/javascript'>
				
alert('Failed'); 
				window.location='view_single.php';				
				</script>";
}


					
					?>