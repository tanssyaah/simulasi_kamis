<?php
include "../koneksi.php";

$id = $_GET['id'];

date_default_timezone_set('Asia/Jakarta');

if (isset($_POST['selesaikan'])) {
    $id_iventaris = $_POST['id_iventaris'];
    $tanggal_kembali = $_POST['tanggal_kembali'];

    $query = "UPDATE tb_peminjaman SET status='selesai', tanggal_kembali='$tanggal_kembali' WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        $_SESSION['notif'] = 'Berhasil menyelesaikan peminjaman';
    } else {
        $_SESSION['notif'] = 'Gagal menyelesaikan peminjaman';
    }

    header("Location: peminjaman.php");
    die();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Membuat CRUD Dengan PHP Dan MySQL - Menampilkan data dari database</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>

    <h1>Formulir Keluar</h1>

    <?php
    $id = $_GET['id'];
    $query_mysql = mysqli_query($koneksi, "SELECT * FROM tb_peminjaman WHERE id='$id'");
    while ($data = mysqli_fetch_array($query_mysql)) {
    ?>

    <form action="" method="post">
        <label for="id_iventaris">ID Iventaris:</label>
        <input type="text" name="id_iventaris" value="<?php echo $data['id_iventaris']; ?>" readonly>

        <label for="tanggal_kembali">Tanggal Kembali:</label>
        <input type="date" name="tanggal_kembali" required>

        <input type="submit" name="selesaikan" value="Selesaikan Peminjaman">
    </form>

    <?php } ?>

</body>
</html>
