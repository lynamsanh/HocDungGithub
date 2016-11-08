<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
include('../config.php'); 
$tg=date("Y-m-d");
$sql3="UPDATE `phieudk` SET 	`NGAYDEN`= '".$tg."' where  phieudk.MaPhong=  '".$_GET['mp']."' ";
$query3=mysql_query($sql3);
header("location:thontin.php?mp=".$_GET['mp']."");
?>
