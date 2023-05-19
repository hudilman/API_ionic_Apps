<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title></title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h1>Tambah Lirik Sholawat</h1>
                    </div>
                    <div class="card-body">
                        <form action="tambah_aksi.php" method="post" class="form-group" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">Judul Sholawat</label>
                                    <input type="text" name="judul" id="" class="form-control">
                                </div>
                                <div class="col-md-12">
                                    <label for="">Lirik Sholawat</label>
                                    <textarea class="ckeditor" name="lirik" id="ckedtor"></textarea>
                                </div>
                                <div class="col-md-12">
                                    <label>MP3 :</label>
                                    <input type="file" name="files" class="form-control">
                                    <p style="color: red">Ekstensi yang diperbolehkan .mp3</p>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Tampil Data
                    </div>
                    <div class="card-body">
                        <?php
                        $mysqli = mysqli_connect('localhost', 'root', '', 'sholawat');
                        $query = mysqli_query($mysqli,"SELECT * FROM sholawat");
                            while ($result = mysqli_fetch_array($query)) {
                                ?>
                                <td><?php echo $result['judul']; ?> <a href="api.php?api=delete&id=<?php echo $result['id']; ?>">Hapus</a>  ||</td>
                                <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>"></script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
</html>