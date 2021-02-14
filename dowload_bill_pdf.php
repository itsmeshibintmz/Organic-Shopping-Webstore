<?php
@ob_start();
session_start();
if(isset($_SESSION['alogin'])){
$mail=$_SESSION['alogin'];

$order_id=$_GET['orderid'];
$_SESSION['orderid']=$order_id;

if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 10;
        $offset = ($pageno-1) * $no_of_records_per_page;



//$con=mysqli_connect("localhost","root","","db_dreams_project")or die ("Couldn't connect");
    include 'new_connection.php';    
		
		
		$total_pages_sql = "SELECT COUNT(*) FROM tbl_seller_stock ";
        $result = mysqli_query($con,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);



$viewprod="SELECT tbl_customer_order.customer_order_id,tbl_customer_order.delv_adres_id, tbl_customer_order.register_email as cust_email, tbl_customer_order.stock_product_id as cust_product_id,tbl_customer_order.order_ref_no,tbl_seller_stock.stock_product_id as seller_prod_id ,tbl_seller_stock.seller_profile_brand_id, tbl_seller_profile_brand.brand_name,tbl_seller_profile_brand.register_email as seller_email, tbl_seller_stock.product_name,tbl_seller_stock.img1, tbl_customer_order.purchase_qty,tbl_customer_order.purchase_price,tbl_customer_order.order_date,tbl_customer_order.status,tbl_registration.fname,tbl_registration.lname,tbl_customer_delv_address.*from ((tbl_customer_order,tbl_seller_stock INNER JOIN tbl_seller_profile_brand on tbl_seller_stock.seller_profile_brand_id=tbl_seller_profile_brand.seller_profile_brand_id)INNER JOIN tbl_registration on tbl_registration.register_email=tbl_seller_profile_brand.register_email)INNER JOIN tbl_customer_delv_address ON tbl_customer_delv_address.delv_adres_id=tbl_customer_order.delv_adres_id WHERE tbl_seller_stock.stock_product_id=tbl_customer_order.stock_product_id  and tbl_customer_order.customer_order_id='$order_id' ORDER BY tbl_customer_order.order_date DESC";



//"SELECT tbl_customer_order.customer_order_id,tbl_customer_order.register_email as cust_email,tbl_customer_order.purchase_qty,tbl_customer_order.purchase_price,tbl_customer_order.order_date,tbl_customer_order.customize_comments, tbl_seller_stock.*,tbl_customer_delv_address.* FROM(( tbl_customer_order INNER JOIN tbl_seller_stock ON tbl_customer_order.stock_product_id = tbl_seller_stock.stock_product_id )INNER JOIN tbl_customer_delv_address ON tbl_customer_delv_address.delv_adres_id=tbl_customer_order.delv_adres_id INNER JOIN tbl_seller_profile_brand on tbl_seller_stock.seller_profile_brand_id=tbl_seller_profile_brand.seller_profile_brand_id)where tbl_customer_order.customer_order_id='$order_id' and tbl_seller_profile_brand.register_email='$mail'  LIMIT $offset, $no_of_records_per_page ";

//"SELECT * FROM(( tbl_customer_order INNER JOIN tbl_seller_stock ON tbl_customer_order.stock_product_id = tbl_seller_stock.stock_product_id )INNER JOIN tbl_customer_delv_address ON tbl_customer_delv_address.delv_adres_id=tbl_customer_order.delv_adres_id INNER JOIN tbl_seller_profile_brand on tbl_seller_stock.seller_profile_brand_id=tbl_seller_profile_brand.seller_profile_brand_id)where tbl_customer_order.status='NEW' and tbl_seller_profile_brand.register_email='$mail'  LIMIT $offset, $no_of_records_per_page ";


$d_seller_prod=mysqli_query($con,$viewprod);

$disp="SELECT  tbl_login.register_email, tbl_registration.user_type_id,tbl_registration.fname,tbl_registration.lname,tbl_registration.mobile_num FROM tbl_login INNER JOIN  tbl_registration
ON tbl_login.register_email=tbl_registration.register_email WHERE  tbl_login.register_email='$mail'";

$disp_result=mysqli_query($con,$disp);
$disp_seller_type="Select * from tbl_seller_type WHERE status='VALID'";

$d_seller_type=mysqli_query($con,$disp_seller_type);



//SELECT * FROM((tbl_seller_stock INNER JOIN tbl_seller_profile_brand ON tbl_seller_stock.seller_profile_brand_id = tbl_seller_profile_brand.seller_profile_brand_id) INNER JOIN tbl_prod_subcatg ON tbl_seller_stock.prod_subcatg_id =tbl_prod_subcatg.prod_subcatg_id) INNER JOIN tbl_product_category ON tbl_prod_subcatg.prod_category_id = tbl_product_category.product_category_id WHERE tbl_seller_stock.status='VALID' 

?>



<?php

$sqlprofile="SELECT * FROM tbl_seller_identity_proof where register_email='$mail'";
 $result_setprofile=mysqli_query($con,$sqlprofile);
$rowprofile=mysqli_fetch_array( $result_setprofile);
   ?>
   
   
   
   <?php
			while($row=mysqli_fetch_array($disp_result))
	{
	
	$email=$row['register_email'];
	$user_type_id=$row['user_type_id'];
	$fname=$row['fname'];
	$lname=$row['lname'];
	$mobile_num=$row['mobile_num'];
	
	}
	
	?>
<!DOCTYPE html>
<html>
<head>

<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<style>

button
{

  background-color:#fff;
  border:none;
  cursor:pointer;
}

button:hover
{

  background-color:#fff;
  border:none;
  cursor:pointer;
  color:green;
}

#pdfdiv
{
color:Black;
}
</style>


<style>
#tracking {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#tracking td, #tracking th {
  border: 1px solid #ddd;
  padding: 8px;
}

