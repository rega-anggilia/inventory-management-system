<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM items WHERE id=$id");
    $item = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_barang = $_POST['nama_barang'];
    $kategori = $_POST['kategori'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];
    $supplier = $_POST['supplier'];
    $tanggal_pembelian = $_POST['tanggal_pembelian'];

    $conn->query("UPDATE items SET nama_barang='$nama_barang', kategori='$kategori', jumlah='$jumlah', 
                  harga='$harga', supplier='$supplier', tanggal_pembelian='$tanggal_pembelian' WHERE id=$id");

    header("Location: index.html");
}
?>
