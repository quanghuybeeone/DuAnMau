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
    <div class="row bg-light rounded align-items-center justify-content-center mx-0">
        <div class="bg-light rounded h-100 p-4">
            <h3 class="mb-4" style="display: inline-block;">Thông tin tài khoản</h3>
            <a href="update-account.php" type="submit" class="btn btn-primary m-3">Cập nhật</a>
            <div class="owl-carousel testimonial-carousel">
                <div class="testimonial-item text-center">
                    <img class="img-fluid rounded-circle mx-auto mb-4" src="<?php echo $row['avatar'] == "" ? "../asset/img/avatar.jpeg" : "../asset/img/upload/avatar_user/".$row['avatar']; ?>" style="width: 100px; height: 100px;">
                    <h5 class="mb-1"><?php echo $row['username'] ?></h5>
                    <p>Tài khoản thành viên</p>
                    <p class="mb-3">Xin chào <?php echo $row['fullname']; ?></p>
                </div>
            </div>
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td width="25%">
                            <h6 for="" class="form-label">Họ và tên:</h6>
                        </td>
                        <td><?php echo $row['fullname'] == "" ? "Cập nhât ngay" : $row['fullname']; ?></td>
                    </tr>
                    <tr>
                        <td>
                            <h6 for="" class="form-label">Email:</h6>
                        </td>
                        <td><?php echo $row['email'] == "" ? "Cập nhât ngay" : $row['email']; ?></td>
                    </tr>
                    <tr>
                        <td>
                            <h6 for="" class="form-label">Sdt:</h6>
                        </td>
                        <td><?php echo $row['phone'] == "" ? "Cập nhât ngay" : $row['phone']; ?></td>
                    </tr>
                    <tr>
                        <td>
                            <h6 for="" class="form-label">Tên đăng nhập:</h6>
                        </td>
                        <td><?php echo $row['username']; ?></td>
                    </tr>
                    <tr>
                        <td>
                            <h6 for="" class="form-label">Mật khẩu:</h6>
                        </td>
                        <td>****************** <a href="update-password.php" type="submit" class="btn btn-primary">Thay đổi mật khẩu</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Blank End -->
<?php include_once("../part/footer-account.php") ?>