<?php

require_once('database.php');
if (isset($_POST) & !empty($_POST)) {
  $nama_depan = $_POST['nama_depan'];
  $nama_belakang = $_POST['nama_belakang'];
  $alamat = $_POST['alamat'];

  $res = $database->create($nama_depan, $nama_belakang, $alamat);
  if ($res) {
    echo "Data berhasil di simpan";
  } else {
    echo "Data Gagal disimpan";
  }
}

 ?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <form method="post">
            <div class="form-group">
              <label for="nama_depan">Nama Depan</label>
              <input type="text" name="nama_depan" class="form-control" id="nama_depan">
              </div>
            <div class="form-group">
              <label for="nama_belakang">Nama Belakang</label>
              <input type="text" name="nama_belakang" class="form-control" id="nama_belakang">
            </div>
            <div class="form-group">
              <label for="alamat">Alamat</label>
              <input type="text" name="alamat" class="form-control" id="alamat">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
