<?php
require('db.php');
$id = $_REQUEST["id"];
$Pname = $_REQUEST["Pname"];
$Psort = $_REQUEST["Psort"];
// $PmainImage = $_FILES["PmainImage"]["tmp_name"];
// $subgraph1 = $_FILES["subgraph1"]["tmp_name"];
// $subgraph2 = $_FILES["subgraph2"]["tmp_name"];
// $subgraph3 = $_FILES["subgraph3"]["tmp_name"];
// $subgraph4 = $_FILES["subgraph4"]["tmp_name"];
$Pprice = $_REQUEST["Pprice"];
$Pdiscount = $_REQUEST["Pdiscount"];
$PfinalPrice = $_REQUEST["PfinalPrice"];
$Pstorage = $_REQUEST["Pstorage"];
$Pstatus = $_REQUEST["Pstatus"];
$Pintroduction = $_REQUEST["Pintroduction"];
$Pstandard = $_REQUEST["Pstandard"];
$editor = $_REQUEST["editor"];

$imageFields = ["PmainImage", "subgraph1", "subgraph2", "subgraph3", "subgraph4"];
$imagePaths = [];

foreach ($imageFields as $field) {
    if ($_FILES[$field]["error"] == 0) {
        move_uploaded_file($_FILES[$field]["tmp_name"], "img/" . $_FILES[$field]['name']);
        $imagePaths[$field] = "img/" . $_FILES[$field]["name"];
    }
};


// move_uploaded_file($PmainImage,"image/".$_FILES["PmainImage"]['name']);
// $PI="image/" . $_FILES["PmainImage"]["name"];

// move_uploaded_file($subgraph1,"image/".$_FILES["subgraph1"]['name']);
// $s1="image/" . $_FILES["subgraph1"]["name"];

// move_uploaded_file($subgraph2,"image/".$_FILES["subgraph2"]['name']);
// $s2="image/" . $_FILES["subgraph2"]["name"];

// move_uploaded_file($subgraph2,"image/".$_FILES["subgraph3"]['name']);
// $s3="image/" . $_FILES["subgraph3"]["name"];

// move_uploaded_file($subgraph4,"image/".$_FILES["subgraph4"]['name']);
// $s4="image/" . $_FILES["subgraph4"]["name"];

// $sql = "UPDATE product SET Pname=?,pimage=?,species_id=?,pimage_1=?,pimage_2=?,pimage_3=?,pimage_4=?,price=?,P_discount=?  WHERE pid=?";
// $stmt = $mysqli->prepare($sql);

$sql = "UPDATE product SET Pname=?, species_id=?, price=?, P_discount=?, price_final=?, stock=?, p_status=?,pcontent=?,pcontent_spec=?,pcontent_main=?";
$types = "ssssssisss";
$values = [$Pname, $Psort, $Pprice, $Pdiscount, $PfinalPrice, $Pstorage, $Pstatus,$Pintroduction,$Pstandard,$editor];
// UPDATE product SET Pname=?, pimage=? WHERE pid=?，有三個變數，bind_param 函數中的參數排列順序 分別是 Pname、pimage 和 pid。
// $stmt->bind_param('ssssssssis', $Pname,$species_id, $PI,$s1,$s2,$s3,$s4,$Pprice,$P_discount, $id);

// 判斷圖片使否為空
foreach ($imagePaths as $key => $path) {
    $columnName = "";
    switch ($key) {
        case "PmainImage":
            $columnName = "pimage";
            break;
        case "subgraph1":
            $columnName = "pimage_1";
            break;
        case "subgraph2":
            $columnName = "pimage_2";
            break;
        case "subgraph3":
            $columnName = "pimage_3";
            break;
        case "subgraph4":
            $columnName = "pimage_4";
            break;
    }

    $sql .= ", " . $columnName . "=?";
    $types .= "s";
    $values[] = $path;
}

$sql .= " WHERE pid=?";
$types .= "s";
$values[] = $id;

$stmt = $mysqli->prepare($sql);
$stmt->bind_param($types, ...$values);
// $stmt->bind_param($types, $Pname, $Psort, $Pprice, $Pdiscount, $PfinalPrice, $Pstorage, $Pstatus, $id);

echo $id ."<br>";
// echo $PI ."<br>";
echo $Psort ."<br>";
echo $Pdiscount ."<br>";
echo $Pstatus ."我是Pstatus<br>";
// var_dump($_REQUEST) ."<br>";
// print_r($_REQUEST) ."<br>";
// exit();
$stmt->execute(); //代表結束

// 要記得解開註解
// 重定向到 list.php
// header('location:list.php'); //不會轉到這頁面，而是list.php頁面

