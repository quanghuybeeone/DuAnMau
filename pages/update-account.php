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
            <h3 class="mb-4" style="display: inline-block;">Cập nhật thông tin tài khoản</h3>
            <form method="post" enctype="multipart/form-data">
                <?php 
                $fullname = isset($_POST["fullname"]) ? $_POST["fullname"] : "";
                $phone = isset($_POST["phone"]) ? $_POST["phone"] : "";
                $image = isset($_FILES["image"]) ? $_FILES["image"] : "";
                $err = [];
                
                if (isset($_POST['fullname'])) {
                    if ($_FILES['image']['error'] > 0) {
                        array_push($err, 'File Upload Bị Lỗi');
                    } else {
                        // Upload file
                        $file_name = $_FILES['image']['name'];
                        $file_size = $_FILES['image']['size'];
                        $file_path = $_FILES['image']['tmp_name'];
                        $file_type = $_FILES['image']['type'];
                        if (strlen(strstr($file_type, 'image')) > 0) {
                            if ((round($file_size / 1024, 0)) <= 10240) {
                                $now = DateTime::createFromFormat('U.u', microtime(true));
                                $result = $now->format("m_d_Y_H_i_s_u");
                                $krr    = explode('_', $result);
                                $result = implode("", $krr);
                                // echo $result;
                                move_uploaded_file($_FILES['image']['tmp_name'], '../asset/img/upload/avatar_user/' . $result . $file_name);
                                $image = $result . $file_name;
                            } else {
                                array_push($err, 'Vui lòng nhập file < 10MB');
                            }
                        } else {
                            array_push($err, 'Vui lòng nhập file định dạng là ảnh');
                        }
                
                        // echo $file_name."<br>";
                        // echo (round($file_size / 1024, 0)) . "KB<br>";
                        // echo $file_path."<br>";
                        // echo $file_type . "<br>";
                        // echo 'File Uploaded';
                    }
                }
                if (count($err) == 0 && isset($_POST['fullname'])) {
                    $fullname = htmlspecialchars(addslashes(trim($fullname)));
                    $phone = htmlspecialchars(addslashes(trim($phone)));
                    $image = htmlspecialchars(addslashes(trim($image)));
                    include_once("../lib/db.php");
                    $db = new database();
                    $conn = $db->connect();
                    $sql = "update user set fullname='$fullname',phone='$phone',avatar='$image' where id_user=" . $_SESSION['login']['id_user'];
                    // use exec() because no results are returned
                    $conn->exec($sql);
                    echo "<meta http-equiv='refresh' content='0;url=account.php'>";
                }
                ?>
                <div class="mb-3">
                    <label for="" class="form-label">Họ và tên:</label>
                    <input type="" name="fullname" class="form-control" id="" aria-describedby="" placeholder="Nhập họ và tên" value="<?php echo $row['fullname'] == "" ? "" : $row['fullname']; ?>">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Sdt:</label>
                    <input type="" name="phone" class="form-control" id="" aria-describedby="" placeholder="Nhập Sdt" value="<?php echo $row['phone'] == "" ? "" : $row['phone']; ?>">
                </div>
                <div class=" mb-3">
                    <label for="" class="form-label">Hình avatar:</label>
                    <input type="file" class="form-control" name="image"  id="formFile">
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