<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>DATA PRODUK</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <script>
        function confirmUpdate() {
            var confirmation = confirm("Apakah Anda Yakin ingin Menambah data?");
            if (confirmation) {
                // Jika pengguna mengkonfirmasi (klik OK), maka formulir akan dikirim
                return true;
            } else {
                // Jika pengguna membatalkan (klik Batal), formulir tidak akan dikirim
                return false;
            }
        }
    </script>
    </head>
    <body class="sb-nav-fixed">
    <?php
    include 'koneksi.php';
    ?>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="admin.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Data Produk
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Tambah Produk</h1>
                        </div>
                            <div class="card-body">
                            <div class="container">
        <!-- Form untuk menambah data -->
        <form action="proses_tambah.php" method="POST" enctype="multipart/form-data" onsubmit="return confirmUpdate();">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div><br>
            <div class="form-group">
                <label for="harga">Harga:</label>
                <input type="number" class="form-control" id="harga" name="harga" required>
            </div><br>
            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" id="status" name="status" required>
                <option selected>
                                    <?php
                                    $query = mysqli_query($conn, "SELECT DISTINCT status FROM produk");
                                    if (mysqli_num_rows($query) > 0) {
                                        while ($data = mysqli_fetch_array($query)) {
                                            echo "<option value='" . $data["status"] . "'>" . $data["status"] . "</option>";
                                        }
                                    } else {
                                        echo "<option value=''>Tidak ada item tersedia</option>";
                                    }
                                    ?></select>

            </div><br>
            <div class="form-group">
                <label for="gambar">Upload Gambar:</label>
                <input type="file" class="form-control-file" name="fileToUpload" id="fileToUpload" accept="image/*" required>
            </div><br>
            <div class="form-group">
                <label for="kategori">Kategori:</label>
                <select class="form-control" id="kategori" name="kategori" required>
                <option selected>
                                    <?php
                                    $query = mysqli_query($conn, "SELECT * FROM kategori");
                                    if (mysqli_num_rows($query) > 0) {
                                        while ($data = mysqli_fetch_array($query)) {
                                            echo "<option value='" . $data["id"] . "'>" . $data["kategori"] . "</option>";
                                        }
                                    } else {
                                        echo "<option value=''>No items available</option>";
                                    }
                                    ?>
                </select>
            </div><br>
            <div class="form-group">
                <label for="grub">Nama Grup:</label>
                <select class="form-control" id="grub" name="grub" required>
                                <option selected>
                                    <?php
                                    $query = mysqli_query($conn, "SELECT * FROM grub");
                                    if (mysqli_num_rows($query) > 0) {
                                        while ($data = mysqli_fetch_array($query)) {
                                            echo "<option value='" . $data["id"] . "'>" . $data["nama_grup"] . "</option>";
                                        }
                                    } else {
                                        echo "";
                                    }
                                    ?></select>
            </div>
            <input type="submit" class="btn btn-primary" name="Submit" value="Tambah Data">
        </form>
    </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
