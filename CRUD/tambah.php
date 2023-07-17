<?php

require 'koneksi.php';

//cek apakah tombol simpan sudah di klik atau belum
if (isset($_POST["simpan"])) {

    // deklarasi variabel untuk menyimpan inputan yang ada di form
    $inNama_pegawai = $_POST['txtnama_pegawai'];
    $inNomor_pegawai = $_POST['txtnomor_pegawai'];
    $injenis_Kelamin = $_POST['txtjenis_Kelamin'];
    $inalamat = $_POST['txtalamat'];

    // Cek apakah ada file yang diupload
    if (isset($_FILES['input-foto'])) {
        // Mendapatkan informasi file yang diupload
        $foto = $_FILES['input-foto'];
        $fotoName = $foto['name'];
        $fotoSize = $foto['size'];
        $fotoTmp = $foto['tmp_name'];
        $fotoError = $foto['error'];

        // Mendapatkan ekstensi file
        $fotoExt = strtolower(pathinfo($fotoName, PATHINFO_EXTENSION));

        // Daftar ekstensi file yang diizinkan
        $allowedExtensions = ['jpg', 'jpeg', 'png','gif'];

        // Memeriksa apakah file yang diupload adalah gambar dengan ekstensi yang diizinkan
        if (in_array($fotoExt, $allowedExtensions)) {
            // Memeriksa ukuran file
            if ($fotoSize <= 20 * 1024 * 1024) { // 20 MB (dalam byte)
                // Generate nama unik untuk file foto
                $fotoNewName = uniqid('', true) . '.' . $fotoExt;

                // Lokasi penyimpanan file foto
                $fotoDestination = '../tampilan/asset/img/' . $fotoNewName;

                // Memindahkan file foto ke lokasi penyimpanan
                if (move_uploaded_file($fotoTmp, $fotoDestination)) {
                    // File foto berhasil diupload, simpan informasi ke database
                    $querySimpan = "INSERT INTO datapegawai (nama_pegawai, nomor_pegawai, jenisKelamin, alamat, foto) VALUES ('$inNama_pegawai', '$inNomor_pegawai', '$injenis_Kelamin', '$inalamat', '$fotoNewName')";
                    $simpan = mysqli_query($koneksi, $querySimpan);

                    if ($simpan) {
                        echo "<script>
                            alert('Simpan Data Berhasil!');
                            document.location = 'index.php';
                        </script>";
                    } else {
                        echo "<script>
                            alert('Simpan Data Gagal!');
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
                    alert('Ukuran file foto terlalu besar! Maksimal 20 MB.');
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
            alert('Foto tidak ditemukan!');
            document.location = 'index.php';
        </script>";
    }
}

?>

