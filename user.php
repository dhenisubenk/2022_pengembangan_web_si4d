<?php
session_start();
require_once 'config/koneksi.php';
require_once 'config/session.php';

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
    <?php require_once 'config/menu.php'; ?>
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <div class="card-header">
                        Data User
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formMhs">
                            Tambah User
                        </button>
                        <table class="table table-bordered mt-3">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Usernmae</th>
                                    <th>Role</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //SELECT * FROM namtabel
                                // DELETE -> GET NIM -> QUERY DELETE
                                // EDIT -> GET NIM -> CARI DI DB -> FORM -> UPDATE
                                $sql = mysqli_query($con, "SELECT * FROM user");
                                $no = 1;
                                while ($row = mysqli_fetch_array($sql)) {
                                    echo "<tr>
                                            <td>$no</td>
                                            <td>$row[username]</td>
                                            <td>$row[level]</td>
                                            <td>
                                                <a href='' class='btn btn-warning btn-sm'>Edit</a>
                                                <a href='' onclick=\"return confirm('Hapus Data?')\" class='btn btn-danger btn-sm'>Delete</a>
                                            </td>
                                    </tr>";
                                    $no++;
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
                    <h5 class="modal-title" id="exampleModalLabel">Form User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="user_save.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-2">
                            <label for="" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username">
                        </div>
                        <div class="mb-2">
                            <label for="" class="form-label">Password</label>
                            <input type="text" class="form-control" name="password">
                        </div>
                        <div class="mb-2">
                            <label for="" class="form-label">Level</label>
                            <select name="level" class="form-select" id="">
                                <option>Admin</option>
                                <option>User</option>
                            </select>
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