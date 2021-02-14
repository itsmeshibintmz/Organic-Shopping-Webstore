
<?php 
session_start();

$mail=$_SESSION['alogin'];


$delvr_address_id=$_SESSION['delv_address_id'];
$cart_tl=$_SESSION['ctot'];
$con=mysqli_connect("localhost","root","","organic_shop_db")or die ("Couldn't connect");


	
	

		/*$security_code=$_POST["security_code"];
		$_SESSION['$security_code']=$security_code;
		

		$d_bank_info=mysqli_query($con,"SELECT * FROM `tbl_bank_info` WHERE   CVV='$security_code' and status='VALID' and user_type_id=2");

		//$row=mysqli_fetch_array($d_del_adrs);

		$rowcount = mysqli_num_rows($d_bank_info); 

			if($rowcount==0)
			{
								

				echo "<script>
				alert('Wrong CVV !Enter correct CVV'+$rowcount);
				window.location='payment.php';
					</script>";


			}

					else if ($rowcount==1)
					{		


							$delvr_address_id=1;
							$cart_tl=$_SESSION['ctot'];
							
							$to = "$mail";
							$from="admin";
							$subject = "OTP";
							$otp=rand();
							$message = "Please use this OTP for pay" . $otp;
							$headers = "From: ".$from;        
							mail($to, $subject, $message, $headers);
							$update_otp="UPDATE `tbl_bank_info` SET `otp`='$otp' WHERE `CVV`= '$security_code' ";
							$re=mysqli_query($con,$update_otp);



					}

		*/
	


?>
<html>
<head>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >

<link rel="stylesheet" href="styles.css" >

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
	body {
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #eee;
}

.form-signin {
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  height: auto;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
	</style>
    
	</head>
  <!-- <form class="form-signin" action="payment_action.php"  method="POST">
    <br>
    <br>
    <br>
   <br>
    <br>
    <br>
    <br>
	<center><h2>Enter OTP</h2></center>
	<br>
		<center><h3>Check your mail for otp</h3></center>
    <div class="input-group">
	

    <span class="input-group-addon" id="basic-addon1">OTP</span>
    <input type="text" name="otpn" id="otpn" class="form-control" autocomplete="off" required>
    </div>
        <br>
    <input class="btn btn-lg btn-primary btn-block" type="submit" name="submitotp" id="submitotp" value="Pay Amount">
    
    </form>-->
</html>

	
	
	
	<?php

/*if(isset($_POST['submitotp']))
	
	{
		
		
		
		
			echo "<script>
					
				</script>";
		$security_code=	$_SESSION['$security_code'];
		
		$get_otp=mysqli_query($con,"SELECT   `otp` FROM `tbl_bank_info`  WHERE `CVV`=$security_code ");
		$otp_row=mysqli_fetch_array($get_otp);
		$otp_val=$otp_row['otp'];
		
		$typed_otp=$_POST['otpn'];
		
		if($typed_otp==$otp_val)
		{
						
						echo "<script>
					
				</script>";
					$customer_bank_info=mysqli_query($con,"SELECT * FROM `tbl_bank_info` WHERE  status='VALID' and user_type_id=2");

					$row_customer=mysqli_fetch_array($customer_bank_info);

					$old_balance=$row_customer['balance_amount'];

						if($old_balance<$cart_tl)
						{
		
							$_SESSION['delv_address_id']=$delvr_address_id;
							echo "<script>
																	alert('Insufficient Balance in your card');
																	window.location='payment.php';
																	
																	</script>";
						}
						else
							{
								
								echo "<script>
				
				</script>";
		

							$new_balance=$old_balance-$cart_tl;

							$sql2=mysqli_query($con,"  UPDATE `tbl_bank_info` SET `balance_amount`=$new_balance WHERE  CVV='$security_code' and user_type_id=2");			

							if($sql2)
									{
							
							echo "<script>
					
				</script>";
		
									$seller_bank_info=mysqli_query($con,"SELECT * FROM `tbl_bank_info` WHERE status='VALID' and user_type_id=3 ");

									$row_seller=mysqli_fetch_array($seller_bank_info);
									$seller_old_bal=$row_seller['balance_amount'];
									$seller_new_bal=$seller_old_bal+$cart_tl;

									$sql3=mysqli_query($con,"  UPDATE `tbl_bank_info` SET `balance_amount`=$seller_new_bal WHERE   user_type_id=3 ");

										if($sql3)
										{
											
											echo "<script>
														
													</script>";*/
		if(isset($_POST['payment']))
		{
											
											$d_cutomer_cart=mysqli_query($con,"SELECT * FROM `cart` WHERE email='$mail'");	
											while($rowcart=mysqli_fetch_array($d_cutomer_cart))
											{
												
												$stock_product_id=$rowcart['pid'];
												$purchase_qty=$rowcart['cart_qunty'];
												$purchase_price=$rowcart['amount'];
												$old_stock=$rowcart['old_stock'];
												$orderdate=date("Y-m-d");
												$sql_order_prod=mysqli_query($con,"  INSERT INTO `tbl_customer_order` ( `email`, `stock_product_id`, `delv_adres_id`, `purchase_qty`, `purchase_price`, `order_date`, `delivery_date`, `status`) VALUES ('$mail', $stock_product_id, $delvr_address_id, $purchase_qty, $purchase_price, now(), now()+1, 'order placed') ");
												
																$sql_del_cart=mysqli_query($con," DELETE FROM `cart` WHERE email='$mail' and pid=$stock_product_id");
											
																	if($sql_del_cart)
																	{
																		
																			echo "<script>
													
												</script>";
																		
																	$seller_stock_view=mysqli_query($con,"SELECT * FROM `tbl_product` WHERE  picStatus=0 and pid=$stock_product_id");
																	$rowstock_count=mysqli_fetch_array($seller_stock_view);
																	
																	$new_stock_count=$old_stock - $purchase_qty;
																	
																	$seller_stock_update=mysqli_query($con,"UPDATE `tbl_product` SET `qunty` = $new_stock_count WHERE `tbl_product`.`pid` = $stock_product_id ");
																	
																	//UPDATE `tbl_seller_stock` SET `stock_item_count` = '2' WHERE `tbl_seller_stock`.`stock_product_id` = 20;
																		if($seller_stock_update)
																		
																		{
																
																	echo "<script>
													
												</script>";
																		echo "<script>
																					
																					alert('Order successfull');
																					window.location='customer_view_orders1.php';
																					</script>";	echo "<script>
																					
																					alert('Order successfull');
																					window.location='view_products.php';
																					</script>";
																					
																		}
																	}
										
												
											}
				
												
																							
										
		
		
									
									
							
							
		}	
	
	
	/*else
		
		{
			echo "<script>
																					
																					alert('Wrong OTP !Please enter valid OTP');
																					window.location='payment_action.php';
																					</script>";
		}
	}
	*/

	
?>