<?php
require('db.php');
$id = $_GET["id"];


  // 你的數據庫連接檔案


$sql = "SELECT * FROM product where pid = 140";
$stmt = $mysqli->prepare($sql);
// $stmt->bind_param("s",$id);
$stmt->execute();

$result = $stmt->get_result();

$row = $result->fetch_assoc();

$img = $row["pimage"];

$mime_type = (new finfo(FILEINFO_MIME_TYPE))->buffer($img);
$data_base64=base64_encode($img);
$src= "data:{$mime_type};base64,{$data_base64}";
// $result = $mysqli->query($sql);

    // 獲取從 URL 傳遞的 id 參數

//   echo  $row['Pname'];

?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

<!-- ckeditor -->
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
<script src="ckeditor.js"></script>

<title>商品管理</title>
</head>
<style>
    .picture_icon{
        width: 200px;
        padding: 30px;
    }

</style>

<body>
    <div class="container">
        <h1>商品管理</h1><h2> 編輯</h2>
        <div>
            <form action="update_sql.php" method="post"  id="form1" runat="server" enctype="multipart/form-data">

            訂單編號 :<input  name="id" id="id" value="<?= $id?>"> 

            <br>
            <label for="Pname">商品名稱</label>
            
            
                <br>
                <input type="text" name="Pname" id="Pname" value="<?=$row["pname"];?>">
                <br>
                <!--<label for="Psort">商品分類</label>
                 <select name="Psort" id="Psort" class="form-select" aria-label="Default select example">
                    <option selected>選擇分類</option>
                    <option value="1">手環</option>
                    <option value="2">耳環</option>
                    <option value="3">吊飾</option>
                </select> -->

                 <p>商品主圖上傳</p>
                <label for="picture_icon">選擇圖片：</label>
                <br>
                <!-- <img src="<?=$src?>" alt="" style="width:200px"> -->
                <img class="picture_icon PmainImage"  src="<?=$row["pimage"]?>" alt="">
                <br>
                <input type="file" name="PmainImage">

                <!-- <p>商品子圖上傳</p> 
                <div class="col-6">           
                    <div class="row row-cols-2">
                        <div class="col">
                            <label for="subgraph1">選擇圖片1：</label>            
                            <img class="picture_icon subgraph1" id="subgraph1"  src="https://i.imgur.com/UIMdoua.png" alt="">
                            <input type="file" name="subgraph1">
                        </div>
                        <div class="col">            
                            <label for="subgraph2">選擇圖片2：</label>            
                            <img class="picture_icon subgraph2" id="subgraph2"  src="https://i.imgur.com/UIMdoua.png" alt="">
                            <input type="file" name="subgraph2">
                        </div>
                        <div class="col">            
                            <label for="subgraph3">選擇圖片3：</label>            
                            <img class="picture_icon subgraph3" id="subgraph3"  src="https://i.imgur.com/UIMdoua.png" alt="">
                            <input type="file" name="subgraph3">
                        </div>
                        <div class="col">            
                            <label for="subgraph4">選擇圖片4：</label>            
                            <img class="picture_icon subgraph4" id="subgraph4"  src="https://i.imgur.com/UIMdoua.png" alt="">
                            <input type="file" name="subgraph4">
                        </div>
                    </div>
                </div>

                <label for="Pprice">商品定價</label>
                <br>
                <input type="text" name="Pprice" id="Pprice"> 元
                <br>
                <label for="Pdiscount">選擇優惠活動</label>
                <select name="Pdiscount" id="Pdiscount" class="form-select" aria-label="Default select example">
                    <option selected>選擇優惠活動</option>
                    <option value="1">無</option>
                    <option value="0.9">10%off</option>
                    <option value="0.8">20%offs</option>
                </select>
                </div>
                <br>
                <label for="PfinalPrice">最終價格</label>
                <br>
                <input type="text" name="PfinalPrice">元  
                <br>
                <label for="Pstorage">庫存數量</label>
                <br>
                <input type="text" name="Pstorage">
                <br>
                <label >商品上下架狀態</label>
                <div>
                    <p><input type="radio" value="1">上架</p>
                    <p><input type="radio" value="0">下架</p>
                </div>


                <label for="Pintroduction">商品簡介</label>
                <br>
                <textarea name="Pintroduction" id="Pintroduction" cols="50" rows="10"></textarea>

                <label for="Pstandard">商品規格介紹</label>
                <br>
                <textarea name="Pstandard" id="Pstandard" cols="50" rows="10"></textarea> -->

                <br>
                <input type="submit" value="提交">
                <hr>

                <!-- 編輯 -->
<!-- 
                <div style="margin: 0 auto; width: 700px;height: 300px;">
                    <label for="editor"></label>
                    <textarea name="editor" id="editor"></textarea>
                </div> -->
        </from>

      </div>
</body>
</html>