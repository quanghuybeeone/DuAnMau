<!DOCTYPE html>
<html lang="vn">

<head>
    <meta charset="utf-8">
    <title>Organic Farm - Admin</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="../asset_admin/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../asset_admin/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../asset_admin/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../asset_admin/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../asset_admin/css/style.css" rel="stylesheet">

    <!-- Logo Browser -->
    <link rel="icon" type="image/png" href="../../asset/img/logo/image-3.png" /> 
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <?php
        // Start the session
        session_start();
        // echo $_SESSION['login_admin']['id_admin'];
        // echo $_SESSION['login_admin']['username'];
        if(!isset($_SESSION['login_admin'])){
            echo "<meta http-equiv='refresh' content='0;url=../index.php'>";
            exit;
        }
        include_once("../../lib/db.php");
        $db = new database();
        $conn = $db->connect();
        $sql = "select * from administrators where id_admin=" . $_SESSION['login_admin']['id_admin'];
        $data = $conn->query($sql);
        $row = $data->fetch();
        // echo $row['avatar'];
        // echo $row['username'];
        ?>
        <?php include_once("../part/sidebar.php") ?>

        <!-- Content Start -->
        <div class="content">
            <?php include_once("../part/topbar.php") ?>