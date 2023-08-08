<?php
require('db.php');
$Pname = $_REQUEST["Pname"];
$Psort = $_REQUEST["Psort"];
$PmainImage = $_FILES["PmainImage"]["tmp_name"];
$PmI=file_get_contents($PmainImage);
$subgraph1 = $_FILES["subgraph1"]["tmp_name"];
$Ps1=file_get_contents($subgraph1);
$subgraph2 = $_FILES["subgraph2"]["tmp_name"];
$Ps2=file_get_contents($subgraph2);
$subgraph3 = $_FILES["subgraph3"]["tmp_name"];
$Ps3=file_get_contents($subgraph3);
$subgraph4 = $_FILES["subgraph4"]["tmp_name"];
$Ps4=file_get_contents($subgraph4);
$Pprice = $_REQUEST["Pprice"];
$Pdiscount = $_REQUEST["Pdiscount"];
$PfinalPrice = $_REQUEST["PfinalPrice"];
$Pstorage = $_REQUEST["Pstorage"];
$Pstatus = $_REQUEST["Pstatus"];
$Pintroduction = $_REQUEST["Pintroduction"];
$Pstandard = $_REQUEST["Pstandard"];
$editor = $_REQUEST["editor"];

$sql = "insert into product(pname,species_id,pimage,pimage_1,pimage_2,pimage_3,pimage_4,price,P_discount,price_final,stock,p_status,pcontent,pcontent_spec,pcontent_main) values ( ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
$stmt = $mysqli->prepare($sql);
$stmt ->bind_param('ssbbbbbssssssss',$Pname,$Psort,$PmI,$Ps1,$Ps2,$Ps3,$Ps4,$Pprice,$Pdiscount,$PfinalPrice,$Pstorage,$Pstatus,$Pintroduction,$Pstandard,$editor);
$stmt ->send_long_data(2,$PmI); //數字代表圖片位置0,1,2
$stmt ->send_long_data(3,$Ps1);
$stmt ->send_long_data(4,$Ps2);
$stmt ->send_long_data(5,$Ps3);
$stmt ->send_long_data(6,$Ps4);
$stmt->execute(); //代表結束


if ($stmt) {
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

<?php
// require('db.php');


//     $Pname = $_POST["Pname"];

//     // 防止 SQL 注入攻擊
//     $stmt = $mysqli->prepare("INSERT INTO product (pid, pname) VALUES (?, ?)");
//     $stmt->bind_param("ss", '123', $Pname);

//     if ($stmt->execute()) {
//         echo "新增資料成功<p>";
//     } else {
//         echo "錯誤：" . $stmt->error;
//     }

//     $stmt->close();


// $sql = "SELECT * FROM product";
// $result = $mysqli->query($sql);
// while ($row = $result->fetch_assoc()) {
//     $pid = htmlspecialchars($row['pid']);
//     $pname = htmlspecialchars($row['pname']);
//     echo "$pid:$pname<br>";
// }

// $mysqli->close();
?>

<!-- {$row['pid']}:	
{$row['pname']}:	
{$row['species_id']}:	
{$row['pimage']}:	
{$row['pimage_1']}:	
{$row['pimage_2']}:	
{$row['pimage_3']}:	
{$row['pimage_4']}:	
{$row['price']}:	
{$row['price_final	stock']}:	
{$row['p_status']}:	
{$row['pcontent']}:	
{$row['pcontent_spec']}:	
{$row['pcontent_main']} -->