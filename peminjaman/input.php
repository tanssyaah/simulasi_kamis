<?php
include "../koneksi.php";

date_default_timezone_set('Asia/Jakarta');

if (isset($_POST['id_iventaris'])) {
    $id_iventaris   = $_POST['id_iventaris'];
    $nama_barang    = $_POST['nama_barang'];
    $nama_peminjam  = $_POST['nama_peminjam'];
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
	$petugas = $_POST['petugas'];

    $x = mysqli_query($koneksi, "INSERT INTO tb_peminjaman (id_iventaris, nama_barang, nama_peminjam, tanggal_pinjam, petugas, status) VALUES ('$id_iventaris', '$nama_barang', '$nama_peminjam', '$tanggal_pinjam', '$petugas', 'belum selesai')");

    if ($x) {
        $_SESSION['notif'] = 'berhasil menambah data';
        header("Location: peminjaman.php");
        die();
    } else {
        $_SESSION['notif'] = 'gagal menambah data';
        header("Location: peminjaman.php");
        die();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
	@import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
	</style>
	<link rel="stylesheet" href="../style.css?<?= time() ?>">
	<title>pinjam</title>
</head>
<body>

    <div class="judul">       
        <h1>TABEL PINJAM</h1>
    </div>

		<h3>PINJAM</h3>
		<a href="peminjaman.php">BACK</a>

		<form action="" method="post">


			<?php if (isset($_SESSION['notif'])) { ?>
				<div class="notif">
					<p><?= $_SESSION['notif'] ?></p>
				</div>
			<?php unset($_SESSION['notif']); } ?>
			
			<label for="">ID_IVENTORIS</label>
			<input type="text" required name="id_iventaris" maxlength="6">

			<label for="">NAMA BARANG</label>
            <input type="text" required name="nama_barang">

            <label for="">NAMA PEMINJAM</label>
            <input type="text" required name="nama_peminjam">


			<label for="">TANGGAL PINJAM</label>
			<input name="tanggal_pinjam" type="date" value="<?= date('h:i') ?>" required>

			<label for="">NAMA PETUGAS</label>
            <input type="text" required name="petugas">

			<button>Tambah</button>
		</form>

	
</body>
</html>