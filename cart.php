<?php
error_reporting(0);
session_start();

	$mail=$_SESSION['alogin'];
	//$pname=$_SESSION['name'];
	$id=$_SESSION['pid'];
	
?>



<?php
$con=mysqli_connect("localhost","root","","organic_shop_db")or die ("Couldnt connect");
 
$cart_total=0;
$viewbrand1="Select * from tbl_product where pid=$id ";

//$viewbrand1="Select * from tbl_product where name=$pname ORDER BY name ASC";
$d_seller_brand1=mysqli_query($con,$viewbrand1);

//$viewbrand="Select * from cart inner join tbl_product on cart.pid=tbl_product.pid inner join tbl_registration on tbl_registration.email=cart.email where cart.pid=8 and cart.email='albin@gmail.com'";

$viewbrand="Select * from cart inner join tbl_product on cart.pid=tbl_product.pid  inner join tbl_registration on tbl_registration.email=cart.email where cart.pid=$id and cart.email='$mail'";

//$viewbrand="Select * from tbl_product where name=$pname ORDER BY name ASC";
$d_seller_brand=mysqli_query($con,$viewbrand);

$countp=mysqli_num_rows($d_seller_brand);

$rowp=mysqli_fetch_array($d_seller_brand1);
$rd=$rowp['rid'];
//$product_category=$rowp['product_category_id'];
$price=$rowp['price'];

$cart_item_qty=$_POST['qt'];
$cart_total=$cart_item_qty * $price;
$old_stock=$rowp['qunty'];
$flag=0;

if($countp>=1)
	
	{
		echo "<script type='text/javascript'>
				
			alert(' Item already added to cart'); 
				window.location='cart_view.php';
				</script>";
		
		
	}
	
	else
	{
		
		
		
$q_ins1="INSERT INTO `cart` (`email`, `pid`, `cart_qunty`, `amount`,old_stock) VALUES ('$mail', $id, '$cart_item_qty', '$cart_total','$old_stock')";


//insert into cart(rid,product_category_id,pid,cart_qunty,amount)values($rd,$product_category,$id,$cart_item_qty,$cart_total)";
	
	$ins=mysqli_query($con,$q_ins1);
		
if($ins)
{
	
		echo "<script type='text/javascript'>
				
				alert('Item added to cart successfully'); 
				window.location='cart_view.php';
				</script>";
}
else
{
	
	echo "<script type='text/javascript'>
				
alert('Failed'); 
               window.location='cart_view.php';
					
				</script>";
}
		
	}




					
					?>