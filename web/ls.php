
<style>
#wrapper {
    width: 800px;
    margin: 20px auto;

}

#nav, #nav ul {
    list-style:  none;
    position: relative;
    line-height: 1.5em;
}

#nav a:link, #nav a:active,
#nav a:visited {
    display: block;
    padding: 0px 5px;
    border: 1px solid #3883cc;
    color: white;
    text-decoration: none;
    background: #3883cc;
}

#nav a:hover {
    background: #fff;
    color: #333;
}

#nav li {
    float: left;
    position: relative;
}

#nav ul {
    position: absolute;
    width: 12em;
    top: 1.5em;
    display: none;
}

#nav li ul a {
    width: 12em;
    float: left;
}

#nav ul ul {
    top: auto;
}

#nav li ul ul {
    left: 12em;
    margin: 0px 0 0 10px;
}

#nav li:hover ul ul, 
#nav li:hover ul ul ul,
#nav li:hover ul ul ul ul {
    display: none;
}

#nav li:hover ul,
#nav li li:hover ul,
#nav li li li:hover ul,
#nav li li li li:hover ul {
    display: block;
}

</style>
<meta  http-equiv="Content-Type" content="text/html; charset=utf-8" >
<?php 
session_start();
if((!isset($_SESSION['name']) and ($_SESSION['lv']<>1)))
{
header("location:index.php"); 
}
?>
<?php 
include('config.php');
$sonews =15;
$query = mysql_query("SELECT * FROM lsql inner join khachhang on lsql.MaKH = khachhang.MaKH");  
$tongsodong = mysql_num_rows($query);
$tongsotrang = ceil($tongsodong / $sonews);
if(isset($_GET["p"])){
        $p = intval($_GET["p"]) ;
}
else{
        $p =1;
}
$x = ($p-1) * $sonews;

$sql="SELECT * FROM lsql inner join khachhang on lsql.MaKH = khachhang.MaKH ORDER BY Stt DESC  limit $x,$sonews";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
?>
<table border="1">
<?php
while($rows=mysql_fetch_array($result, MYSQL_ASSOC)){
?>
  <tr>
    <td><?php echo $rows['tg'] ?></td>
    <td><?php echo $rows['Ten'] ?></td>
  </tr>
<?php
}
?>
<tr>
<td  colspan="2">
<?php
$page = $p - 1;
if ($p > 1)
{
echo "<ul id='nav'><li><a href=\"ls.php?p=$page\">&lt;&lt;</a></li></ul>";
}
for ($i = 1;$i<=$tongsotrang;$i++)
    {
    	if($i==$p)
		{
        echo "<ul id='nav'> <li><font color='red'> $i  </font></li></ul>";
    	}
    else{
        echo "<ul id='nav'>
  		<li><a  href='ls.php?p=$i'> $i </a>
  		</li>
		</ul>";
    	}        
     }
$page = $p + 1;
if ($p < $tongsotrang)
{
	echo "<ul id='nav'><li><a href=\"ls.php?p=$page\">&gt;&gt;</a></li></ul>";
}
?>
</td>
</tr>
</table>