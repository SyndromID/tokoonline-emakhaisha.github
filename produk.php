<?php
require "koneksi.php";

$queryKategori = mysqli_query($con,"SELECT * FROM kategori");

// get produk pake nama/keyword
if(isset($_GET['keyword'])){
    $queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE nama LIKE '%$_GET[keyword]%'");
}

// get produk by kategori
else if(isset($_GET['kategori'])){
$queryGetKategoriId = mysqli_query($con, "SELECT id FROM kategori WHERE nama='$_GET[kategori]'");
$kategoriId = mysqli_fetch_array($queryGetKategoriId);
$queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE kategori_id='$kategoriId[id]'");
}

// get produk default
else{
    $queryProduk = mysqli_query($con, "SELECT * FROM produk");
}

$countdata = mysqli_num_rows ($queryProduk);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Online | Produk</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
     <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<?php require "navbar.php";   ?>

<!-- Banner !-->

<div class="container-fluid banner d-flex align-items-center">
    <div class="container"> 
        <h1 class="text-white text-center">Produk</h1>
    </div>
    </div>

<!-- Body !-->
<div class="container py-5">
    <div class="row">
        <div class="col-lg-3 mb-5">
        <h3>Kategori</h3>
        <ul class="list-group">
        <?php while($kategori = mysqli_fetch_array($queryKategori)){ ?>
        <a href="produk.php?kategori=<?php echo $kategori['nama']; ?>">
        <li class="list-group-item"> <?php echo $kategori ['nama']; ?></li>
        </a>
        <?php } ?>
        </ul>
        </div>
        <div class="col-lg-9">
            <h3 class="text-center mb-3">Produk</h3>
            <div class="row">
                <?php
                    if($countdata<1){
                    ?>
                        <h4 class="text-center align my-5">Produk Yang Anda Cari Tidak Tersedia </h4>
                    <?php
    
                    }
                ?>

            <?php while($produk = mysqli_fetch_array($queryProduk)){   ?>  
            <div class="col-md-4">
            <div class="card h-100">
            <div class="image-box">
            <img src="image/<?php echo $produk['foto'];  ?>" class="card-img-top" alt="...">
            </div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $produk['nama'];  ?></h5>
                <p class="card-text text-truncate"> <?php echo $produk['detail'];  ?></p>
                    <p class="card-text text-harga"><?php echo $produk['harga'];  ?></p>
                <a href="produk-detail.php?nama=<?php echo $produk['nama']; ?>" class="btn 
                btn-outline-warning ">Lihat Detail</a>
                    </div>
                </div>
            </div>
            <?php } ?>
            </div>
            </div>
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