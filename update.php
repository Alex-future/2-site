<?php //запрос на редактирование
	require('connect.php');
	 $update_id=$_GET['id'];
     $update = mysqli_query($connection, "SELECT * FROM users WHERE id='$update_id'");
     $update = mysqli_fetch_array($update);?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Редактирование</title>
</head>
<style>
	input,button,a{
	margin-top:10px;
}
.container{
	margin-top: 100px;
}
.singin{
	margin-left: 500px;
}

html, body {
  width: 100%;
  height:100%;
}

body {
    background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
    background-size: 400% 400%;
    animation: gradient 15s ease infinite;
}

@keyframes gradient {
    0% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
    100% {
        background-position: 0% 50%;
    }
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
 
  font-family: 'Roboto Condensed';
  font-size: 22px;
  line-height: 15px;
  color: #fff;
  right: -20px;
  top: -33px;
  position: relative;
}
.svg-wrapper:hover .shape {
	align:center;
  stroke-width: 2px;
  stroke-dashoffset: 0;
  stroke-dasharray: 760;
}


body {
  align-items: center;
  background-color: #000;
  display: flex;
  justify-content: center;
  height: 100vh;
}

.form {
  background-color: #15172b;
  border-radius: 20px;
  box-sizing: border-box;
  height: 1050px;
  padding: 20px;
  width: 320px;
  
}

.title {
  color: #eee;
  font-family: sans-serif;
  font-size: 36px;
  font-weight: 600;
  margin-top: 30px;
}

.subtitle {
  color: #eee;
  font-family: sans-serif;
  font-size: 16px;
  font-weight: 600;
  margin-top: 10px;
}

.input-container {
  height: 50px;
  position: relative;
  width: 100%;
}

.ic1 {
  margin-top: 40px;
}

.ic2 {
  margin-top: 30px;
}

.input {
  background-color: #303245;
  border-radius: 12px;
  border: 0;
  box-sizing: border-box;
  color: #eee;
  font-size: 18px;
  height: 100%;
  outline: 0;
  padding: 4px 20px 0;
  width: 100%;
}

.cut {
  background-color: #15172b;
  border-radius: 10px;
  height: 20px;
  left: 20px;
  position: absolute;
  top: -20px;
  transform: translateY(0);
  transition: transform 200ms;
  width: 76px;
}

.cut-short {
  width: 50px;
}

.input:focus ~ .cut,
.input:not(:placeholder-shown) ~ .cut {
  transform: translateY(8px);
}

.placeholder {
  color: #65657b;
  font-family: sans-serif;
  left: 20px;
  line-height: 14px;
  pointer-events: none;
  position: absolute;
  transform-origin: 0 50%;
  transition: transform 200ms, color 200ms;
  top: 20px;
}

.input:focus ~ .placeholder,
.input:not(:placeholder-shown) ~ .placeholder {
  transform: translateY(-30px) translateX(10px) scale(0.75);
}

.input:not(:placeholder-shown) ~ .placeholder {
  color: #808097;
}

.input:focus ~ .placeholder {
  color: #dc2f55;
}

.submit {
  background-color: #08d;
  border-radius: 12px;
  border: 0;
  box-sizing: border-box;
  color: #eee;
  cursor: pointer;
  font-size: 18px;
  height: 50px;
  margin-top: 38px;
  // outline: 0;
  text-align: center;
  width: 100%;
}

.submit:active {
  background-color: #06b;
}
h4,.kol{
  color:white;
}

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
  background: rgb(05,147,90);
  box-shadow: 0 3px rgb(33,147,90) inset;
}

</style>
<body>
</div>
<div class="container">
<div class="svg-wrapper">
<svg height="40" width="320" xmlns="http://www.w3.org/2000/svg">
<rect class="shape" height="40" width="320" />
<div class="text">Заполнение данных о поездке</div>
</svg>
</div>
	<div class="container" align="center">

    <div class="form">
    <form  method="POST" action="updatesckr.php">
      <div class="title">Заполнение данных о поездке</div>
      <div class="subtitle"><p align="center" >Фамилия менеджера: <b><?=$update['username']?></b><br>Имя клиента: <b><?=$update['email']?></b><br>Фамилия клиента: <b><?=$update['password']?></b><br>Номер телефона: <b><?=$update['fio']?></b></p></div>
      <div class="input-container ic1">
        <input id="firstname" name="vilet" class="input" type="text" placeholder=" " />
        <div class="cut"></div>
        <label for="firstname" class="placeholder">Город вылета</label>
      </div>
      <div class="input-container ic2">
        <input id="lastname" name="location" class="input" type="text" placeholder=" " />
        <div class="cut"></div>
        <label for="lastname" class="placeholder">Страна пребывания</label>
      </div>
      <div class="input-container ic2">
        <input id="email" name="price" class="input" type="text" placeholder=" " />
        <div class="cut cut-short"></div>
        <label for="email" class="placeholder">Стоимость</>
      </div><br>
      <p class="kol">Дата вылета:</p> 
      <input type="date" name="date" ><br>
 

		
			
		<input type="hidden" name="id" value="<?=$update['id']?>">
			<!--<p align="center" >Фамилия менеджера: <b><?=$update['username']?></b><br>Имя клиента: <b><?=$update['email']?></b><br>Фамилия клиента: <b><?=$update['password']?></b><br>Номер телефона: <b><?=$update['fio']?></b></p>
			<input type="text" name="vilet"  placeholder="Город вылета" ><br>
			<input type="text" name="location"  placeholder="Страна пребывания" ><br>
			<input type="text" name="price"  placeholder="Стоимость"><br>-->
			
			<h4>Количество ночей :</h4>
			<div class="kol">
				<input type="radio" id="contactChoice1" name="night" value="1-2">
				<label for="contactChoice1">1-2</label><br>
				<input type="radio" id="contactChoice2" name="night" value="2-5">
				<label for="contactChoic2">2-5</label><br>
				<input type="radio" id="contactChoice3" name="night" value="5 и более">
				<label for="contactChoic3">5 и более</label>
			</div>
			
			<div class="kol">
			<h4>Количество гостей :</h4>
				<input type="radio" id="contactChoice1" name="gost" value="1-2">
				<label for="contactChoice1">1-2</label><br>
				<input type="radio" id="contactChoice2" name="gost" value="2-3">
				<label for="contactChoic2">2-3</label><br>
				<input type="radio" id="contactChoice3" name="gost" value="3 и более">
				<label for="contactChoic3">3 и более</label>
			</div>
			
			<div class="col-md-6 offset-md-5"><br>
			<button type="submit" class="submit">Сохранить</button> <br><br>
			<a  href="login.php" class="button7">Вернуться в таблицу</a>
		</form>
    </div>
	</div>

</body>
</html>