
<?php
session_start();

$mail=$_SESSION['alogin'];

$con=mysqli_connect("localhost","root","","organic_shop_db")or die ("Couldn't connect");

	

?>					
<?php  

$customer_order_id=	$_SESSION['customer_order_id'];

if(isset($_POST["submitd"]))
{

$viewprod="SELECT tbl_customer_order.customer_order_id,tbl_customer_order.email , tbl_customer_order.stock_product_id ,tbl_product.pid ,tbl_product.name,tbl_product.rid, tbl_customer_order.purchase_qty,tbl_customer_order.purchase_price,tbl_customer_order.order_date,tbl_customer_order.status
from tbl_customer_order,tbl_product  WHERE tbl_product.pid=tbl_customer_order.stock_product_id and tbl_customer_order.email='$mail' and tbl_customer_order.customer_order_id='$customer_order_id' ";


$d_seller_prod=mysqli_query($con,$viewprod);



$prod=mysqli_fetch_array($d_seller_prod);


$disp_result=mysqli_query($con,$viewprod);

$row=mysqli_fetch_array($disp_result);



$complaint_message=$_POST['complaint'];

$stock_product_id=$row['pid'];

$sql="INSERT INTO `tbl_complaints`( `email`, `customer_order`, `stock_product_id`, `complaint_message`, `replay_message`, `status`) VALUES ('$mail', '$customer_order_id', '$stock_product_id', '$complaint_message', 'Not Yet Replied', 'new')";

//"INSERT INTO `tbl_complaints`( `customer_register_email`, `seller_register_email`, `customer_order`, `stock_product_id`, `complaint_message`, `replay_message`, `status`) VALUES('$mail','seller_register_email',$customer_order_id,$stock_prod_id,'$complaint_message','$replay_message','$status')";

$ins=mysqli_query($con,$sql);


if($ins)
{

	echo"<script>alert('Successfully complaint posted');
	window.location='customer_complaints.php';
	</script>";
}
else
{
	echo"<script>alert('failed to post complaint');
	
	</script>";
	
}


}
					
					
		?>			
					
					