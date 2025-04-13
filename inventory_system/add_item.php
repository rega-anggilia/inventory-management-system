<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_barang = $_POST['nama_barang'];
    $kategori = $_POST['kategori'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];
    $supplier = $_POST['supplier'];
    $tanggal_pembelian = $_POST['tanggal_pembelian'];

    $sql = "INSERT INTO items (nama_barang, kategori, jumlah, harga, supplier, tanggal_pembelian) 
            VALUES ('$nama_barang', '$kategori', '$jumlah', '$harga', '$supplier', '$tanggal_pembelian')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.html");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
