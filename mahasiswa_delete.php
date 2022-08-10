<?php
require_once 'config/koneksi.php';

if (isset($_GET['nim'])) {

    $nim = $_GET['nim'];
    //DELETE FROM namatable WHERE kolom = 'nilai'
    $sql = mysqli_query($con, "DELETE FROM mahasiswa WHERE nim = '$nim'");

    if ($sql) {
        echo "<script>
            alert('Data berhasil dihapus');
            window.location.href = 'mahasiswa.php';
        </script>";
    } else {
        echo "<script>
            alert('Terjadi kesalahan');
            window.location.href = 'mahasiswa.php';
        </script>";
    }
}
