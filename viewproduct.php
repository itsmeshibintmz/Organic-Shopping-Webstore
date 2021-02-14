
<?php
session_start();
if(isset($_SESSION['alogin'])){
	$mail=$_SESSION['alogin'];
	//$pname=$_SESSION['name'];
	
?>



<?php
$con=mysqli_connect("localhost","root","","organic_shop_db")or die ("Couldnt connect");

$disp="SELECT  *from tbl_product ORDER BY name ASC";

$disp_result=mysqli_query($con,$disp);
$prodname="";
$reg="Select rid from tbl_registration WHERE email='$mail'";
$regid=mysqli_query($con,$reg);
$rid_row1=mysqli_fetch_array($regid);
$rid=$rid_row1['rid'];
$viewbrand="Select * from tbl_product where rid='$rid'";

//$viewbrand="Select * from tbl_product where name=$pname ORDER BY name ASC";
$d_seller_brand=mysqli_query($con,$viewbrand);

?>






<!DOCTYPE html>
<html>
<head>
<title>organicshoppi| view products</title>
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


<!--script-->
</head>
<body> 
	<!--header-->
	<div class="header">
		<div class="top-header">
			<div class="container">
				<div class="top-header-left">
					<ul class="support">
						<li><a href="#"><label> </label></a></li>
						<li><a href="#">24x7 live<span class="live"> support</span></a></li>
					</ul>
					<ul class="support">
						<li class="van"><a href="#"><label> </label></a></li>
						<li><a href="#">Free shipping <span class="live">on order over 500</span></a></li>
					</ul>
					<div class="clearfix"> </div>
				</div>
				<div class="top-header-right">
					<!--<div class="down-top">		
						  <select class="in-drop">
							  <option value="English" class="in-of">English</option>
							  <option value="Japanese" class="in-of">Japanese</option>
							  <option value="French" class="in-of">French</option>
							  <option value="German" class="in-of">German</option>
							</select>
					 </div>
					<div class="down-top top-down">
						  <select class="in-drop">
						  
						  <option value="Dollar" class="in-of">Dollar</option>
						  <option value="Yen" class="in-of">Yen</option>
						  <option value="Euro" class="in-of">Euro</option>
							</select>-->
					 </div>
					<div class="clearfix"> </div>	
				</div>
				<div class="clearfix"> </div>		
			</div>
		</div>
		<div class="bottom-header">
			<div class="container">
				<div class="header-bottom-left">
					<div class="logo">
						<font size="4"><strong><i> <b><p style="color:red;">ORGANICSHOPPING </p> </b></i></strong></font>
					</div>
					<!--<div class="search">
						<input type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" >
						<input type="submit"  value="SEARCH">

					</div>-->
					<div class="w3l_search" style="margin-top:5px;margin-left:250px">
									<!--<form action="search_prod_action.php" method="POST">
										<input type="text" name="product" id="product" placeholder="Search a product..." required>
										<input type="submit" name="search" id="search" value=" ">
									</form>-->
						</div>
					<div class="clearfix"> </div>
				</div>
				<div class="header-bottom-right">					
						<div class="account"><a href="register.php"><span></span><?php echo $mail?> </span></a></div>
							<ul class="login">
								<li><a href="logout.php"><span> </span>LOGOUT</a></li>
							
							</ul>
						<!--<div class="cart"><a href="viewsingle.php"><span> </span>CART</a></div>-->
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>	
			</div>
		</div>
	</div>
	<!---->
	<!-- start content -->
	
	
	
	
	<div class="container">
		
	<div class="women-product">
		<div class=" w_content">
			<div class="women">
			<h4>MY PRODUCTS  </h4></a>
				
			     <div class="clearfix"> </div>	
			</div>
		</div>
		<!-- grids_of_4 -->
		<div class="grid-product">
		
		
		
		
			<?php while ($rowp=mysqli_fetch_array($d_seller_brand))
					{
						
						?>
		
		
		
		
		  <div class="  product-grid">
		  
		  <form action="viewproduct.php" method="POST" name="prod" id="prod">
			<div class="content_box">
			   	<div class="left-grid-view grid-view-left">
			   	   	 <img src="uploads/products/<?php echo $rowp['image'] ?>"  class="img-responsive watch-right" alt="image"/style="width:300px;height:200px;">
				   	   	<div class="mask">
	                        <div class="info">Quick View</div>
			            </div>
				   	  
				</div>
				   <b> <h1 style="color:green ;"><b>  <?php   echo $rowp['name'] ;
					//$_SESSION['pname']=$rowp['name'];
					?></b></h1>
					
					
				        <?php   echo $rowp['des'] ?> <br>
				   <h3 style="color:red;">  Rs.<?php   echo $rowp['price'] ?> for 1Kg<br></h3>
				     Quntity <?php   echo $rowp['qunty'] ?></b><br>
				 
				 <input type="text" name="prod_id" id="prod_id" value="<?php   echo $rowp['pid'] ?>" hidden>
				 <br>
				
				 <a href="delete_seller_prod.php?pid=<?php echo $rowp['pid'];?>&action=edit" background="#FF5733 "; style="color:blue;" ><b>Update</b></a>   
<a href="delete_seller_prod.php?pid=<?php echo $rowp['pid'];?>&action=delete" background="green";  onclick="return (confirm('Are You Sure To Delete ?'));" style="color:red;" ><b>Delete </b></a>
		<!--<Button name="edit" id="edit" class="btn btn-danger btn-sm remove" style="background-color:#FE1104 "> Edit</Button>
	 <!--<Button name="delete" id="delete" class="btn btn-danger btn-sm remove"style="background-color:#FE1104 " > Delete</Button>-->
				 </br>
			   	</div>
              </div>
			  </form>
			  
			  	<?php }
				?>
				
				<!--<script type="text/javascript">

    $(".remove").click(function(){

        var id = $(this).parents("tr").attr("id");


        if(confirm('Are you sure to remove this product ?'))

                {

            $.ajax({

               url: 'delete_seller_prod.php',

               type: 'GET',

               data: {id: id},

               error: function() {

                  alert('Something is wrong');

               },

               success: function(data) {

                    $("#"+id).remove();

                    alert("Product removed successfully");  

               }

            });

        }

    });


</script>
			 
			
				 
				  <!--
			 <div class="  product-grid">
			<div class="content_box"><a href="single.html">
			   	<div class="left-grid-view grid-view-left">
			   	   	 <img src="images/pic3.jpg" class="img-responsive watch-right" alt=""/>
				   	   	<div class="mask">
	                        <div class="info">Quick View</div>
			            </div>
				   	  </a>
				   </div>
				    <h4><a href="#"> Duis autem</a></h4>
				     <p>It is a long established fact that a reader</p>
				     Rs. 499
			   	</div>
                 </div>
		  <div class="  product-grid">
			<div class="content_box"><a href="single.html">
			   	<div class="left-grid-view grid-view-left">
			   	   	 <img src="images/pic4.jpg" class="img-responsive watch-right" alt=""/>
				   	   	<div class="mask">
	                        <div class="info">Quick View</div>
			            </div>
				   	  </a>
				   </div>
				    <h4><a href="#"> Duis autem</a></h4>
				     <p>It is a long established fact that a reader</p>
				     Rs. 499
			   	</div>
              </div>
			 <div class="  product-grid">
			<div class="content_box"><a href="single.html">
			   	<div class="left-grid-view grid-view-left">
			   	   	 <img src="images/pic6.jpg" class="img-responsive watch-right" alt=""/>
				   	   	<div class="mask">
	                        <div class="info">Quick View</div>
			            </div>
				   	  </a>
				   </div>
				    <h4><a href="#"> Duis autem</a></h4>
				     <p>It is a long established fact that a reader</p>
				     Rs. 499
			   	</div>
                 </div>
			 <div class="  product-grid">
			<div class="content_box"><a href="single.html">
			   	<div class="left-grid-view grid-view-left">
			   	   	 <img src="images/pic7.jpg" class="img-responsive watch-right" alt=""/>
				   	   	<div class="mask">
	                        <div class="info">Quick View</div>
			            </div>
				   	  </a>
				   </div>
				    <h4><a href="#"> Duis autem</a></h4>
				     <p>It is a long established fact that a reader</p>
				     Rs. 499
			   	</div>
                 </div>
		  <div class="  product-grid">
			<div class="content_box"><a href="single.html">
			   	<div class="left-grid-view grid-view-left">
			   	   	 <img src="images/pic8.jpg" class="img-responsive watch-right" alt=""/>
				   	   	<div class="mask">
	                        <div class="info">Quick View</div>
			            </div>
				   	  </a>
				   </div>
				    <h4><a href="#"> Duis autem</a></h4>
				     <p>It is a long established fact that a reader</p>
				     Rs. 499
			   	</div>
              </div>
			 <div class="  product-grid">
			<div class="content_box"><a href="single.html">
			   	<div class="left-grid-view grid-view-left">
			   	   	 <img src="images/pic11.jpg" class="img-responsive watch-right" alt=""/>
				   	   	<div class="mask">
	                        <div class="info">Quick View</div>
			            </div>
				   	  </a>
				   </div>
				    <h4><a href="#"> Duis autem</a></h4>
				     <p>It is a long established fact that a reader</p>
				     Rs. 499
			   	</div>
                 </div>
			 <div class=" product-grid">
			<div class="content_box"><a href="single.html">
			   	<div class="left-grid-view grid-view-left">
			   	   	 <img src="images/pic12.jpg" class="img-responsive watch-right" alt=""/>
				   	   	<div class="mask">
	                        <div class="info">Quick View</div>
			            </div>
				   	  </a>
				   </div>
				    <h4><a href="#"> Duis autem</a></h4>
				     <p>It is a long established fact that a reader</p>
				     Rs. 499
			   	</div>
                 </div>
				 
				 -->
				 
			<div class="clearfix"> </div>
		</div>
	</div>
	<div class="sub-cate">
				<div class=" top-nav rsidebar span_1_of_left">
					<h3 class="cate">MENU</h3>
					
		 <ul class="menu">
		<ul class="kid-menu ">
				<li><a href="seller_home.php"> Home</a></li>
				</ul>
		<li class="item2"><a href="#">Profile<img class="arrow-img " src="images/arrow1.png" alt=""/></a>
			<ul class="cute">
				<li class="subitem1"><a href="seller_profile.php">View Profile </a></li>
				<!--<li class="subitem1"><a href="seller_update_profile.php">Update profile</a></li>-->
				<li class="subitem1"><a href="seller_update.php">Change Password</a></li>
			</ul>
		</li>
		
		
			
		<ul class="kid-menu ">
				
				<li><a href="product.php">add product</a></li>
			<li><a href="viewproduct.php">My Products</a></li>
			
				
				
				<!--<li class="menu-kid-left"><a href="contact.html">Contact us</a></li-->
			</ul>
			<li class="item2"><a href="#">Orders<img class="arrow-img " src="images/arrow1.png" alt=""/></a>
			<ul class="cute">
				<li class="subitem1"><a href="new_received_orders.php">View new orders</a></li>
				<li class="subitem1"><a href="seller_delivered_orders.php">Dispatched Orders</a></li>
				<!--<li class="subitem1"><a href="seller_update_profile.php">Update profile</a></li>
				<li class="subitem1"><a href="seller_update.php">Change Password</a></li>-->
			</ul>
		</li>
		<li class="item2"><a href="#">complaints<img class="arrow-img " src="images/arrow1.png" alt=""/></a>
			<ul class="cute">
				<li class="subitem1"><a href="seller_complaint.php">New Complaints</a></li>
				<li class="subitem1"><a href="seller_replied_complaints.php">Replied Complaints</a></li>
				
				<!--<li class="subitem1"><a href="seller_update_profile.php">Update profile</a></li>
				<li class="subitem1"><a href="seller_update.php">Change Password</a></li>-->
			</ul>
		</li>
	</ul>
					</div>
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
					<div class=" chain-grid menu-chain">
	   		     		<img class="img-responsive chain" src="images/a.jpg" alt=" " />   		     		
	   		     		<!--<div class="grid-chain-bottom chain-watch">
		   		     		<span class="actual dolor-left-grid">300$</span>
		   		     		<span class="reducedfrom">500$</span>  
		   		     		<h6>Lorem ipsum dolor</h6>  		     			   		     										
	   		     		</div>-->
	   		     	</div>
	   		     	<!-- <a class="view-all all-product" href="product.html">VIEW ALL PRODUCTS<span> </span></a> -->	
			</div>
	<div class="clearfix"> </div>
</div>
	<!---->
	<div class="footer">
		<!--<div class="footer-top">
			<div class="container">
				<div class="latter">
					<h6>NEWS-LETTER</h6>
					<div class="sub-left-right">
						<form>
							<input type="text" value="Enter email here"onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter email here';}" />
							<input type="submit" value="SUBSCRIBE" />
						</form>
					</div>
					<div class="clearfix"> </div>
				</div>
				<!--<div class="latter-right">
					<p>FOLLOW US</p>
					<ul class="face-in-to">
						<li><a href="#"><span> </span></a></li>
						<li><a href="#"><span class="facebook-in"> </span></a></li>
						<div class="clearfix"> </div>
					</ul>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="footer-bottom">
			<!--<div class="container">
				<div class="footer-bottom-cate">
					<h6>CATEGORIES</h6>
					<ul>
						<li><a href="#">Curabitur sapien</a></li>
						<li><a href="#">Dignissim purus</a></li>
						<li><a href="#">Tempus pretium</a></li>
						<li ><a href="#">Dignissim neque</a></li>
						<li ><a href="#">Ornared id aliquet</a></li>
						<li><a href="#">Ultrices id du</a></li>
						<li><a href="#">Commodo sit</a></li>
						<li ><a href="#">Urna ac tortor sc</a></li>
						<li><a href="#">Ornared id aliquet</a></li>
						<li><a href="#">Urna ac tortor sc</a></li>
						<li ><a href="#">Eget nisi laoreet</a></li>
						<li ><a href="#">Faciisis ornare</a></li>
					</ul>
				</div>
				<div class="footer-bottom-cate bottom-grid-cat">
					<h6>FEATURE PROJECTS</h6>
					<ul>
						<li><a href="#">Curabitur sapien</a></li>
						<li><a href="#">Dignissim purus</a></li>
						<li><a href="#">Tempus pretium</a></li>
						<li ><a href="#">Dignissim neque</a></li>
						<li ><a href="#">Ornared id aliquet</a></li>
						<li><a href="#">Ultrices id du</a></li>
						<li><a href="#">Commodo sit</a></li>
					</ul>
				</div>
				<div class="footer-bottom-cate">
					<h6>TOP BRANDS</h6>
					<ul>
						<li><a href="#">Curabitur sapien</a></li>
						<li><a href="#">Dignissim purus</a></li>
						<li><a href="#">Tempus pretium</a></li>
						<li ><a href="#">Dignissim neque</a></li>
						<li ><a href="#">Ornared id aliquet</a></li>
						<li><a href="#">Ultrices id du</a></li>
						<li><a href="#">Commodo sit</a></li>
						<li ><a href="#">Urna ac tortor sc</a></li>
						<li><a href="#">Ornared id aliquet</a></li>
						<li><a href="#">Urna ac tortor sc</a></li>
						<li ><a href="#">Eget nisi laoreet</a></li>
						<li ><a href="#">Faciisis ornare</a></li>
					</ul>
				</div>
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
	</div>-->
</body>
</html>


<?php
}
else
{
	header('Location:login.php');
}
?>
