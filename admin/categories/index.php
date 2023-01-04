<?php include_once("../part/header.php") ?>


<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row bg-light vh-100 rounded align-items-center justify-content-center mx-0" style="overflow-y: auto;">
        <div class="bg-light rounded h-100 p-4">
            <h3 class="mb-4">Thêm Danh Mục Sản Phẩm</h3>
            <form method="post">
                <div class="mb-3">
                    <label for="" class="form-label">Tạo danh mục mới:</label>
                    <input type="" name="category" class="form-control" id="" aria-describedby="">
                </div>
                <button type="submit" class="btn btn-primary">Tạo mới</button>
                <?php
                include_once("../../lib/db.php");
                $db = new database();
                $conn = $db->connect();
                if (isset($_POST['category'])) {
                    $category = $_POST['category'];
                    $sql = "INSERT INTO categories (name_category)
                    VALUES ('$category')";
                    $conn->exec($sql);
                    echo "Thêm danh mục mới thành công";
                }
                ?>
            </form>
            <h3 class="mb-4 mt-4">List Danh Mục Sản Phẩm</h3>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên danh mục</th>
                            <th scope="col">Sửa</th>
                            <th scope="col">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $sql = "SELECT * FROM categories";
                        $data = $conn->query($sql);
                        while($row=$data->fetch()){ ?>
                            <tr>
                            <th scope="row"><?php echo $row['id'];?></th>
                            <td><?php echo $row['name_category'];?></td>
                            <td scope="col"><a href="edit.php?id=<?php echo $row['id'] ?>"><button type="button" class="btn btn-primary">Sửa</button></a></td>
                            <td scope="col"><a href="delete.php?id=<?php echo $row['id'] ?>"><button type="button" class="btn btn-danger">Xóa</button></a></td>
                        </tr>
                        <?php } ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Blank End -->

<?php include_once("../part/footer.php") ?>