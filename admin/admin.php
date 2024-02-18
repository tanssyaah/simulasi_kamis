<!DOCTYPE html>
<html>

<head>
    <title>Membuat CRUD Dengan PHP Dan MySQL - Menampilkan data dari database</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>

<body>
    <div class="judul">
        <h1>TABEL IVENTARIS</h1>
    </div>
    <br />

    <?php
    if (isset($_GET['pesan'])) {
        $pesan = $_GET['pesan'];
        if ($pesan == "input") {
            echo "Data berhasil di input.";
        } else if ($pesan == "update") {
            echo "Data berhasil di update.";
        } else if ($pesan == "hapus") {
            echo "Data berhasil di hapus.";
        }
    }
    ?>
    <br />
    <div style="text-align:center;">
        <a class="tombol" href="input.php">Tambah Data Barang</a>
        <a class="tombol" href="../index.php">BACK</a>
    </div>

    <div style="text-align:center;">
        <h3>TABEL IVENTARIS</h3>
        <form action="" method="POST" class="cari">
            <label>CARI</label>
            <input type="text" name="keyword" size="40" autofocus placeholder="nama_barang" autocomplete="off">
            <button type="submit" name="cari">Cari</button>
        </form>

    </div>
    <div style="padding-left: 80px;
            padding-right: 80px;">

        <?php
        include "../koneksi.php";

        if (isset($_POST["cari"])) {
            $cari = $_POST["keyword"];
            $result = mysqli_query($koneksi, "SELECT * FROM tb_iventaris WHERE nama_barang LIKE '%$cari%' ");
        } else {
            $result = mysqli_query($koneksi, "SELECT * FROM tb_iventaris") or die(mysqli_error($koneksi));
        }
        ?>

       <!-- ... (existing code) ... -->

<table border="1" class="table">
    <tr>
        <th>ID IVENTARIS</th>
        <th>NAMA BARANG</th>
        <th>KONDISI</th>
        <th>STOK</th>
        <th>TANGGAL REGISTER</th>
        <th>FOTO</th>
        <th>ACTION</th>
    </tr>

    <?php
    $query_mysql = mysqli_query($koneksi, "SELECT * FROM tb_iventaris") or die(mysqli_error($koneksi));
    while ($data = mysqli_fetch_array($query_mysql)) {
    ?>
        <tr>
            <td><?php echo $data['id_iventaris']; ?></td>
            <td><?php echo $data['nama_barang']; ?></td>
            <td><?php echo $data['kondisi']; ?></td>
            <td><?php echo $data['stok']; ?></td>
            <td><?php echo $data['tanggal_register']; ?></td>
            <td>
                <img src="<?php echo $data['foto']; ?>" alt="Foto Barang" width="100">
            </td>
            <td>
                <div style="text-align:center;">
                    <a href="edit.php?id=<?php echo $data['id']; ?>"><button>Edit</button></a>
                    <a href="hapus.php?id=<?php echo $data['id']; ?>"><button>Hapus</button></a>
                </div>
            </td>
        </tr>
    <?php } ?>
</table>

<!-- ... (existing code) ... -->

    </div>
</body>

</html>