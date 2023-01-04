<?php include_once("../part/header.php") ?>
<?php
$name_prd = isset($_POST["name_prd"]) ? $_POST["name_prd"] : "";
$image = isset($_FILES["image"]) ? $_FILES["image"] : "";
$img_prd_1 = isset($_FILES["image"]) ? $_FILES["image"] : "";
$img_prd_2 = isset($_FILES["image"]) ? $_FILES["image"] : "";
$img_prd_3 = isset($_FILES["image"]) ? $_FILES["image"] : "";
$id_category = isset($_POST["id_category"]) ? $_POST["id_category"] : "";
$detail_1 = isset($_POST["detail_1"]) ? $_POST["detail_1"] : "";
$detail_2 = isset($_POST["detail_2"]) ? $_POST["detail_2"] : "";
$cost = isset($_POST["cost"]) ? $_POST["cost"] : "";
$price = isset($_POST["price"]) ? $_POST["price"] : "";
$err = [];
include_once("../../lib/db.php");
$db = new database();
$conn = $db->connect();
$sql = "SELECT * from products where name_prd = '$name_prd'";
// use exec() because no results are returned
$stmt = $conn->prepare($sql);
$stmt->execute();
$numrows = $stmt->rowCount();
// echo $numrows;

if (isset($_POST['name_prd'])) {
    if ($name_prd == "") {
        array_push($err, 'Vui lòng nhập tên sản phẩm');
    }
    if ($detail_1 == "") {
        array_push($err, 'Vui lòng nhập mô tả 1');
    }
    if ($detail_2 == "") {
        array_push($err, 'Vui lòng nhập mô tả 2');
    }
    if ($price == "") {
        array_push($err, 'Vui lòng nhập giá bán');
    }
    if ($numrows > 0) {
        array_push($err, 'sản phẩm này đã có trên web');
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
                move_uploaded_file($_FILES['image']['tmp_name'], '../../asset/img/upload/img_product/' . $result . $file_name);
                $image = $result . $file_name;
            } else {
                array_push($err, 'Vui lòng nhập file ảnh chính < 10MB');
            }
        } else {
            array_push($err, 'Vui lòng nhập file ảnh chính định dạng là ảnh');
        }

        // echo "<br>";
        // echo $file_name."<br>";
        // echo (round($file_size / 1024, 0)) . "KB<br>";
        // echo $file_path."<br>";
        // echo $file_type . "<br>";
        // echo 'File Uploaded';
    }
}

if (count($err) == 0 && isset($_POST['name_prd']) && $numrows == 0) {
    $name_prd = htmlspecialchars(addslashes(trim($name_prd)));
    $image = htmlspecialchars(addslashes(trim($image)));
    $img_prd_1 = $image;
    $img_prd_2 = $image;
    $img_prd_3 = $image;
    $id_category = htmlspecialchars(addslashes(trim($id_category)));
    $detail_1 = htmlspecialchars(addslashes(trim($detail_1)));
    $detail_2 = htmlspecialchars(addslashes(trim($detail_2)));
    $cost = htmlspecialchars(addslashes(trim($cost)));
    $price = htmlspecialchars(addslashes(trim($price)));
    include_once("../../lib/db.php");
    $db = new database();
    $conn = $db->connect();
    $sql = "INSERT INTO products (name_prd, img_prd_main, img_prd_1, img_prd_2, img_prd_3, id_category, detail_1, detail_2, cost, price)
            VALUES ('$name_prd', '$image', '$img_prd_1', '$img_prd_2', '$img_prd_3', '$id_category', '$detail_1', '$detail_2', '$cost', '$price')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "<meta http-equiv='refresh' content='0;url=index.php'>";
}
?>

<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row vh-30 bg-light rounded align-items-center justify-content-center mx-0">
        <div class="bg-light rounded h-100 p-4">
            <h3 class="mb-4">Thêm Mới Sản Phẩm</h3>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="" class="form-label">Tên sản phẩm:</label>
                    <input type="text" name="name_prd" class="form-control" id="" aria-describedby="" value="<?php echo $name_prd ?>">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Hình chính sản phẩm:</label>
                    <input type="file" class="form-control" name="image" id="">
                </div>
                <!-- <div class="mb-3">
                    <label for="" class="form-label">Hình phụ 1:</label>
                    <input name="img_prd_1" class="form-control" type="file" id="formFileMultiple" multiple="">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Hình phụ 2:</label>
                    <input name="img_prd_2" class="form-control" type="file" id="formFileMultiple" multiple="">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Hình phụ 3:</label>
                    <input name="img_prd_3" class="form-control" type="file" id="formFileMultiple" multiple="">
                </div> -->
                <div class="mb-3">
                    <label for="" class="form-label">Danh mục sản phẩm:</label>
                    <select name="id_category" class="form-select mb-3" aria-label="Default select example">
                        <?php
                        include_once("../../lib/db.php");
                        $db = new database();
                        $conn = $db->connect();
                        $sql = "SELECT * FROM categories";
                        $data = $conn->query($sql);
                        while ($row = $data->fetch()) { ?>
                            <option value="<?php echo $row['id'] ?>"><?php echo $row['name_category']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Mô tả chi tiết 1</label>
                    <textarea name="detail_1" class="form-control" id="" aria-describedby="" cols="30" rows="5" value="<?php echo $detail_1 ?>"></textarea>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Mô tả chi tiết 2</label>
                    <textarea name="detail_2" class="form-control" id="" aria-describedby="" cols="30" rows="5" value="<?php echo $detail_2 ?>"></textarea>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Giá gốc:</label>
                    <input name="cost" type="" class="form-control" id="" aria-describedby="" value="<?php echo $cost ?>">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Giá bán:</label>
                    <input name="price" type="" class="form-control" id="" aria-describedby="" value="<?php echo $price ?>">
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
                <button type="submit" class="btn btn-primary">Tạo mới</button>
            </form>
        </div>

    </div>
</div>
<!-- Blank End -->

<?php include_once("../part/footer.php") ?>