<?php
include "koneksi.php";

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kode = $_POST['kode_barang'];
    $nama = $_POST['nama_barang'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $id_post = $_POST['id'];

    $stmt = $koneksi->prepare("UPDATE barang SET kode_barang=?, nama_barang=?, kategori=?, harga=?, stok=? WHERE id=?");
    $stmt->bind_param("sssdii", $kode, $nama, $kategori, $harga, $stok, $id_post);
    $stmt->execute();
    $stmt->close();

    header("Location: index.php?sukses=Barang berhasil diupdate");
    exit();
}

$stmt = $koneksi->prepare("SELECT * FROM barang WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$data = $stmt->get_result()->fetch_assoc();
$stmt->close();

if (!$data) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <h2 class="mb-4">Edit Barang</h2>
    <div class="card">
        <div class="card-body">
            <form method="POST">
                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                <div class="mb-3">
                    <label class="form-label">Kode Barang</label>
                    <input type="text" name="kode_barang" class="form-control" value="<?= htmlspecialchars($data['kode_barang']) ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama Barang</label>
                    <input type="text" name="nama_barang" class="form-control" value="<?= htmlspecialchars($data['nama_barang']) ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <input type="text" name="kategori" class="form-control" value="<?= htmlspecialchars($data['kategori']) ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input type="number" step="0.01" name="harga" class="form-control" value="<?= $data['harga'] ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Stok</label>
                    <input type="number" name="stok" class="form-control" value="<?= $data['stok'] ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="index.php" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
