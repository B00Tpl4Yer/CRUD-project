<?php
// Memanggil file koneksi
require 'koneksi.php';

// Inisialisasi variabel pencarian
$cari = '';

// Memeriksa apakah form pencarian telah disubmit
if (isset($_GET['cari'])) {
    $cari = $_GET['cari'];
}

// Query untuk mencari data
$query = "SELECT * FROM datapegawai WHERE nama_pegawai LIKE '%$cari%' OR nomor_pegawai LIKE '%$cari%' OR jeniskelamin LIKE '%$cari%' OR alamat LIKE '%$cari%' ORDER BY id ASC";
$datas = mysqli_query($koneksi, $query);

// Menghitung jumlah data hasil pencarian
$total = mysqli_num_rows($datas);
?>


<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>CRUD</title>
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
                        <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?> <?php echo basename($_SERVER['PHP_SELF']) == 'form-edit.php' ? 'active' : ''; ?>">
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
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#input">
                            tambah data
                        </button>
                    </div>
                </div>
                <div class="page-inner mt--5">
                    <div class="container">
                        <form action="" method="GET" class="input-group">
                            <div class=" form-floating mb-2">
                                <input class="form-control" type="text" name="cari" placeholder="Masukkan kata kunci" value="<?php echo $cari; ?>">
                                <label>masukan kata kunci</label>
                            </div>
                            <button class="btn btn-primary " type="submit">Cari</button>
                        </form>


                        <div class="row">
                            <?php
                            while ($data = mysqli_fetch_assoc($datas)) {
                            ?>
                                <div class="col-md-4">
                                    <div class="card mb-3">
                                        <img src="../tampilan/asset/img/<?php echo $data['foto']; ?>" class="card-img-top" alt="foto" width="200" height="300">
                                        <div class="card-body">
                                            <h5 class="card-title">No: <?= $data['nomor_pegawai']; ?></h5>
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">nama_pegawai: <?= $data['nama_pegawai']; ?></li>
                                            <li class="list-group-item">jenis kelamin: <?= $data['jeniskelamin']; ?></li>
                                            <li class="list-group-item">alamat: <?= $data['alamat']; ?></li>
                                        </ul>
                                        <div class="card-body">
                                        <button class="btn btn-primary card-link" type="button" data-bs-toggle="modal" data-bs-target="#edit"><a href='form-edit.php?id=<?= $data['id']; ?>' class="text-white">edit</a></button>
                                            
                                            <button class="btn btn-danger card-link"><a href='delete.php?id=<?= $data['id']; ?>' class="text-white">hapus</a></button>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>

                        <?php if ($total == 0) : ?>

                            <script>
                                alert("Data tidak ditemukan");
                            </script>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>

        <!-- Modal tambah data -->
        <div class="modal fade" id="input" tabindex="-1" aria-labelledby="inputLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="inputLabel">masukan data</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="tambah.php" method="post" enctype="multipart/form-data" class="text-aligt-left" autocomplete="off" >
                        <div class="modal-body">

                            <div class="input-nama_pegawai form-floating" autocomplete="off" >
                                <input class="form-control" type="text" name="txtnama_pegawai" placeholder="nama pegawai">
                                <label>nama pegawai</label>
                            </div>
                            <div class="input-nomor_pegawai form-floating">
                                <input class="form-control" type="number" name="txtnomor_pegawai" placeholder="nomor pegawai">
                                <label>nomor pegawai</label>
                            </div>
                            <div class="input-jenisKelamin form-floating">
                                <select class="form-select" aria-label="Default select example" name="txtjenis_Kelamin" id="">
                                    <option selected>jenis kelamin</option>
                                    <option value="Lakilaki">laki-laki</option>
                                    <option value="Perempuan">perempuan</option>
                                </select>
                            </div>

                            <div class="input-alamat form-floating">
                                <input class="form-control" type="text" name="txtalamat" placeholder="alamat">
                                <label>alamat</label>
                            </div>

                            <div class="input-foto form-floating">
                                <input type="file" class="form-control" aria-label="file example" name="input-foto" id="input-foto">
                            </div>

                        </div>
                        <div class="modal-footer">

                            <button type="submit" name="simpan" class="btn btn-primary">simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    <!-- Modal edit -->
    <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="editlabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="update.php?id=<?= $row['id']; ?>" method="post" enctype="multipart/form-data">
                        <div class="input-nama_pegawai">
                            <label for="">Nama_Pegawai</label>
                            <input type="text" name="txtnama_pegawai" value="<?= $row['nama_pegawai']; ?>">
                        </div>

                        <div class="input-nomor_pegawai">
                            <label for="">Nomor_Pegawai</label>
                            <input type="number" name="txtnomor_pegawai" value="<?= $row['nomor_pegawai']; ?>">
                        </div>

                        <div class="input-jenisKelamin">
                            <label for="">jenisKelamin</label>
                            <select name="txtjenis_Kelamin" id="">
                                <option value="Laki-laki" <?= active_option('Laki-laki', $row['jeniskelamin']); ?>>Laki-laki</option>
                                <option value="Perempuan" <?= active_option('Perempuan', $row['jeniskelamin']); ?>>Perempuan</option>
                            </select>
                        </div>

                        <div class="input-alamat">
                            <label for="">Alamat</label>
                            <input type="text" name="txtalamat" value="<?= $row['alamat']; ?>">
                        </div>

                        <div class="input-foto">
                            <label for="input-foto">Foto</label>
                            <input type="file" name="input-foto" id="input-foto">
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="btnupdate">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

        <!-- Modal logout -->
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