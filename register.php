<?php
header('Content-Type: text/html; charset=utf-8');
?>
<?php
include('connectdb.php');
	if(isset($_POST['submit'])) {
	//проверяем, нет ли у нас пользователя с таким логином           
	$query = mysql_query("SELECT COUNT(id) FROM users WHERE login='".mysql_real_escape_string($_POST['login'])."'");
	if(mysql_result($query, 0) > 0)  {
			$error = '<font color="red">Пользователь с таким логином уже есть</font>';
	   }
			// Если нет, то добавляем нового пользователя
	  if(!isset($error) )   {
		$login = mysql_real_escape_string(trim(htmlspecialchars($_POST['login'])));
		// Убираем пробелы и хешируем пароль
		$password = md5(trim($_POST['password']));
		mysql_query("INSERT INTO users SET login='".$login."', password='".$password."'");
		echo 'Вы успешно зарегистрировались с логином - '.$login;                
		exit();
	}  else   {
	// если есть такой логин то говорим об этом
		 echo $error;
		}
	}	
?>
<!DOCTYPE html>
	<html lang="en">
	<head>	 
 <title> Регистрация пользователей</title>
	</head>
	<body BACKGROUND="imgs\sova.jpg">
<center><div class="container mregister">
<br></br>
<br></br>
<form action="register.php" method="post">   
Логин <input name="login" type="text"><br>
Пароль <input name="password" type="password"><br>
<input name="submit" type="submit" value="Зарегистрироваться">
</form></div>
</div>
<footer>
© 2016 . Все права защищены.
 </footer>
</body>
</html>

