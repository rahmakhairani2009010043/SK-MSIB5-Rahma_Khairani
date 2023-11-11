<?php 
include 'koneksi.php';
$nama = $_POST["nama"];
$harga = $_POST["harga"];
$status = $_POST["status"];
$kategori = $_POST["kategori"];
$grub = $_POST["grub"];

$target_dir = "images/"; // path directory image akan di simpan
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]); // full path dari image yg akan di simpan
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) { // fungsi ini utk memindahkan file dr tempat asal ke target_file
    echo "The file ". htmlspecialchars(basename($_FILES["fileToUpload"]["name"])). " has been uploaded.<br>";
} else {
    echo "Sorry, there was an error uploading your file.<br>";
}

$result = mysqli_query($conn, "INSERT INTO `produk` (`nama`, `harga`, `status`, `id_kategori`, `id_grub`,`gambar`) VALUES ('$nama', '$harga', '$status', '$kategori', '$grub', '$target_file');");

header("Location:admin.php");

?>