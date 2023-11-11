<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Katalog Kpop Stuff</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
    <?php
    include 'koneksi.php';
    $query = mysqli_query($conn, "SELECT p.id, p.nama, p.harga, p.status, p.gambar, k.kategori, g.nama_grup FROM `produk` AS p JOIN kategori AS k ON k.id = p.id_kategori JOIN grub AS g ON g.id = p.id_grub WHERE k.kategori = 'Photobook' ORDER BY p.id ASC;");
    ?>
    
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Items</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="index.php">All Products</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="album.php">Album</a></li>
                                <li><a class="dropdown-item" href="lighstick.php">Lightstick</a></li>
                                <li><a class="dropdown-item" href="pb.php">Photobook</a></li>
                                <li><a class="dropdown-item" href="sg.php">Season's Greetings</a></li>
                                <li><a class="dropdown-item" href="poca.php">photocard</a></li>
                                <li><a class="dropdown-item" href="sk.php">sticker</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Moonlight Kpop Stuff</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Ayo para Kpop Lovers Yang Nyari Barang-Barang Biasnya
                        Boleh Mampir ke Toko Kita,,, </p>
                </div>
            </div>
        </header>
        <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php
                while ($row = mysqli_fetch_assoc($query)) {
                    ?>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image -->
                            <img class="card-img-top" src="<?php echo htmlspecialchars($row['gambar']); ?>" alt="Product Image" />
                            <!-- Product details -->
                            <div class="card-body p-1">
                                <div class="text-center">
                                    <p class="text-muted"><?php echo htmlspecialchars($row['kategori']); ?></p>
                                    <h7 class="fw-bolder"><?php echo htmlspecialchars($row['nama']); ?></h7>
                                    <!-- Product category -->
                                <!-- Product status -->
                                <p class="text-danger"><?php echo htmlspecialchars($row['status']); ?></p>
                                    <!-- Product price -->
                                    <span>Rp. <?php echo number_format($row['harga'], 0, ',','.'); ?></span>
                                </div>
                            </div> 
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
