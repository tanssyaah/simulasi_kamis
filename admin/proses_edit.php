<?php
include "../koneksi.php";

// Mengambil data dari formulir
$id = $_POST['id'];
$id_iventaris = $_POST['id_iventaris'];
$nama_barang = $_POST['nama_barang'];
$kondisi = $_POST['kondisi'];
$stok = $_POST['stok'];
$tanggal_register = $_POST['tanggal_register'];

// Menangani upload gambar
$target_directory = "jalur/absolut/ke/direktori/unggah/";
$new_target_file = $target_directory . basename($_FILES["foto"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($new_target_file, PATHINFO_EXTENSION));

// Cek apakah file foto diunggah
if ($_FILES["foto"]["name"]) {
    // Batasi jenis file yang diizinkan
    $allowed_file_types = ["jpg", "jpeg", "png", "gif"];
    if (!in_array($imageFileType, $allowed_file_types)) {
        echo "Maaf, hanya file JPG, JPEG, PNG & GIF yang diizinkan.";
        $uploadOk = 0;
    }

    // Ensure the target directory exists
    if (!file_exists($target_directory)) {
        mkdir($target_directory, 0777, true);
    }

    // Set correct permissions for the target directory
    chmod($target_directory, 0777);

    // Attempt to move the uploaded file
    if ($uploadOk == 1 && move_uploaded_file($_FILES["foto"]["tmp_name"], $new_target_file)) {
        // File uploaded successfully
        echo "File ". htmlspecialchars(basename($_FILES["foto"]["name"])) . " telah berhasil diunggah.";
    } else {
        // Failed to move the file
        echo "Maaf, terjadi kesalahan saat mengunggah file.";
    }
}

// Update data ke database
$update_query = "UPDATE tb_iventaris SET id_iventaris=?, nama_barang=?, kondisi=?, stok=?, foto=?, tanggal_register=? WHERE id=?";
$stmt = mysqli_prepare($koneksi, $update_query);
mysqli_stmt_bind_param($stmt, "ssssssi", $id_iventaris, $nama_barang, $kondisi, $stok, $new_target_file, $tanggal_register, $id);

if (mysqli_stmt_execute($stmt)) {
    echo "Data berhasil diupdate.";
    header("Location: admin.php?pesan=update");
} else {
    echo "Maaf, terjadi kesalahan saat mengupdate data.";
}

mysqli_stmt_close($stmt);
mysqli_close($koneksi);
?>
