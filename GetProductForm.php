<?php
require('db.php');

    $Pname = $_REQUEST["Pname"];
    $Psort = $_REQUEST["Psort"];
    $PmainImage = $_FILES["PmainImage"]["PmainImage"];
    $subgraph1 = $_FILES["subgraph1"]["subgraph1"];
    $subgraph2 = $_FILES["subgraph2"]["subgraph2"];
    $subgraph3 = $_FILES["subgraph3"]["subgraph3"];
    $subgraph4 = $_FILES["subgraph4"]["subgraph4"];
    $Pprice = $_REQUEST["Pprice"];
    $Pdiscount = $_REQUEST["Pdiscount"];
    $PfinalPrice = $_REQUEST["PfinalPrice"];
    $Pstorage = $_REQUEST["Pstorage"];
    $Pintroduction = $_REQUEST["Pintroduction"];
    $Pstandard = $_REQUEST["Pstandard"];
    $editor = $_REQUEST["editor"];


    $CmainImage = file_get_contents($PmainImage);
    $Cs1 = file_get_contents($subgraph1);
    $Cs2 = file_get_contents($subgraph2);
    $Cs3 = file_get_contents($subgraph3);
    $Cs4 = file_get_contents($subgraph4);
    
    $sql = "update UserInfo set image = ? where uid = ?"; 
    //避免有資安問題，所以這邊用?問號代替，如果用變數會有資安問題
    
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('bs',$contents,$uid);
    $stmt->send_long_data(0,$contents);
    $stmt->execute();
    unlink($src);

    echo "<p>商品名稱：$Pname</p>";
    echo "<p>商品分類：$Psort</p>";
    echo "<p>商品主圖上傳：$PmainImage</p>";
    echo "<p>子圖選擇圖片1：$subgraph1</p>";
    echo "<p>子圖選擇圖片2：$subgraph2</p>";
    echo "<p>子圖選擇圖片3：$subgraph3</p>";
    echo "<p>子圖選擇圖片4：$subgraph4</p>";
    echo "<p>商品定價：$Pprice</p>";
    echo "<p>選擇優惠活動：$Pdiscount</p>";
    echo "<p>最終價格：$PfinalPrice</p>";
    echo "<p>庫存數量：$Pstorage</p>";
    echo "<p>商品簡介：$Pintroduction</p>";
    echo "<p>商品規格介紹：$Pstandard</p>";
    echo "<p>編輯：$editor</p>";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 檢查是否有上傳文件
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $file_name = $_FILES["image"]["name"];
        $file_size = $_FILES["image"]["size"];
        $file_tmp = $_FILES["image"]["tmp_name"];
        $file_type = $_FILES["image"]["type"];

        // 可接受的圖片類型
        $allowed_types = array("image/jpeg", "image/png", "image/gif");

        // 確認上傳的文件類型是否合法
        if (in_array($file_type, $allowed_types)) {
            // 將文件移動到指定目錄
            $upload_dir = "uploads/";
            move_uploaded_file($file_tmp, $upload_dir . $file_name);

            echo "圖片上傳成功";
        } else {
            echo "只允許上傳 JPEG、PNG 或 GIF 圖片";
        }
    } else {
        echo "圖片上傳失敗";
    }
}
?>






