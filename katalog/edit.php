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
            var confirmation = confirm("Yakin ingin mengubah data?");
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

    $produk = mysqli_query($conn,"SELECT * from produk where id='$_GET[id]'");

    while($p = mysqli_fetch_array($produk)){
        $id = $p["id"];
        $nama = $p["nama"];
        $harga = $p["harga"];
        $status = $p["status"];
        $kategori = $p["id_kategori"];
        $grub = $p["id_grub"];
        $gambar = $p["gambar"];
    }
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
                        <h1 class="mt-4">Edit Produk</h1>
                        </div>
                            <div class="card-body">
                            <div class="container">
        <!-- Form untuk menambah data -->
        <form action="proses_edit.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data" onsubmit="return confirmUpdate();">
        <div class="form-group">
                <label for="nama">ID Produk:</label>
                <input type="text" class="form-control" id="id" name="id" disabled value="<?php echo $id ?>">
            </div><br>
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama ?>">
            </div><br>
            <div class="form-group">
               <label for="harga">Harga:</label>
               <input type="number" class="form-control" id="harga" name="harga" value="<?php echo number_format($harga, 0, '.', ''); ?>">

            </div><br>
            <div class="form-group">
                 <label for="status">Status:</label>
                 <select class="form-control" id="status" name="status">
                                     <?php
                                     $queryStatus = mysqli_query($conn, "SELECT DISTINCT status FROM produk");
                                     if (mysqli_num_rows($queryStatus) > 0) {
                                         while ($dataStatus = mysqli_fetch_array($queryStatus)) {
                                         $selected = ($dataStatus['status'] == $status) ? 'selected' : '';
                                         echo "<option value='" . $dataStatus["status"] . "' $selected>" . $dataStatus["status"] . "</option>";
                                        }
                                    } else {
                                         echo "<option value=''>Tidak ada item tersedia</option>";
                                    }
                                     ?>
    </select>
            </div><br>
            <div class="form-group">
                <label for="gambar">Upload Gambar:</label>
                <input type="file" class="form-control-file" name="fileToUpload" id="fileToUpload" accept="image/*">
                <td colspan="3"><img src="<?php echo $gambar ?>" width="100"></td>
            </div><br>
            <div class="form-group">
                 <label for="kategori">Kategori:</label>
                 <select class="form-control" id="kategori" name="kategori">
                                     <?php
                                     $queryKategori = mysqli_query($conn, "SELECT * FROM kategori");
                                     if (mysqli_num_rows($queryKategori) > 0) {
                                         while ($dataKategori = mysqli_fetch_array($queryKategori)) {
                                         $selectedKategori = ($dataKategori['id'] == $kategori) ? 'selected' : '';
                                         echo "<option value='" . $dataKategori["id"] . "' $selectedKategori>" . $dataKategori["kategori"] . "</option>";
                                        }
                                    } else {
                                         echo "<option value=''>Tidak ada item tersedia</option>";
                                    }
                                    ?>
    </select>
            </div><br>
            <div class="form-group">
                 <label for="grub">Nama Grup:</label>
                 <select class="form-control" id="grub" name="grub">
                                     <?php
                                     $queryGrub = mysqli_query($conn, "SELECT * FROM grub");
                                     if (mysqli_num_rows($queryGrub) > 0) {
                                         while ($dataGrub = mysqli_fetch_array($queryGrub)) {
                                         $selectedGrub = ($dataGrub['id'] == $grub) ? 'selected' : '';
                                         echo "<option value='" . $dataGrub["id"] . "' $selectedGrub>" . $dataGrub["nama_grup"] . "</option>";
                                        }
                                    } else {
                                         echo "<option value=''>Tidak ada item tersedia</option>";
                                    }
                                     ?>
    </select>
            </div><br>
            <input type="submit" class="btn btn-primary" name="Submit" value="Simpan">
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
