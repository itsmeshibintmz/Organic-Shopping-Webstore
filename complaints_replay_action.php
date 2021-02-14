<?php
session_start();
$mail=$_SESSION['alogin'];
$complaint_id=$_GET['complaintid'];
$_SESSION['complaint_id']=$complaint_id;
$con=mysqli_connect("localhost","root","","organic_shop_db")or die ("Couldnt connect");

if(isset($_POST["send_reply"]))
{
	

	$replay_comments=$_POST["replay_comments"];
	

	date_default_timezone_set('Asia/Kolkata');
	$currentTime = date("h:i:sa");
	$status="VALID";
	$rowcount=0;





						$sql=mysqli_query($con,"  UPDATE `tbl_complaints` SET `replay_message`='$replay_comments',`status`='REPLIED' WHERE complaints_id=$complaint_id ");
						
						
						if($sql){


echo "<script> alert('Reply message sent successfully')
window.location='seller_replied_complaints.php';
</script>";

							//header("Location:add_seller_prod.php");
						}
						else{
							echo "Not Sent!try again later!";
							
						}
			


}
?>