<?php

// Menghubungkan ke file konfigurasi database
include("config.php")

// Memulai sesi untuk menyimpan notifikasi
session_start();

// Proses penambahan kategori baru
if (isset($_POST['simpan'])) {
    // Mengambil data nama kategori dari form
    $category_name =$_POST['category_name'];

    // Query untuk menambahkan data kategori ke dalam database
    $query ="INSERT INTO categories (category_name) VALUES 
    ('$category_name)";
    $exec = mysqlo_query($conn, $query);
z
    // Menyimpan notifikasi berhasil atau gagal ke dalam session
    if ($esec) {
        $_SESSION['notification'] = 
            'type' => 'primary', // jenis notifikasi (contoh: primary untuk keberhasilan)
            'message' => 'Kategori berhasil ditambahkan!'`
        ];
    } else {
        $_SESSION['notfication'] = [
            'type' => 'danger', //Jenis notifikasi (contoh: danger untuk kegagalan)
            'message' => 'Gagal menambahkan kategori:' .mysqli_error($conn)
        ];
    }
// Redirect kembali ke halaman kategori
}header('Location: kategori.php');
exit();
}
