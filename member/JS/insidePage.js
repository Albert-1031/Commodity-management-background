// addToCart.js

// 初始化购物车总金额
var totalCartAmount = parseFloat(localStorage.getItem('totalCartAmount')) || 0;

// 處理「加入購物車」按鈕點擊的函數
function addToCart() {
    // 獲取產品詳細資訊
    var productName = document.getElementById("pi_name").innerText;
    var productPrice = parseFloat(document.getElementById("pi_price").innerText);
    var productQuantity = parseInt(document.getElementById("numberDisplay").innerText);

    // 計算產品總價格
    var totalProductPrice = productPrice * productQuantity;

    // 更新购物车总金额
    totalCartAmount += totalProductPrice;

    // 將產品詳細資訊添加到 <p> 標籤中
    var cartInfoElement = document.getElementById("cartInfo");
    var existingCartInfo = cartInfoElement.innerHTML;
    var newCartInfo = productName + " - " + productPrice + " x " + productQuantity + " = " + totalProductPrice;
    cartInfoElement.innerHTML = existingCartInfo + "<br>" + newCartInfo;

    // 更新购物车总金额显示
    updateTotalCartAmountDisplay();

    // // 将购物车总金额保存在 LocalStorage
    // localStorage.setItem('totalCartAmount', totalCartAmount);
    
    // // 清空 localStorage 中的所有資料
    // localStorage.clear();
    // 顯示加入成功的警示視窗
    alert("加入成功");

}

// 更新购物车总金额显示
function updateTotalCartAmountDisplay() {
    var totalCartAmountElement = document.getElementById("totalCartAmount");
    if (totalCartAmountElement) {
        totalCartAmountElement.innerHTML = "總金額： " + totalCartAmount;
    } else {
        console.error("Total cart amount element not found.");
    }
}