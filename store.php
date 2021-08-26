<?php
include 'Model/Database.php';
include 'Model/Devices.php';
$datas=new Model\Database();
$name=$_POST['name'];
$ip=$_POST['ip'];
$mac=$_POST['mac'];
$pc=$_POST['pc'];
$date=date("Y/m/d");
$cl='rgb('.rand(0,200).','.rand(0,200).','.rand(0,200).')';
$sql="Insert  ignore into devices(name,mac_address,ip,created_date,pc,color )
values('$name','$mac','$ip','$date','$pc','$cl')
";

$datas->connect()->query($sql);

echo "<script language='javascript'>alert('Insert successfully');location.href='dashboard.php'</script>";
?>
