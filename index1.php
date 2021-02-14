<?php
session_start();
if(!isset($_SESSION['sess']))
{
header("location:../index.php");
}
include "../dbcontroller.php";
$m=$_GET['b'];
$bid=$_GET['c'];
$amount=$_GET['d'];
$user=$_SESSION['sess'];
$sql="select * from tournament where id='$m'";
$exe=mysqli_query($con,$sql);
$exe2=mysqli_fetch_array($exe);
$cor=$exe2['Username'];
$tyu=mysqli_query($con,"select * from user_details where Username='$cor'");
$rec2=mysqli_fetch_array($tyu);
$recipient=$rec2['user_id'];
$tyu2=mysqli_query($con,"select * from bank where user_id='$recipient'");
$ba=mysqli_fetch_array($tyu2);
$balan=$ba['balance'];
$credit=$balan+$amount;
$sql4=mysqli_query($con,"select * from user_details where Username='$user'");
$exe4=mysqli_fetch_array($sql4);
$mail=$exe4['email'];
$ide=$exe4['user_id'];
$date=time();
if(isset($_POST['submit'])){
    $otp=md5($_POST['otp']);
    $ch=mysqli_query($con,"select * from bank where otp='$otp' and bank_id='$bid'");
    $ch2=mysqli_fetch_array($ch);
    $balance=$ch2['balance'];
    $debit=$balance-$amount;
    $count=mysqli_num_rows($ch);
    if($count==1){
        if($balance>0){
      $qw=mysqli_query($con,"update bank set otp='0' where bank_id='$bid'");
      $qw2=mysqli_query($con,"update bank set balance='$debit' where bank_id='$bid'");
      $qw3=mysqli_query($con,"update bank set balance='$credit' where user_id='$recipient'");
 $qw4=mysqli_query($con,"insert into application(tour_id,Username,status)values('$m','$user','1')");
     $qw5=mysqli_query($con,"insert into payment(match_id,sender,recepient,date,status)values('$m','$ide','$recipient','$date','1')");       
        header('location:success.php');
        }else{ ?>
           <div class="alert alert-danger" style="background-color:#E93535;color:white;font-size:18px">
    <center><strong>Payment Failed! </strong>  Insufficient balance.</center>
  </div> 
       <?php }
    }
    else{ ?>
         <div class="alert alert-danger" style="background-color:#E93535;color:white;font-size:18px">
    <center><strong>Payment Failed! </strong>   Invalid OTP.</center>
  </div>
   <?php }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Credit Card Payment Form Template | PrepBootstrap</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
   <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
   <script src="js/3dslider.js"></script>
<script src="js/jquery-2.1.1.min.js"></script> 
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

<div class="page-header">
   <center><h1><b>TORNEO</b></h1></center> 
</div>

<!-- Credit Card Payment Form - START -->

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <h3 class="text-center">Payment</h3>
                        <img class="img-responsive cc-img" src="http://www.prepbootstrap.com/Content/images/shared/misc/creditcardicons.png">
                    </div>
                </div>
                <div class="panel-body">
                    <form role="form" method="post">
                         <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                   <p style="color:green"> The OTP has been sent  successfully to your registered mail (  <?php echo $mail; ?>  ).</p>
                                    Please enter the OTP in the field below to verify. 
                                   </div>
                            </div>
                        </div>
                         <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>OTP</label>
                                    <input type="password" name="otp" class="form-control" />
                                </div>
                            </div>
                        </div>
                       
                          <div class="panel-footer">
                    <div class="row">
                        <div class="col-xs-14">
                            <input type="submit" name="submit" value="PROCEED" class="btn btn-warning btn-lg btn-block">
                        </div>
                    </div>
                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .cc-img {
        margin: 0 auto;
    }
</style>
<!-- Credit Card Payment Form - END -->

</div>

</body>
</html>