<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>

<?php
function input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $nama = input($_POST["nama"]);
    $jk = input($_POST["jk$jk"]);
    $alamat = input($_POST["alamat"]);
    $email = input($_POST["email"]);
    $no_hp = input($_POST["no_hp"]);

    $sql = "insert into anggota (nama,jk,alamat,email,no_hp)
    values ('$nama','$jk','$alamat','$email','$no_hp')";

    $hasil = mysqli_query($kon, $sql);

    if ($hasil){
        header ("location:index.php");
    }
    else{
        echo "GAGAL";
    }
}
?>
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
    <form action="<?php echo $_SERVER ["PHP_SELF"]; ?>" method="post">
        <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" placeholder="Masukan Nama" required class="form-control">
        </div>
        <div>
            <label>Jenis Kelamin</label><br>
            <input type="radio" name="jk" required value = "Laki-laki  " >Laki-laki
            <input type="radio" name="jk" required value = "Perempuan">Perempuan <br>
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" placeholder="Masukan Alamat" required class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" placeholder="Masukan Email" required class="form-control">
        </div>
        <div class="form-group">
            <label>No.HP</label>
            <input type="text" name="no_hp" placeholder="Masukan No.HP" required class="form-control">
        </div>

        <button type="Submit" name="Submit" class="btn btn-success"> Submit</button>
    </form>
    </div>
</body>
</html>