

<?php
session_start();
if(isset($_SESSION['alogin'])){
	$mail=$_SESSION['alogin'];

$con=mysqli_connect("localhost","root","","organic_shop_db")or die ("Couldn't connect");


if(isset($_POST["create"]))
	
{
$prod_cat=$_POST["category"];
$sub_cat_name=$_POST["sub_cat_name"];
$status="VALID";


$disp="SELECT * from tbl_prod_subcatg WHERE subcatg_name='$sub_cat_name' AND status='VALID'";

$result_disp=mysqli_query($con,$disp);

$rowcount = mysqli_num_rows($result_disp); 




if($rowcount==0)
{
$sql=mysqli_query($con,"INSERT INTO `tbl_prod_subcatg` ( `product_category_id`, `subcatg_name`, `status`) VALUES ($prod_cat,'$sub_cat_name', 'VALID');");
	                         
						if($sql){


											echo "<script> alert('Subcategory Added Successfully')
											window.location='add_sub_cat_prod.php';
													</script>";
							//header("Location:add_sub_cat_prod.php");
						}
						else{
							echo "Data Submit Error!!";
						}
			
}

else
{
echo "<script> alert('This Subcategory name is already existing')
window.location='add_sub_cat_prod.php';
</script>";
			
			
			}
			
			
			
			
}
}
			
			?>