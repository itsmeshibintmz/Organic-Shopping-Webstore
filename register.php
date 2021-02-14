

<?php

// Start the session
session_start();
error_reporting(0);
include("include/config.php");
?>



<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!--theme-style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--fonts-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<!--//fonts-->
<script src="js/jquery.min.js"></script>










<style>
	
	.errmessage
		{
			color:red;
			text-decoration:capitalize;
			text-tranform-capitalize;
			}
	</style>






</head>
<body> 
	<!--header-->

		<div class="bottom-header" style="background-color:palegreen;">
			<div class="container">
				<div class="header-bottom-left">
					<div class="logo">
						<font size="4"><strong><i> <b><p style="color:red;">ORGANICSHOPPING </p> </b></i></strong></font>
					</div>
					
				
				</div>
				<div class="header-bottom-right">					
						<!--<div class="account"><a href="login.html"><span> </span>YOUR ACCOUNT</a></div>-->
							<ul class="login">
								<li><a href="login.php"><span> </span>LOGIN</a></li> |
								<li ><a href="register.php">SIGNUP</a></li>
							</ul>
						<!--<div class="cart"><a href="#"><span> </span>CART</a></div>-->
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>	
			</div>
		</div>
	</div>
	<!---->
	<div class="container"> 
			         
		<div class="register">
		
		<form  action="success_register.php" method="POST" id="register" name="register" enctype="multipart/form-data" >
				 <div class="  register-top-grid">
					<h3>PERSONAL INFORMATION</h3>
					<div class="mation">
					
						<span  >Are you a  &nbsp &nbsp &nbsp
						<select name="user_type_id" id="user_type_id"> 
						<option value="2">Customer</option>
					    <option value="3">Seller</option>
						</select>
						</span>
						</br>
						</br>
						<span>First Name<label style="color:red;">*</label></span>
						<input type="text" name="firstname" id="firstname" placeholder="First Name" onblur="checkFName()" class="input input1 form-control" required>
					<p id="errorname" class="errmessage">    </p>
					<script>
					
					function checkFName()
												{
												var letters = /^[a-zA-Z][a-zA-Z\\s]+$/;


												if(document.getElementById('firstname').value==null || register.firstname.value.length==0)
												{
												document.getElementById('errorname').innerHTML="Mandatory Field!";

												}
												else if(document.getElementById('firstname').value.match(letters))
												{
												document.getElementById('errorname').innerHTML=" ";

												}

												else
												{
													
												document.getElementById('errorname').innerHTML="Information entered is incorrectly formatted!";
												document.getElementById('firstname').value = " "; 
												}

												}

					
					</script>
					
						<span>Last Name<label style="color:red;">*</label></span>
						<input type="text" name="lastname" id="lastname" placeholder="Last Name" onblur="checkLName()"class="input input1 form-control"required>
				<p id="errornameL" class="errmessage" >    </p>
						
					<script>
					function checkLName()
										{
										var letters = /^[a-zA-Z][a-zA-Z\\s]+$/;


										if(document.getElementById('lastname').value==null || register.lastname.value.length==0)
										{
										document.getElementById('errornameL').innerHTML="Mandatory Field!";

										}
										else if(document.getElementById('lastname').value.match(letters))
										{
										document.getElementById('errornameL').innerHTML=" ";
										
										}

										else
										{
										document.getElementById('errornameL').innerHTML="Information entered is incorrectly formatted!";
										document.getElementById('lastname').value = ""; 
										}
										}
					
					</script>
						<span>Mobile number<label style="color:red;">*</label></span>
						 <input type="text" name="phonem" id="phonem" placeholder="Phone number"  onblur="checkMob()"class="input input1 form-control"required>
					<p id="errormob" class="errmessage" >    </p>
					 
					 <script>
					
					
					function checkMob() { 
															var mobnum = document.getElementById("phonem").value;
													///^([+]\d{2})?\d{10}$/
													//   /^\d{10}$/
													var phoneno =/^(?!(\d)\1{9})(?!0123456789|1234567890|0987654321)\d{10}$/ ;
															if(document.getElementById("phonem").value==null ||register.phonem.value.length==0)
												{
												document.getElementById("errormob").innerHTML="Mandatory Field!";
												
												}


												else if(document.getElementById('phonem').value.match(phoneno))
												{
													
													if(document.getElementById("phonem").value=='0000000000')
													{
														document.getElementById("errormob").innerHTML="Please enter a valid Mobile number";
														document.getElementById("phonem").value="";
													}
													else
													document.getElementById('errormob').innerHTML=" ";
												
												}

												else
												{
												document.getElementById('errormob').innerHTML="Please enter a valid Mobile number";
												document.getElementById("phonem").value="";
												}
														}
					
					</script>
						<span>Place<label style="color:red;">*</label></span>
						 <input type="text" name="place" id="place" placeholder="Place" onblur="checkPlace()"class="input input1 form-control"required>
					 <p id="errorplace" class="errmessage" >    </p>
					 <script>
					
					function checkPlace()
										{
										var letters = /^[a-zA-Z][a-zA-Z\\s]+$/;


										if(document.getElementById('place').value==null || register.place.value.length==0)
										{
										document.getElementById('errorplace').innerHTML="Mandatory Field!";

										}
										else if(document.getElementById('place').value.match(letters))
										{
										document.getElementById('errorplace').innerHTML=" ";
										
										}

										else
										{
										document.getElementById('errorplace').innerHTML="Information entered is incorrectly formatted!";
										document.getElementById('place').value = ""; 
										}
										}
					
					</script>
					
					
					 
						 <span>Email Address<label style="color:red;">*</label></span>
						 <input type="text"name="mail"  id="mail" placeholder="Email" onblur="checkmail()"class="input input1 form-control" required>
			<p id="erroremail"class="errmessage">    </p>
					<script>
					
					function checkmail()

									{

									var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
									var email = document.getElementById("mail").value;
											
									if(document.getElementById("mail").value==null ||register.mail.value.length==0)
										{
										document.getElementById("erroremail").innerHTML="Mandatory Field!";

										}

									else if(document.getElementById("mail").value.match(mailformat))
										{
										document.getElementById("erroremail").innerHTML=" ";
										
										}

										else
										{
										document.getElementById('erroremail').innerHTML="Please enter a valid E-Mail ID";
										document.getElementById("mail").value="" ;
										}

									}
					</script>
					
					
					   
					   
					   
					   
					   
					   
					   
					   
					 
								<span>Password<label style="color:red;">*</label></span>
								<input type="password" name="password" id="password"	placeholder="Password"  onblur="checkpassword()" class="input input1 form-control"required>
								<p id="errorpswrd"class="errmessage" >    </p>
								
					<script>
					
					function checkpassword()

									{

									var passw=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;

											
									if(document.getElementById("password").value==null ||register.password.value.length==0)
										{
										document.getElementById("errorpswrd").innerHTML="Mandatory Field!";

										}

									else if(document.getElementById("password").value.match(passw))
										{
										document.getElementById("errorpswrd").innerHTML=" ";
										
										}

										else
										{
										document.getElementById('errorpswrd').innerHTML="Please enter a valid password";
										   alert(' Your password should be 8 to 20 characters which contain at least one lowercase letter, one uppercase letter, one numeric digit, and one special character');
										   document.getElementById("password").value="";
										   
											}

									}
					</script>
								<span>Confirm Password<label style="color:red;">*</label></span>
								<input type="password"  name="cpassword" id="cpassword"  onblur="checkCpassword()" placeholder="Confirm Password" class="input input1 form-control"required>
								<p id="errorCpswrd"class="errmessage" >    </p>  
					<script>
					
										function checkCpassword()

												{

												var passw=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
												var passwrd=document.getElementById("password").value;
												var cpasswrd=document.getElementById("cpassword").value;

														
												if(document.getElementById("cpassword").value==null ||register.cpassword.value.length==0)
													{
													document.getElementById("errorCpswrd").innerHTML="Mandatory Field!";

													}

												else if(document.getElementById("cpassword").value.match(passw))
													{
													document.getElementById("errorCpswrd").innerHTML=" ";
													
															if(passwrd==cpasswrd)
																		{ 	document.getElementById("errorCpswrd").innerHTML=" ";
																		
																			}
																		else{
																		document.getElementById("errorCpswrd").innerHTML="Password and confirm password did not match!";
																			document.getElementById("cpassword").value="";
																		}
													}

													else
													{
													document.getElementById('errorCpswrd').innerHTML="Password and confirm password should be valid and  same";
													document.getElementById("cpassword").value="";
													 }

												}
					
					</script>
					
					<p>Image</p>
					<input type="file" style="width:100%" name="images" class="btn thumbnail" id="images" accept="application/jpg" required >
					<span id="ermsg1" name="ermsg1" style="color:red"> </span>
					
					
					 <script>
			
									
