<?php
require('db.php');
$id = $_REQUEST["id"];
$Pname = $_REQUEST["Pname"];

$PmainImage = $_FILES["PmainImage"]["tmp_name"];
move_uploaded_file($PmainImage,"image/".$_FILES["PmainImage"]['name']);
$PI="image/" . $_FILES["PmainImage"]["name"];
echo $PI;

$subgraph1 = $_FILES["subgraph1"]["tmp_name"];
move_uploaded_file($subgraph1,"image/".$_FILES["subgraph1"]['name']);
$s1="image/" . $_FILES["subgraph1"]["name"];

echo $s1;
// $sql = "insert into product(pname,species_id,pimage,pimage_1,pimage_2,pimage_3,pimage_4,price) values ( ?,?,?,?,?,?,?,?)";
echo $id ."<br>";
echo $Pname ."<br>";
exit();
$sql = "UPDATE product SET Pname=?,pimage=?  WHERE pid=?";
$stmt = $mysqli->prepare($sql);
$stmt ->bind_param('ssb',$Pname,$id,$PmainImage);
// $stmt ->send_long_data(2,$PmI); //數字代表圖片位置0,1,2
// $stmt ->send_long_data(3,$Ps1);
// $stmt ->send_long_data(4,$Ps2);
// $stmt ->send_long_data(5,$Ps3);
// $stmt ->send_long_data(6,$Ps4);
$stmt->execute(); //代表結束
// header('location:list.php'); //不會轉到這頁面，而是list.php頁面
