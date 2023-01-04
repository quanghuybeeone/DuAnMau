<?php
// Start the session
session_start();
if (!isset($_SESSION['login'])) {
    echo "<meta http-equiv='refresh' content='0;url=login.php'>";
    exit;
}
include_once("../lib/db.php");
$db = new database();
$conn = $db->connect();
$sql = "select * from user where id_user=" . $_SESSION['login']['id_user'];
$data = $conn->query($sql);
$row = $data->fetch();
?>
<?php include_once("../part/header-account.php") ?>

<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row vh-100 bg-light rounded align-items-center justify-content-center mx-0">
        <div class="bg-light rounded h-100 p-4">
            <h3 class="mb-4" style="display: inline-block;">Thay đổi mật khẩu</h3>
            <form method="post" enctype="multipart/form-data">
                <?php 
                $password = isset($_POST["password"]) ? $_POST["password"] : "";
                $conf_password = isset($_POST["conf-password"]) ? $_POST["conf-password"] : "";
                $err = [];
                
                if (isset($_POST['password'])) {
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
                }
                if (count($err) == 0 && isset($_POST['password'])) {
                    $password = md5(htmlspecialchars(addslashes(trim($password))));
                    include_once("../lib/db.php");
                    $db = new database();
                    $conn = $db->connect();
                    $sql = "update user set mk='$password' where id_user=" . $_SESSION['login']['id_user'];
                    // use exec() because no results are returned
                    $conn->exec($sql);
                    echo "<meta http-equiv='refresh' content='0;url=account.php'>";
                }
                ?>
                <div class="mb-3">
                    <label for="" class="form-label">Mật khẩu mới:</label>
                    <input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Phải chứa ít nhất một số và một chữ hoa và chữ thường và ít nhất 8 ký tự trở lên" name="password" class="form-control" id="" aria-describedby="" placeholder="Nhập mật khẩu mới" value="">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Xác nhận mật khẩu:</label>
                    <input type="password" name="conf-password" class="form-control" id="" aria-describedby="" placeholder="Nhập xác nhận mật khẩu" value="">
                </div>
                <?php if (count($err) > 0) { ?>
                    <ul class="alert alert-danger">
                        <?php
                        foreach ($err as $value) {
                        ?>
                            <li><?php echo $value ?></li>
                        <?php } ?>
                    </ul>
                <?php }  ?>
                <button type="submit" class="btn btn-primary">Cập nhập</button>
            </form>
        </div>
    </div>
</div>
<!-- Blank End -->
<?php include_once("../part/footer-account.php") ?>