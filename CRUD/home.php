<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Home</title>
  <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
  <link rel="icon" href="img" type="image/x-icon" />
  <link rel="stylesheet" href="../tampilan/asset/fontawesome/css/all.min.css" />
  <link rel="stylesheet" href="../tampilan/asset/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../tampilan/asset/css/atlantis.min.css" />
  <link rel="stylesheet" href="../tampilan/asset/css/home.css" />
</head>

<body>
  <div class="wrapper">
    <div class="main-header">
      <div class="logo-header bg-danger">
        <a class="logo">
          <h1 alt="navbar brand" class="navbar-brand mt-3 ">Admin</h1>
        </a>
        <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon">
            <i class="fas fa-bars"></i>
          </span>
        </button>
        <button class="topbar-toggler more">
          <i class="fas fa-ellipsis-v"></i>
        </button>
        <div class="nav-toggle">
          <button class="btn btn-toggle toggle-sidebar">
            <i class="fas fa-bars"></i>
          </button>
        </div>
      </div>
      <nav class="navbar navbar-header navbar-expand-lg bg-danger-gradient">
        <div class="container-fluid">
          <ul class="navbar-nav topbar-nav ms-auto align-items-center">
            <li class="nav-item dropdown hidden-caret">
              <a class="nav-link dropdown-toggle daftar-toggle" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#exampleModal">
                  <i class="fa fa-power-off"></i>
                </button>
                <span class="badge badge-danger badge-xs daftar-count"></span>
              </a>
            </li>
          </ul>
        </div>
      </nav>
    </div>


    <div class="sidebar sidebar-style-2">
      <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
          <div class="avatar-md mb-2 mt-3">
            <img src="../tampilan/asset/img/hutao.gif" class="avatar-img p-2 rounded-circle" />
          </div>
          <div class="user">
            <div class="info text-light-emphasis">
              <p>nama: <b><?php echo isset($_SESSION['nama']) ? $_SESSION['nama'] : ''; ?></b></p>
              <p class="mt--3">email:
                <b><?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?></b>
              </p>
            </div>
          </div>
          <ul class="nav nav-danger">
            <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'home.php' ? 'active' : ''; ?>">
              <a href="home.php">
                <i class="fas fa-home"></i>
                <p>Beranda</p>
              </a>
            </li>
            <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>">
              <a href="index.php">
                <i class="fas fa-folder"></i>
                <p>data CRUD</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#">
                <i class="fas fa-cog"></i>
                <p>Pengaturan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#">
                <i class="fas fa-toggle-on" id="toggle-icon" class="toggle-btn" onclick="toggleMode()"></i>
                <p>tampilan dark</p>
              </a>
            </li>
          </ul>

        </div>
      </div>
    </div>

    <div class="main-panel">
      <div class="container">
        <div class="panel-header bg-danger-gradient">
          <div class="page-inner py-5">

          </div>
        </div>
        <div class="page-inner mt--5">
          <div class="row mt--2">
            <div class="col-md-12">
              <div class="card full-height">
                <div class="card-body">
                  <div class="card-title text-center">
                    
                  </div>
                  <div class="card-category">
                    
                    <div class="title"><b>kata pengantar</b></div>
                    <p class="text-justify">
                     

                      Aplikasi yang saya buat dirancang dengan antarmuka yang intuitif dan ramah pengguna, sehingga dapat diakses oleh berbagai kalangan. Kami berusaha menyederhanakan penggunaan aplikasi ini tanpa mengorbankan fungsionalitasnya. Dalam pembuatan aplikasi ini, kami juga mempertimbangkan aspek keamanan dan privasi pengguna, sehingga pengguna dapat merasa aman dan nyaman saat menggunakan aplikasi ini.
                    </p>
                    <p class="text-justify">
                      saya berharap aplikasi sederhana ini dapat memberikan pengalaman positif kepada pengguna dan memberikan solusi yang efektif dalam kehidupan sehari-hari. Kami menyadari bahwa aplikasi ini mungkin masih memiliki keterbatasan dan kekurangan, namun kami terus berkomitmen untuk mengembangkan dan meningkatkannya di masa mendatang. Terima kasih kepada semua pihak yang telah memberikan dukungan dan kontribusi dalam pembuatan aplikasi ini.
                    </p>
                    <p class="text-justify">
                    
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">tombol keluar</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>apakah anda ingin keluar ?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">tidak</button>
            <button type="button" class="btn btn-danger"><a href="../login/tampilan.php">ya</a></button>
          </div>
        </div>
      </div>
    </div>

    <script src="../tampilan/asset/js/jquery-3.6.0.min.js"></script>
    <script src="../tampilan/asset/js/bootstrap.min.js"></script>
    <script src="../tampilan/asset/js/jquery-ui.min.js"></script>
    <script src="../tampilan/asset/js/jquery.scrollbar.min.js"></script>
    <script src="../tampilan/asset/js/atlantis.min.js"></script>
    <script src="../tampilan/asset/js/script.js"></script>
</body>

</html>