<?php include_once("../part/header.php") ?>


<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row bg-light rounded vh-100 align-items-center justify-content-center mx-0" style="overflow-y: auto;">
        <div class="bg-light rounded vh-100 p-4">
            <h3 class="mb-4">List Quản Trị Viên</h3>
            <a href="add-administrator.php" type="submit" class="btn btn-primary">Thêm mới</a>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Username</th>
                            <th scope="col">Họ và tên</th>
                            <th scope="col">Sđt</th>
                            <th scope="col">Email</th>
                            <th scope="col">Chức vụ</th>
                            <th scope="col" colspan="2">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        include_once("../../lib/db.php");
                        $db = new database();
                        $conn = $db->connect();
                        $sql = "SELECT * FROM administrators";
                        $data = $conn->query($sql);
                        while($row=$data->fetch()){ ?>
                            <tr>
                            <th scope="row"><?php echo $row['id_admin'];?></th>
                            <td><?php echo $row['username'];?></td>
                            <td><?php echo $row['fullname'];?></td>
                            <td><?php echo $row['phone'];?></td>
                            <td><?php echo $row['email'];?></td>
                            <td><?php
                            $db1 = new database();
                            $conn1 = $db1->connect();
                            $sql1 = "SELECT * FROM `role` WHERE id_role=".$row['id_role'];
                            $data1 = $conn1->query($sql1);
                            $row1=$data1->fetch();
                            echo $row1['name_role'];
                            ?></td>
                            <td scope="col"><a href="edit.php?id=<?php echo $row['id_admin'] ?>"><button type="button" class="btn btn-primary">Sửa</button></a></td>
                            <td scope="col"><a href="delete.php?id=<?php echo $row['id_admin'] ?>"><button type="button" class="btn btn-danger">Xóa</button></a></td>
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