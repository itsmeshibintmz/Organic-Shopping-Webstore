<?php
session_start();

$mail=$_SESSION['alogin'];

$con=mysqli_connect("localhost","root","","organic_shop_db")or die ("Couldn't connect");



if(isset($_POST["address"]))
{

$fname=$_POST["fname"];
$mob=$_POST["mob"];
$address_line=$_POST["address_line"];
$landmark=$_POST["landmark"];
$town=$_POST["town"];
$pincode=$_POST["pincode"];
$atype=$_POST["atype"];
$status5='VALID';
	
$del_adrs="SELECT * FROM `tbl_customer_delv_address` WHERE address_line='$address_line' and fname='$fname' and status5='VALID'";

$d_del_adrs=mysqli_query($con,$del_adrs);

//$row=mysqli_fetch_array($d_del_adrs);

$rowcount = mysqli_num_rows($d_del_adrs); 


if($rowcount==0)
{
						$sql=mysqli_query($con,"  INSERT INTO `tbl_customer_delv_address`( `email`,`fname`,`Mobile number`, `address_line`, `landmark`, `town_city`, `pin_code`, `address_type`, `status5`) VALUES ('$mail','$fname','$mob','$address_line','$landmark','$town','$pincode','$atype','$status5') ");
						if($sql){


											echo "<script>
										window.location='checkout.php';
											</script>";

							//header("Location:add_seller_prod.php");
						}
						else{
							echo "<script>  alert('Failed to add address! try again');
											window.location='checkout.php';
											</script>";
						}
			
}

else
{
echo "<script> alert('Address already added ');
window.location='checkout.php';
</script>";
			
			
			}


}


	
?>