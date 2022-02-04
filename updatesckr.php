<?php 
	require('connect.php');
	$id=$_POST['id'];
	$location=$_POST['location'];
	$price=$_POST['price'];
	$night=$_POST['night'];
	$vilet=$_POST['vilet'];
	$gost=$_POST['gost'];
	$date=$_POST['date'];
	mysqli_query($connection,"UPDATE users SET location ='$location', price='$price', night='$night', vilet='$vilet', gost='$gost', date='$date' WHERE users . id = $id");
	header('Location: login.php');
?>
