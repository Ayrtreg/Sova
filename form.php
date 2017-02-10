<?php
header('Content-Type: text/html; charset=utf-8');
require'connectdb.php';
$datereg = trim($_REQUEST['datereg']);
$num = trim($_REQUEST['num']);
$datestart = trim($_REQUEST['datestart']);
$datefinish = trim($_REQUEST['datefinish']);
$element = trim($_REQUEST['element']);
$specification = trim($_REQUEST['specification']);
$influence = trim($_REQUEST['influence']);
$insert_sql = "INSERT INTO remedytb (datereg, num, datestart, datefinish, element, specification, influence)" .
"VALUES('{$datereg}', '{$num}', '{$datestart}', '{$datefinish}', '{$element}', '{$specification}', '{$influence}');";
mysql_query($insert_sql);
if ($insert_sql = 'true'){
    echo "Информация занесена в базу данных";
}else{
    echo "Информация не занесена в базу данных";
}
?>

