<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<title>
    Dashboard</title>
<body>
    <nav class="navbar navbar-dark bg-dark">
            <span class="navbar-brand mb-0 h1">Contoh Judul</span>
        </div>
    </nav>
<div class="container">
    <br>
    <h4><center>daftar pengguna</center></h4>
<?php

    include "koneksi.php";

//Cek apakah ada kiriman form dari method post
if (isset($_GET['id_peserta'])) {
    $id_peserta=htmlspecialchars($_GET["id_peserta"]);

    $sql="delete from peserta where id_peserta='$id_peserta' ";
    $hasil=mysqli_query($kon, $sql);

    //Kondisi apakah berhasil atau tidak
    if ($hasil) {
        header("Location:index.php");

    } else {
        echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

    }
}
?>


     <tr class="table-danger">
            <br>
        <thead>
        <tr>
       <table class="my-3 table table-bordered">
            <tr class="table-primary">
            <th>No</th>
            <th>Nama</th>
            <th>Sekolah</th>
            <th>Jurusan</th>
            <th>No Hp</th>
            <th>Alamat</th>
            <th colspan='2'>Aksi</th>

        </tr>
        </thead>

        <?php
        include "koneksi.php";
$sql="select * from peserta order by id_peserta desc";

$hasil=mysqli_query($kon, $sql);
$no=0;
while ($data = mysqli_fetch_array($hasil)) {
    $no++;

    ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["nama"]; ?></td>
                <td><?php echo $data["sekolah"];   ?></td>
                <td><?php echo $data["jurusan"];   ?></td>
                <td><?php echo $data["no_hp"];   ?></td>
                <td><?php echo $data["alamat"];   ?></td>
                <td>
                    <a href="update.php?id_peserta=<?php echo htmlspecialchars($data['id_peserta']); ?>" class="btn btn-warning" role="button">Update</a>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_peserta=<?php echo $data['id_peserta']; ?>" class="btn btn-danger" role="button">Delete</a>
                </td>
            </tr>
            </tbody>
            <?php
}
?>
    </table>
    <!-- <a href="create.php" class="btn btn-primary" role="button">Tambah Data</a> -->
</div>
<!-- Modal -->
<div class="modal fade" id="addDataModal" tabindex="-1" role="dialog" aria-labelledby="addDataModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addDataModalLabel">Add New Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="addDataForm">
          <!-- Form fields here -->
          <div class="form-group">
            <label for="nameInput">Name</label>
            <input type="text" class="form-control" id="nameInput" name="name">
          </div>
          <!-- Add more fields as needed -->
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="submitData">Save changes</button>
      </div>
    </div>
  </div>
</div>

</body>
</html>
