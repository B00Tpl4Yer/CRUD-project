<?php
include 'koneksi.php';

$id = $_GET['id'];

// Mendapatkan data dari form
$inNama_pegawai = $_POST['txtnama_pegawai'];
$inNomor_pegawai = $_POST['txtnomor_pegawai'];
$injenis_Kelamin = $_POST['txtjenis_Kelamin'];
$inalamat = $_POST['txtalamat'];

// Cek apakah ada file foto yang diupload
if (isset($_FILES['input-foto'])) {
    // Mendapatkan informasi file yang diupload
    $foto = $_FILES['input-foto'];
    $fotoName = $foto['name'];
    $fotoSize = $foto['size'];
    $fotoTmp = $foto['tmp_name'];
    $fotoError = $foto['error'];

    // Memeriksa apakah ada foto baru yang diupload
    if ($fotoSize > 0) {
        // Memeriksa ukuran file
        if ($fotoSize <= 20 * 1024 * 1024) { // 20 MB (dalam byte)
            // Mendapatkan ekstensi file
            $fotoExt = strtolower(pathinfo($fotoName, PATHINFO_EXTENSION));

            // Daftar ekstensi file yang diizinkan
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

            // Memeriksa apakah file yang diupload adalah gambar dengan ekstensi yang diizinkan
            if (in_array($fotoExt, $allowedExtensions)) {
                // Generate nama unik untuk file foto
                $fotoNewName = uniqid('', true) . '.' . $fotoExt;

                // Lokasi penyimpanan file foto
                $fotoDestination = '../tampilan/asset/img/' . $fotoNewName;

                // Memindahkan file foto ke lokasi penyimpanan
                if (move_uploaded_file($fotoTmp, $fotoDestination)) {
                    // Hapus foto lama dari direktori
                    $datapegawai = mysqli_query($koneksi, "SELECT * FROM datapegawai WHERE id='$id'");
                    $row = mysqli_fetch_assoc($datapegawai);
                    $oldFoto = $row['foto'];
                    if ($oldFoto) {
                        $oldFotoPath = '../tampilan/asset/img/' . $oldFoto;
                        if (file_exists($oldFotoPath)) {
                            unlink($oldFotoPath);
                        }
                    }

                    // Update data ke database
                    $queryUpdate = "UPDATE datapegawai SET nama_pegawai='$inNama_pegawai', nomor_pegawai='$inNomor_pegawai', jenisKelamin='$injenis_Kelamin', alamat='$inalamat', foto='$fotoNewName' WHERE id='$id'";
                    $update = mysqli_query($koneksi, $queryUpdate);

                    if ($update) {
                        echo "<script>
                            alert('Update Data Berhasil!');
                            document.location = 'index.php';
                        </script>";
                    } else {
                        echo "<script>
                            alert('Update Data Gagal!');
                            document.location = 'index.php';
                        </script>";
                    }
                } else {
                    echo "<script>
                        alert('Gagal mengupload file foto!');
                        document.location = 'index.php';
                    </script>";
                }
            } else {
                echo "<script>
                    alert('Tipe file foto tidak diizinkan!');
                    document.location = 'index.php';
                </script>";
            }
        } else {
            echo "<script>
                alert('Ukuran file foto terlalu besar! Maksimal 20 MB.');
                document.location = 'index.php';
            </script>";
        }
    } else {
        // Jika tidak ada foto baru yang diupload, update data tanpa mengubah foto
        $queryUpdate = "UPDATE datapegawai SET nama_pegawai='$inNama_pegawai', nomor_pegawai='$inNomor_pegawai', jenisKelamin='$injenis_Kelamin', alamat='$inalamat' WHERE id='$id'";
        $update = mysqli_query($koneksi, $queryUpdate);

        if ($update) {
            echo "<script>
                alert('Update Data Berhasil!');
                document.location = 'index.php';
            </script>";
        } else {
            echo "<script>
                alert('Update Data Gagal!');
                document.location = 'index.php';
            </script>";
        }
    }
}
?>
