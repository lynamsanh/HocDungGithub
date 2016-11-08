<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
include('../config.php');
$tg=date("Y-m-d");
mysql_query("UPDATE `phong` SET `MaKH`= NULL  WHERE `MaPhong` = ".$_GET['mp']." ");
mysql_query("UPDATE `phieudk` SET `NGAYDI`= '".$tg."'  WHERE `Sttpdk` = ".$_GET['sp']." ");
$ls=mysql_query("SELECT * FROM `ls` order by Stt DESC limit 1");
$rows=mysql_fetch_array($ls);
$ls=$rows['Stt']+1;
$kq=mysql_query("select * from ls Inner Join phieudk on pdk = phieudk.Sttpdk where  pdk = ".$_GET['sp']." ");
$rows=mysql_fetch_array($kq, MYSQL_ASSOC);
$tongthu=$_GET['gia']-$rows['TRATRUOC'];
mysql_query("insert into ls(stt,pdk,tongthu) values (".$ls.",".$_GET['sp'].",".$tongthu.") ");
?><div style="width:500px; border:#000000 solid;">
  <p align="right">Số Phiếu Đăng Ký <?php echo $_GET['sp'] ?></p>
  <h2 align="center">Hóa Đơn thanh Toán </h2>
  <p><strong>Ho Ten:</strong><?php echo $_GET['ten'] ?></p>
  <p><strong>Giá Phong:</strong> <?php echo $_GET['gia'] ?> Trả trước: <?php echo $rows['TRATRUOC'] ?>
  Tổng tiền : <?php echo $tongthu;?></p>
  <p><strong>Ngày Ngày Đến:</strong><?php echo $rows['NGAYDEN'] ?> <strong> Ngày Đi:</strong><?php echo $rows['NGAYDI'] ?>  </p>
  <p><strong>Dịch Vụ Đang Sử dụng </strong>: <?php 		 $dv = mysql_query("select * from phieudk inner Join dkdv on phieudk.Sttpdk = dkdv.MaPDK  inner Join dv on dv.MaDV = dkdv.MaDV where dkdv.MaPDK='".$rows['Sttpdk']."'");
		  while($rowlk=mysql_fetch_array($dv) )
		  { 
		  		  echo " ".$rowlk['TenDV']." ;";
		  }   ?> </p>
  <blockquote>
    <p align="right"><a href="javascript:print();">In hóa đơn</a></p>
  </blockquote>
</div>
