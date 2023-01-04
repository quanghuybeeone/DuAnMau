<?php include_once("../part/header.php") ?>


<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row bg-light rounded align-items-center justify-content-center mx-0">
        <div class="bg-light rounded h-100 p-4">
            <h3 class="mb-4">List Sản Phẩm</h3>
            <a href="add-prd.php" type="submit" class="btn btn-primary">Thêm mới</a>
            <?php
            include_once("../../lib/db.php");
            $db = new database();
            $conn = $db->connect();
            $sql = "SELECT * FROM categories";
            $data = $conn->query($sql);
            while ($row = $data->fetch()) { ?>
                <h5 class="mb-2 mt-4">Danh mục: <?php echo $row['name_category'] ?></h5>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="10%" scope="col">#</th>
                                <th  width="20%" scope="col">Tên sản phẩm</th>
                                <th  width="30%" scope="col">Hình ảnh</th>
                                <th  width="10%" scope="col">Giá gốc</th>
                                <th  width="10%" scope="col">Giá bán</th>
                                <th width="10%" scope="col">Sửa</th>
                                <th width="10%" scope="col">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include_once("../../lib/db.php");
                            $db1 = new database();
                            $conn1 = $db1->connect();
                            $sql1 = "SELECT * FROM products WHERE id_category=".$row['id'];
                            $data1 = $conn1->query($sql1);
                            while ($row1 = $data1->fetch()) { ?>
                                <tr>
                                    <th scope="row"><?php echo $row1['id_prd'] ?></th>
                                    <td><?php echo $row1['name_prd'] ?></td>
                                    <td><img width="30%" src="../../asset/img/upload/img_product/<?php echo $row1['img_prd_main'] ?>" alt=""></td>
                                    <td><?php echo $row1['cost'] ?> $</td>
                                    <td><?php echo $row1['price'] ?> $</td>
                                    <td scope="col"><a href="edit.php?id=<?php echo $row1['id_prd'] ?>"><button type="button" class="btn btn-primary">Sửa</button></a></td>
                                    <td scope="col"><a href="delete.php?id=<?php echo $row1['id_prd'] ?>"><button type="button" class="btn btn-danger">Xóa</button></a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- Blank End -->

<?php include_once("../part/footer.php") ?>