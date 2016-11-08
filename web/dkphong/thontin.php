<?php
session_start();
include('../config.php');
$sql="SELECT * FROM phong  Inner Join
khachhang On phong.MaKH=khachhang.MaKH Inner Join phieudk On phieudk.MaKH = khachhang.MaKH
WHERE phong.MaPhong = '".$_GET['mp']."' and phieudk.MaPhong=  '".$_GET['mp']."' ORDER BY Sttpdk DESC 
LIMIT 1";
error_reporting(E_ERROR | E_PARSE);
$tg=date("Y-m-d");
$kq =mysql_query($sql);
$rows=mysql_fetch_array($kq, MYSQL_ASSOC);
if($rows['MaLoai'] == 1)
{
$gia=300000;
}
else
{
$gia=1000000;
}
function tinhsongay($date1,$date2)
{
$songay=0; 
if($date1 <> NULL)
{
  if ($date1<$date2)
  { 
    $dates_range[]=$date1; 
    $date1=strtotime($date1); 
    $date2=strtotime($date2); 
    $songay=0; 
    while ($date1!=$date2){ 
      $date1=mktime(0, 0, 0, date("m", $date1), date("d", $date1)+1, date("Y", $date1)); 
      $dates_range[]=date('Y-m-d', $date1); 
	  if($songay>=0)	  
      $songay++; 	
  }  
  }
return $songay;
  }
  
}
?>

<SCRIPT LANGUAGE="JavaScript">
      function confirmAction() {
        return confirm("Bạn có chắc là người này tới nhận/ trả phòng đúng không")
      }
   
</SCRIPT>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>
<style>

