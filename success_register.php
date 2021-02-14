<?php
session_start();

?>
		<?php
$con=mysqli_connect("localhost","root","","organic_shop_db")or die ("Couldn't connect");

if(isset($_POST["submit1"]))
{
$mail=$_POST["mail"];
$user_type_id=$_POST["user_type_id"];
$firstname=$_POST["firstname"];
$lastname=$_POST["lastname"];
$phonem=$_POST["phonem"];
$place=$_POST["place"];
$password=$_POST["password"];
$status="ACTIVE";
$flag=0;

$q2="Select * from tbl_login";
$q3="Select * from tbl_registration";

$disp_result=mysqli_query($con,$q2);
$reg_result=mysqli_query($con,$q3);

while($row=mysqli_fetch_array($disp_result))
{
$email=$row['email'];

if((strcmp($email, $mail) == 0))
  	{	
		$flag=$flag+1;
		echo "<script type='text/javascript'>alert('The email id you entered is already enrolled'); 
		
		window.location='register.php';</script>";
		//header('Location:new_register.php');
		break;
	}
	
}

while($row=mysqli_fetch_array($reg_result))
{
$email=$row['email'];

if((strcmp($email, $mail) == 0))
  	{	
		$flag=$flag+1;
		echo "<script type='text/javascript'>alert('The email id is already enrolled '); 
		
		window.location='register.php';</script>";
		//header('Location:new_register.php');
		break;
	}
}


if($flag==0){
	
	
						$allowedExtsp = array("jpg");
						$images=$_FILES["images"]["name"];
						$tempp = explode(".", $_FILES["images"]["name"]);
						$extensionp = end($tempp);
						move_uploaded_file($_FILES["images"]["tmp_name"],"uploads/profile/" . $_FILES["images"]["name"]);
$status="ACTIVE";


$q_login="insert into tbl_login(email,user_type_id,password,status) values('$mail',$user_type_id,'$password','$status')";
$q1="insert into tbl_registration(fname,lname,phone_no,email,place,images) values('$firstname','$lastname','$phonem','$mail','$place','$images')";

$ins_login=mysqli_query($con,$q_login);
$ins=mysqli_query($con,$q1);
$disp=mysqli_query($con,"Select firstname from tbl_register where register_email=$mail");


if($ins){ 
if($ins_login)
{
if($user_type_id=1)
{
	$_SESSION['alogin'] = $mail;
	header('Location:admin_home.php');
}
if($user_type_id=2)
{
	$_SESSION['alogin'] = $mail;
	header('Location:customer_home.php');
}
if($user_type_id=3)
{
	$_SESSION['alogin'] = $mail;
	header('Location:seller_home.php');
	
}


         } 
		 else
		 {
			 echo"wrong";
		 }
}		 
/*else
{
	
	$row=mysqli_fetch_array($disp);
echo "Hi  ".$row['firstname']."  Something went wrong please try again later";
	
	
}
*/
}

}


?>
