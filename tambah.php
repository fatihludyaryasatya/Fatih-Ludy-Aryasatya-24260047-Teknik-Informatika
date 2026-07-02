<?php
include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kode = $_POST['kode_barang'];
    $nama = $_POST['nama_barang'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $stmt = $koneksi->prepare("INSERT INTO barang (kode_barang, nama_barang, kategori, harga, stok) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssdi", $kode, $nama, $kategori, $harga, $stok);
    $stmt->execute();
    $stmt->close();

    header("Location: index.php?sukses=Barang berhasil ditambahkan");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <h2 class="mb-4">Tambah Barang</h2>
    <div class="card">
        <div class="card-body">
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Kode Barang</label>
                    <input type="text" name="kode_barang" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama Barang</label>
                    <input type="text" name="nama_barang" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <input type="text" name="kategori" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input type="number" step="0.01" name="harga" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Stok</label>
                    <input type="number" name="stok" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="index.php" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
