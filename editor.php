<?php
require('db.php');
$id = $_GET["id"];


  // 你的數據庫連接檔案


$sql = "SELECT * FROM product where pid = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i",$id);
$stmt->execute();

$result = $stmt->get_result();

$row = $result->fetch_assoc();

$pname = $row["pname"];
$Psort = $row["species_id"];
$PmainImage = $row["pimage"];
$subgraph1 = $row["pimage_1"];
$subgraph1 = $row["pimage_2"];
$subgraph1 = $row["pimage_3"];
$subgraph1 = $row["pimage_4"];
$Pprice = $row["price"];
$Pdiscount = $row["P_discount"];
$PfinalPrice = $row["price_final"];
$Pstorage = $row["stock"];
$Pstatus = $row["p_status"];

$Pintroduction = $row["pcontent"];
$Pstandard = $row["pcontent_spec"];
$editor = $row["pcontent_main"];


echo  $Psort."<br>";
echo  $Pdiscount."<br>";





// $mime_type = (new finfo(FILEINFO_MIME_TYPE))->buffer($img);
// $data_base64=base64_encode($img);
// $src= "data:{$mime_type};base64,{$data_base64}";
// $result = $mysqli->query($sql);



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
                <label for="Psort">商品分類</label>

                <select name="Psort" id="Psort" class="form-select" aria-label="Default select example">
                    <option value="1" <?php if ($Psort == "1") echo "selected"; ?>>手環</option>
                    <option value="2" <?php if ($Psort == "2") echo "selected"; ?>>耳環</option>
                    <option value="3" <?php if ($Psort == "3") echo "selected"; ?>>吊飾</option>
                </select>

                 <p>商品主圖上傳</p>
                <label for="picture_icon">選擇圖片：</label>
                <br>
                <img class="picture_icon PmainImage"  src="<?=$row["pimage"]?>" alt="">
                <br>
                <input type="file" name="PmainImage">
                <!-- <img src="<?=$src?>" alt="" style="width:200px"> -->

                <p>商品子圖上傳</p> 
                <div class="col-6">           
                    <div class="row row-cols-2">
                        <div class="col">            
                            <label for="subgraph1">選擇圖片1：</label>            
                            <img class="picture_icon subgraph1" id="subgraph1"  src="<?=$row["pimage_1"]?>" alt="">
                            <input type="file" name="subgraph1">
                        </div>
                        <div class="col">            
                            <label for="subgraph2">選擇圖片2：</label>            
                            <img class="picture_icon subgraph2" id="subgraph2"  src="<?=$row["pimage_2"]?>" alt="">
                            <input type="file" name="subgraph2">
                        </div>
                        <div class="col">            
                            <label for="subgraph3">選擇圖片3：</label>            
                            <img class="picture_icon subgraph3" id="subgraph3"  src="<?=$row["pimage_3"]?>" alt="">
                            <input type="file" name="subgraph3">
                        </div>
                        <div class="col">            
                            <label for="subgraph4">選擇圖片4：</label>            
                            <img class="picture_icon subgraph4" id="subgraph4"  src="<?=$row["pimage_4"]?>" alt="">
                            <input type="file" name="subgraph4">
                        </div>
                    </div>
                </div>

                <label for="Pprice">商品定價</label>
                <br>
                <input type="text" name="Pprice" id="Pprice" value="<?=$row["price"];?>"> 元
                <br>
                <!-- <label for="Pdiscount">選擇優惠活動</label>
                <select name="Pdiscount" id="Pdiscount" class="form-select" aria-label="Default select example">
                    <option selected>選擇優惠活動</option>
                    <option value="1">無</option>
                    <option value="0.9">10%off</option>
                    <option value="0.8">20%offs</option>
                </select> -->


                <label for="Pdiscount">選擇優惠活動</label>
                <select name="Pdiscount" id="Pdiscount" class="form-select" aria-label="Default select example">
                <option value="1" <?php if ($Pdiscount == "1") echo "selected"; ?>>無</option>
                <option value="0.9" <?php if ($Pdiscount == "0.9") echo "selected"; ?>>10% off</option>
                <option value="0.8" <?php if ($Pdiscount == "0.8") echo "selected"; ?>>20% off</option>
                </select>


                <br>
                 <label for="PfinalPrice">最終價格</label>
                <br>
                <input type="text" name="PfinalPrice" value="<?=$row["price_final"];?>">元  
                <br>
                <label for="Pstorage">庫存數量</label>
                <br>
                <input type="text" name="Pstorage"value="<?=$row["stock"];?>">
                <br> 
                <label for="Pstatus">商品上下架狀態</label>
                <div>
                <fieldset>
                    <p><input type="radio" name="Pstatus" value="1" <?php if ($Pstatus == 1) echo "checked"; ?>>上架</p>
                    <p><input type="radio" name="Pstatus" value="0" <?php if ($Pstatus == 0) echo "checked"; ?>>下架</p>
                </fieldset>
                </div>


                <label for="Pintroduction">商品簡介</label>
                <br>
                <textarea name="Pintroduction" id="Pintroduction" cols="50" rows="10"><?php echo $Pintroduction; ?></textarea>

                <label for="Pstandard">商品規格介紹</label>
                <br>
                <textarea name="Pstandard" id="Pstandard" cols="50" rows="10"><?php echo $Pstandard; ?></textarea>

                <br>
                <input type="submit" value="提交">
                <hr>

                <!-- 編輯 -->

                <div style="margin: 0 auto; width: 700px;height: 300px;">
                    <label for="editor"></label>
                    <textarea name="editor" id="editor"><?php echo $editor; ?></textarea>
                </div>
        </from>

        <script>
            ClassicEditor
                .create(document.querySelector('#editor'))
                .then(editor => {
                    console.log(editor);
                })
        </script>picnumber
      </div>
</body>
</html>