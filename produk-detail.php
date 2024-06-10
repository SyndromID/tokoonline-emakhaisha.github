<?php
require "koneksi.php";

$nama = htmlspecialchars($_GET ['nama']);
$queryProduk = mysqli_query($con,"SELECT * FROM produk WHERE nama='$nama'");
$produk = mysqli_fetch_array($queryProduk);

$queryProdukTerkait = mysqli_query($con,"SELECT * FROM produk WHERE kategori_id='$produk[kategori_id]' AND
id!='$produk[id]' LIMIT 4");

?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk Detail |  Toko Online </title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php require "navbar.php";   ?>


<!-- Detail Produk !-->
<div class="container-fluid">
    <div class="container">  
        <div class="row"> 
            <div class="col-lg-5 mb-3">
                <img src="image/<?php echo $produk['foto']; ?>" class="w-100" alt="">
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <h1><?php echo $produk['nama']; ?></h1>
                    <p class="fs-5">
                        <?php echo $produk['detail'];  ?>
                    </p>
                    <p class="text-harga">
                        Rp <?php echo $produk['harga'];  ?>
                    </p>
                    <p class="fs-5">Status Ketersediaan : <strong><?php echo $produk['ketersediaan_stok'];  ?> Tersedia </p></strong>
                </div>
        </div>
    </div>
</div>

<!-- Produk Terkait   !-->
<div class="container-fluid py-5 warna2">
    <div class="container text-center text-white">
        <h2> Produk Terkait</h2>
        <div class="row">
            <?php while($data=mysqli_fetch_array($queryProdukTerkait)){ ?>
            <div class="col-md-6 col-lg-3 mb-3">
                <a href="produk-detail.php?nama=<?php echo $data['nama']; ?>">
                    <img src="image/<?php echo $data['foto']; ?>" class="img-fluid img-thumbnail produk-terkait-image h-100" alt="<?php echo $data['nama']; ?>">
                    <div class="produk-terkait-nama mt-2 no-decoration">
                        <?php echo $data['nama']; ?>
                    </div>
                </a>
            </div>
            <?php } ?>
        </div>
    </div>
</div>

<!-- Footer Section -->
<footer class="footer  text-white py-4 warna2">
        <div class="container text-center ">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <a href="https://wa.me/+62895320915140" target="_blank" class="text-white">
                        <i class="fab fa-whatsapp"></i> WhatsApp
                    </a>
                </div>
                <div class="col-md-6 mb-3">
                <a href="https://maps.app.goo.gl/jXsL1ZiUoUSxTT3H9" target="_blank" class="text-white">
                        <i class="fas fa-map-marker-alt"></i> Depok
                    </a>
                </div>
            </div>
        </div>

<script src="bootstrap/js/bootstrap.bundle.min.js">  </script>
<script src="fontawesome/js/all.min.js">  </script>
</body>
</html>