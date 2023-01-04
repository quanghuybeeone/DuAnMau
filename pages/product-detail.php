<?php include_once("../part/header.php") ?>
<?php
include_once("../lib/db.php");
$db1 = new database();
$id = $_GET['id'];
// echo $id;
$sql1 = "SELECT * FROM products WHERE id_prd=" . $id;
$conn1 = $db1->connect();
$data1 = $conn1->query($sql1);
$row1 = $data1->fetch();
?>
<div class="container row">
    <div class="bg-product-detail">
        <div class="space-2"></div>
        <section class="section-17">
            <div class="row">
                <div class="swapper-1 col-6 col-sm-12">
                    <div class="grid-container-1">
                        <div class="item1"><img id="img-item-1" src="../asset/img/upload/img_product/<?php echo $row1['img_prd_main']; ?>" alt=""></div>
                        <div class="item2"><img id="img-item-2" src="../asset/img/upload/img_product/<?php echo $row1['img_prd_1']; ?>" alt=""></div>
                        <div class="item3"><img id="img-item-3" src="../asset/img/upload/img_product/<?php echo $row1['img_prd_2']; ?>" alt=""></div>
                        <div class="item4"><img id="img-item-4" src="../asset/img/upload/img_product/<?php echo $row1['img_prd_3']; ?>" alt=""></div>
                        <div class="item5"><img id="img-item-5" src="" alt=""></div>
                        <div class="item6"><img id="img-item-6" src="" alt=""></div>
                    </div>
                </div>
                <div class="swapper-2 col-6 col-sm-12">
                    <div class="box-product">
                        <div class="product">
                            <div class="img-product">
                                <img class="img-prd" src="../asset/img/image-product/product-1/image-1.png" alt="">
                            </div>
                            <div class="name-product"><?php echo $row1['name_prd']; ?></div>
                            <span class="title">Giá gốc:</span>
                            <del class="sale-price-product">$<?php echo $row1['cost']; ?></del>
                            <br>
                            <span class="title">Giá còn:</span>
                            <span class="price-product">$<?php echo $row1['price']; ?></span>
                            <div class="row contents">
                                <div class="content col-6">
                                    <ul class="box-content">
                                        <li>Hàng mới về</li>
                                        <li>Nhập kho:3/10(4h-7h)</li>
                                        <li>Giao hàng ngay</li>
                                        <li class="end">TẠM HẾT HÀNG</li>
                                    </ul>
                                </div>
                                <div class="content col-6">
                                    <ul class="box-content">
                                        <li>Hàng mai về</li>
                                        <li>Nhập kho:4/10(4h-7h)</li>
                                        <li>Giao hàng trước 18h</li>
                                        <li class="end high-light"><input type="checkbox"><span>$9.99</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="btn-cart btn-add-cart">Thêm vào giỏ</div>
                        </div>
                    </div>
                    <div class="content-1">
                        <div class="box-content">
                            <div class="title">Organic Farm cam kết!</div>
                            <div class="group-slogan">
                                <img src="../asset/img/icon/icon-4.png" alt="">
                                <div class="slogan">HÀNG TƯƠI, CHẤT LƯỢNG</div>
                            </div>
                            <div class="group-slogan">
                                <img src="../asset/img/icon/icon-5.png" alt="">
                                <div class="slogan">GIAO ĐÚNG HẸN, ĐỦ HÀNG</div>
                            </div>
                            <div class="group-slogan">
                                <img src="../asset/img/icon/icon-6.png" alt="">
                                <div class="slogan">ĐỔI TRẢ, HOÀN TIỀN DỄ DÀNG</div>
                            </div>
                            <div class="group-slogan">
                                <img src="../asset/img/icon/icon-7.png" alt="">
                                <div class="slogan">THÂN THIỆN, VUI VẺ</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="space-2"></div>
        <section class="section-18">
            <div class="row">
                <div class="swapper-1 row">
                    <div class="content col-6 col-sm-12">
                        <div class="title">Thông tin sản phẩm</div>
                        <div class="content-1"><?php echo $row1['detail_1']; ?></div>
                        <div class="content-1"><?php echo $row1['detail_2']; ?></div>
                    </div>
                    <div class="content col-6 col-sm-12">
                        <div class="box-rating">
                            <div class="row">
                                <div class="col-4 col-sm-12">
                                    <div class="text">5.0</div>
                                    <div class="big-star">&starf;</div>
                                    <div class="text">3 đánh giá</div>
                                </div>
                                <div class="col-8 col-sm-12 boder-left">
                                    <div class="row star-row">
                                        <div class="col-2">5<span>&starf;</span></div>
                                        <div class="col-6 line yellow"></div>
                                        <div class="col-4">3 đánh giá</div>
                                    </div>
                                    <div class="row star-row">
                                        <div class="col-2">4<span>&starf;</span></div>
                                        <div class="col-6 line"></div>
                                        <div class="col-4">0 đánh giá</div>
                                    </div>
                                    <div class="row star-row">
                                        <div class="col-2">3<span>&starf;</span></div>
                                        <div class="col-6 line"></div>
                                        <div class="col-4">0 đánh giá</div>
                                    </div>
                                    <div class="row star-row">
                                        <div class="col-2">2<span>&starf;</span></div>
                                        <div class="col-6 line"></div>
                                        <div class="col-4">0 đánh giá</div>
                                    </div>
                                    <div class="row star-row">
                                        <div class="col-2">1<span>&starf;</span></div>
                                        <div class="col-6 line"></div>
                                        <div class="col-4">0 đánh giá</div>
                                    </div>
                                </div>
                            </div>
                            <div class="vote">Gửi đánh giá của bạn</div>
                            <div class="star-rating">
                                <ul class="stars">
                                    <li class="star">&starf;</li>
                                    <li class="star">&starf;</li>
                                    <li class="star">&starf;</li>
                                    <li class="star">&starf;</li>
                                    <li class="star">&starf;</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swapper-2 row">
                    <div class="content-1 col-6 col-sm-12">
                        <div class="title">Hỏi đáp về sản phẩm</div>
                        <div class="box-cmt">
                            <div class="cmt">Mời bạn bình luận và đặt câu hỏi...</div>
                            <div class="btn-cmt">Gửi</div>
                        </div>
                        <div class="content">
                            <div class="content-2">
                                <div class="name-person">Nguyễn Văn A</div>
                                <div>Sản phẩm bảo quản tủ lạnh được bao lâu?</div>
                                <div class="control-cmt-like">
                                    <div class="control">Bình luận</div>
                                    <div class="control">
                                        <img src="../asset/img/icon/like.png" alt="">
                                        Thích
                                    </div>
                                    <div class="time control">Hôm qua</div>
                                </div>
                            </div>
                            <div class="content-3">
                                <div class="box-person">
                                    <div class="name-person">Nguyễn Văn B</div>
                                    <div class="roll-person">Quản trị viên</div>
                                </div>
                                <div>
                                    Chào bạn A,<br>
                                    Sản phẩm tươi có thể bảo quản mát từ 5-7 ngày. Nên dùng sớm để giữ được đầy đủ
                                    chất dinh dưỡng của sản phẩm ạ!
                                </div>
                                <div class="control-cmt-like">
                                    <div class="control">Bình luận</div>
                                    <div class="control">
                                        <img src="../asset/img/icon/like.png" alt="">
                                        Thích
                                    </div>
                                    <div class="time control">Hôm qua</div>
                                </div>
                            </div>
                        </div>
                        <div class="content">
                            <div class="content-2">
                                <div class="name-person">Nguyễn Văn A</div>
                                <div>Sản phẩm bảo quản tủ lạnh được bao lâu?</div>
                                <div class="control-cmt-like">
                                    <div class="control">Bình luận</div>
                                    <div class="control">
                                        <img src="../asset/img/icon/like.png" alt="">
                                        Thích
                                    </div>
                                    <div class="time control">Hôm qua</div>
                                </div>
                            </div>
                            <div class="content-3">
                                <div class="box-person">
                                    <div class="name-person">Nguyễn Văn B</div>
                                    <div class="roll-person">Quản trị viên</div>
                                </div>
                                <div>
                                    Chào bạn A,<br>
                                    Sản phẩm tươi có thể bảo quản mát từ 5-7 ngày. Nên dùng sớm để giữ được đầy đủ
                                    chất dinh dưỡng của sản phẩm ạ!
                                </div>
                                <div class="control-cmt-like">
                                    <div class="control">Bình luận</div>
                                    <div class="control">
                                        <img src="../asset/img/icon/like.png" alt="">
                                        Thích
                                    </div>
                                    <div class="time control">Hôm qua</div>
                                </div>
                            </div>
                        </div>
                        <div class="control-page">
                            <div class="active">1</div>
                            <div>2</div>
                            <div>>|</div>
                        </div>
                    </div>
                    <div class="col-6 contents">
                        <div class="content-3 cmt-vote">
                            <div class="box-person">
                                <div class="name-person">Nguyễn Văn B</div>
                                <div class="vote-rate">&starf;&starf;&starf;&starf;&starf;</div>
                                <div class="buyed">&#10003; Đã mua</div>
                            </div>
                            <div>
                                Sản phẩm tươi ngon, chất lượng!!!
                            </div>
                            <div class="control-cmt-like">
                                <div class="control">Bình luận</div>
                                <div class="control">
                                    <img src="../asset/img/icon/like.png" alt="">
                                    Thích
                                </div>
                                <div class="time control">Hôm qua</div>
                            </div>
                        </div>
                        <div class="content-3 cmt-vote">
                            <div class="box-person">
                                <div class="name-person">Nguyễn Văn B</div>
                                <div class="vote-rate">&starf;&starf;&starf;&starf;&starf;</div>
                                <div class="buyed">&#10003; Đã mua</div>
                            </div>
                            <div>
                                Sản phẩm tươi ngon, chất lượng!!!
                            </div>
                            <div class="control-cmt-like">
                                <div class="control">Bình luận</div>
                                <div class="control">
                                    <img src="../asset/img/icon/like.png" alt="">
                                    Thích
                                </div>
                                <div class="time control">Hôm qua</div>
                            </div>
                        </div>
                        <div class="content-3 cmt-vote">
                            <div class="box-person">
                                <div class="name-person">Nguyễn Văn B</div>
                                <div class="vote-rate">&starf;&starf;&starf;&starf;&starf;</div>
                                <div class="buyed">&#10003; Đã mua</div>
                            </div>
                            <div>
                                Sản phẩm tươi ngon, chất lượng!!!
                            </div>
                            <div class="control-cmt-like">
                                <div class="control">Bình luận</div>
                                <div class="control">
                                    <img src="../asset/img/icon/like.png" alt="">
                                    Thích
                                </div>
                                <div class="time control">Hôm qua</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="space-2"></div>
        <section class="section-20">
            <div class="swapper-1">Sản phẩm liên quan</div>
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
                                <a href="#">Đến xem</a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div id="slide-right" class="arrow">❯</div>
        </section>
        <div class="space-2"></div>
    </div>
</div>
<?php include_once("../part/footer.php") ?>