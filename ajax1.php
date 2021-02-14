<?php
session_start();
$mail=$_SESSION['alogin'];
$con=mysqli_connect("localhost","root","","db_dreams_project")or die ("Couldn't connect");

if($_POST['id']){
	
$id=$_POST['id'];



if($id==0){
 echo "<option>--Select Sub category--</option>";
}
else{
 $sql = mysqli_query($con,"SELECT * FROM `tbl_prod_subcatg` WHERE product_category_id='$id' AND status='VALID'");
 while($row = mysqli_fetch_array($sql)){
 echo '<option value="'.$row['prod_subcatg_id'].'">'.$row['subcatg_name'].'</option>';
 }
 }
}
?>