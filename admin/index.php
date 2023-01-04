<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Organic Farm - Admin</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="asset_admin/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/../asset_admin/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/assets/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="asset_admin/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="asset_admin/css/style.css" rel="stylesheet">

    <!-- Logo Browser -->
    <link rel="icon" type="image/png" href="../asset/img/logo/image-3.png" /> 
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <!-- <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> -->
        <!-- Spinner End -->

        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="#" class="">
                                <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Admin</h3>
                            </a>
                            <h5>Đăng Nhập</h5>
                        </div>
                        
                        <form action="" method="post">
                        
                        
                        <div class="form-floating mb-3">
                            <input name="username" type="text" class="form-control" placeholder="Username">
                            <label for="floatingInput">Username</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input name="password" type="password" class="form-control" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <?php
                        // Start the session
                        session_start();
                        $password = isset($_POST["password"]) ? $_POST["password"] : "";
                        $username = isset($_POST["username"]) ? $_POST["username"] : "";
                        $numrows = -1;
                        if (isset($_POST["username"])) {
                            $username = htmlspecialchars(addslashes(trim($username)));
                            $password = htmlspecialchars(addslashes(trim($password)));
                            $password = md5($password);
                        }
                        include_once("../lib/db.php");
                        $db = new database();
                        $conn = $db->connect();
                        $sql = "select * from administrators where username = '$username' and mk = '$password'";
                        // use exec() because no results are returned
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $numrows = $stmt->rowCount();
                        $data = $conn->query($sql);
                        $row = $data->fetch();
                        if ($numrows == 1) {
                            $_SESSION['login_admin']['id_admin'] = $row['id_admin'];
                            $_SESSION['login_admin']['username'] = $row['username'];
                            echo "<meta http-equiv='refresh' content='0;url=dashboard/index.php'>";
                        }
                        ?>
                        
                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign In</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>