<?php
require_once 'config/koneksi.php';

$nim = $_POST['nim'];
$nama = $_POST['nama'];
$jurusan = $_POST['jurusan'];
$alamat = $_POST['alamat'];

//file
//var_dump($_FILES);
$file_name = $_FILES['foto']['name'];    //gambar.PNG
$file_tmp = $_FILES['foto']['tmp_name'];
$file_type = $_FILES['foto']['type'];
$file_size = $_FILES['foto']['size'];

//get file
$step1 = strtolower($file_name); //gambar.png
$step2 = explode(".", $step1); //['gambar','png']
$tipe = end($step2);

if ($tipe != "png" && $tipe != "jpg" && $tipe != "jpeg") {
    echo "<script>
        alert('File tidak support');
        window.location.href = 'mahasiswa.php';
    </script>";
} elseif ($file_size > 2000000) {
    echo "<script>
            alert('Ukuran File tidak boleh > 2mb');
            window.location.href = 'mahasiswa.php';
    </script>";
} else {

    //simpan -> insert
    // INSERT into namatable VALUES (....)
    // INSERT INTO namatable (kolom,kolom....) VALUES (....)
    $simpan = mysqli_query($con, "INSERT INTO mahasiswa VALUES ('$nim', '$nama', '$jurusan', '$alamat', '$file_name')");

    if ($simpan) {
        move_uploaded_file($file_tmp, "img/" . $file_name);
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
}
