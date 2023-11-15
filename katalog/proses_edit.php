<?php 
include 'koneksi.php';
$nama = $_POST["nama"];
$harga = $_POST["harga"];
$status = $_POST["status"];
$kategori = $_POST["kategori"];
$grub = $_POST["grub"];

if($_FILES["fileToUpload"]["size"]!=0){   // Jika browse image di tekan maka $_FILES akan terisi
    $target_dir = "images/"; // path directory image akan di simpan
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]); // full path dari image yg akan di simpan
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) { // fungsi ini utk memindahkan file dr tempat asal ke target_file
        echo "The file ". htmlspecialchars(basename($_FILES["fileToUpload"]["name"])). " has been uploaded.<br>";
    } else {
        echo "Sorry, there was an error uploading your file.<br>";
    }
}

$result = mysqli_query($conn, "UPDATE `produk` set `nama` = '$nama', `harga` = '$harga', `status` = '$status', `id_kategori` = '$kategori', `id_grub` = '$grub' where `id` = '$_GET[id]'");

header("Location:admin.php");

?>