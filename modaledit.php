<?php 
// isi nama host, username mysql, dan password mysql anda
$host = mysql_connect("localhost","root","");

// isikan dengan nama database yang akan di hubungkan
$db = mysql_select_db("mahasiswa");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pagination</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <?php
  include 'koneksi.php';
  ?>
  <div class="col-sm-6" style="padding-top: 20px; padding-bottom: 20px;">
    <hr>
      <table class="table table-stripped table-hover datatab">
        <thead>
          <tr>
            <th>No</th>
            <th>Id</th>
            <th>Nama</th>
            <th>Fakultas</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $query = mysql_query("SELECT * FROM mhs");
          $no = 1;
          while ($data = mysql_fetch_assoc($query))
          {
          ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $data['id']; ?></td>
              <td><?php echo $data['nama']; ?></td>
              <td><?php echo $data['fakultas']; ?></td>
              <td>
                <!-- Button untuk modal -->
                <a href="#" type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal<?php echo $data['id']; ?>">Edit</a>
              </td>
            </tr>
            <!-- Modal Edit Mahasiswa-->
            <div class="modal fade" id="myModal<?php echo $data['id']; ?>" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Update Data Mahasiswa</h4>
                  </div>
                  <div class="modal-body">
                    <form role="form" action="editmhs.php" method="get">
                        <?php
                        $id = $data['id'];
                        $query_edit = mysql_query("SELECT * FROM mhs WHERE id='$id'");
                        //$result = mysqli_query($conn, $query);
                        while ($row = mysql_fetch_array($query_edit)) {
                        ?>
                        <input type="hidden" name="id_mhs" value="<?php echo $row['id']; ?>">
                        <div class="form-group">
                          <label>Nama</label>
                          <input type="text" name="nama_mhs" class="form-control" value="<?php echo $row['nama']; ?>">
                        </div>
                        <div class="form-group">
                          <label>Fakultas</label>
                          <input type="text" name="fakultas_mhs" class="form-control" value="<?php echo $row['fakultas']; ?>">
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-success">Update</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                        <?php
                        }
                        //mysql_close($host);
                        ?>
                      </form>
                  </div>
                </div>
              </div>
            </div>
          <?php
          }
          ?>
        </tbody>
      </table>
  </div>
</body>
  <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
  <script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
  <script>
  $(document).ready(function() {
    $('.datatab').DataTable();
  } );
  </script>
</html>

<?php
include('koneksi.php');
$id = $_GET['id_mhs'];
$nama = $_GET['nama_mhs'];
$fakultas = $_GET['fakultas_mhs'];
//query update
$query = "UPDATE mhs SET nama='$nama' , fakultas='$fakultas' WHERE id='$id' ";
if (mysql_query($query)) {
    # credirect ke page index
    header("location:index.php");
}
else{
    echo "ERROR, data gagal diupdate". mysql_error();
}
//mysql_close($host);
?>
