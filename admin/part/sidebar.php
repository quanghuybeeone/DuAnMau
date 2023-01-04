<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="../dashboard/index.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>Organic Farm</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="../../asset/img/upload/avatar_admin/<?php echo $row['avatar'] ?>" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?php echo $row['username'] ?></h6>
                        <?php 
                        include_once("../../lib/db.php");
                        $db1 = new database();
                        $conn1 = $db1->connect();
                        $sql1 = "select * from role where id_role=" . $row['id_role'];
                        $data1 = $conn1->query($sql1);
                        $row1 = $data1->fetch();
                        ?>
                        <span><?php echo $row1['name_role'] ?></span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="../dashboard/index.php" class="nav-item nav-link"><i class="fa fa-desktop me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa fa-cube me-2"></i>Sản phẩm</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <?php if($row['id_role']==1){ ?>
                            <a href="../categories/" class="dropdown-item">Danh mục sản phẩm</a>
                            <?php } ?>
                            <a href="../product/add-prd.php" class="dropdown-item">Thêm mới sản phẩm</a>
                            <a href="../product/" class="dropdown-item">Danh sách sản phẩm</a>
                            
                        </div>
                    </div>

                    <?php if($row['id_role']==1){ ?>
                        <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa fa-users me-2"></i>Quản trị viên</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="../administrators/add-administrator.php" class="dropdown-item">Thêm mới quản trị viên</a>
                            <a href="../administrators/" class="dropdown-item">Danh sách quản trị viên</a>
                        </div>
                    </div>
                    <?php } ?>
                    
                    <a href="../../pages/index.php" class="nav-item nav-link"><i class="fa fa-home me-2"></i>Trang Chủ</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->