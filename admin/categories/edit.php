<?php include_once("../part/header.php") ?>
<?php
include_once("../../lib/db.php");
$db = new database();
$id = $_GET['id'];
// echo $id;
$sql = "SELECT * FROM categories WHERE id=".$id;
$conn = $db->connect();
$data = $conn->query($sql);
$row=$data->fetch();
?>
<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row vh-100 bg-light rounded align-items-center justify-content-center mx-0">
        <div class="bg-light rounded h-100 p-4">
            <h3>Sửa danh mục</h3>
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="" class="form-label">Sửa tên danh mục:</label>
                    <input type="" name="category" class="form-control" id="" aria-describedby="" value="<?php echo $row['name_category']?>">
                </div>
                <button type="submit" class="btn btn-primary">Sửa</button>
            </form>

        </div>
    </div>
</div>
<!-- Blank End -->


<?php

if (isset($_POST['category'])) {
    $sql = "UPDATE categories SET `name_category`='" . $_POST['category'] . "' WHERE id=" . $id;
    //echo $sql;
    $conn = $db->connect();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    echo "<meta http-equiv='refresh' content='0;url=index.php'>";
    // header("location: index.php");
}
?>

<?php include_once("../part/footer.php") ?>