<?php require_once 'config/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body {
            background-color: #eee;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <div class="card-header">
                        Form Nilai
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formMhs">
                            Tambah Mahasiswa
                        </button>
                        <table class="table table-bordered mt-3">
                            <thead>
                                <tr>
                                    <th>NIM</th>
                                    <th>NAMA</th>
                                    <th>JURUSAN</th>
                                    <th>ALAMAT</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //SELECT * FROM namtabel
                                // DELETE -> GET NIM -> QUERY DELETE
                                // EDIT -> GET NIM -> CARI DI DB -> FORM -> UPDATE
                                $sql = mysqli_query($con, "SELECT * FROM mahasiswa");
                                while ($row = mysqli_fetch_array($sql)) {
                                    echo "<tr>
                                            <td>$row[nim]</td>
                                            <td>$row[nama]</td>
                                            <td>$row[jurusan]</td>
                                            <td>$row[alamat]</td>
                                            <td>
                                                <a href='mahasiswa_edit.php?nim=$row[nim]' class='btn btn-warning btn-sm'>Edit</a>
                                                <a href='mahasiswa_delete.php?nim=$row[nim]' onclick=\"return confirm('Hapus Data?')\" class='btn btn-danger btn-sm'>Delete</a>
                                            </td>
                                    </tr>";
                                }

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="formMhs" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Mahasiswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="mahasiswa_save.php" method="POST">
                        <div class="mb-2">
                            <label for="" class="form-label">NIM</label>
                            <input type="text" class="form-control" name="nim">
                        </div>
                        <div class="mb-2">
                            <label for="" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama">
                        </div>
                        <div class="mb-2">
                            <label for="" class="form-label">Jurusan</label>
                            <select name="jurusan" class="form-select" id="">
                                <option>Sistem Informasi</option>
                                <option>Teknik Informatika</option>
                                <option>Manajemen Informatika</option>
                                <option>Komputerisasi Akuntansi</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="" class="form-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat">
                        </div>
                        <div class="mb-2">
                            <button type="submit" name="cetak" class="btn btn-primary">Simpan</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>