<?php
include_once("../part/header.php") ?>
<div class="container row">
    <div class="bg-login">
        <div class="space-1"></div>
        <section class="section-15">
            <div class="row">
                <div class="swapper-1 col-5"></div>
                <div class="swapper-2 col-7 col-md-12 col-sm-12">
                    <div class="content-1">
                        <a href="login.php"><span class="highlight">Đăng nhập </span></a>/<a href="sign-in.php"><span> Đăng ký</span></a>
                    </div>
                    <form action="" method="post">
                        <?php
                        $password = isset($_POST["password"]) ? $_POST["password"] : "";
                        $username = isset($_POST["username"]) ? $_POST["username"] : "";
                        $numrows = -1;
                        $err = [];
                        if (isset($_POST["username"])) {
                            $username = htmlspecialchars(addslashes(trim($username)));
                            $password = htmlspecialchars(addslashes(trim($password)));
                            $password = md5($password);
                            // echo $username;
                            // echo $password;
                            // echo $numrows;

                        }
                        include_once("../lib/db.php");
                        $db = new database();
                        $conn = $db->connect();
                        $sql = "select * from user where username = '$username' and mk = '$password'";
                        // use exec() because no results are returned
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $numrows = $stmt->rowCount();
                        $data = $conn->query($sql);
                        $row = $data->fetch();
                        if (isset($_POST["username"])) {
                            if ($numrows == 0) {
                                array_push($err, 'Sai mật khẩu hoặc tên đăng nhập');
                            }
                            if ($numrows == 1) {
                                $_SESSION['login']['id_user'] = $row['id_user'];
                                $_SESSION['login']['username'] = $row['username'];
                                // echo "login thanh cong";
                                echo "<meta http-equiv='refresh' content='0;url=account.php'>";
                            }
                        }
                        ?>
                        <div class="form-group">
                            <label>Đăng nhập</label>
                        </div>
                        <div class="form-group">
                            <input type="text" name="username" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Vui lòng nhập email" title="Vui lòng nhập đúng định dạng email" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Phải chứa ít nhất một số và một chữ hoa và chữ thường và ít nhất 8 ký tự trở lên" placeholder="Nhập mật khẩu của bạn" required>
                        </div>
                        <?php if (count($err) > 0) { ?>
                            <ul style="color: red;" class="alert alert-danger">
                                <?php
                                foreach ($err as $value) {
                                ?>
                                    <li><?php echo $value ?></li>
                                <?php } ?>
                            </ul>
                        <?php }  ?>

                        <div class="form-group">
                            <input type="submit" placeholder="" value="Đăng Nhập">
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
                            Bạn chưa có tài khoản? <a href="signin.php"><span class="highlight">Đăng ký
                                    nhanh</span></a>.
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
<?php include_once("../part/footer.php") ?>