<?php 
include '../koneksi.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

    // Create a connection
	$koneksi = mysqli_connect("localhost","root","","db_ukk");

    // Check the connection
    if (!$koneksi) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Delete data from tb_iventaris
    $query_delete = mysqli_query($koneksi, "DELETE FROM tb_iventaris WHERE id='$id'") or die(mysqli_error($koneksi));

    // Close the connection
    mysqli_close($koneksi);

    if($query_delete){
        header("location:admin.php?pesan=hapus");
    } else {
        echo "Gagal menghapus data.";
    }
} else {
    echo "ID tidak ditemukan.";
}
?>
