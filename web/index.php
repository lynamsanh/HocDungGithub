<?php
session_start(); 
?>
<html>
<head>
<meta  http-equiv="Content-Type" content="text/html; charset=utf-8" >
<link href="3.css"  rel="stylesheet" type="text/css">
<body>
<script type="text/javascript" >
function dv()
{
document.getElementById("f1").style.height = "300%";	
}
function tchu()
{
document.getElementById("f1").style.height = "220%";
}
</script>
</head>
<body>
<center>
<div id="wrapper">
<div id="header">
<div id="logo"></div>
<div id="banner"></div>
</div>
<div id="main">
<div  id="menu">

<?php
if((isset($_SESSION['name']) and ($_SESSION['lv']==1)))
{
echo "<div style='border:solid 1px;'> <h3><p align='center'> Chào Quản Trị Viên </p> <p align='center' style='color:#FF0000'> ".$_SESSION['name']." 
</p></h3>
 <div style='text-align:right; margin-right:2px;'><a  href='ls.php' target='f1' >History</a><br><a href='logout.php'>Logout</a></div> </div>";
}
else if((isset($_SESSION['name']) and ($_SESSION['lv']<>1)))
{
echo "<div style='border:solid 1px;'> <h3><p align='center'> Chào Khach Hàng </p> <p align='center' style='color:#FF0000'> ".$_SESSION['name']." 
</p></h3> <div style='text-align:right; margin-right:2px;'><a href='logout.php'>Logout</a></div> </div>";
}
else
  {
  echo "
<div id='tieude' >Đăng Nhập </div>
<form action='checklogin.php' method='get' name='frm1' id='frm1'>
  <div style='width:200px; text-align:center;background:#FFFFFF;height:140px; border:solid 1px;'>
  <label style='color:#CC0099' >Username:</label>
  <input type='text' name='u' class='input_cla'>
   <label style='color:#CC0099' >Password:</label>
  <input type='password' name='p' class='input_cla'>

   
  <input  style='margin-top:10px;' type='submit' class='bunton'>
   </div>
  </form> ";
  }
?>
  <br>


<div id="tieude" >Menu</div>
<div id="link" ><a href="trangtru/index.html"  	onClick="tchu();" target="f1">Trang Chủ </a></div>
<div id="link" ><a href="dkphong/dk.php" target="f1">Đăng Ký Phòng</a></div>
<div id="link" ><a href="dkphong/dkp.php"  		onClick="tchu();" target="f1">Đăng Ký Khách</a></div>
<div id="link" ><a href="dvu/dichvu.html"  		onClick="dv();" target="f1">Dich Vụ </a></div>

</br>
<div id="tieude" ><strong>liên hệ </strong></div>
<div style="width:200px; text-align:center;background:#FFFFFF;height:150px;">Lý Thành Nhân </br>   
  <a href="ymsgr:sendim?h4cker_dark"><img src="http://opi.yahoo.com/online?u=h4cker_dark&m=g&t=14"  width="139" height="107" border="0"></a> </div>
  </br>



</br>
<div  id="tieude" ><strong> thống kê </strong></div>
 </div>
 <div id="nhan">                     
  <div style="background:#FFFFFF; border: thin #999999 solid;width:780px;float:right; " align="left">
<div id="tieudephu">Khách Sạn Happy </div>
  <div  id="nhan"> <iframe name="f1" id="f1" frameborder="0"    width="100%"   style="height:220%"  scrolling="no" src="trangtru/index.html" >  </iframe> </div>
  </div>
</div> 
</div>
<div id="footer">
  <strong>Khách Sản Happy </strong>	 © 2012 All right reserved.<br>
  Địa Chỉ : 91 đường 30 tháng 4, Hưng Lợi, Ninh Kiều, Cần Thơ <br>
    Điện thoại: (071)- 3.844966, 3.830941, 3.830030 <br>
	  Email: happy_khachsan_ltn@happyks.com</div>
</div>
</center> 
</body>
</html>