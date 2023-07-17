<?php
include 'koneksi.php';
$id = $_GET['id'];
$query = "DELETE FROM datapegawai WHERE id='$id'";
$result = mysqli_query($koneksi, $query);

if ($result) {
    echo "<script>
        alert('Hapus Data Berhasil!');
        window.location.href = 'index.php';
    </script>";
} else {
    echo "<script>
        alert('Hapus Data Gagal!');
        window.location.href = 'index.php';
    </script>";
}
?>
