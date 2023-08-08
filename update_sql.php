<?php
require('db.php');
$id = $_REQUEST["id"];
$Pname = $_REQUEST["Pname"];
$Psort = $_REQUEST["Psort"];
$PmainImage = $_FILES["PmainImage"]["tmp_name"];
$subgraph1 = $_FILES["subgraph1"]["tmp_name"];
$subgraph2 = $_FILES["subgraph2"]["tmp_name"];
$subgraph3 = $_FILES["subgraph3"]["tmp_name"];
$subgraph4 = $_FILES["subgraph4"]["tmp_name"];
$Pprice = $_REQUEST["Pprice"];
$Pdiscount = $_REQUEST["Pdiscount"];
// $PfinalPrice = $_REQUEST["PfinalPrice"];
// $Pstorage = $_REQUEST["Pstorage"];
// $Pstatus = $_REQUEST["Pstatus"];
// $Pintroduction = $_REQUEST["Pintroduction"];
// $Pstandard = $_REQUEST["Pstandard"];
// $editor = $_REQUEST["editor"];


move_uploaded_file($PmainImage,"image/".$_FILES["PmainImage"]['name']);
$PI="image/" . $_FILES["PmainImage"]["name"];

move_uploaded_file($subgraph1,"image/".$_FILES["subgraph1"]['name']);
$s1="image/" . $_FILES["subgraph1"]["name"];

move_uploaded_file($subgraph2,"image/".$_FILES["subgraph2"]['name']);
$s2="image/" . $_FILES["subgraph2"]["name"];

move_uploaded_file($subgraph2,"image/".$_FILES["subgraph3"]['name']);
$s3="image/" . $_FILES["subgraph3"]["name"];

move_uploaded_file($subgraph4,"image/".$_FILES["subgraph4"]['name']);
$s4="image/" . $_FILES["subgraph4"]["name"];

echo $id ."<br>";
echo $PI ."<br>";
echo $Psort ."<br>";
echo $s1 ."<br>";
echo $s2 ."<br>";
echo $s3 ."<br>";
echo $s4 ."<br>";


$sql = "UPDATE product SET Pname=?,pimage=?,species_id=?,pimage_1=?,pimage_2=?,pimage_3=?,pimage_4=?,price=?,P_discount=?  WHERE pid=?";

$stmt = $mysqli->prepare($sql);

// UPDATE product SET Pname=?, pimage=? WHERE pid=?，有三個變數，bind_param 函數中的參數排列順序 分別是 Pname、pimage 和 pid。
$stmt->bind_param('ssssssssss', $Pname,$species_id, $PI,$s1,$s2,$s3,$s4,$Pprice,$P_discount, $id); //,

// $stmt ->bind_param('ssssssssssssssss',$id,$Pname,$Psort,$PmI,$subgraph1,$s2,$s3,$s4,$Pprice,$Pdiscount,$PfinalPrice,$Pstorage,$Pstatus,$Pintroduction,$Pstandard,$editor);

// $stmt ->send_long_data(2,$PmI); //數字代表圖片位置0,1,2
// $stmt ->send_long_data(3,$Ps1);
// $stmt ->send_long_data(4,$Ps2);
// $stmt ->send_long_data(5,$Ps3);
// $stmt ->send_long_data(6,$Ps4);
$stmt->execute(); //代表結束

// 要記得解開註解
// header('location:list.php'); //不會轉到這頁面，而是list.php頁面
