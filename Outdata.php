<?php
header('Content-Type: text/html; charset=utf-8');
include('connectdb.php');
$result = mysql_query("SELECT * FROM remedytb"); 
 
echo "<table width='100%'>";
while ($row=mysql_fetch_array($result)){
$pole1=$row[1];
$pole2=$row[2];
$pole3=$row[3];
$pole4=$row[4];
$pole5=$row[5];
$pole6=$row[6];
$pole7=$row[7];
 
echo "<tr><td>$pole1</td><td>$pole2</td><td>$pole3</td><td>$pole4</td><td>$pole5</td><td>$pole6</td><td>$pole7</td></tr>";
}
echo "</table>";
 
?>
