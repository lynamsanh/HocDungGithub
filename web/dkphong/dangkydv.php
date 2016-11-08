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
$checkbox=$_POST['checkbox'];
$tg=date("Y-m-d");
if($_POST['a']!="") $txt[]=$_POST['a'];
if($_POST['b']!="") $txt[]=$_POST['b'];
if($_POST['c']!="") $txt[]=$_POST['c'];
for($i=0;$i<count($_POST['checkbox']);$i++)
{
$new_date = strtotime ( '+'.$txt[$i].' day' , strtotime ( $tg ) ) ;
$new_date = date ( 'Y-m-j' , $new_date );
$madv = $checkbox[$i];
$sql2 ="select * from dkdv where MaPDK=".$_GET[pdk]." and MaDV=".$madv."";
$query=mysql_query($sql2);
$sngay=$txt[$i];
if(mysql_num_rows($query) != "" )
{
$sql3 = "update dkdv  set songay=DATE_ADD(songay,INTERVAL ".$txt[$i]." day) ,ngaydk=now() where MaPDK=".$_GET[pdk]." and MaDV=".$madv."";
$result2 = mysql_query($sql3);
header("location:dk.php");
}
else
{
$sql = "insert into dkdv(MaPDK,MaDV,songay,ngaydk) values(".$_GET[pdk].",".$madv.",'". $new_date ."','".$tg."') ";
$result = mysql_query($sql);
header("location:dk.php");

}
}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<SCRIPT LANGUAGE="JavaScript">
      function confirmAction() {
        return confirm("Bạn Có Chắc Chưa")
      }
   
</SCRIPT>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="815">
    <tr>
      <td width="111"><strong>c&aacute;c D&#7883;ch V&#7909; : </strong></td>
      <td width="692"><table width="457" border="0">
          <tr>
            <td width="273"><input name="checkbox[]2" onChange="if(this.checked==true)form1.a.value=prompt('Nhập Số Ngày','');" type="checkbox" id="checkbox[]2" value="1" />
D&#7883;ch v&#7909; Massage - 200k/1ngay</td>
            <td width="174"><label>
              <input name="a" type="text" id="a" />
            </label></td>
          </tr>
          <tr>
            <td><input name="checkbox[]3" onChange="form1.b.value=prompt('Nhập Số Ngày','');" type="checkbox" id="checkbox[]3" value="2" />
D&#7883;ch v&#7909; Internet t&#7889;c &#273;&#7897; cao 15k/ng&agrave;y</td>
            <td><input name="b" type="text"id="a2" /></td>
          </tr>
          <tr>
            <td><input name="checkbox[]" onChange="form1.c.value=prompt('Nhập Số Ngày','');" type="checkbox" id="checkbox[]" value="3" />
D&#7883;ch v&#7909; b&#7875; b&#417;i - 50k/1Ng&agrave;y </td>
            <td><label>
              <input name="c" type="text" id="a[]" />
            </label></td>
          </tr>
          <tr>
            <td colspan="2"><div align="center">
              <input name="submit"   onclick="return confirmAction();" type="submit" value="Thực Hiện" />
            </div></td>
          </tr>
      </table></td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
<p>&nbsp;</p>
</body>
</html>