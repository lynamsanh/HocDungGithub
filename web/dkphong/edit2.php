<?php
include('../config.php');
$sql="UPDATE `khachhang`,member SET Ten='".$_POST['ten']."',GioiTinh='".$_POST['gtinh']."',CMND='".$_POST['cmnd']."',DiaChi='".$_POST['dchi']."',QuocTich='".$_POST['qtich']."',SDT='".$_POST['sdt']."',Email='".$_POST['email']."', mk='".$_POST['mk']."' WHERE khachhang.MaKH = '".$_POST['ga']."' ";
mysql_query($sql);

?>
