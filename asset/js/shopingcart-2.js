// Modal
var modal = document.getElementById("myModal");
var btns = document.getElementsByClassName("cart");
for (var i = 0; i < btns.length; i++) {
  var btn = btns[i];
  btn.addEventListener('click', function () {
    modal.style.display = "block";
  })
}
var close = document.getElementsByClassName("close")[0];
// tại sao lại có [0] như  thế này bởi vì mỗi close là một html colection nên khi mình muốn lấy giá trị html thì phải thêm [0]. 
//Nếu mình có 2 cái component cùng class thì khi [0] nó sẽ hiển thị component 1 còn [1] thì nó sẽ hiển thị component 2.
var delete_cart = document.getElementsByClassName("delete-cart")[0];
var order = document.getElementsByClassName("order")[0];
close.onclick = function () {
  modal.style.display = "none";
}
delete_cart.onclick = function () {
  deleteCart()
}
order.onclick = function () {
  if (document.getElementsByClassName("cart-total-price")[0].innerText == 0) {
    alert("Hiện tại không có sản phẩm nào trong giỏ hàng!")
  } else {
    alert("Cảm ơn bạn đã đặt hàng")
  }
  modal.style.display = "none";
}
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

//thêm giấu phẩy
function numberWithCommas(x) {
  x = x.toString();
  var pattern = /(-?\d+)(\d{3})/;
  while (pattern.test(x))
    x = x.replace(pattern, "$1.$2");
  return x;
}
// update cart 
function updatecart() {
  var cart_item = document.getElementsByClassName("cart-items")[0];
  var cart_rows = cart_item.getElementsByClassName("cart-row");
  var total = 0;
  for (var i = 0; i < cart_rows.length; i++) {
    var cart_row = cart_rows[i]
    var price_item = cart_row.getElementsByClassName("cart-price ")[0]
    var quantity_item = cart_row.getElementsByClassName("cart-quantity-input")[0]
    var price = parseFloat(price_item.innerText)// chuyển một chuổi string sang number để tính tổng tiền.
    quantity = quantity_item.value // lấy giá trị trong thẻ input
    console.log(quantity);
    total = total + (price * quantity)
  }
  document.getElementsByClassName("cart-total-price")[0].innerText = numberWithCommas(Math.round(total))
  // Thay đổi text = total trong .cart-total-price. Chỉ có một .cart-total-price nên mình sử dụng [0].
}

// Thêm vào giỏ
var add_cart = document.getElementsByClassName("btn-cart");
for (var i = 0; i < add_cart.length; i++) {
  var add = add_cart[i];
  add.addEventListener("click", function (event) {
    var button = event.target;
    var product = button.parentElement;
    var img = product.getElementsByClassName("img-prd")[0].src
    var title = product.getElementsByClassName("name-product")[0].innerText
    var price = product.getElementsByClassName("price-product")[0].innerText.substr(1)
    addItemToCart(title, price, img)
    // Khi thêm sản phẩm vào giỏ hàng thì sẽ hiển thị modal
    modal.style.display = "block"
  })
}
var items=[];
function loadCart() {
  var jsonItems=localStorage.getItem('items');
  items = creatItem().fromJsons(jsonItems);
  var html = outputItems(items);
  var nodeCartItems=document.getElementsByClassName('cart-items')[0];
  nodeCartItems.innerHTML = html;
  updatecart();
}

function deleteItem(index){
  var jsonItems=localStorage.getItem('items');
  items = creatItem().fromJsons(jsonItems);
  if(confirm('Bạn muốn xóa sản phẩm này?')==true){
    items.splice(index,1);
  }
  jsonItems = JSON.stringify(items);
  localStorage.setItem('items', jsonItems);
  loadCart();
}

function deleteCart(){
  var jsonItems=localStorage.getItem('items');
  items = creatItem().fromJsons(jsonItems);
  if(confirm('Bạn muốn xóa giỏ hàng')==true){
    items=[];
  }
  jsonItems = JSON.stringify(items);
  localStorage.setItem('items', jsonItems);
  loadCart();
}


function addItemToCart(title, price, img) {
  var cartRow = document.createElement('div')
  cartRow.classList.add('cart-row')
  var cartItems = document.getElementsByClassName('cart-items')[0]
  var cart_title = cartItems.getElementsByClassName('cart-item-title')
  //Nếu title của sản phẩm bằng với title mà bạn thêm vao giỏ hàng thì sẽ thông cho user.
  for (var i = 0; i < cart_title.length; i++) {
    if (cart_title[i].innerText == title) {
      alert('Sản Phẩm Đã Có Trong Giỏ Hàng')
      return
    }
  }
  var item = creatItem(title, price, img);
  items.push(item);
  var jsonItems = JSON.stringify(items);
  localStorage.setItem('items', jsonItems);
  loadCart();
}

function outputItems(items) {
  var htmlItems = '';
  for (var i = 0; i < items.length; i++) {
      var item = items[i];
      var htmlItem = outputItem(item,i);
      htmlItems += htmlItem;
  }
  return htmlItems;
}

function outputItem(item,index) {
  var html = '';
  html += `<div class='cart-row'>`
  html += `<div class='cart-item cart-column'>`
  html += `<img class="cart-item-image" src="` + item.img + `" width="100" height="100">`
  html += `<span class="cart-item-title">` + item.title + `</span>`
  html += `</div>`
  html += `<span class="cart-price cart-column">` + item.price + `$</span>`
  html += `<div class="cart-quantity cart-column">`
  html += `<input class="cart-quantity-input" type="number" value="1">`
  html += `<button class="btn btn-danger" onclick="deleteItem(`+index+`)" type="button">Xóa</button>`
  html += `</div>`
  html += `</div>`
  return html;
}




