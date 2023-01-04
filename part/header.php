<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Organic Farm</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Reem+Kufi+Fun&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../asset/css/style.css" />
    <link rel="stylesheet" href="../asset/css/grid.css" />
    <script src="../asset/js/item-cart.js"></script>
    <!-- Logo Browser -->
    <link rel="icon" type="image/png" href="../asset/img/logo/image-3.png" /> 
</head>

<body>
    <div class="space"></div>
    <div class="top-bar">
        <div class="container-top-bar">
        <?php 
            session_start();
            if(isset($_SESSION['login'])){ ?>
                <a href="account.php">Xin chào, <?php echo $_SESSION['login']['username']; ?></a>
            <?php }else{ ?>
                <a href="account.php">Chào mừng bạn đến với Organic Farm</a>
            <?php } ?>
            
        </div>
    </div>
    <nav>
        <div class="container-nav">
            <div class="logo-nav">
                <div>
                    <img src="../asset/img/logo/image-1.png" alt="" />
                </div>
            </div>
            <div class="nav-search">
                <div class="search">
                    <span class="content-search">Tìm kiếm....</span>
                    <a class="icon-search" href="">
                        <img src="../asset/img/icon/Vector.png" alt="" />
                    </a>
                </div>
            </div>
            <ul>
                <li><a href="index.php">Trang Chủ</a></li>
                <li class="menu-nav" id="menu-nav"><a href="product.php">Sản Phẩm</a>
                    <ul class="submenu-nav" id="submenu-nav">
                        <?php
                        include_once("../lib/db.php");
                        $db = new database();
                        $conn = $db->connect();
                        $sql = "SELECT * FROM categories";
                        $data = $conn->query($sql);
                        while ($row = $data->fetch()) { ?>
                            <li><a href="product-cate.php?id=<?php echo $row['id'] ?>"><?php echo $row['name_category'] ?></a></li>
                        <?php } ?>
                    </ul>
                </li>
                <li><a href="info.php">Liên Hệ</a></li>
                <li><a href="account.php">Tài Khoản</a></li>
                <li><button class="btn-buy-nav cart">Giỏ hàng</button>
                    <div id="myModal" class="modal">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Giỏ Hàng</h5>
                                <span class="close">&times;</span>
                            </div>
                            <div class="modal-body">
                                <div class="cart-row">
                                    <span class="cart-item cart-header cart-column">Sản Phẩm</span>
                                    <span class="cart-price cart-header cart-column">Giá</span>
                                    <span class="cart-quantity cart-header cart-column">Số Lượng</span>
                                </div>
                                <div class="cart-items"></div>
                            </div>
                            <div class="modal-footer">
                                <div class="cart-total">
                                    <strong class="cart-total-title">Tổng Cộng:</strong>
                                    <span class="cart-total-price" id="cart-total-price">0</span>$
                                </div>
                                <button type="button" class="btn btn-primary order">Đặt Hàng</button>
                                <button type="button" class="btn btn-secondary delete-cart">Xóa giỏ hàng</button>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div class="nav-mobile">
        <div class="logo-nav">
            <div>
                <img src="../asset/img/logo/image-1.png" alt="" />
            </div>
        </div>
        <div class="container-search">
            <div class="search">
                <span class="content-search">Tìm kiếm....</span>
                <a class="icon-search" href="">
                    <img src="../asset/img/icon/Vector.png" alt="" />
                </a>
            </div>
        </div>
        <div class="menu" id="icon-menu-mobile">
            <img src="../asset/img/icon/icon-menu.png" alt="">
        </div>
    </div>
    <ul class="menu-nav-mobile" id="menu-nav-mobile">
        <li><a href="index.php">Trang Chủ</a></li>
        <li id="submenu-product-mobile"><a href="product.php">Sản Phẩm</a></li>
        <ul class="submenu-nav-mobile" id="submenu-nav-mobile">
            <?php
            include_once("../lib/db.php");
            $db = new database();
            $conn = $db->connect();
            $sql = "SELECT * FROM categories";
            $data = $conn->query($sql);
            while ($row = $data->fetch()) { ?>
                <li><a href="product-cate.php?id=<?php echo $row['id'] ?>"><?php echo $row['name_category'] ?></a></li>
            <?php } ?>
        </ul>
        <li><a href="info.php">Liên Hệ</a></li>
        <li><a href="account.php">Tài Khoản</a></li>
        <li class="cart">Giỏ hàng</li>
    </ul>