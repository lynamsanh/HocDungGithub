<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php
session_start(); 
error_reporting(E_ERROR | E_PARSE);
if(!isset($_SESSION['name']))
{
header("location:dk.php"); 
}
else
{
include ('../config.php');
if($_POST['ttruoc'] <> "" or $_POST['sp'] <> "" )
{
$qrpdk=mysql_query("SELECT * FROM `phieudk` order by Sttpdk DESC limit 1");
$row=mysql_fetch_array($qrpdk, MYSQL_ASSOC);
$pdk=$row['Sttpdk']+1;
$sql3="insert into phieudk(Sttpdk,MaKH,CHUTHICH,MaPhong,TRATRUOC,NGAYDK) values('".$pdk."','".$_SESSION['ma']."','".$_POST['cthich']."','".$_GET['mp']."','".$_POST['ttruoc']."',now())";
$query3=mysql_query($sql3);
$sqldk = "update phong set TinhTrang=1,MaKh='".$_SESSION["ma"]."' where Maphong='".$_GET['mp']."'";
$resultdk = mysql_query($sqldk);
header("location:dk.php"); 
}
}
?>

<html>
<head>
<link  type="text/css"  rel="stylesheet" href="bt.css" />
</head>
<form action="" method="post"  name="frmdk" >
<table width="685">
  <tr>
    <td colspan="2"><h1 align="center" class="style1">Nhập Vào Thông Tin Đăng Ký </h1></td>
  </tr>
  <tr>
    <td width="184"><strong>Trả Trước : </strong></td>
    <td width="489"><input name="ttruoc" type="text"   disabled="disabled"   class="input_cla" id="ttruoc" value ="<?php echo ($_GET['gia']*30/100); ?>" /></td>
  </tr>
  <tr>
    <td><strong>Số Phòng : </strong></td> 
    <td><input name="sp" type="text"  value ="<?php echo $_GET['sp']; ?>"   disabled="disabled"  class="input_cla3" id="sp" /></td>
  </tr>
  <tr>
    <td valign="top"><strong>Chú Thích : </strong></td>
    <td><textarea name="cthich" cols="50" rows="6" id="cthich"  style="-moz-border-radius: 10px;
-webkit-border-radius: 10px;
box-shadow:inset 5px 3px 5px#CCCCCC ;"></textarea></td>
  </tr>
  <tr>
    <td valign="top">&nbsp;</td>
    <td><label> 
      <input name="submit"  value="Đăng Ký" onclick="frmdk.ttruoc.disabled='';frmdk.sp.disabled='';"  type="submit" class="bunton"  style="margin-top:10px;">
    </label></td>
  </tr>
</table>
</form>
</head>
</html>