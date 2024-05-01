<?php
include "koneksi.php";


function input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_GET['id_anggota'])) {
    $id_anggota = input($_GET['id_anggota']);

    $sql = "SELECT * FROM anggota WHERE id_anggota=$id_anggota";
    $hasil = mysqli_query($kon, $sql);
    $data = mysqli_fetch_assoc($hasil);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_anggota = htmlspecialchars($_POST['id_anggota']);
    $nama = input($_POST["nama"]);
    $jk = input($_POST["jk"]);
    $alamat = input($_POST["alamat"]);
    $email = input($_POST["email"]);
    $no_hp = input($_POST["no_hp"]);

    $sql = "UPDATE anggota SET
            nama='$nama',       
            jk='$jk',       
            alamat='$alamat',       
            email='$email',       
            no_hp='$no_hp'   
            WHERE id_anggota=$id_anggota";

    $hasil = mysqli_query($kon, $sql);

    if ($hasil) {
        header("location:index.php");
    } else {
        echo "GAGAL DI UPDATE";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Update Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
    
</body>
</html>
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
    <div class="container">
    <form action="<?php echo htmlspecialchars($_SERVER ["PHP_SELF"])  ;?>" method="post">
        <input type="hidden" name="id_anggota" value="<?php echo $data ['id_anggota'];?>">

        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" placeholder="Masukan Nama" required class="form-control" value="<?php echo $data ['nama']; ?>">
        </div>
        <div class="form-group">
            <label>Jenis Kelamin : </label>
            <input type="text" name="jk" placeholder="Masukan Jenis Kelamin" required class="form-control" value="<?php echo $data ['jk']; ?>">
        </div>
        <div class="form-group">
            <label>Alamat : </label>
            <input type="text" name="alamat" placeholder="Masukan Alamat" required class="form-control" value="<?php echo $data ['alamat']; ?>">
        </div>
        <div class="form-group">
            <label>Email : </label>
            <input type="text" name="email" placeholder="Masukan Email" required class="form-control" value="<?php echo $data ['email']; ?>">
        </div>
        <div class="form-group">
            <label>No.HP : </label>
            <input type="text" name="no_hp" placeholder="Masukan No.HP" required class="form-control" value="<?php echo $data ['no_hp']; ?>">
        </div>

        <button type="Submit" name="Submit" class="btn btn-success"> Submit</button>
    </form>
    </div>
</body>
</html>