<?php
header('Content-Type: text/html; charset=utf-8');
ob_start();
session_start();
?>
<?php
include('connectdb.php');
	//не забываем во всех файлах писать session_start
if (isset($_POST['login']) && isset($_POST['password'])){    
	$login = mysql_real_escape_string(htmlspecialchars($_POST['login']));    
	$password = md5(trim($_POST['password']));
    $query = "SELECT * FROM users WHERE login = '$login' AND password = '$password' LIMIT 1";
    $sql = mysql_query($query) or die(mysql_error());
    // если такой пользователь есть
    if (mysql_num_rows($sql) == 1) {
        $row = mysql_fetch_assoc($sql);
		//ставим метку в сессии 
		$_SESSION['id'] = $row['id'];
		$_SESSION['login'] = $row['login'];		
		setcookie("CookieMy", $row['login'], time()+60*60*10);
		
   }
    else {
        //если пользователя нет, то пусть пробует еще
                echo '<font color="red">Пользователь не найден</font>';
    }
}
//проверяем сессию, если она есть, то значит уже авторизовались
if (isset($_SESSION['id'])){	        
        header("Location: Start.php");
} else {
	$login = '';
	//проверяем куку, может он уже заходил сюда
	if (isset($_COOKIE['CookieMy'])){
		$login = htmlspecialchars($_COOKIE['CookieMy']);
	}	
}
ob_end_flush();
?>
<!DOCTYPE html>
	<html lang="en">
	<head>
<title>SOVA</title>
</head> 
<body BACKGROUND="imgs\sova.jpg" onUnload="window.history.go(-1);">
<center><div id="login">
<br></br>
<br></br>
<br></br>
<form action="login.php" method="POST" />
    <table>
        <tr>
            <td>Введите логин:</td>
            <td><input type="text" name="login" /></td>
        </tr>
        <tr>
            <td>Введите пароль:</td>
            <td><input type="password" name="password" /></td>
        </tr>
        <tr>
            <td colspan="2"><input class="button" type="submit" value="Войти" name="submit" /></td> 
        </tr>
    </table>
</form>
 </div>
  </div>
<footer>
© 2016 . Все права защищены.
</footer>  
</body>
</html>
</body>
</html>

