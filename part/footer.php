<footer>
    <section class="section-8">
        <div class="row">
            <div class="swapper-1 col-2">
                <img src="../asset/img/logo/image-1.png" alt="">
            </div>
            <div class="swapper-2 col-7">
                <div class="row">
                    <div class="col-4 col-sm-6 content">
                        <ul>
                            <li class="category">Liên kết</li>
                            <li><a href="index.php">Trang Chủ</a></li>
                            <li><a href="product.php">Sản phẩm</a></li>
                            <li><a href="info.php">Liên Hệ</a></li>
                            <li><a href="account.php">Tài Khoản</a></li>
                        </ul>
                    </div>
                    <div class="col-4 col-sm-6 content">
                        <ul>
                            <li class="category">Sản Phẩm</li>
                            <?php
                            include_once("../lib/db.php");
                            $db = new database();
                            $conn = $db->connect();
                            $sql = "SELECT * FROM categories";
                            $data = $conn->query($sql);
                            while ($row = $data->fetch()) { ?>
                                <li><a href="#"><?php echo $row['name_category'] ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="col-4 col-sm-12 content">
                        <ul>
                            <li class="category">Liên hệ</li>
                            <li>Business inquiry: <span>123-456-7890</span></li>
                            <li>Customer care: <span>123-456-7890</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="swapper-3 col-3">
                <div class="content">
                    <ul>
                        <li class="category">Truyền Thông</li>
                        <ul>
                            <li><img src="../asset/img/icon/social-1.png" alt=""></li>
                            <li><img src="../asset/img/icon/social-2.png" alt=""></li>
                            <li><img src="../asset/img/icon/social-3.png" alt=""></li>
                            <li><img src="../asset/img/icon/social-4.png" alt=""></li>
                        </ul>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="section-9">
        <div class="swapper-1">
            © 2022 FPT Polytechnic | All Rights Reserved
        </div>
    </section>
</footer>
<script src="../asset/js/shopingcart-2.js"></script>
<script src="../asset/js/star-rating.js"></script>
<script src="../asset/js/menu-mobile.js"></script>
<script src="../asset/js/slide-hotsale.js"></script>
<script src="../asset/js/slide.js"></script>
</body>

</html>