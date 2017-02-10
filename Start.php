<?php
header('Content-Type: text/html; charset=utf-8');
ob_start();
session_start();
?>
<?php
include('connectdb.php');
error_reporting(0);
echo '<div class="korpus">
  <input type="radio" name="odin" checked="checked" id="vkl1"/><label for="vkl1">RemedyTB</label><input type="radio" name="odin" id="vkl2"/><label for="vkl2">RemedyITSM</label><input type="radio" name="odin" id="vkl3"/>
  <div><table id="table" border="1" cellspacing="0" cellpadding="3" width="100%" height="6"> 
<tr  style="background-color:#0066CC">
<td>номер работы</td>
<td>планируемое начало</td>
<td>время начала</td>
<td>планируемое окончание</td>
<td>время окончания</td>
<td>сетевой элемент</td>
<td>описание</td>
<td>влияние</td>';
 $result = mysql_query("SELECT * FROM remedytb ");  
while ($row=mysql_fetch_array($result)){
$pole1=$row[1];
$pole2=$row[2];
$pole3=$row[3];
$pole4=$row[4];
$pole5=$row[5];
$pole6=$row[6];
$pole7=$row[7];
$pole8=$row[8];
$pole9=$row[9];
echo "<tr><td>$pole3</td><td>$pole4</td><td>$pole5</td><td>$pole6</td><td>$pole7</td><td>$pole8</td><td>$pole9</td></tr>";
echo '</div>'; 
}
if($_POST['right']) {
    $result1= mysql_query("SELECT * FROM remedytb  LIMIT 15, 10");  
while ($row1=mysql_fetch_array($result1)){
$pole1=$row1[1];
$pole2=$row1[2];
$pole3=$row1[3];
$pole4=$row1[4];
$pole5=$row1[5];
$pole6=$row1[6];
$pole7=$row1[7];
echo "<tr><td>$pole1</td><td>$pole2</td><td>$pole3</td><td>$pole4</td><td>$pole5</td><td>$pole6</td><td>$pole7</td></tr>";
echo '</div>'; 
}
}
?>
<html>
    <head>
        <title>Таблицы Remedy</title>
        <style type="text/css">
div.bblock {
     float: left; /*Задаем обтекание*/     
     font-size: 10px;
     margin: 0;  
    
}</style>
<style>
    #left {               
        float: left;        
   }        
    #right {      
        float: right; 
   }
        </style>
<style>            
.korpus > div, .korpus > input { display: none; }
.korpus label { padding: 1px; border: 1px solid #aaa; line-height: 10px; cursor: pointer; position: relative; bottom: 1px; background: #fff; }
.korpus input[type="radio"]:checked + label { border-bottom: 2px solid #fff; }

.korpus > input:nth-of-type(1):checked ~ div:nth-of-type(1),
.korpus > input:nth-of-type(2):checked ~ div:nth-of-type(2),
.korpus > input:nth-of-type(3):checked ~ div:nth-of-type(3) { display: block; padding: 5px; border: 1px solid #aaa; }
</style>
<script type="text/javascript">
function highlight_Table_Rows(table_Id, hover_Class, click_Class, multiple) {
var table = document.getElementById(table_Id);
if (typeof multiple == 'undefined') multiple = true;

if (hover_Class) {
 var hover_Class_Reg = new RegExp("\\b"+hover_Class+"\\b");
 table.onmouseover = table.onmouseout = function(e) {
  if (!e) e = window.event;
  var elem = e.target || e.srcElement;
  while (!elem.tagName || !elem.tagName.match(/td|th|table/i))
   elem = elem.parentNode;

  if (elem.parentNode.tagName == 'TR' &&
   elem.parentNode.parentNode.tagName == 'TBODY') {
   var row = elem.parentNode;
   if (!row.getAttribute('clicked_Row'))
   row.className = e.type=="mouseover"?row.className +
   " " + hover_Class:row.className.replace(hover_Class_Reg," ");
  }
 };
}

if (click_Class) table.onclick = function(e) {
 if (!e) e = window.event;
 var elem = e.target || e.srcElement;
 while (!elem.tagName || !elem.tagName.match(/td|th|table/i))
  elem = elem.parentNode;

 if (elem.parentNode.tagName == 'TR' &&
  elem.parentNode.parentNode.tagName == 'TBODY') {
  var click_Class_Reg = new RegExp("\\b"+click_Class+"\\b");
  var row = elem.parentNode;

  if (row.getAttribute('clicked_Row')) {
   row.removeAttribute('clicked_Row');
   row.className = row.className.replace(click_Class_Reg, "");
   row.className += " "+hover_Class;
  }
  else {
   if (hover_Class) row.className = row.className.replace(hover_Class_Reg, "");
   row.className += " "+click_Class;
   row.setAttribute('clicked_Row', true);

  if (!multiple) {
   var lastRowI = table.getAttribute("last_Clicked_Row");
   if (lastRowI!==null && lastRowI!=='' && row.sectionRowIndex!=lastRowI) {
    var lastRow = table.tBodies[0].rows[lastRowI];
    lastRow.className = lastRow.className.replace(click_Class_Reg, "");
    lastRow.removeAttribute('clicked_Row');
   }
  }
  table.setAttribute("last_Clicked_Row", row.sectionRowIndex);
  }
 }
};
}
</script>
<script type="text/javascript">
 highlight_Table_Rows("table", "hover_Row", "clicked_Row");
</script>
    </head>    
    <body style='background: #F5F5F5;' onUnload="window.history.go(-1);">        
         <div class="conteiner"><span style='padding-left:70px;'></span>

        <input type='button' value='меню'>
        
        <div id="dialog" title="Меню программы">
            <form method='post' action='test.php'>
                <p><a href="logout.php">Выйти</a> из системы</p>
            </form>
        </div>

        <script src="http://code.jquery.com/jquery-1.10.2.js"></script>

        <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>

        <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">

        <script>

            var dialog = $("#dialog").dialog({autoOpen: false});

            $("input[type=button]").click(function ()

                {

                dialog.dialog( "open" );

                });

        </script></div>
        <style type="text/css">
    div.conteiner {        
        background: url(imgs/1.jpg) repeat-x; margin: 0;      
    }
</style>
<br>
<form action="" method="POST" />
    <table>
            <input type = "image" src = "imgs\лево.jpg" name = "left" value = "Значение кнопки" /><input type = "image" src = "imgs\право.jpg" name = "right" value = "Значение кнопки" onclick="ochistka()" />         
    </table>
</form>
<script>
var alles_td=document.getElementsByTagName("td");
function ochistka(){
    for(i=0;i<alles_td.length;i++){
        alles_td[i].innerHTML="";
    }
}
</script>

    </body>    
</html>

