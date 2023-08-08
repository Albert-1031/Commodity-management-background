<?php
require('db.php');
$Pname = $_REQUEST["Pname"];
$Psort = $_REQUEST["Psort"];
$PmainImage = $_FILES["PmainImage"]["tmp_name"];
// $PmI=file_get_contents($PmainImage);
$subgraph1 = $_FILES["subgraph1"]["tmp_name"];
// $Ps1=file_get_contents($subgraph1);
$subgraph2 = $_FILES["subgraph2"]["tmp_name"];
// $Ps2=file_get_contents($subgraph2);
$subgraph3 = $_FILES["subgraph3"]["tmp_name"];

$subgraph4 = $_FILES["subgraph4"]["tmp_name"];

$Pprice = $_REQUEST["Pprice"];
$Pdiscount = $_REQUEST["Pdiscount"];
$PfinalPrice = $_REQUEST["PfinalPrice"];
$Pstorage = $_REQUEST["Pstorage"];
$Pstatus = $_REQUEST["Pstatus"];
$Pintroduction = $_REQUEST["Pintroduction"];
$Pstandard = $_REQUEST["Pstandard"];
$editor = $_REQUEST["editor"];


move_uploaded_file($PmainImage,"image/". basename($_FILES["PmainImage"]["name"]));
$PmI="image/" . basename($_FILES["PmainImage"]["name"]); //basename 從一個完整的路徑中提取出文件名，而不包括路徑。

move_uploaded_file($subgraph1,"image/". $_FILES["subgraph1"]['name']);
$s1="image/" . $_FILES["subgraph1"]["name"];

move_uploaded_file($subgraph2,"image/". $_FILES["subgraph2"]['name']);
$s2="image/" . $_FILES["subgraph2"]["name"];

move_uploaded_file($subgraph3,"image/". $_FILES["subgraph3"]['name']);
$s3="image/" . $_FILES["subgraph3"]["name"];

move_uploaded_file($subgraph4,"image/". $_FILES["subgraph4"]['name']);
$s4="image/" . $_FILES["subgraph4"]["name"];

$sql = "insert into product(pname,species_id,pimage,pimage_1,pimage_2,pimage_3,pimage_4,price,P_discount,price_final,stock,p_status,pcontent,pcontent_spec,pcontent_main) values ( ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
$stmt = $mysqli->prepare($sql);

$stmt ->bind_param('sssssssssssssss',$Pname,$Psort,$PmI,$subgraph1,$s2,$s3,$s4,$Pprice,$Pdiscount,$PfinalPrice,$Pstorage,$Pstatus,$Pintroduction,$Pstandard,$editor);

$stmt->execute(); //代表結束

// 記得轉址

if ($stmt) {
    echo $PmI . "<br>";
    echo $s1 . "<br>";
    echo $s2 . "<br>";
    echo $s3 . "<br>";
    echo $s4 . "<br>";
    echo "新增資料成功<p>";
}
// $sql = "select * from product";
// while($row = $result->fetch_assoc()) {
//     $result = $mysqli->query($sql);
// echo "{$row['pid']}:
//     {$row['pname']}:
//     {$row['species_id']}:
//     {$row['pimage']}
// 	<br>";}





// ?>

