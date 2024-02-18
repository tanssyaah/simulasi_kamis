<?php
include "../koneksi.php";

// Mengambil data dari formulir
$id_iventaris = mysqli_real_escape_string($koneksi, $_POST['id_iventaris']);
$nama_barang = mysqli_real_escape_string($koneksi, $_POST['nama_barang']);
$kondisi = mysqli_real_escape_string($koneksi, $_POST['kondisi']);
$stok = mysqli_real_escape_string($koneksi, $_POST['stok']);
$tanggal_register = mysqli_real_escape_string($koneksi, $_POST['tanggal_register']);

// Menangani upload gambar
$target_directory = "jalur/absolut/ke/direktori/unggah/";
$target_file = $target_directory . uniqid() . "_" . basename($_FILES["foto"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// ... (rest of the file upload code)

// Ambil konten biner dari file yang diunggah
if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
    // Masukkan data ke database
    $insert_query = "INSERT INTO tb_iventaris (id_iventaris, nama_barang, kondisi, stok, foto, tanggal_register)
                     VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($koneksi, $insert_query);
    mysqli_stmt_bind_param($stmt, "sssssb", $id_iventaris, $nama_barang, $kondisi, $stok, $target_file, $tanggal_register);

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        header("Location: admin.php?pesan=input");
    } else {
        die("Error: " . mysqli_stmt_error($stmt));
    }
} else {
    die("Maaf, terjadi kesalahan saat mengunggah file gambar.");
}
