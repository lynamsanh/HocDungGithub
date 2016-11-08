<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link  type="text/css"  rel="stylesheet" href="bt.css" />
</head>
<?php 
include('../config.php');
$sonews = 8;
$query = mysql_query("SELECT * FROM phong Inner Join khachhang on phong.MaKH = khachhang.MaKH");  
$tongsodong = mysql_num_rows($query);
$tongsotrang = ceil($tongsodong / $sonews);
if(isset($_GET["p"])){
        $p = intval($_GET["p"]) ;
}
else{
        $p =1;
}
$x = ($p-1) * $sonews;

$sql="SELECT * FROM phong Inner Join khachhang on phong.MaKH = khachhang.MaKH  where Ten LIKE '%".$_GET['tim']."%' ORDER BY MaPhong ASC  limit $x,$sonews";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
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

<div style='float:right; border:solid; padding:5px;'><div style="background:#FF0000; height:10px; width:10px;"></div> 
Màu Đỏ Là Hết Phòng <br /><div style="background:#00ff00; height:10px; width:10px;"></div>  Màu Xanh Là có phòng Trống
<div style="background:#ff0; height:10px; width:10px;"></div>  Đăng ký Nhưng Chưa Nhận
<div style="background:#0ff; height:10px; width:10px;"></div>  Đăng ký Quá Hạn 

						                        <?php
$page = $p - 1;
if ($p > 1){
echo "<ul id='nav'><li><a href=\"dk.php?p=$page\">&lt;&lt;</a></li></ul>";
}
?> <?php
$self = $_SERVER['PHP_SELF'];

for ($i = 1;$i<=$tongsotrang;$i++){
    if($i==$p){
        echo "<ul id='nav'> <li><font color='red'> $i  </font></li></ul>";
    }
    else{
        echo "<ul id='nav'>
  <li><a  href='dk.php?p=$i'> $i </a>
  </li>
</ul>";
    }        
}
?>
<?php
$page = $p + 1;
if ($p < $tongsotrang){
echo "<ul id='nav'><li><a href=\"dk.php?p=$page\">&gt;&gt;</a></li></ul>";
}
?>
<a href="dk.php" /> Quay Về </a>
</div>

</form>
</div>
<div id='nhan'>
<?php                 
while($rows=mysql_fetch_array($result, MYSQL_ASSOC)){
$sqllk="Select TenTB,qhtrangbiphong.SL,phong.MaPhong,phong.MoTa
From trangbi Inner Join
qhtrangbiphong On trangbi.MaTB = qhtrangbiphong.MaTB Inner Join
phong On phong.MaPhong = qhtrangbiphong.MaPhong where phong.MaPhong= '".$rows['MaPhong']."' ";
$kqlk=mysql_query($sqllk);
?>
<?php
if($rows['MaLoai'] == 1)
{
$gia="300000" ;
}
else
{
$gia="1000000	";
} 
if($rows['MaKH'] == NULL)
{
 echo "<div style='width:250px;float:left; margin-left:30px;background:#00FF00; margin-top:10px;'><p><div  class='img'><img  style='margin-left:7px' src='".$rows['img']."' width='235' height='151' /> </p>
 <div class='info'>";
 
  echo " <h2> Thiếc Bị Trong phòng </h2>"; while($rowlk=mysql_fetch_array($kqlk, MYSQL_ASSOC)){  echo "".$rowlk['TenTB']." : ".$rowlk['SL']." <br>";  }
  	echo "<h3>Mô Tả Phòng</h3> : ".$rows['MoTa']."</div> </div>";
 echo "<div  style='margin-left:20px;' align='center' >Phòng ".$rows['TenPhong']."  Giá ".$gia." / 1 ngày <br /> 
    Tình Trạng Trống <br /> 
     <a  href='dangkyphong.php?mp=".$rows['MaPhong']."&sp=".$rows['TenPhong']."&gia=".$gia."'>Đăng ký Phòng</a></div>
</div>";
}
else
{
$pdk = mysql_query("select NGAYDEN,NGAYDK  from phieudk where MaPhong = '".$rows['MaPhong']."' ORDER BY Sttpdk DESC 
LIMIT 1");
$rowdk = mysql_fetch_array($pdk,MYSQL_ASSOC);
if($rowdk['NGAYDEN'] <> NULL)
{
 echo "<div title='' class='tooltip' style='width:250px;float:left; background:#FF0000; margin-left:30px; margin-top:10px;'><p><div  class='img'><img style='margin-left:7px' src='".$rows['img']."' width='235' height='151' /> </p> 
 <div class='info'>
 <center><h3> Thiếc Bị Trong phòng </h3></center>";
 while($rowlk=mysql_fetch_array($kqlk, MYSQL_ASSOC)){ 
    echo "-".$rowlk['TenTB']." Số Lượng ".$rowlk['SL']." <br>";  }
	echo "<h3>Mô Tả Phòng</h3> : ".$rows['MoTa']."</div> </div>";
 
echo "<div  style='margin-left:20px;' align='center' >Phòng ".$rows['TenPhong']."  <br /> 
    Tình Trạng Có người <br /> 
    <a href='thontin.php?mp=".$rows['MaPhong']."'>Thông Tin </a></div>
</div>";
}
else if(tinhsongay($rowdk['NGAYDK'],$tg=date("Y-m-d"))>	2) 
{
 echo "<div style='width:250px;float:left; margin-left:30px;background:#0ff; margin-top:10px;'><p><div  class='img'><img  style='margin-left:7px' src='".$rows['img']."' width='235' height='151' /> </p>
 <div class='info'>";
 
  echo " <h2> Thiếc Bị Trong phòng </h2>"; while($rowlk=mysql_fetch_array($kqlk, MYSQL_ASSOC)){  echo "".$rowlk['TenTB']." : ".$rowlk['SL']." <br>";  }
  	echo "<h3>Mô Tả Phòng</h3> : ".$rows['MoTa']."</div> </div>";
 echo "<div  style='margin-left:20px;' align='center' >Phòng ".$rows['TenPhong']."  Giá ".$gia." / 1 ngày <br /> 
    Tình Trạng  đăng ký quá hạn <br /> 
     <a  href='thontin.php?mp=".$rows['MaPhong']."'>Thong Tin Người Dã Đăng Ký</a></div>
</div>";
}
else
{

 echo "<div style='width:250px;float:left; margin-left:30px;background:#ff0; margin-top:10px;'><p><div  class='img'><img  style='margin-left:7px' src='".$rows['img']."' width='235' height='151' /> </p>
 <div class='info'>";
 
  echo " <h2> Thiếc Bị Trong phòng </h2>"; while($rowlk=mysql_fetch_array($kqlk, MYSQL_ASSOC)){  echo "".$rowlk['TenTB']." : ".$rowlk['SL']." <br>";  }
  	echo "<h3>Mô Tả Phòng</h3> : ".$rows['MoTa']."</div> </div>";
 echo "<div  style='margin-left:20px;' align='center' >Phòng ".$rows['TenPhong']."  Giá ".$gia." / 1 ngày <br /> 
    Tình Trạng có người đăng ký <br /> 
     <a  href='thontin.php?mp=".$rows['MaPhong']."'>Thong Tin Người Dã Đăng Ký</a></div>
</div>";
}
}

?>	

<?php

?>

</div>
<?php
}
?>