<?php 
if (!session_id()) session_start();

if (!isset($_SESSION["name"])) {
    header("Location:".BASEURL."home/login");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?=$data['title']?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= BASEURL ?>img/icon.png" rel="icon">
  <link href="<?= BASEURL ?>img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">
 

  <!-- Vendor CSS Files -->
  <link href="<?= BASEURL ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= BASEURL ?>vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= BASEURL ?>vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= BASEURL ?>vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="<?= BASEURL ?>vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="<?= BASEURL ?>vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?= BASEURL ?>vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= BASEURL ?>css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="  https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css
">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css
">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
    a {
  color: #4154f1;
  text-decoration: none;
}

a:hover {
  color: #717ff5;
  text-decoration: none;

}
</style>





</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="<?=BASEURL?>" class="logo d-flex align-items-center text-decoration-none">
        <img src="<?=BASEURL?>img/logoapotek.png" alt="Ini Logo">
        <span class="d-none d-lg-block">Havie Farma</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-danger badge-number"><?=count($data['emptyStock'])?></span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
          <?php foreach($data['emptyStock'] as $row) : ?>

            <li>
              <div class="col-lg-10">
                <div class="card ms-4">
                  <div class="card-body">
                    <span class = "text-danger"><?=$row['name_tmp']?></span>
                  </div>
                </div>
              </div>
            </li>

          <?php endforeach?>

          </ul>
          <!-- End Notification Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?=$_SESSION['name']?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?=$_SESSION['name']?></h6>
              <span></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?=BASEURL?>home/myProfile/<?=$_SESSION['id_user']?>">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?=BASEURL?>home/logout">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <?php include 'sidebar.php'; 
  
  ?>