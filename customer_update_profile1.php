<?php

session_start();
$mail=$_SESSION['alogin'];
$con=mysqli_connect("localhost","root","","organic_shop_db")or die ("Couldnt connect");

if(isset($_POST["submitd"]))
{

$firstname=$_POST["firstname"];
$lastname=$_POST["lastname"];
$phonem=$_POST["phonem"];

//Fetch existing data
/*$disp="SELECT  tbl_login.register_email,tbl_login.password, tbl_registration.user_type_id,tbl_registration.fname,tbl_registration.lname,tbl_registration.mobile_num FROM tbl_login INNER JOIN  tbl_registration
ON tbl_login.register_email=tbl_registration.register_email WHERE  tbl_login.register_email='$mail'";

*/
//update new data

$q_update="UPDATE tbl_registration SET fname='$firstname',lname='$lastname',phone_no='$phonem' WHERE email='$mail' ";

if(mysqli_query($con,$q_update)==TRUE)
{
	
		echo "<script type='text/javascript'>
				
				alert('Profile updated successfully'); 
				window.location='customer_profile.php';
				</script>";
}
else
{
	
	echo "<script type='text/javascript'>
				
				alert('not updated'); 								
				</script>";
}
}

			?>