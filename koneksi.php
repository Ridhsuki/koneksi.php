<?php 

$db_host = '127.0.0.1';
$db_user = 'root';
$db_pass = '';
$db_name = 'db_php_native';

$connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if($connection) {
    // echo "konkesi berhasil!";
} else {
    echo "Koneksi gagal! : ". mysqli_connect_error();
}

?>