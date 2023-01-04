var icon_menu_mobile = document.getElementById("icon-menu-mobile");
var menu_nav_mobile = document.getElementById("menu-nav-mobile");
icon_menu_mobile.addEventListener("click", function () {
    if (menu_nav_mobile.style.display == "block") {
        menu_nav_mobile.style.display = "none";
    } else {
        menu_nav_mobile.style.display = "block";
    }
});

var submenu_product_mobile = document.getElementById("submenu-product-mobile");
var submenu_nav_mobile = document.getElementById("submenu-nav-mobile");
submenu_product_mobile.addEventListener("click", function () {
    if (submenu_nav_mobile.style.display == "block") {
        submenu_nav_mobile.style.display = "none";
    } else {
        submenu_nav_mobile.style.display = "block";
    }
});

//submenu-nav-sanpham
var menu_nav = document.getElementById("menu-nav");
var submenu_nav = document.getElementById("submenu-nav");
menu_nav.addEventListener("mouseover", function () {
    submenu_nav.style.display = "block";
});
menu_nav.addEventListener("mouseout", function () {
    submenu_nav.style.display = "none";
});
//submenu-category
var category = document.getElementById("category");
var category_menu = document.getElementById("category-menu");
category.addEventListener("click", function () {
    if (category_menu.style.display == "none") {
        category_menu.style.display = "block";
    } else {
        category_menu.style.display = "none";
    }
});
