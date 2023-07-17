<?php
$server = 'localhost';
$user = 'root';
$password ='';
$dbName = 'tugasmid';

$koneksi = mysqli_connect($server, $user, $password, $dbName) or die(mysqli_error($koneksi));