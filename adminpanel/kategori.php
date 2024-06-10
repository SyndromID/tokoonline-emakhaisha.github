<?php
    require "session.php"; 
    require "../koneksi.php";


    $queryKategori = mysqli_query($con,"SELECT * FROM kategori");
    $jumlahKategori = mysqli_num_rows($queryKategori);

 
?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
</head>

<style>
     .no-decoration{
            text-decoration: none;
        }
</style>



<body>
<?php require "navbar.php"; ?>
<div class="container mt-5">
<nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                  <a href="..//adminpanel"> 
                    <i class="fas fa-home" class="no-decoration text-muted"> </i> Home </a> 
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                     Kategori
                </li>
            </ol>
        </nav>

<div class="my-5 col-12 col-md-6">
        <h3> Tambah Kategori </h3>

        <?php
// Pastikan koneksi ke database sudah dibuka sebelumnya dan $con sudah diinisialisasi
// Contoh: $con = mysqli_connect("localhost", "username", "password", "database");

// Cek koneksi database
if (!$con) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

$alertMessage = '';
$alertClass = '';

if (isset($_POST['simpan_kategori'])) {
    $kategori = htmlspecialchars($_POST['kategori']);

    // Query untuk mengecek apakah kategori sudah ada
    $queryExist = mysqli_query($con, "SELECT nama FROM kategori WHERE nama='$kategori'");
    $jumlahDataKategoriBaru = mysqli_num_rows($queryExist);

    if ($jumlahDataKategoriBaru > 0) {
        $alertMessage = 'Kategori Sudah Ada';
        $alertClass = 'alert-warning';
    } else {
        // Query untuk menyimpan kategori baru
        $querySimpan = mysqli_query($con, "INSERT INTO kategori (nama) VALUES ('$kategori')");
        if ($querySimpan) {
            // Redirect ke kategori.php setelah berhasil menyimpan
            header("Location: kategori.php");
            exit();
        } else {
            $alertMessage = 'Terjadi Kesalahan Saat Menyimpan Kategori: ' . mysqli_error($con);
            $alertClass = 'alert-danger';
        }
    }
}
?>

<!-- Form HTML -->
<form method="POST" action="">
    <div class="form-group">
        <label for="kategori">Nama Kategori</label>
        <input type="text" class="form-control" id="kategori" name="kategori" required>
    </div>
    <?php if ($alertMessage): ?>
    <div class="alert <?php echo $alertClass; ?> mt-3" role="alert">
        <?php echo $alertMessage; ?>
    </div>
<?php endif; ?>

    <button type="submit" name="simpan_kategori" class="btn btn-primary">Simpan Kategori</button>
</form>



        
</div>



        <div class="mt-3">
            <h2> List Kategori </h2>

            <div class="table-responsive mt-5"> 
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if($jumlahKategori==0){
                        ?>
                        <tr>
                            <td colspan=3 class="text-center"> Data Kategori Tidak Tersedia</td>
                        </tr>
                        <?php
                        }
                        else{
                            $jumlah = 1;
                            while($data=mysqli_fetch_array($queryKategori)){
                        ?>

                        <tr>
                            <td><?php echo $jumlah; ?></td>
                            <td><?php echo  $data['nama'] ?> </td>
                            <td>
                                <a href="kategori-detail.php?q=<?php echo $data['id']; ?>" 
                                class="btn btn-info"><i class="fas fa-search"></i></a>
                            </td>
                        </tr>

                        <?php
                        $jumlah++;
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

</div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>
</html>