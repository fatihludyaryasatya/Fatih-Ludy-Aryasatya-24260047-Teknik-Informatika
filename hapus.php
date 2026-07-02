<?php
include "koneksi.php";

$id = $_GET['id'] ?? null;
if ($id) {
    $stmt = $koneksi->prepare("DELETE FROM barang WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

header("Location: index.php?sukses=Barang berhasil dihapus");
exit();
