<?php
session_start();
if(isset($_SESSION['alogin'])){
	$mail=$_SESSION['alogin'];
	//$pid=$_SESSION['pid'];
	//$pname=$_SESSION['name'];
	//$rid=$_SESSION['rid'];	


	$con=mysqli_connect("localhost","root","","organic_shop_db")or die ("Couldnt connect");
?>
<?php

if(strlen($_SESSION['alogin'])==0){
  header('location:index.php');
}


?>

<?php

$date=date("Y-m-d");
$disp="SELECT  * FROM tbl_customer_order";

$disp_result=mysqli_query($con,$disp);


?>
<?php
$login_id=$_SESSION['alogin'];
$orderid=$_GET['customer_order_id'];
$disp="select * FROM ((tbl_customer_order INNER JOIN tbl_product on tbl_customer_order.stock_product_id=tbl_product.pid )INNER JOIN tbl_customer_delv_address
 on tbl_customer_order.delv_adres_id=tbl_customer_delv_address.delv_adres_id and tbl_customer_order.email='$mail' and customer_order_id='$orderid')";
    
$disp_result=mysqli_query($con,$disp);


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
color:green;
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

  <div id="pdfdiv">
  
	<center>
  <div id="pdfdiv">
     <h3 style="color:green;"> ORDER SUMMARY</h3>
      <?php

 while($array=mysqli_fetch_array($disp_result))
  {
 ?>
   <table  style="width:40%;border:solid black">
<tr><th>Customer Name:</th><td><?php echo $array['fname'] ?></td></tr>
<tr><th>Customer mail id:</th><td><?php echo $array['email']; ?></td></tr>
<tr><th>Product Name:</th><td><?php echo $array['name']; ?></td></tr>



<tr><th>Ordered Quantity:</th><td><?php echo $array['purchase_qty']." Kg" ?></td></tr>
<tr><th>Payid Amount</th><td><?php echo $array['purchase_price']; ?></td></tr>
<tr><th>Ordered date:</th><td><?php echo $array['order_date'] ?></td></tr>
<tr><th>Shipping Address:</th><td><?php echo $array['address_line'] ?></td></tr>
<tr><th></th><td><?php echo $array['landmark'] ?></td></tr>
<tr><th></th><td><?php echo $array['pin_code'] ?></td></tr>
<tr ><td rowspan="1" colspan="2">&nbsp; </br></td></tr>
      
</br>
       <?php } ?>
      </table>
      </form>
    </center>
</div>
<div id="editor"></div>
<center>
</div>
<div id="editor"></div>
<button id="pdfview">Download PDF</button>
</body>
</html>
<?php
}
else
{
	header('Location:login.php');
}
?>
