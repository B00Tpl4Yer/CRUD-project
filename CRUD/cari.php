<?php

// Inisialisasi variabel pencarian
$cari = '';

// Memeriksa apakah form pencarian telah disubmit
if (isset($_GET['cari'])) {
    $cari = $_GET['cari'];
}

// Query untuk mencari data
$query = "SELECT * FROM datapegawai WHERE nama_pegawai LIKE '%$cari%' OR nomor_pegawai LIKE '%$cari%' OR jeniskelamin LIKE '%$cari%' OR alamat LIKE '%$cari%'";
$datas = mysqli_query($koneksi, $query);

// Menghitung jumlah data hasil pencarian
$total = mysqli_num_rows($datas);