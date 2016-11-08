<?php
include('../config.php');
$sql="SELECT * FROM phong  Inner Join
khachhang On phong.MaKH=khachhang.MaKH Inner Join phieudk On phieudk.MaKH = khachhang.MaKH 
inner Join member on member.MaKH=khachhang.MaKH 
WHERE phong.MaPhong = '".$_GET['mp']."' and phieudk.MaPhong=  '".$_GET['mp']."' ";
error_reporting(E_ERROR | E_PARSE);
$tg=date("Y-m-d");
$kq =mysql_query($sql);
$rows=mysql_fetch_array($kq, MYSQL_ASSOC);
?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<html>
<script src="bayloi.js" type="text/javascript" language="javascript" ></script> 
<head>
<link  type="text/css"  rel="stylesheet" href="bt.css" />
<form action="edit2.php"   onsubmit="return sm();" method="post"  name="frmdk" >
<table width="685">
  <tr>
    <td colspan="2"><h1 align="center" class="style1">Nhập Vào Thông Tin Đăng Ký </h1></td>
  </tr>
  <tr>
    <td width="184"><strong>Tên Khách hàng : </strong></td>
    <td width="489"><label>
      <input name="ten" type="text"  value="<?php echo $rows['Ten']; ?>"class="input_cla" id="ten" />
    </label></td>
  </tr>
  <tr>
    <td><strong>Giới Tính : </strong></td>
    <td><label>
    <select  name="gtinh"    id="gtinh">
<?php if($rows['GioiTinh']==0) 
      echo "<option  value='1'>Nam</option>
      <option   selected='selected'   value='0'>Nữ</option>"
	  ?>
    </select>
    </label></td>
  </tr>
  <tr>
    <td><strong>Tài Khoản </strong></td>
    <td><input name="tk" id="tk" type="text"  disabled="disabled"   value="<?php echo $rows['tk']; ?>" class="input_cla6" id="tk"/></td>
  </tr>
  <tr>
    <td><strong>Mật Khẩu </strong></td>
    <td><input name="mk" type="text"  value="<?php echo $rows['mk']; ?>"  class="input_cla5" id="mk"/></td>
  </tr>
  <tr>
    <td><strong>CMND : </strong></td>
    <td><input name="cmnd"  type="text" value="<?php echo $rows['CMND']; ?>" class="input_cla" id="cmnd"/> </td>
  </tr>
  <tr>
    <td><strong>Địa Chỉ : </strong></td>
    <td><input name="dchi" type="text" value="<?php echo $rows['DiaChi']; ?>" class="input_cla11" id="dchi" /></td>
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
      <input name="sdt" type="text" onblur="return checkcach(this)"  onkeydown="return checksdt(event)"  value="<?php echo $rows['SDT']; ?>"  class="input_cla4" id="sdt" />
    </label></td>
  </tr>
  <tr>
    <td height="41"><strong>email:</strong></td>
    <td><input name="email" type="text" value="<?php echo $rows['Email']; ?>"  class="input_cla3" id="email" />
      <input name="ga" type="hidden" id="ga" value="<?php echo $rows['MaKH']; ?>" /></td>
  </tr>
  <tr>
    <td valign="top">&nbsp;</td>
    <td><label> 
      <input name="submit"   value="Đăng Ký"  onclick=""   type="submit" class="bunton"  style="margin-top:10px;">
    </label></td>
  </tr>
</table>
</form>
</head>
</html>