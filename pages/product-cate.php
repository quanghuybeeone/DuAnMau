<?php include_once("../part/header.php") ?>
<div class="container row">
    <div class="bg-product">
        <section class="section-10">
            <div class="slideshow-container">
                <div class="mySlides fade">
                    <img src="../asset/img/banner/banner-1.png" style="width:100%">
                </div>
                <div class="mySlides fade">
                    <img src="../asset/img/banner/banner-2.png" style="width:100%">
                </div>
                <div class="mySlides fade">
                    <img src="../asset/img/banner/banner-3.png" style="width:100%">
                </div>
                <div class="mySlides fade">
                    <img src="../asset/img/banner/banner-4.png" style="width:100%">
                </div>
                <a class="prev" onclick="plusSlides(-1)">❮</a>
                <a class="next" onclick="plusSlides(1)">❯</a>
                <div class="dots" style="text-align:center">
                    <span class="dot" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                    <span class="dot" onclick="currentSlide(3)"></span>
                    <span class="dot" onclick="currentSlide(4)"></span>
                </div>
            </div>
        </section>
        <section class="section-11">
            <div class="swapper-1">Hot Sale</div>
            <div class="slide-container">
                <div id="slide-left" class="arrow">❮</div>
                <div class="swapper-2" id="slider">
                    <?php
                    include_once("../lib/db.php");
                    $db1 = new database();
                    $conn1 = $db1->connect();
                    $sql1 = "SELECT * FROM products";
                    $data1 = $conn1->query($sql1);
                    while ($row1 = $data1->fetch()) { ?>
                        <div class="thumbnail">
                            <img src="../asset/img/upload/img_product/<?php echo $row1['img_prd_main'] ?>" alt="">
                            <div class="product-details">
                                <h2><?php echo $row1['name_prd'] ?></h2>
                                <p><span>$<?php echo $row1['cost'] ?></span> $<?php echo $row1['price'] ?></p>
                                <a href="product-detail.php?id=<?php echo $row1['id_prd'] ?>">Đến xem</a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div id="slide-right" class="arrow">❯</div>
        </section>
        <section class="section-12">
            <div class="row">
                <div class="swapper-1 col-4 col-sm-12">
                    <div class="content-1">
                        <div class="category" id="category">Category<span class="icon-down-category" id="icon-down-category"><img src="../asset/img/icon/icon-down.png" alt=""></span></div>
                        <ul class="category-menu" id="category-menu">
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
                    </div>
                    <div class="content-2">
                        <div class="box">
                            <video id="myVideo" width="100%" controls>
                                <source src="../asset/video/TheOrganicVegetables.webm" type="video/mp4">
                            </video>
                            <div class="title">Làm thế nào để chắc chắn đó là thực phẩm hữu cơ (Organic)?</div>
                            <div class="describe">Thực tế thì khái niệm thực phẩm hữu cơ vẫn chưa thật sự phổ biến ở
                                nước ta, chính vì thế lượng người sử dụng chúng vẫn đang ở mức thấp, một phần cũng
                                vì
                                giá thành chúng thường cao hơn.</div>
                            <div class="btn-describe-organic">Đến xem</div>
                        </div>
                    </div>
                </div>
                <div class="swapper-2 col-8 col-sm-12">
                    <?php
                    include_once("../lib/db.php");
                    $db1 = new database();
                    $id = $_GET['id'];
                    // echo $id;
                    $sql1 = "SELECT * FROM categories WHERE id=" . $id;
                    $conn1 = $db1->connect();
                    $data1 = $conn1->query($sql1);
                    $row1 = $data1->fetch();
                    ?>
                    <div class="content"><?php echo $row1['name_category'] ?></div>
                    <div class="row">
                        <?php
                        include_once("../lib/db.php");
                        $db2 = new database();
                        $conn2 = $db2->connect();
                        $sl=9;
                        $page = isset($_GET['page']) ? $_GET['page'] : "1";
                        $offset = ($page-1)*$sl;
                        $sql2 = "SELECT * FROM products WHERE id_category=" . $id . " ORDER BY id_prd LIMIT ".$sl." OFFSET " . $offset;
                        $data2 = $conn2->query($sql2);
                        while ($row2 = $data2->fetch()) { ?>
                            <div class="box-product col-4 col-md-6 col-sm-6">
                                <div class="product">
                                    <a href="product-detail.php?id=<?php echo $row2['id_prd'] ?>">
                                        <div class="img-product">
                                            <img class="img-prd" src="../asset/img/upload/img_product/<?php echo $row2['img_prd_main'] ?>" alt="">
                                        </div>
                                    </a>
                                    <div class="name-product"><?php echo $row2['name_prd'] ?></div>
                                    <div class="sale-price-product">$<?php echo $row2['cost'] ?></div>
                                    <div class="price-product">$<?php echo $row2['price'] ?></div>
                                    <div class="btn-cart btn-add-cart">Thêm vào giỏ</div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="linkPage">
                        <?php
                        include_once('../lib/db.php');
                        // ###Truy xuất toàn bộ dữ liệu
                        $db3 = new database();
                        $conn3 = $db3->connect();
                        $sql3 = "SELECT * FROM products WHERE id_category=" . $id;
                        $data3 = $conn1->query($sql3);
                        for ($i = 1; $i <= ceil($data3->rowCount() / $sl); $i++) { 
                            if($i==$page){ ?>
                                <a id="linkNum" class="active-link" href="?id=<?php echo $id ?>&page=<?php echo $i ?>"><?php echo $i ?></a>
                            <?php }else{ ?>
                                <a id="linkNum" href="?id=<?php echo $id ?>&page=<?php echo $i ?>"><?php echo $i ?></a>
                            <?php }?>
                            
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-13">
            <div class="row">
                <div class="swapper col-4 col-sm-12"><img src="../asset/img/promotion/promotion-1.png" alt=""></div>
                <div class="swapper col-4 col-sm-12"><img src="../asset/img/promotion/promotion-2.png" alt=""></div>
                <div class="swapper col-4 col-sm-12"><img src="../asset/img/promotion/promotion-3.png" alt=""></div>
            </div>
        </section>
    </div>
</div>
<?php include_once("../part/footer.php") ?>