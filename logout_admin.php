<?php
session_start();
$con=mysqli_connect("localhost","root","","organic_shop_db")or die ("Couldn't connect");
session_unset();
header("location:index.html");
?>