#tracking tr:nth-child(even){background-color: #f2f2f2;}

#tracking tr:hover {background-color: #ddd;}

#tracking th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>

   <script type="text/javascript" src="jspdf.min.js"></script>
  
 <script type="text/javascript" src="jquery-git.js"></script>
    
  <style type="text/css">
    
  </style>

  <title></title>

<script type='text/javascript'>//<![CDATA[
$(window).on('load', function() {
var doc = new jsPDF();
var specialElementHandlers = {
    '#editor': function (element, renderer) {
        return true;
    }
};

$('#pdfview').click(function () {
    doc.fromHTML($('#pdfdiv').html(), 15, 15, {
        'width': 700,
            'elementHandlers': specialElementHandlers
    });
    doc.save('file.pdf');
});
});//]]> 

</script>

</head>

<body>
 <center>
  <div id="pdfdiv">
     <h3 style="color:green;"> ORDER SUMMARY</h3>
   


<?php 
					
					$count=0;
					
				$prod=mysqli_fetch_array($d_seller_prod);
					
						$count=$count+1;
						
						?>
						
						 <?php 
 $order_id=$prod['customer_order_id'];
 $sql_updated=mysqli_query($con,"SELECT * FROM `tbl_seller_updated_order` WHERE customer_order_id=$order_id");
 $row_updated=mysqli_fetch_array($sql_updated);
 $track_count=mysqli_num_rows($sql_updated);
 $deliver_on= $row_updated['deliver_on'];
  $additional_cost= $row_updated['additional_cost'];
 $additional_comment= $row_updated['additional_comments'];
 $packed_date=$row_updated['packed_date'];
  $dispatched_date=$row_updated['dispatched_date'];
  $consignment_no=$row_updated['consignment_no'];
   $tracking_url =$row_updated['tracking_url'];

 ?>
   <table  style="width:60%;border:solid black">

	
					

<tr id="<?php echo $prod['stock_product_id'] ?>" >

<tr><th>Order-ID #</th><td><?php echo $prod['order_ref_no'] ?></td></tr>
<tr><th>Ordered date</th><td><?php echo $prod['order_date'] ?></td></tr>
<tr><th>Product Name</th><td><?php echo $prod['brand_name']; ?>&nbsp;<?php echo $prod['product_name']; ?></td></tr>
<tr><th>Ordered Quantity</th><td><?php echo $prod['purchase_qty']." Item" ?></td></tr>
<tr><th>Expected deliver on</th><td><?php echo $deliver_on; ?> &nbsp;</td></tr>
<tr ><td rowspan="1" colspan="2">&nbsp; </br></td></tr>
 <tr><th>Customer's Mail ID</th><td><?php $cust_email=$prod['cust_email'];
echo  $cust_email;
$sql_phone=mysqli_query($con,"SELECT * FROM `tbl_registration` WHERE `register_email`='$cust_email'");

$row_cust=mysqli_fetch_array($sql_phone);
	$cust_phone=$row_cust['mobile_num'];

 ?></td></tr>

 <tr><th>Customer's Mob: </th><td><?php echo $cust_phone; ?></td></tr>

<tr ><td rowspan="1" colspan="2">&nbsp; </br></td></tr>


<tr><th>Delivery Address</th></tr>
<tr><th></th><td><?php echo $prod['name']; ?></td></tr>
<tr><th></th><td ><?php echo $prod['Mobile number']; ?></td></tr>
<tr><th></th><td ><?php echo $prod['address_line']; ?></td></tr>
<tr><th></th><td ><?php echo $prod['landmark']; ?></td></tr>
<tr><th></th><td ><?php echo $prod['town_city']; ?></td></tr>
<tr><th></th><td ><?php echo $prod['pin_code']; ?></td>
<tr><th></th><td >&nbsp;</td>
<tr><th>Paid Amount</th><td><?php echo "Rs. ".$prod['purchase_price']; ?></td></tr>

<tr><th>Amount to  be paid on Delivery</th><td><?php echo  "Rs. ".$additional_cost; ?>&nbsp;</td></tr>
</table>


</div>
</center>
<div id="editor"></div>
<center>
<button id="pdfview"  style="background-color:green;color:white ;font-weight:bold;height:50px;">Download Order Summary PDF</button><a  href="seller_new_received_orders.php" >OR BACK TO VIEW NEW ORDERS</a></center>


<?php if ($track_count==1)
{
	?>
<center><div>
</br>
<h4>ORDER STATUS</h4>
<table style="width:50%;height:50%" id="tracking">


	<tr><th>Ordered On</th><td> <?php echo $prod['order_date']?></td></tr>
	<tr><th>Packed On</th><td><?php echo $packed_date?></td></tr>
	<tr><th>Dispatched On</th><td><?php echo $dispatched_date?></td></tr>
	<tr><th>Consignment Number</br>
	Or Tracking Number </th><td><b><?php echo $consignment_no; ?></b></td></tr>
	
		<tr><td colspan="2"><b><center>To track this order</b><a href="<?php echo $tracking_url ;?>" target="_blank" style="color:red"><b>&nbsp;Click here</b></a></center></td></tr>
</table>
</br>
<a  href="seller_packed_orders.php" >CLICK HERE TO VIEW PACKED ORDERS</a>

<div>
</center>
<?php } ?>

</body>
</html>


<?php }
else{
header("Location:../login.php");
} ?>




<?php
/*
session_start();
 
*/?>


