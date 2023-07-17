<?php
if (isset($_POST['btnregister'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validasi dan proses penyimpanan data ke database
    // ...

    // Contoh validasi sederhana
    if (empty($nama) || empty($email) || empty($password)) {
        echo "Harap lengkapi semua field!";
    } else {
        // Koneksi ke database
        $koneksi = mysqli_connect("localhost", "root", "", "tugasmid");

        // Query untuk memasukkan data ke tabel login
        $query = "INSERT INTO login (nama, email, password) VALUES ('$nama', '$email', '$password')";
        mysqli_query($koneksi, $query);

        // Cek apakah data berhasil disimpan atau tidak
        if (mysqli_affected_rows($koneksi) > 0) {
            echo "<script>
        alert('Registrasi berhasil!');
        document.location = 'tampilan.php';
        </script>"; 
            // Mengarahkan ke halaman login setelah registrasi berhasil
            exit; // Menghentikan eksekusi skrip
        } else {
            echo "Registrasi gagal!";
        }
    }
}
?>
