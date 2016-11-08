<?php
session_start(); 
if(!isset($_SESSION['name']))
{
include('config.php');
		$username = $_GET['u'];
		$password = $_GET['p'];
		$sql="SELECT * FROM member WHERE tk='".$username."' and mk='".$password."'" ;
		$result=mysql_query($sql);
		$count=mysql_num_rows($result);
		if($count > 0)
		{		
		$row=mysql_fetch_array($result);
		$_SESSION["name"] = "$username";
		$_SESSION["lv"] = $row['lv'];
		$_SESSION["ma"] = $row['MaKH'];
		$tg=date("Y-m-d h:i:s");
		if($row['lv']<>NULL)
		{
		mysql_query("insert into lsql(tg,MaKH) values('".$tg."','".$row['MaKH']."') ");
		}
		}

}
header("location:index.php"); 
?>
