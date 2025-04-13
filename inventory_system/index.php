<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- Logo -->
    <div class="logo-container">
        <img src="images/logo.png" alt="Logo Inventory">
    </div>

    <h2 style="text-align: center; color: white;">Inventory Management System</h2>

    <!-- Form Tambah Barang -->
    <form id="itemForm" action="add_item.php" method="POST">
        <input type="text" name="nama_barang" placeholder="Nama Barang" required>
        <select name="kategori" required>
            <option value="Elektronik">Elektronik</option>
            <option value="Pakaian">Pakaian</option>
            <option value="Makanan">Makanan</option>
            <option value="Lainnya">Lainnya</option>
        </select>
        <input type="number" name="jumlah" placeholder="Jumlah" required>
        <input type="number" name="harga" placeholder="Harga (Rp)" required>
        <input type="text" name="supplier" placeholder="Supplier" required>
        <input type="date" name="tanggal_pembelian" required>
        <button type="submit">Tambah</button>
    </form>

    <!-- Tabel Data Barang -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Supplier</th>
                <th>Tanggal Pembelian</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'config.php';
            $result = $conn->query("SELECT * FROM items");

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['nama_barang']}</td>
                    <td>{$row['kategori']}</td>
                    <td>{$row['jumlah']}</td>
                    <td>Rp " . number_format($row['harga'], 2, ',', '.') . "</td>
                    <td>{$row['supplier']}</td>
                    <td>{$row['tanggal_pembelian']}</td>
                    <td>
                        <a class='edit-btn' href='update_item.php?id={$row['id']}'>Edit</a>
                        <a class='delete-btn' href='delete_item.php?id={$row['id']}'>Hapus</a>
                    </td>
                </tr>";
            }
            ?>
        </tbody>
    </table>

</body>
</html>
