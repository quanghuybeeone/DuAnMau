<?php include_once("../part/header.php") ?>
<?php
$username = isset($_POST["username"]) ? $_POST["username"] : "";
$password = isset($_POST["password"]) ? $_POST["password"] : "";
$conf_password = isset($_POST["conf-password"]) ? $_POST["conf-password"] : "";
$err = [];
error_reporting(4);
include_once("../lib/db.php");
$db = new database();
$conn = $db->connect();
$sql = "SELECT * from user where username = '$username' or email = '$username'";
// use exec() because no results are returned
$stmt = $conn->prepare($sql);
$stmt->execute();
$numrows = $stmt->rowCount();
// echo $numrows;

if (isset($_POST['username'])) {
    if ($username == "") {
        array_push($err, 'Vui lòng nhập username');
    }
    if ($password == "") {
        array_push($err, 'Vui lòng nhập mật khẩu');
    }
    if ($conf_password == "") {
        array_push($err, 'Vui lòng nhập xác nhận mật khẩu');
    } else {
        if ($password != $conf_password) {
            array_push($err, 'Xác nhận mật khẩu chưa chính xác');
        }
    }
    if ($numrows > 0) {
        array_push($err, 'email đã tồn tại');
    }
}


?>
<div class="container row">
    <div class="bg-login">
        <div class="space-1"></div>
        <section class="section-16">
            <div class="row">
                <div class="swapper-1 col-5"></div>
                <div class="swapper-2 col-7 col-md-12 col-sm-12">
                    <div class="content-1">
                        <a href="login.php"><span>Đăng nhập </span></a>/<a href="sign-in.php"><span class="highlight"> Đăng ký</span></a>
                    </div>
                    <form action="" method="post">
                        <div class="form-group">
                            <label>Đăng ký</label>
                        </div>
                        <div class="form-group">
                            <input type="text" name="username" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Vui lòng nhập email" title="Vui lòng nhập đúng định dạng email" value="<?php echo $username; ?>" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Phải chứa ít nhất một số và một chữ hoa và chữ thường và ít nhất 8 ký tự trở lên" placeholder="Nhập mật khẩu của bạn" value="<?php echo $password; ?>" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="conf-password" placeholder="Xác nhận mật khẩu"  value="<?php echo $conf_password; ?>"required>
                        </div>
                        <?php if (count($err) > 0) { ?>
                            <ul class="alert alert-danger">
                                <?php
                                foreach ($err as $value) {
                                ?>
                                    <li style="color: red;"><?php echo $value ?></li>
                                <?php } ?>
                            </ul>
                        <?php }  ?>
                        <?php 
                        if (count($err) == 0 && isset($_POST['username']) && $numrows == 0) {
                            $email = htmlspecialchars(addslashes(trim($email)));
                            $username = htmlspecialchars(addslashes(trim($username)));
                            $password = md5(htmlspecialchars(addslashes(trim($password))));
                            include_once("../lib/db.php");
                            $db = new database();
                            $conn = $db->connect();
                            $sql = "INSERT INTO user (username, email, mk)
                                    VALUES ('$username', '$username', '$password')";
                            // use exec() because no results are returned
                            $conn->exec($sql);
                            echo "Đã đăng ký thành công";
                            echo "<meta http-equiv='refresh' content='0;url=mail.php?email=$username'>";
                        }
                        ?>
                        <div class="form-group">
                            <input type="submit" placeholder="" value="Đăng Ký">
                        </div>
                        <div class="form-group forgot-password">
                            <span><input type="checkbox" name="" id=""> Ghi nhớ mật khẩu</span><span>Quên mật
                                khẩu</span>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="line col-5">
                                    <svg height="14" width="100%">
                                        <line x1="40%" y1="7" x2="100%" y2="7" style="stroke:rgb(0,0,0);stroke-width:2" />
                                        Sorry, your browser does not support inline SVG.
                                    </svg>
                                </div>
                                <div class="or col-2">Hoặc</div>
                                <div class="line col-5">
                                    <svg height="14" width="100%">
                                        <line x1="0" y1="7" x2="60%" y2="7" style="stroke:rgb(0,0,0);stroke-width:2" />
                                        Sorry, your browser does not support inline SVG.
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <a href=""><img src="../asset/img/icon/google.png" alt=""></a>
                            <a href=""><img src="../asset/img/icon/facebook.png" alt=""></a>
                        </div>
                        <div class="form-group">
                            Bạn chưa có tài khoản? <a href="sign-in.php"><span class="highlight">Đăng ký
                                    nhanh</span></a>.
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
<?php include_once("../part/footer.php") ?>