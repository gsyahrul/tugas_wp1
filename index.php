<?php
include "koneksi.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BELAJAR HTML</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

</head>
<body bgcolor="grey">

 <div>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="https://github.com/gsyahrul">Syahrul Gunawan</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="http://localhost/belajar-html-php-mysql/index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="create.php">Tambah Data</a>
      </li>
    </ul>
  </div>
</nav>
    <hr>
    <img src="gambar\logo-html.png" width="100px">
    <br>
    <br>
<?php
if (isset($_GET['id_anggota'])){
    $id_anggota=htmlspecialchars($_GET['id_anggota']);

    $sql="delete from anggota where id_anggota=$id_anggota";
    $hasil=mysqli_query($kon,$sql);

    if ($hasil){
        header("location:index.php");
    }else{
        echo"Data gagal dihapus";
    }
} 
?>
<div class="countainer">
    <table class="table table-dark">
        <thead class="table-dark">
            <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>No.HP</th>
            <th>Aksi</th>
            </tr>
        </thead>
<?php
 $sql = "SELECT * FROM anggota order by id_anggota desc";
 $hasil= mysqli_query($kon,$sql);
 $no=0;
 while ($data = mysqli_fetch_array($hasil)){
    $no++;

?>

        <tbody> 
            <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $data ["nama"]; ?></td>
            <td><?php echo $data ["jk"]; ?></td>
            <td><?php echo $data ["alamat"]; ?></td>
            <td><?php echo $data ["email"]; ?></td>
            <td><?php echo $data ["no_hp"]; ?></td>
            <td>
                <a href="update.php?id_anggota=<?php echo htmlspecialchars ($data['id_anggota']); ?>" class="btn btn-success btn-sm">Update</a>
                <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_anggota=<?php echo $data['id_anggota']; ?>" class="btn btn-danger btn-sm" onclick = " javascript : return confirm('Apakah data ingin dihapus ?')">Delete</a>
            </td>
            </tr>
        </tbody>
        <?php
            }        
        ?>
    </table>
    </div>
    <br>
 </div>   
</body>
</html>