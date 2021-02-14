
<?php


session_start();

	$mail=$_SESSION['alogin'];

$con=mysqli_connect("localhost","root","","organic_shop_db")or die ("Couldnt connect");

?>					
					<?php  
$order_id=$_SESSION['orderid'];
$reg="Select rid from tbl_registration WHERE email='$mail'";
$regid=mysqli_query($con,$reg);
$rid_row1=mysqli_fetch_array($regid);
$rid=$rid_row1['rid'];
$viewbrand="Select * from tbl_product where rid='$rid'";
$d_seller_brand=mysqli_query($con,$viewbrand);
$viewprod="SELECT * FROM tbl_customer_order,tbl_customer_delv_address,tbl_product,tbl_registration WHERE tbl_customer_order.delv_adres_id=tbl_customer_delv_address.delv_adres_id and tbl_customer_order.stock_product_id=tbl_product.pid and tbl_product.rid='$rid' and tbl_customer_order.status='order placed'and tbl_customer_order.email=tbl_registration.email and tbl_customer_order.customer_order_id='$order_id' ";
$d_seller_prod=mysqli_query($con,$viewprod);


if(isset($_POST["dispatch"]))
{


$row=mysqli_fetch_array($d_seller_prod);


$deliver_on=$_POST["delivery_date"];
$additional_cost=$_POST["additional_cost"];





$sql="INSERT INTO `tbl_seller_updated_order` ( `customer_order_id`, `email`, `deliver_on`, `additional_cost`,  `dispatched_date`, `status`) VALUES ( $order_id, '$mail', '$deliver_on', $additional_cost, now(), 'DISPATCHED'); ";


$ins=mysqli_query($con,$sql);


if($ins)
{
	
	
	$sql3=mysqli_query($con,"  UPDATE `tbl_customer_order` SET `status`='DISPATCHED' where customer_order_id='$order_id'");
	if($sql3)
	{
		
		

		echo"<script>	alert('Successfully order updated');
		window.location='seller_delivered_orders.php';
	</script>";
	}
	
}



}
					
					
		?>			
					
					