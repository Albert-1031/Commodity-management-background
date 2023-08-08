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

move_uploaded_file($PmainImage,"image/".$_FILES["PmainImage"]['name']);
$PmI="image/" . $_FILES["PmainImage"]["name"];
echo $PmI;

move_uploaded_file($subgraph1,"image/".$_FILES["subgraph1"]['name']);
$s1="image/" . $_FILES["subgraph1"]["name"];
echo $s1;

move_uploaded_file($subgraph2,"image/".$_FILES["subgraph2"]['name']);
$s2="image/" . $_FILES["subgraph2"]["name"];
echo $s2;

move_uploaded_file($subgraph3,"image/".$_FILES["subgraph3"]['name']);
$s3="image/" . $_FILES["subgraph3"]["name"];
echo $s3;

move_uploaded_file($subgraph4,"image/".$_FILES["subgraph4"]['name']);
$s4="image/" . $_FILES["subgraph4"]["name"];
echo $s4;

$sql = "insert into product(pname,species_id,pimage,pimage_1,pimage_2,pimage_3,pimage_4,price,P_discount,price_final,stock,p_status,pcontent,pcontent_spec,pcontent_main) values ( ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
$stmt = $mysqli->prepare($sql);

$stmt ->bind_param('ssbbbbbssssssss',$Pname,$Psort,$PmI,$s1,$s2,$s3,$s4,$Pprice,$Pdiscount,$PfinalPrice,$Pstorage,$Pstatus,$Pintroduction,$Pstandard,$editor);

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