<?php

include('koneksi.php');

$full_name = $_POST['full_name'];
$username = $_POST['username'];
$password = md5($_POST['password']);

$query = "INSERT INTO tb_users (full_name, username, password) VALUES ('$full_name', '$username', '$password')";

if ($connection->query($query)) {
    echo "success";
} else {
    echo "error";
}

?>