var validExt = ".jpg,.jpeg,.png";
function fileExtValidate1(fdata) {
 var filePath = fdata.value;
 var getFileExt = filePath.substring(filePath.lastIndexOf('.') + 1).toLowerCase();
 var pos = validExt.indexOf(getFileExt);
 if(pos < 0) {
 	//alert("This file is not allowed, please upload valid file.");
						 document.getElementById("ermsg1").innerHTML='*only .jpg,.jpeg,.png images are allowed.' ;
						  document.getElementById("image").value="";
 	return false;
  } else {
	  	 document.getElementById("ermsg1").innerHTML="";
  	return true;
  }
}


var maxSize = '1024';
function fileSizeValidate1(fdata) {
	 if (fdata.files && fdata.files[0]) {
                var fsize = fdata.files[0].size/1024;
                if(fsize > maxSize) {
                	 //alert('Maximum file size exceed, This file size is: ' + fsize + "KB");
					 document.getElementById("ermsg1").innerHTML='Maximum file size(1 MB) exceed, This file size is: '+ fsize + "KB" ;
					 document.getElementById("image").value="";
                	 return false;
                } else {
					 document.getElementById("ermsg1").innerHTML="";
                	return true;
                }
     }
 }

$("#image").change(function () {
	    if(fileExtValidate1(this)) {
	    	 if(fileSizeValidate1(this)) {
	    	 	showImg(this);
	    	 }	 
	    }    
    });


