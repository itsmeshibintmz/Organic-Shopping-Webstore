<?php

session_start();
$mail=$_SESSION['alogin'];
$con=mysqli_connect("localhost","root","","organic_shop_db")or die ("Couldn't connect");

if(isset($_POST["submitp"]))
{

$oldpassword=$_POST["oldpassword"];
$newpassword=$_POST["password"];

$disp="SELECT * FROM tbl_login where tbl_login.email='$mail'";
$disp_result=mysqli_query($con,$disp);
while($row=mysqli_fetch_array($disp_result))
{
$oldpass=$row['password'];


if((strcmp($oldpassword, $oldpass) == 0))
  	{	


$q_update="UPDATE tbl_login SET password='$newpassword' WHERE email='$mail' ";$q_update="UPDATE tbl_login SET password='$newpassword' WHERE email='$mail' ";

if(mysqli_query($con,$q_update)==TRUE)
{
	
		echo "<script type='text/javascript'>
				
				alert('Password updated successfully'); 
				window.location='seller_home.php';
				</script>";
}
else
{
	
	echo "<script type='text/javascript'>
				
				alert('not updated'); 
				window.location='customer_update.php';				
				</script>";
}

	}
	
	else
		
		{
			echo "<script type='text/javascript'>alert('The old password is wrong'); 
		
		window.location='customer_update_.php';</script>";
		//header('Location:new_register.php');
		break;
		}
		
}


}

			?>