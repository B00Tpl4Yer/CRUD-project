<?php
session_start();

if (isset($_POST['btnlogin'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validasi dan proses login
    // ...

    // Contoh validasi sederhana
    if (empty($email) || empty($password)) {
        echo "Harap masukkan email dan password!";
    } else {
        // Koneksi ke database
        $koneksi = mysqli_connect("localhost", "root", "", "tugasmid");

        // Query untuk memeriksa kecocokan email dan password
        $query = "SELECT * FROM login WHERE email='$email' AND password='$password'";
        $result = mysqli_query($koneksi, $query);

        // Cek apakah ada data yang cocok
        if (mysqli_num_rows($result) > 0) {
            // Ambil data akun dari database
            $row = mysqli_fetch_assoc($result);

            // Simpan nama dan email ke dalam session
            $_SESSION['nama'] = $row['nama'];
            $_SESSION['email'] = $row['email'];
            echo "<script>
                    alert('login berhasil!');
                    document.location = '../CRUD/home.php';
                </script>"; // Mengarahkan ke halaman home setelah login berhasil
            exit; // Menghentikan eksekusi skrip
        } else {
            echo "<script>
        alert('email atau password salahl!');
           document.location = 'tampilan.php';
        </script>";
        }
    }
}