#tieudephu{
	border:thin #000000 solid;
	background:url(../images/cellpic2.jpg);
	font-size:24px;
	color:#000000;
	height:30px;
	padding-left:10px;
	font-weight: bold;
}
.style1 {font-size: 24px}
.style2 {
	color: #0000FF;
	font-weight: bold;
}
</style>
<div>
<div class="style1 style1" id="tieudephu">Thông Tin Khách Hàng </div>
<div style="margin-left:50px;">
 <span class="style2">Thông Tin của Khách Hàng  </span>
      <table style="margin-left:50px;" width="377" border="0">
        <tr>
          <td width="174" align="right"><strong>Tên Khách Hàng : </strong></td>
          <td width="105" align="right"><?php echo $rows['Ten']; ?></td>
        </tr>
        <tr>
          <td align="right"><strong> Giơi Tính : </strong></td>
          <td align="right"><?php if($rows['GioiTinh']==1) echo "Nam";else echo"Nữ"; ?></td>
        </tr>
        <tr>
          <td align="right"><strong>Địa Chĩ : </strong></td>
          <td align="right"><?php echo $rows['DiaChi']; ?></td>
        </tr>
        <tr>
          <td align="right"><strong>Quôc Gia : </strong></td>
          <td align="right"><?php echo $rows['QuocTich']; ?></td>
        </tr>
        <tr>
          <td align="right"><strong> Số đt : </strong></td>
          <td align="right"><?php echo $rows['SDT']; ?></td>
        </tr>
        <tr>
          <td align="right"><strong> CMND : </strong></td>
          <td align="right"><?php echo $rows['CMND']; ?></td>
        </tr>
        <tr>
          <td align="right"><strong> Email : </strong></td>
          <td align="right"><?php echo $rows['Email']; ?></td>
        </tr>
        <tr>
          <td align="right"><strong> Tình Trang : </strong></td>
          <td align="right"><?php if($rows['TinhTrang']==NULL) echo "Tạm Vắng";else echo"Có tại phòng"; ?></td>
        </tr>
      </table>
      <table width="377" border="0" style="margin-left:50px;">
        <tr>
          <td align="right"><strong>
		  <?php if( $rows['MaKH'] == $_SESSION['ma'] or $_SESSION['lv']<>0)
		  { 
		  echo "<a href='edit.php?mp=".$rows['MaPhong']."' 
		  >Sữa Thông Tin</a>"; } ?></strong></td>
        </tr>
      </table>
      <span class="style2">Thông Tin ở </span>
      <table style="margin-left:50px;" width="596" border="0">
        <tr>
          <td width="186" align="right"><strong>Ở Từ Ngày :</strong></td>
          <td width="400" align="right"><?php  if(($rows['NGAYDEN']==NULL) and ($_SESSION['lv'] <> NULL)) echo  "<a href='nhan.php?mp=".$rows['MaPhong']."'  onclick='return confirmAction()'> Nhân Phòng </a>";else
		  {
		  echo $rows['NGAYDEN'];
		  } ?>		  </td>
        </tr>
        <tr>
          <td onClick="" align="right"><strong> Tiền Hiện tại: </strong></td>
          <td align="right">
		 
 <?php 
$songay=1;
$date1= $rows['NGAYDEN']; 
if($date1 <> NULL)
{
$date2= $tg;
  if ($date1<$date2)
  { 
    $dates_range[]=$date1; 
    $date1=strtotime($date1); 
    $date2=strtotime($date2); 
    $songay=1; 
    while ($date1!=$date2){ 
      $date1=mktime(0, 0, 0, date("m", $date1), date("d", $date1)+1, date("Y", $date1)); 
      $dates_range[]=date('Y-m-d', $date1); 
	  if($songay>=0)	  
      $songay++; 	
  } 
  }
  $qrgiadv = mysql_query("select * from phieudk inner Join dkdv on phieudk.Sttpdk = dkdv.MaPDK  inner Join dv on dv.MaDV = dkdv.MaDV where dkdv.MaPDK='".$rows['Sttpdk']."'");
  while($rowdv=mysql_fetch_array($qrgiadv))
  {
  $giadv=$giadv+($rowdv['GiaDV']*tinhsongay($rowdv['ngaydk'],$rowdv['songay']));
  }
	$giaphong=$songay*$gia+$giadv;
  echo $giaphong;  
  }
  if($rows['NGAYDEN']<>NULL and $_SESSION['lv'] <> NULL) echo  "<a  href='traphong.php?mp=".$rows['MaPhong']."&sp=".$rows['Sttpdk']."&ten=".$rows['Ten']."&gia=".$giaphong."' onclick='return confirmAction()'> trả Phòng </a>";
?></td>
        </tr>
        <tr>
          <td align="right"><strong> dịch vụ : </strong></td>
          <td align="right">
		  <?php  
			 $dv = mysql_query("select * from phieudk inner Join dkdv on phieudk.Sttpdk = dkdv.MaPDK  inner Join dv on dv.MaDV = dkdv.MaDV where dkdv.MaPDK='".$rows['Sttpdk']."' and dkdv.songay > now()  ");
			  while($rowlk=mysql_fetch_array($dv) )
			  { 			  
			  echo "<table border=1> <tr><td width=200px align=left>".$rowlk['TenDV']."</td>  <td> <u>Ngày Hết Hạn: ".$rowlk['songay']."</u></td></tr></table>";
			  }  
		  ?>		 
		   <?php if( $rows['MaKH'] == $_SESSION['ma'] or $_SESSION['lv']<>0)
		  { 
		  echo " <a href='dangkydv.php?pdk=".$rows['Sttpdk']."'>DK DV</a>";
		   } 
		   ?>
		  </td>
        </tr>
        <tr>
          <td align="right"><strong> số phòng : </strong></td>
          <td align="right"><?php echo $rows['TenPhong']; ?></td>
        </tr>
        <tr>
          <td  align="right"><strong>Tiền Trả Trước : </strong></td>
          <td align="right"><?php echo $rows['TRATRUOC']; ?></td>
        </tr >
    </table>
 <p>

 </p>
 </div>
</div>
