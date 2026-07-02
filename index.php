<?php
include "koneksi.php";

$query = "SELECT * FROM barang ORDER BY id DESC";
$result = $koneksi->query($query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>CRUD Data Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Data Barang</h2>
        <a href="tambah.php" class="btn btn-primary">+ Tambah Barang</a>
    </div>

    <?php if (isset($_GET['sukses'])): ?>
        <div class="alert alert-success"><?= htmlspecialchars($_GET['sukses']) ?></div>
    <?php endif; ?>

    <table class="table table-bordered bg-white">
        <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Stok</th>
            <th width="180">Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php $no = 1; while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($row['kode_barang']) ?></td>
                <td><?= htmlspecialchars($row['nama_barang']) ?></td>
                <td><?= htmlspecialchars($row['kategori']) ?></td>
                <td>Rp <?= number_format($row['harga'], 0, ',', '.') ?></td>
                <td><?= $row['stok'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="hapus.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus barang ini?')">Hapus</a>
                </td>
            </tr>
        <?php endwhile; ?>
        <?php if ($result->num_rows == 0): ?>
            <tr><td colspan="7" class="text-center">Belum ada data barang</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>
