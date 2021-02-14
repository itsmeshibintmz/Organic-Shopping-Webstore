<?php

session_start();
$mail=$_SESSION['alogin'];
$con=mysqli_connect("localhost","root","","db_dreams_project")or die ("Couldn't connect");

if(isset($_POST["submitp"]))
{

$oldpassword=$_POST["oldpassword"];
$newpassword=$_POST["password"];

$disp="SELECT * FROM tbl_login where tbl_login.register_email='$mail'";
//Fetch existing data
/*$disp="SELECT  tbl_login.register_email,tbl_login.password, tbl_registration.user_type_id,tbl_registration.fname,tbl_registration.lname,tbl_registration.mobile_num FROM tbl_login INNER JOIN  tbl_registration
ON tbl_login.register_email=tbl_registration.register_email WHERE  tbl_login.register_email='$mail'";

*/
//update new data



$disp_result=mysqli_query($con,$disp);
while($row=mysqli_fetch_array($disp_result))
{
$oldpass=$row['password'];


if((strcmp($oldpassword, $oldpass) == 0))
  	{	


$q_update="UPDATE tbl_login SET password='$newpassword' WHERE register_email='$mail' ";

if(mysqli_query($con,$q_update)==TRUE)
{
	
		echo "<script type='text/javascript'>
				
				alert('Password updated successfully'); 
				window.location='admin_home.php';
				</script>";
}
else
{
	
	echo "<script type='text/javascript'>
				
				alert('not updated'); 
				window.location='admin_update.php';				
				</script>";
}

	}
	
	else
		
		{
			echo "<script type='text/javascript'>alert('The old password is wrong'); 
		
		window.location='admin_update.php';</script>";
		//header('Location:new_register.php');
		break;
		}
		
}


}

			?>