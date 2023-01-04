<?php include_once("../part/header.php") ?>
<?php

include_once("../../lib/db.php");
$db1 = new database();
$id = $_GET['id'];
// echo $id;
$sql1 = "SELECT * FROM administrators WHERE id_admin=".$id;
$conn1 = $db1->connect();
$data1 = $conn1->query($sql1);
$row1=$data1->fetch();


$username = isset($_POST["username"]) ? $_POST["username"] : "";
$fullname = isset($_POST["fullname"]) ? $_POST["fullname"] : "";
$phone = isset($_POST["phone"]) ? $_POST["phone"] : "";
$email = isset($_POST["email"]) ? $_POST["email"] : "";
$image = isset($_FILES["image"]) ? $_FILES["image"] : "";
$password = isset($_POST["password"]) ? $_POST["password"] : "";
$conf_password = isset($_POST["conf-password"]) ? $_POST["conf-password"] : "";
$id_role = isset($_POST["id_role"]) ? $_POST["id_role"] : "";
$err = [];

include_once("../../lib/db.php");
$db = new database();
$conn = $db->connect();
$sql = "SELECT * from administrators where username = '$username' or email = '$email' or phone ='$phone'";
// use exec() because no results are returned
$stmt= $conn -> prepare($sql);
$stmt->execute();
$numrows = $stmt->rowCount();
// echo $numrows;

if (isset($_POST['username']) || isset($_POST['fullname'])) {
    if ($fullname == "") {
        array_push($err, 'Vui lòng nhập Họ và tên');
    }
    if ($email == "") {
        array_push($err, 'Vui lòng nhập Email');
    }
    if ($phone == "") {
        array_push($err, 'Vui lòng nhập Số điện thoại');
    }
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
    if ($numrows > 1) {
        array_push($err, 'username hoặc email hoặc số điện thoại đã tồn tại');
    }
    
    
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
                move_uploaded_file($_FILES['image']['tmp_name'], '../../asset/img/upload/avatar_admin/' . $result . $file_name);
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

if (count($err) == 0 && isset($_POST['fullname']) && $numrows == 1) {
    $fullname = htmlspecialchars(addslashes(trim($fullname)));
    $email = htmlspecialchars(addslashes(trim($email)));
    $phone = htmlspecialchars(addslashes(trim($phone)));
    $username = htmlspecialchars(addslashes(trim($username)));
    $password = md5(htmlspecialchars(addslashes(trim($password))));
    $id_role = htmlspecialchars(addslashes(trim($id_role)));
    $image = htmlspecialchars(addslashes(trim($image)));
    include_once("../../lib/db.php");
    $db = new database();
    $conn = $db->connect();
    $sql = "update administrators set fullname='$fullname',email='$email',phone='$phone',username='$username',mk='$password',id_role='$id_role',avatar='$image' where id_admin=" . $id;
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "<meta http-equiv='refresh' content='0;url=index.php'>";
}
?>

<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row vh-30 bg-light rounded align-items-center justify-content-center mx-0">
        <div class="bg-light rounded h-100 p-4">
            <h3 class="mb-4">Thay Đổi Thông Tin Quản Trị Viên</h3>
            <form method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="" class="form-label">Họ và tên:</label>
                    <input type="" name="fullname" class="form-control" id="" aria-describedby="" placeholder="Nhập họ và tên" value="<?php echo $row1['fullname']; ?>">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Email:</label>
                    <input type="" name="email" class="form-control" id="" aria-describedby="" placeholder="Nhập Email" value="<?php echo $row1['email']; ?>">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Sdt:</label>
                    <input type="" name="phone" class="form-control" id="" aria-describedby="" placeholder="Nhập Sdt" value="<?php echo $row1['phone']; ?>">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Tên đăng nhập:</label>
                    <input type="" name="username" class="form-control" id="" aria-describedby="" placeholder="Nhập username" value="<?php echo $row1['username']; ?>">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Mật khẩu:</label>
                    <input type="password" name="password" class="form-control" id="" aria-describedby="" placeholder="Nhập mật khẩu" value="<?php echo $row1['mk']; ?>">
                </div>
                <div class=" mb-3">
                    <label for="" class="form-label">Xác nhận mật khẩu:</label>
                    <input type="password" name="conf-password" class="form-control" id="" aria-describedby="" placeholder="Nhập lại mật khẩu" value="<?php echo $row1['mk']; ?>">
                </div>
                <div class=" mb-3">
                    <label for="" class="form-label">Hình avatar:</label>
                    <input type="file" class="form-control" name="image"  id="formFile">
                </div>
                
                <div class="mb-3">
                    <label for="" class="form-label">Quyền hạn:</label>
                    <select name="id_role" class="form-select mb-3" aria-label="Default select example">
                        <?php 
                        include_once("../../lib/db.php");
                        $db = new database();
                        $conn = $db->connect();
                        $sql = "SELECT * FROM role";
                        $data = $conn->query($sql);
                        while($row=$data->fetch()){ ?>
                            <option value="<?php echo $row['id_role'] ?>" <?php echo $row1['id_role']==$row['id_role']? "selected" : "" ?>><?php echo $row['name_role'];?></option>
                        <?php } ?>
                    </select>
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

<?php include_once("../part/footer.php") ?>