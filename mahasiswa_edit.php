<?php
require_once 'config/koneksi.php';
if (isset($_GET['nim'])) {

    $nim = $_GET['nim'];
    //cari di db
    $sql = mysqli_query($con, "SELECT * FROM mahasiswa WHERE nim = '$nim'");
    $data = mysqli_fetch_array($sql);
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
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            Edit Mahasiswa
                        </div>
                        <div class="card-body">
                            <form action="mahasiswa_update.php" method="POST">
                                <div class="mb-2">
                                    <label for="" class="form-label">NIM</label>
                                    <input type="text" class="form-control" name="nim" value="<?= $data['nim'] ?>" readonly>
                                </div>
                                <div class="mb-2">
                                    <label for="" class="form-label">Nama</label>
                                    <input type="text" class="form-control" name="nama" value="<?= $data['nama'] ?>">
                                </div>
                                <div class="mb-2">
                                    <label for="" class="form-label">Jurusan</label>
                                    <input type="text" class="form-control" name="jurusan" value="<?= $data['jurusan'] ?>">
                                </div>
                                <div class="mb-2">
                                    <label for="" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" name="alamat" value="<?= $data['alamat'] ?>">
                                </div>
                                <div class="mb-2">
                                    <button type="submit" name="cetak" class="btn btn-primary">Update</button>
                                    <a href="mahasiswa.php" name="cetak" class="btn btn-secondary">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <script src="js/bootstrap.bundle.min.js"></script>
    </body>

    </html>
<?php } ?>