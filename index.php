<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Регистрация пользователя</title>
</head>
<style>
	input,button,a{
	margin-top:10px;
}
a.button7 {
  font-weight: 700;
  color: white;
  text-decoration: none;
  padding: .8em 1em calc(.8em + 3px);
  border-radius: 3px;
  background: rgb(64,199,129);
  box-shadow: 0 -3px rgb(53,167,110) inset;
  transition: 0.2s;
} 
a.button7:hover { background: rgb(53, 167, 110); }
a.button7:active {
  background: rgb(33,147,90);
  box-shadow: 0 3px rgb(33,147,90) inset;
}
.container{
	margin-top: 100px;
}
.singin{
	margin-left: 500px;
}
html, body {
	align:center;
  background: rgb(20,20,20);
  text-align: center;
  height: 100%;
  overflow: hidden;
}
.svg-wrapper {
	align:center;
  position: relative;
  top: 50%;
  transform: translateY(-50%);
	  margin: 0 auto;
  width: 320px;  
}
.shape {
	align:center;
  stroke-dasharray: 140 540;
  stroke-dashoffset: -474;
  stroke-width: 8px;
  fill: transparent;
  stroke: #19f6e8;
  border-bottom: 5px solid black;
  transition: stroke-width 1s, stroke-dashoffset 1s, stroke-dasharray 1s;
}
.text {
	align:center;
  font-family: 'Roboto Condensed';
  font-size: 22px;
  line-height: 15px;
  color: #fff;
  left: -25px;
  top: -33px;
  position: relative;
}
.svg-wrapper:hover .shape {
	align:center;
  stroke-width: 2px;
  stroke-dashoffset: 0;
  stroke-dasharray: 760;
}




.globe-container,
.globe {
    width: 200px;
    height: 200px;  
}
.globe-container {
    position: relative;  
    display: inline-block;
    margin: 30px;
    transform: scale(1.1);
}
.globe {
    position: relative;  
    display: block;
    margin: 0;
    padding: 0;
    top: 0; 
    left: 0;
}
.globe-worldmap,
.globe-worldmap-front,
.globe-worldmap-back,
.globe-sphere,
.globe-outer-shadow,
.globe-inner-shadow {
    position: absolute; 
    display: block; 
    margin: 0; 
}
.globe-sphere,
.globe-outer-shadow,
.globe-inner-shadow {
    left: 0; 
    top: 0; 
    width: 200px; 
    height: 200px;
    background-position: 0 0; 
    background-repeat: no-repeat;
}
.globe-worldmap {
    left: 0; 
    top: 0; 
    width: 200px; 
    height: 200px; 
    overflow: hidden;
    border-radius: 50%;
}
.globe-worldmap-front,
.globe-worldmap-back {
    left: 0; 
    top: 0; 
    width: 1000px; 
    height: 200px; 
    overflow: visible;
    background-image: url(worldmap-3.svg);
    background-repeat: no-repeat;
}
.globe-sphere {
    background-image:url(sphere-2.svg)
}
.globe-outer-shadow { 
    left: 0; 
    top: 186px; 
    width: 200px; 
    height: 30px;
    background-image: url(outer_shadow.svg);
}
.globe-inner-shadow { 
    background-image: url(inner_shadow-2.svg);
}
 
.globe-worldmap-front { 
    background-position: 0px 0px;
    animation: textureSpinreverse 8s linear infinite;
}
.globe-worldmap-back { 
    background-position: 0px -220px;
    animation: textureSpin 8s linear infinite;
}
 
@keyframes textureSpin {
    from {
        transform: translateX(0);
    }
    to {
        transform: translateX(-47.5%);
    }
}
@keyframes textureSpinreverse {
    from {
        transform: translateX(-47.5%);
    }
    to {
        transform: translateX(0);
    }
}



</style>
<body>
<?php
require('connect.php');
if (isset($_POST['username']) && isset($_POST['password'])) {
	$username=$_POST['username'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$fio=$_POST['fio'];
    
	$query="INSERT INTO users (username, email, password, fio) VALUES ('$username','$email','$password','$fio')";
	$result=mysqli_query($connection,$query);

	
	if ($result) {
		$smsg="Регистрация прошла успешно";
	}else {
		$fsmsg="Ошибка";
	}
}
?>
<div class="globe-container">
    <div  class="globe">
        <div class="globe-sphere"></div>
        <div class="globe-outer-shadow"></div>
        <div class="globe-worldmap">
            <div class="globe-worldmap-back"></div>
            <div class="globe-worldmap-front"></div>
        </div>
        <div class="globe-inner-shadow"></div>
    </div>
</div>

	<div class="container">
	<div class="svg-wrapper">
  <svg height="40" width="320" xmlns="http://www.w3.org/2000/svg">
    <rect class="shape" height="40" width="320" />
    <div class="text">Регистрация пользователя</div>
  </svg>

  

</div>

		<form method="POST" align="center"  class="form">
			<?php if(isset($smsg)){ ?><div  role="alert"><?php echo $smsg; ?> </div><?php } ?>
			<?php if(isset($fsmsg)){ ?><div  role="alert"><?php echo $fsmsg; ?> </div><?php } ?>
			<input  type="text" name="username" placeholder="Фамилия менеждера" required> <br>
			<input type="text" name="email"  placeholder="Имя клиента"> <br>
			<input type="text" name="password" placeholder="Фамилия клиента"> <br>
			<input type="text" name="fio"  placeholder="Телефон"> <br> <br>
			
			<button type="submit" class="form_button" >Зарегистрировать заказ</button> <br> <br> <br>
			
			<a href="login.php" class="button7">Просмотр туров</a>
		</form>
		
	</div>
</body>
</html>