</script>	
					

					</div>
					<div class="clearfix"> </div>
					<div class="register-but">
				   
					  <center> <input type="submit" value="Register" name="submit1" id="submit" style="background-color:green;width:150px;height:50px;color:white;font-family:bold;border-radius:10px;border:2px solid white" >
					   
				  	</form>
					</div>
					
					 </div>
					 
					 
					 
			
				
				
		   </div>
		   <div class="sub-cate">
				<!--<div class=" top-nav rsidebar span_1_of_left">
					<!--<h3 class="cate">MENU</h3>
		 <ul class="menu">
		
		
		
			
			
	
		<ul class="kid-menu ">
				<li><a href="index.html">Home</a></li>
				
				<li><a href="viewproduct.php">Product</a></li>
		
				<li><a href="login.php">Login</a></li>
				<!--<li class="menu-kid-left"><a href="contact.html">Contact us</a></li>-->
			<!--</ul>
		
	<!--</ul>-->
					<!--</div>-->
				<!--initiate accordion-->
		<script type="text/javascript">
			$(function() {
			    var menu_ul = $('.menu > li > ul'),
			           menu_a  = $('.menu > li > a');
			    menu_ul.hide();
			    menu_a.click(function(e) {
			        e.preventDefault();
			        if(!$(this).hasClass('active')) {
			            menu_a.removeClass('active');
			            menu_ul.filter(':visible').slideUp('normal');
			            $(this).addClass('active').next().stop(true,true).slideDown('normal');
			        } else {
			            $(this).removeClass('active');
			            $(this).next().stop(true,true).slideUp('normal');
			        }
			    });
			
			});
		</script>
					<img class="img-responsive chain" src="images/re.jpg" alt=" " />	   		     		
	   		     		<!--<div class="grid-chain-bottom chain-watch">
		   		     		<span class="actual dolor-left-grid">300$</span>
		   		     		<span class="reducedfrom">500$</span>  
		   		     		<h6>Lorem ipsum dolor</h6>  	     			   		     										
	   		     		</div>-->
	   		  
	   		     	 	
			</div>      
	</div>
	<!---->
	<div class="footer">
		<!--<div class="footer-top">
			
		</div>
		<div class="footer-bottom">
			<div class="container">
				
				
				
				<div class="footer-bottom-cate cate-bottom">
					<h6>OUR ADDERSS</h6>
					<ul>
						<li>Aliquam metus  dui. </li>
						<li>orci, ornareidquet</li>
						<li> ut,DUI.</li>
						<li >nisi, dignissim</li>
						<li >gravida at.</li>
						<li class="phone">PH : 6985792466</li>
						<li class="temp"> <p class="footer-class">Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p></li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
</body>
</html>
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
$status="ACTIVE";

$q_login="insert into tbl_login(email,user_type_id,password,status) values('$mail',$user_type_id,'$password','$status')";
$q1="insert into tbl_registration(fname,lname,phone_no,email,place) values('$firstname','$lastname','$phonem','$mail','$place')";

$ins_login=mysqli_query($con,$q_login);
$ins=mysqli_query($con,$q1);
$disp=mysqli_query($con,"Select firstname from tbl_register where register_email=$mail");


if($ins){ 
if($ins_login)
{
if($user_type_id=1)
{
	header('Location:admin_home.php');
}
if($user_type_id=2)
{
	header('Location:login.php');
}
if($user_type_id=3)
{
	header('Location:login.php');
	
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
