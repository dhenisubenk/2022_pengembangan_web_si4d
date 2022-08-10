<?php
require_once 'config/koneksi.php';

$nim = $_POST['nim'];
$nama = $_POST['nama'];
$jurusan = $_POST['jurusan'];
$alamat = $_POST['alamat'];

//simpan -> insert
// INSERT into namatable VALUES (....)
// INSERT INTO namatable (kolom,kolom....) VALUES (....)
$simpan = mysqli_query($con, "INSERT INTO mahasiswa VALUES ('$nim', '$nama', '$jurusan', '$alamat')");

if ($simpan) {
    echo "<script>
            alert('Data berhasil disimpan');
            window.location.href = 'mahasiswa.php';
    </script>";
} else {
    echo "<script>
            alert('Terjadi kesalahan');
            window.location.href = 'mahasiswa.php';
    </script>";
}
