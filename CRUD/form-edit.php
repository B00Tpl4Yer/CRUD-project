<?php
include 'koneksi.php';

// Memeriksa apakah nilai ID sudah ada di parameter GET
if (!isset($_GET['id'])) {
    // Jika tidak ada, tampilkan pesan error
    echo "Data tidak ditemukan!";
    exit; // Hentikan eksekusi script lebih lanjut
}

// Ambil nilai ID dari parameter GET
$id = $_GET['id'];

// Query data pegawai berdasarkan ID
$datapegawai = mysqli_query($koneksi, "SELECT * FROM datapegawai WHERE id='$id'");
$row = mysqli_fetch_assoc($datapegawai);

// Memeriksa apakah data ditemukan atau tidak
if (!$row) {
    // Tindakan jika data tidak ditemukan, misalnya tampilkan pesan error
    echo "Data tidak ditemukan!";
    exit; // Hentikan eksekusi script lebih lanjut
}

// Fungsi untuk mengatur opsi aktif pada select
function active_option($value, $input)
{
    // Apabila value dari option sama dengan input
    $result = $value == $input ? 'selected' : '';
    return $result;
}

// Panggil file tampilan HTML
include 'index.php';
?>
