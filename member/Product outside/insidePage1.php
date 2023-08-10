<?php
session_start();
require 'db.php';

if (isset($_GET['pid'])) {
    $pid = $_GET['pid'];
    $sql = "SELECT * FROM product WHERE pid = $pid";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $pname = $row["pname"];
        $price = $row["price"];
        // $picnumber = $row["picnumber"];
        $PmainImage = $row["pimage"];
        $subgraph1 = $row["pimage_1"];
        $subgraph2 = $row["pimage_2"];
        $subgraph3 = $row["pimage_3"];
        $subgraph4 = $row["pimage_4"];
        $PfinalPrice = $row["price_final"];
        $Pintroduction = $row["pcontent"];
        $Pstandard = $row["pcontent_spec"];
        $editor = $row["pcontent_main"];
        $PfinalPrice=$row['price']* ( 1 - $row['P_discount'] );
    } else {
        echo "Product not found.";
    }
} else {
    echo "Invalid product ID.";
}

// $conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品內頁</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="../CSS/reset.css">
    <link rel="stylesheet" href="../CSS/navbar.css">
    <link rel="stylesheet" href="../CSS/insidePage.css">
</head>

<body>

<div class="header">
        <div class="menu">
            <div class="menu-left">
                <div class="dropdown ">
                    <button class="dropbtn-0">
                        <img src="../icon_public/menu.png" alt="選單">
                    </button>
                    <div class="dropdown-content-0">
                        <li><a href="../login/login.php">會員登入</a></li>
                        <li><a href="../login/register.html">註冊新會員</a></li>
                        <li><a href="">購物車</a></li>
                        <li><a href="../Product outside/product.php">全部商品</a></li>
                        <li><a href="../Product outside/product.php">手鍊</a></li>
                        <li><a href="../Product outside/product.php">耳飾</a></li>
                        <li><a href="../Product outside/product.php">項鍊</a></li>
                        <li><a href="../Product outside/product.php">吊飾</a></li>
                    </div>
                </div>
            </div>

            <a href="../home/home.php">
                <h1>愛不飾手</h1>
            </a>

            <div class="menu-right">
                <div class="dropdown ">
                    <button class="dropbtn-1">
                        <img src="../icon_public/search.png" alt="搜尋">
                    </button>
                    <div class="dropdown-content">
                        <li><a href="../Product outside/product.php">全部商品</a></li>
                        <li><a href="../Product outside/product.php">手鍊</a></li>
                        <li><a href="../Product outside/product.php">耳飾</a></li>
                        <li><a href="../Product outside/product.php">項鍊</a></li>
                        <li><a href="../Product outside/product.php">吊飾</a></li>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="dropbtn-2">
                        <img src="../icon_public/shopping-cart.png" alt="購物車">
                    </button>
                    <div class="dropdown-content" id="pcart">
                        <?php
                        // 檢查 Session 中的登入狀態
                        if (isset($_COOKIE['token'])) {
                            echo '<li>您的商品:</li>';
                            echo '<div id="cartInfo" style="color:black;padding:10px;"></div></br>';
                            echo '<p id="totalCartAmount" style="color:black;padding:10px;">總金額： 0</p>';
                            echo '<li><a href="../Product outside/product.php">結帳</a></li>';
                        } else {
                            echo '<li>購物車目前是空的!</li>';
                            echo '<li><a href="../login/login.php">立即登入</a></li>';
                        }
                        ?>
                    </div>
                </div>
                <!-- 在 Navbar 中的登入選項 -->
                <div class="dropdown">
                    <button class="dropbtn-3">
                        <img src="../icon_public/user.png" alt="搜尋">
                    </button>
                    <div class="dropdown-content" id="user-dropdown">
                        <?php
                        // 檢查 Session 中的登入狀態
                        if (isset($_COOKIE['token'])) {
                            // 使用者已登入，顯示登出選項
                            echo '<li style="color:black;font-size: 12px;">---登入成功---</li>';
                            echo '<li><a href="../Member area/update.php">我的帳戶</a></li>';
                            echo '<li><a href="../Member area/update.php">變更密碼</a></li>';
                            echo '<li><a href="../Member area/search.php">訂單查詢</a></li>';
                            echo '<li><a href="../Member area/collect.php">收藏清單</a></li>';
                            echo '<li><a href="../login/logout.php">登出</a></li>';
                            // 這裡可以根據需要顯示其他登入後的選項，例如"我的帳戶"、"訂單查詢"等
                        } else {
                            // 使用者未登入，顯示會員登入和註冊新會員選項
                            echo '<li><a href="../login/login.php">會員登入</a></li>';
                            echo '<li><a href="../login/register.html">註冊新會員</a></li>';
                        }
                        ?>
                        
                    </div>
                </div>

            </div>
        </div>
    </div>

    <hr>
    <div class="navbar">
        <a href="../Product outside/product.php">全部商品</a>
        <a href="../Product outside/product.php">手鍊</a>
        <a href="../Product outside/product.php">耳飾</a>
        <a href="../Product outside/product.php">項鍊</a>
        <a href="../Product outside/product.php">吊飾</a>
    </div>

    <!-- 內容 -->
    <div class="inside">
        <div class="info">
            <div class="pic">
                <div class="big">
                    <img src="<?= $PmainImage; ?>" alt="">
                    </div>
                <div class="small">
                <img src="<?= $subgraph1; ?>" alt="">
                <img src="<?= $subgraph2; ?>" alt="">
                <img src="<?= $subgraph3; ?>" alt="">
                <img src="<?= $subgraph4; ?>" alt="">
                </div>
            </div>

            <div class="text">
                <h1 id="pi_name"><?php echo $pname; ?></h1>
                <div class="caption">
                    <p> <?php echo $row["pcontent"]; ?></p>
                    <p><?= $Pstandard; ?></p>
                </div>
                <div class="box">
                    <div class="heart"></div>
                </div>
                <div class="price">
                    $<span id="pi_price" style="font-size:22px;"><?php echo $PfinalPrice; ?></span>
                    <p style="color: red;">是否活動折扣</p>
                </div>
                <div class="btn">
                    <a href=""><button class="bigbutton">立即購買<img src="../icon_public/bag.png"></button></a>
                    <div class="count">
                        <div class="countbutton" id="decreaseButton">-</div>
                        <div class="num" id="numberDisplay">1</div>
                        <div class="countbutton" id="increaseButton">+</div>
                        <a href="javascript:void(0);" onclick="handleCartButtonClick()">
                            <div class="cartbutton">加入購物車<img src="../icon_public/shopping-cart.png"></div>
                        </a>

                        <script>
                            function handleCartButtonClick() {
                                <?php
                                // 檢查登入狀態
                                if (isset($_COOKIE['token'])) {
                                    echo 'addToCart();';

                                } else {
                                    echo 'window.location.href = "../login/login.php";';
                                }
                                ?>
                            }
                        </script>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <!-- 商品大圖 -->
    <div class="title">
        <h2>商品詳細</h2>
    </div>
    <div class="picinfo">
        <div class="photo">
            <?= $editor; ?>

        </div>
    </div>

    <!-- 方形輪播 -->
    <div class="wrapper">
        <div class="linear-gradient"></div>
        <ul class="carousel">
            <li class="card">
                <div class="img"><img src="../home/img/004.jpg" alt="img" draggable="false"></div>
            </li>
            <li class="card">
                <div class="img"><img src="../home/img/005.jpg" alt="img" draggable="false"></div>
            </li>
            <li class="card">
                <div class="img"><img src="../home/img/004.jpg" alt="img" draggable="false"></div>
            </li>
            <li class="card">
                <div class="img"><img src="../home/img/005.jpg" alt="img" draggable="false"></div>
            </li>
            <li class="card">
                <div class="img"><img src="../home/img/004.jpg" alt="img" draggable="false"></div>
            </li>
            <li class="card">
                <div class="img"><img src="../home/img/005.jpg" alt="img" draggable="false"></div>
            </li>
            <li class="card">
                <div class="img"><img src="../home/img/004.jpg" alt="img" draggable="false"></div>
            </li>
            <li class="card">
                <div class="img"><img src="../home/img/005.jpg" alt="img" draggable="false"></div>
            </li>
            <i id="right" class="fa-solid fa-angle-right"></i>
        </ul>
    </div>

    <div class="fix">
        <img src="../icon_public/chat.png">
        <a href="#top"><img src="../icon_public/top.png"></a>
    </div>

    <div class="bottom">
        <div class="footer">
            <div class="footertxt">
                <p>版權聲明/使用條款/聯繫信息/首頁</p>
                <p>xxx12345@gmail.com</p>
            </div>
            <div class="media">
                <div class="icon">
                    <img src="../icon_public/facebook.png">
                    <a>facebook</a>
                </div>
                <div class="icon">
                    <img src="../icon_public/twitter.png">
                    <a>twitter</a>
                </div>
                <div class="icon">
                    <img src="../icon_public/instagram.png">
                    <a>instagram</a>
                </div>
            </div>
        </div>
    </div>

</body>
<script src="../js/script.js"></script>
<script src="../js/insidePage.js"></script>

</html>