<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Сводная таблица данных о турах</title>
</head>
<style>
	input,button,a{
	margin-top:10px;
	align-items: center;
}
.container{
	margin-top: 100px;
}
.singin{
	margin-left: 500px;
}

*{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
}
body{
    font-family: Helvetica;
    -webkit-font-smoothing: antialiased;
    background: rgba( 71, 147, 227, 1);
}
h2{
    text-align: center;
    font-size: 18px;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: black;
    padding: 30px 0;
}

/* Table Styles */

.table-wrapper{
    margin: 10px 70px 70px;
    box-shadow: 0px 35px 50px rgba( 0, 0, 0, 0.2 );
}

.fl-table {
    border-radius: 5px;
    font-size: 12px;
    font-weight: normal;
    border: none;
    border-collapse: collapse;
    width: 100%;
    max-width: 100%;
    white-space: nowrap;
    background-color: white;
}

.fl-table td, .fl-table th {
    text-align: center;
    padding: 8px;
}

.fl-table td {
    border-right: 1px solid #f8f8f8;
    font-size: 12px;
}

.fl-table thead th {
    color: #ffffff;
    background: #4FC3A1;
}


.fl-table thead th:nth-child(odd) {
    color: #ffffff;
    background: #324960;
}

.fl-table tr:nth-child(even) {
    background: #F8F8F8;
}

/* Responsive */

@media (max-width: 767px) {
    .fl-table {
        display: block;
        width: 100%;
    }
    .table-wrapper:before{
        content: "Scroll horizontally >";
        display: block;
        text-align: right;
        font-size: 11px;
        
        padding: 0 0 10px;
    }
    .fl-table thead, .fl-table tbody, .fl-table thead th {
        display: block;
    }
    .fl-table thead th:last-child{
        border-bottom: none;
    }
    .fl-table thead {
        float: left;
    }
    .fl-table tbody {
        width: auto;
        position: relative;
        overflow-x: auto;
    }
    .fl-table td, .fl-table th {
        padding: 20px .625em .625em .625em;
        height: 60px;
        vertical-align: middle;
        box-sizing: border-box;
        overflow-x: hidden;
        overflow-y: auto;
        width: 120px;
        font-size: 13px;
        text-overflow: ellipsis;
    }
    .fl-table thead th {
        text-align: left;
        border-bottom: 1px solid #f7f7f9;
    }
    .fl-table tbody tr {
        display: table-cell;
    }
    .fl-table tbody tr:nth-child(odd) {
        background: none;
    }
    .fl-table tr:nth-child(even) {
        background: transparent;
    }
    .fl-table tr td:nth-child(odd) {
        background: #F8F8F8;
        border-right: 1px solid #E6E4E4;
    }
    .fl-table tr td:nth-child(even) {
        border-right: 1px solid #E6E4E4;
    }
    .fl-table tbody td {
        display: block;
        text-align: center;
    }
}
body {
  background: #A4DADA;
}
.glow-button {
  text-decoration: none;
  display: inline-block;
  padding: 15px 30px;
  margin: 10px 20px;
  border-radius: 10px;
  box-shadow: 0 0 40px 40px #6666FF inset, 0 0 0 0 #6666FF;
  font-family: 'Montserrat', sans-serif;
  font-weight: bold;
  letter-spacing: 2px;
  color: white;
  transition: .15s ease-in-out;
}
.glow-button:hover {
  box-shadow: 0 0 10px 0 #6666FF inset, 0 0 10px 4px #6666FF;
  color: #6666FF;;
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

</style>
<body>

	<h2 align="center" color="black">Cводная таблица данных о турах</h2>
	
	
 
<?php
session_start();
require('connect.php');

?>
 

 <div class="table-wrapper">
    
	 <br>
	<table border="1" align="center" class="fl-table"  >
		<thead>
  			<tr>
    			<th>id</th> 
    			<th>Фамилия менеджера</th>
    			<th>Имя клиента</th>
    			<th>Фамилия клиента</th>
    			<th>Номер телефона клиента</th>
				<th>Город вылета</th>
				<th>Дата вылета</th>
    			<th>Страна пребывания</th>
    			<th>Кол-во ночей</th>
                <th>Кол-во гостей</th>
    			<th>Цена</th>
    			<th></th>
				<th></th>
    		</tr>  
    	</thead>
    	<tbody>
			
			<?php 
			//запрос на удаление
			if (isset($_GET['del'])) {
				$sql=mysqli_query($connection,"DELETE FROM users WHERE id={$_GET['del']}");
				if ($sql) {
     				 echo "<p>Пользователь удален</p>";
    				} else {
      					echo '<p>Произошла ошибка: ' . mysqli_error($connection) . '</p>';
   					 }
				session_destroy();
				}
			//запрос на вывод всех данных
			$query="SELECT * FROM users";
			$res=mysqli_query($connection,$query) or die (mysqli_error($connection));
			$myrow=mysqli_fetch_array($res);
			while ($row=mysqli_fetch_array($res)) {?>
				<tr>
					<td><?=$row['id']?></td>
					<td><?=$row['username']?></td>
					<td><?=$row['email']?></td>
					<td><?=$row['password']?></td>
					<td><?=$row['fio']?> </td>
					<td><?=$row['vilet']?></td>
					<td><?=$row['date']?> </td>
					<td><?=$row['location']?></td>
					<td><?=$row['night']?></td>
                    <td><?=$row['gost']?> </td>
                    <td><?=$row['price']?> </td>
					<td><a href="update.php?id=<?=$row['id']?>" class="glow-button">Редактировать</a></td>
					<td><a href="?del=<?= $row['id']?>" method="GET" class="glow-button">Удалить</a></td>
				</tr>
				<?php
	}?>
		</tbody>
	</table>
    <br> <br>
     <div align="center">
	<a href="index.php" class="button7"  >Вернутся на главную</a></div></div>
</div>
</body>
</html>