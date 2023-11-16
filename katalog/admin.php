<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATA PRODUK</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
            <?php
                include 'koneksi.php';
                $query = mysqli_query($conn, "SELECT p.id, p.nama, p.harga,p.status,p.gambar,k.kategori,g.nama_grup FROM `produk` AS p JOIN kategori AS k ON k.id = p.id_kategori JOIN grub AS g ON g.id=p.id_grub ORDER BY p.id ASC;");
                ?>
                 <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>  
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading"></div>
                            <a class="nav-link" href="admin.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                DATA PRODUK
                            </a>
                            <a class="nav-link" href="tambah.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                TAMBAH PRODUK</a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">DATA PRODUK</h1>
                        <div class="card mb-4">
                            <div class="card-body">
                             Semua Data Katalog Penjualan Merchandise Kpop   
                            </div>
                        </div>
                <table id="merchandise" class="table table-striped table-bordered">
                <thead>
                                        <tr><th>No</th>
                                        <th>ID Produk</th>
                                            <th>Nama</th>
                                            <th>Harga</th>
                                            <th>Status</th>
                                            <th>Gambar</th>
                                            <th>Kategori</th>
                                            <th>Grub</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                    <tbody>
                        <?php if(mysqli_num_rows($query) > 0){ ?>
                            <?php
                            $no = 1;
                            while($data = mysqli_fetch_array($query)){
                            ?>
                                 <tr>
                                    <td><?php echo $no ?></td>
                                    <td><?php echo $data["id"]; ?></td>
                                    <td><?php echo $data["nama"]; ?></td>
                                    <td>Rp. <?php echo number_format($data["harga"], 0, ',', '.'); ?></td>
                                    <td><?php echo $data["status"]; ?></td>
                                    <td> <img src="<?php echo $data["gambar"] ?>" width="100"> </td>
                                    <td><?php echo $data["kategori"]; ?></td>
                                    <td><?php echo $data["nama_grup"]; ?></td>
                                    <td>
                                        <center>
                                        <a href="edit.php?id=<?php echo $data["id"] ?>" class="label label-warning"> Ubah </a>&nbsp; 
                                    <a href="proses_hapus.php?id=<?php echo $data["id"] ?>" onclick="return confirm('Yakin Ingin Menghapus Data?')"
                                    class="label label-danger">Delete </a>
                                        </center>
                                    </td>
                                </tr>
                                <?php $no++; } ?>
                        <?php } ?>
                    </tbody>
                </table>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="js/scripts.js"></script>
    <script>
        $(document).ready(function () {
            $('#merchandise').DataTable();
        });
    </script>
</body>
</html>
