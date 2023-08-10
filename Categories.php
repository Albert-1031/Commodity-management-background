<?php
require('db.php');  

// 處理新增操作
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["newSpecies"])) {
    $newSpecies = $_POST["newSpecies"];

    // 執行新增操作，將 $newSpecies 插入到資料庫中的適當欄位
    $sql = "INSERT INTO species (species,Sstatus) VALUES (?,1)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $newSpecies);
    $stmt->execute();
    $stmt->close();
}

// 處理更新操作
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["updateSpecies"])) {
    $updatedSpecies = $_POST["updateSpecies"];
    $speciesId = $_POST["species_id"];

    // 執行更新操作，將 $updatedSpecies 更新到資料庫中的相應欄位
    $sql = "UPDATE species SET species = ? WHERE species_id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("si", $updatedSpecies, $speciesId);
    $stmt->execute();
    $stmt->close();
}

$sql = "SELECT * FROM species";
$result = $mysqli->query($sql);

///////////////////////////////////////////////

// 確保從資料庫中獲取了數據，並將其儲存在 $row 變數中
$row = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>商品分類管理</title>
</head>
<body>
    <h2>商品分類管理</h2>
    
    <form action="" method="POST">
        <h4>新增商品分類</h4>
        <input type="text" name="newSpecies" >
        <input type='radio' name='drone' value='1'>顯示
        <br>
        <input type="submit" value="新增">
    </form>
    <br>
    <br><br>
    
    <table border="1">
        <thead>
            <tr>
                <th>#</th>
                <th>分類名稱</th>
                <th>分類顯示狀態</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                // 使用迴圈輸出每一行的數據
                while ($row = $result->fetch_assoc()) {
                    if($row['Sstatus']==1){
                        $a="
                        <input type='radio' name='drone' value='1' CHECKED>顯示
                        <input type='radio' name='drone' value='0'>隱藏";
                    }else{
                        $a="
                        <input type='radio' name='drone' value='1' >顯示
                        <input type='radio' name='drone' value='0'CHECKED>隱藏";
                    }
                    echo "<tr>";
                    echo "<td>" . $row['species_id'] . "</td>";  
                    echo "<td>
                        <form action='' method='POST'>
                                <input type='text' name='updateSpecies' value='" . $row['species'] . "'>
                                <input type='hidden' name='species_id' value='" . $row['species_id'] . "'>
                                <input type='submit' value='更新名稱'>
                            
                          </td>";
                    echo "<td>".
                    $a
                         . "</td>
                        </form>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2'>沒有資料</td></tr>"; 
            }
            ?>
        </tbody>
    </table>

</body>
</html>