<?php
require('db.php');  // 你的數據庫連接檔案

$sql = "SELECT * FROM product";
$result = $mysqli->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>管理者後台list</title>
</head>
<body>
    <h2>商品管理列表</h2>
    <a href="./GetBackProduct.html">新增</a>
    <br>
    <br><br>
<table border="1">
    <thead>
        <tr>
            <th>#</th>
            <th>商品名稱</th>
            <th>商品分類</th>
            <th>剩餘庫存</th>
            <th>操作</th>
            <th>商品狀態</th>
            

            <!-- 其他欄位的標題... -->
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            // 使用迴圈輸出每一行的數據
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['pid'] . "</td>";  // 假設你有一個名為 'id' 的欄位
                echo "<td>" . $row['pname'] . "</td>";
                echo "<td>" . $row['species_id'] . "</td>";
                echo "<td>" . $row['stock'] . "</td>";
                echo "<td><a href='./editor.php?id=" . $row['pid'] . "'>編輯</a></td>";
                echo "<td>" . $row['p_status'] . "</td>";
                // 如果還有其他欄位，也可以這樣輸出...
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='2'>沒有資料</td></tr>";  // 如果沒有資料，顯示一個訊息
        }
        ?>
    </tbody>
</table>

</body>
</html>
