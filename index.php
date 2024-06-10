<?php
require "koneksi.php";
$queryProduk = mysqli_query($con, "SELECT id, nama, harga, foto, detail FROM produk LIMIT 6");

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Toko</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
     <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="styles.css">

</head>
<body>
    <?php require "navbar.php"      ?>


<div class="container-fluid banner d-flex align-items-center">
    <div class="container text-center text-white">
        <h1> Toko Emak Haisha Hanun </h1>
        <h3> Mau Cari Apa </h3>
            <div class="col-md-8 offset-md-2">  
                <form method="get" action="produk.php">
            <div class="input-group input-group-lg my-4">
            <input type="text" class="form-control" placeholder="Nama Barang" 
            aria-label="Recipient's username" aria-describedby="basic-addon2" name="keyword">
            <button type="submit"  class="warna2 text-white">Telusuri</button>
            </div>
            </form>
        </div>
    </div>
</div>


<div class="container-fluid py-5">
        <div class="container text-center">
        <h3>Kategori Terlaris</h3>

        <div class="row mt-5">
        <div class="col-md-4 mb-3">
            <div class="highlighted-kategori kategori-bahan-pokok d-flex justify-content-center align-items-center">  
                <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=Bahan Pokok">Bahan Pokok</a></h4>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="highlighted-kategori kategori-Buah-Buahan d-flex justify-content-center align-items-center"> 
            <h4 class="text-white"> <a class="no-decoration"  href="produk.php?kategori=Buah - Buahan">Buah Buahan</a> </h4>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="highlighted-kategori kategori-Frozen-Food d-flex justify-content-center align-items-center"> 
            <h4 class="text-white"> <a class="no-decoration" href="produk.php?kategori=Frozen Food">Frozen Food</a> </h4>
            </div>
        </div>
    </div>
</div>

<!-- about us -->
<div class="container-fluid warna3 py-5 ">
    <div class="container text-center">
        <h3>Tentang Kami</h3>
        <p class="fs-5 mt-3">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex sunt dolor eaque non fugit rem, 
            quasi mollitia fugiat deleniti nostrum hic iure voluptatem modi doloribus unde quas eum
            illum veritatis, quam laborum excepturi cumque repudiandae quod. Corporis totam fuga, 
            distinctio optio dolorem voluptatem sint praesentium nostrum vel. Deleniti pariatur nulla unde v
            oluptatum neque soluta quaerat eaque autem cupiditate exercitationem, ab id itaque quia facilis 
            debitis, quibusdam veritatis! Dolores reiciendis cum eaque eius, veniam eligendi libero, rem animi qui fugiat omnis.
        </p>
    </div>
</div>

<!-- produk -->
<div class="container-fluid py-5"> 
    <div class="container text-center">
        <h3>Produk</h3>

        <div class="row mt-5">
            <?php while($data = mysqli_fetch_array($queryProduk)) { ?>
            <div class="col-sm-6 col-md-4 mb-3">
            <div class="card h-100">
            <div class="image-box">
            <img src="image/<?php echo $data['foto']; ?>" class="card-img-top" alt="...">
            </div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $data['nama']; ?></h5>
                <p class="card-text text-truncate"><?php echo $data['detail'];   ?> </p>
                    <p class="card-text text-harga">Rp <?php echo $data['harga'];   ?></p>
                <a href="produk-detail.php?nama=<?php echo $data['nama'];  ?>" class="btn btn-outline-warning ">Lihat Detail</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <a class="btn btn-outline-warning mt-3 " href="produk.php">See More</a>
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