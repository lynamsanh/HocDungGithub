<?php 
error_reporting(E_ERROR | E_PARSE);
include('../config.php');
if($_POST['ten']<>"" && $_POST['tk']<>"" && $_POST['mk']<>"" && $_POST['xmk']<>"" && $_POST['email']<>"" && $_POST['cmnd']<>"" && $_POST['dchi']<>"" && $_POST['sdt']<>"")
{
$makh=mysql_query("SELECT * FROM `khachhang` order by MaKH DESC limit 1");
$rowkh=mysql_fetch_array($makh, MYSQL_ASSOC);
$maKH=$rowkh['MaKH']+1;
$sql3="insert into khachhang (MaKH,Ten,GioiTinh,CMND,QuocTich,SDT,Email,DiaChi) values('".$maKH."',N'".$_POST['ten']."','".$_POST['gtinh']."','".$_POST['cmnd']."','".$_POST['qtich']."','".$_POST['sdt']."','".$_POST['email']."',N'".$_POST['dchi']."')";
$query3=mysql_query($sql3);
$sql="insert into member (tk,mk,MaKH) values('".$_POST['tk']."','".$_POST['mk']."','".$maKH."')";
$query=mysql_query($sql);
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<html>
<head>
<script src="bayloi.js"  language="javascript" type="text/javascript" >
</script>
<link  type="text/css"  rel="stylesheet" href="bt.css" />
</head>
<form action="" method="post"  onsubmit="return sm();" name="frmdk" >
<table width="685">
  <tr>
    <td colspan="2"><h1 align="center" class="style1">Nhập Vào Thông Tin Đăng Ký </h1></td>
  </tr>
  <tr>
    <td width="184"><strong>Tên Khách hàng : </strong></td>
    <td width="489"><label>
      <input name="ten" type="text" class="input_cla" id="ten" />
    </label></td>
  </tr>
  <tr>
    <td><strong>Giới Tính : </strong></td>
    <td><label>
    <select  name="gtinh" id="gtinh">
      <option value="1">Nam</option>
      <option value="0">Nữ</option>
    </select>
    </label></td>
  </tr>
  <tr>
    <td><strong>Tài Khoản </strong></td>
    <td><input  maxlength="16" name="tk" onblur="return checkcach(this)" onkeydown="return chechtk(event)" type="text" class="input_cla6" id="tk"/></td>
  </tr>
  <tr>
    <td><strong>Mật Khẩu </strong></td>
    <td><input name="mk"  type="password" class="input_cla5" id="mk"/></td>
  </tr>
  <tr>
    <td><strong>Xác nhận Mật Khẩu </strong></td>
    <td><input name="xmk" type="password" class="input_cla5" id="xmk"/></td>
  </tr>
  <tr>
    <td><strong>CMND : </strong></td>
    <td><input name="cmnd" onblur="return checkcach(this)"  onkeydown="return chechcmnd(event)"type="text" class="input_cla" id="cmnd"/> </td>
  </tr>
  <tr>
    <td><strong>Địa Chỉ : </strong></td>
    <td><input name="dchi" type="text" class="input_cla11" id="dchi" /></td>
  </tr>
  <tr>
    <td><strong>Quốc tịch : </strong></td>
    <td><label>
      <select name="qtich" id="qtich">
        <option value="vn">Việt nam</option>
        <option value="usa">mỹ</option>
        <option value="en">Anh</option>
      </select>
    </label></td>
  </tr>
  <tr>
    <td><strong>Số điện thoại : </strong></td>
    <td><label>
      <input name="sdt" type="text"  onblur="return checkcach(this)"  onkeydown="return checksdt(event)"  class="input_cla4" id="sdt" />
    </label></td>
  </tr>
  <tr>
    <td height="41"><strong>email:</strong></td>
    <td><input name="email" type="text"  class="input_cla3" id="email" /></td>
  </tr>
  <tr>
    <td valign="top">&nbsp;</td>
    <td><label> 
      <input name="submit" value="Đăng Ký"  type="submit" class="bunton"  style="margin-top:10px;">
    </label></td>
  </tr>
</table>
</form>
</head>
</html>