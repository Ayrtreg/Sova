<?php
mysql_connect ("localhost", "root","");//пишите свои настройки
	mysql_select_db("sova") or die (mysql_error());//и свою бд
	mysql_query('SET character_set_database = utf8'); 
	mysql_query ("SET NAMES 'utf8'");        
	error_reporting(E_ALL); 
	ini_set("display_errors", 1);        
?>

