<?php
require_once 'config/koneksi.php';

$nim = $_POST['nim'];
$nama = $_POST['nama'];
$jurusan = $_POST['jurusan'];
$alamat = $_POST['alamat'];

//UPDATE namatable SET kolom = nilai, ..... WHERE ....
$simpan = mysqli_query($con, "UPDATE mahasiswa SET nama = '$nama', jurusan = '$jurusan', alamat = '$alamat' WHERE nim = '$nim'");

if ($simpan) {
    echo "<script>
            alert('Data berhasil diubah');
            window.location.href = 'mahasiswa.php';
    </script>";
} else {
    echo "<script>
            alert('Terjadi kesalahan');
            window.location.href = 'mahasiswa.php';
    </script>";
}
