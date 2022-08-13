<?php
require_once 'config/koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];
//hash
$pass = password_hash($password, PASSWORD_DEFAULT);

if (empty($username) || empty($password)) {
    echo "<script>
                alert('Data Kosong');
                window.location.href = 'user.php';
        </script>";
} else {
    //simpan -> insert
    // INSERT into namatable VALUES (....)
    // INSERT INTO namatable (kolom,kolom....) VALUES (....)
    $simpan = mysqli_query($con, "INSERT INTO user (username, password, level) VALUES ('$username', '$pass', '$level')");

    if ($simpan) {
        echo "<script>
                    alert('Data berhasil disimpan');
                    window.location.href = 'user.php';
            </script>";
    } else {
        echo "<script>
                    alert('Terjadi kesalahan');
                    window.location.href = 'user.php';
            </script>";
    }
}
