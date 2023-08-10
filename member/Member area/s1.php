<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員專區-密碼</title>
    <link rel="stylesheet" href="../reset.css">
    <link rel="stylesheet" href="../navbar.css">
    <link rel="stylesheet" href="./search.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

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
                        <li><a href="/member/login.php">會員登入</a></li>
                        <li><a href="/member/register.html">註冊新會員</a></li>
                        <li><a href="">購物車</a></li>
                        <li><a href="../Product outside/product.php">全部商品</a></li>
                        <li><a href="../Product outside/product.php">手鍊</a></li>
                        <li><a href="../Product outside/product.php">耳飾</a></li>
                        <li><a href="../Product outside/product.php">項鍊</a></li>
                        <li><a href="../Product outside/product.php">吊飾</a></li>
                    </div>
                </div>
            </div>

            <a href="/member/home/home.php">
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
                    <div class="dropdown-content">
                    <?php
                        // 檢查 Session 中的登入狀態
                        if (isset($_COOKIE['token'])) {
                            
                            echo '<li>您的商品:</li>';
                            echo '<li><a href="/member/Product outside/product.php">立即選購</a></li>';
                        } else {
                            echo '<li>購物車目前是空的!</li>';
                            echo '<li><a href="/member/login.php">立即登入</a></li>';
                        }
                    ?>
                    </div>
                </div>
                <!-- 在 Navbar 中的登入選項 -->
                <div class="dropdown">
                    <button class="dropbtn-3">
                        <img src="/member/icon_public/user.png" alt="搜尋">
                    </button>
                    <div class="dropdown-content" id="user-dropdown">
                        <?php
                        // 檢查 Session 中的登入狀態
                        if (isset($_COOKIE['token'])) {
                            // 使用者已登入，顯示登出選項
                            echo '<li style="color:black;font-size: 12px;">---登入成功---</li>';
                            echo '<li><a href="/member/Member area/update.php">我的帳戶</a></li>';
                            echo '<li><a href="/member/Member area/update.php">變更密碼</a></li>';
                            echo '<li><a href="/member/Member area/search.php">訂單查詢</a></li>';
                            echo '<li><a href="/member/Member area/collect.php">收藏清單</a></li>';
                            echo '<li><a href="../logout.php">登出</a></li>';
                            // 這裡可以根據需要顯示其他登入後的選項，例如"我的帳戶"、"訂單查詢"等
                        } else {
                            // 使用者未登入，顯示會員登入和註冊新會員選項
                            echo '<li><a href="/member/login.php">會員登入</a></li>';
                            echo '<li><a href="/member/register.html">註冊新會員</a></li>';
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

<div class="container">

    <div class="sidebar">
        <ul>
            <li><a href="./update.php">更新個人資訊</a></li>
            <li><a href="./password.php">變更密碼</a></li>
            <li><a href="./search.php">訂單查詢</a></li>
            <li><a href="./collect.php">收藏清單</a></li>
        </ul>
    </div>
    <div class="context">
    <div class="main">
                <div class="order">
                    <div class="day">
                        <div class="daycontent">
                            <p>訂單編號</p><span>#14752</span>
                            <p>訂購日期</p><span>2023-07-14</span>
                            <p>付款方式</p><span>貨到付款</span>
                        </div>
                        <div class="plusicon">
                            <img src="./img/instagram-post.png" id="plusicon">
                            <img src="./img/minus.png" class="display" id="minusicon">
                        </div>
                    </div>
                    <div class="zoom display">
                        <div class="schedule">
                            <div class="scheduledot"><img src="./img/shape.png" class="display"><img src="./img/black-circle.png"><img src="./img/button.png" class="display"><span>訂單成立</span><p>2023/07/22 16:16</p></div>
                            <div class="scheduledot"><img src="./img/shape.png" class="display"><img src="./img/black-circle.png" class="display"><img src="./img/button.png"><span>處理中</span><p></p></div>
                            <div class="scheduledot"><img src="./img/shape.png"><img src="./img/black-circle.png" class="display"><img src="./img/button.png" class="display"><span>已出貨</span><p></p></div>
                            <div class="scheduledot"><img src="./img/shape.png"><img src="./img/black-circle.png" class="display"><img src="./img/button.png" class="display"><span>已到店</span><p></p></div>
                            <div class="scheduledot"><img src="./img/shape.png"><img src="./img/black-circle.png" class="display"><img src="./img/button.png" class="display"><span>已收貨</span><p></p></div>
                        </div>
                        <div class="orderitem">
                            <div class="ordername">
                                <div class="orderimg"><img src="./img/004.jpg"></div>
                                <p>商品名稱</p>
                            </div>
                            <div class="ordercount">
                                <p>數&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;量：1</p>
                                <p>優惠折扣：NT$ 130</p>
                                <p>小&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;計：NT$ 1,480</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
    </div>


</div>

<script>
        document.getElementById("updateButton").addEventListener("click", function() {
            var oldPassword = document.getElementById("oldPassword").value;
            var newPassword = document.getElementById("newPassword").value;
            var confirmPassword = document.getElementById("confirmPassword").value;

            if (!oldPassword || !newPassword || !confirmPassword) {
                alert("請填寫完整資料");
                return;
            }

            if (newPassword !== confirmPassword) {
                alert("新密碼與確認密碼不符");
                return;
            }

            alert("修改成功");
            document.getElementById("oldPassword").value = "";
            document.getElementById("newPassword").value = "";
            document.getElementById("confirmPassword").value = "";
        });

    function togglePasswordVisibility(inputId, iconId) {
        var passwordInput = document.getElementById(inputId);
        var toggleIcon = document.getElementById(iconId);

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            toggleIcon.src = "../icon_public/eye-open.png";
        } else {
            passwordInput.type = "password";
            toggleIcon.src = "../icon_public/eye-closed.png";
        }
    }
</script>
</body>
<script src="./search.js"></script>
</html>