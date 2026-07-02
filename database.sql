-- Import file ini di phpMyAdmin (tab "Import" atau jalankan di tab "SQL")

CREATE DATABASE IF NOT EXISTS toko_db;
USE toko_db;

CREATE TABLE IF NOT EXISTS barang (
    id INT AUTO_INCREMENT PRIMARY KEY,
    kode_barang VARCHAR(20) NOT NULL,
    nama_barang VARCHAR(100) NOT NULL,
    kategori VARCHAR(50) NOT NULL,
    harga DECIMAL(12,2) NOT NULL,
    stok INT NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Data contoh (opsional)
INSERT INTO barang (kode_barang, nama_barang, kategori, harga, stok) VALUES
('BRG001', 'Indomie Goreng', 'Makanan', 3500, 100),
('BRG002', 'Aqua 600ml', 'Minuman', 4000, 150),
('BRG003', 'Pulpen Standard', 'ATK', 2500, 200);
