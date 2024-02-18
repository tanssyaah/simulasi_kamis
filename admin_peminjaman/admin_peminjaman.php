<!DOCTYPE html>
<html>

<head>
    <title>Membuat CRUD Dengan PHP Dan MySQL - Menampilkan data dari database</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>

<body>
    <div class="judul">
        <h1>TABEL PEMINJAMAN</h1>
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
        <a class="tombol" href="input.php">PINJAM</a>
        <a class="tombol" href="../index.php">BACK</a>
    </div>

    <div style="text-align:center;">
        <h3>TABEL PEMINJAMAN</h3>
        <form action="" method="POST" class="tombol">
            <label>CARI</label>
            <input type="text" name="keyword" size="40" autofocus placeholder="Nama Barang" autocomplete="off">
            <button type="submit" name="cari">Cari</button>
        </form>

    </div>
    <div style="padding-left: 80px; padding-right: 80px;">
        <table border="1" class="table">
            <tr>
                <th>ID IVENTARIS</th>
                <th>NAMA BARANG</th>
                <th>NAMA PEMINJAM</th>
                <th>TANGGAL PINJAM</th>
                <th>TANGGAL KEMBALI</th>
                <th>STATUS</th>
                <th>PETUGAS</th>
                <th>AKSI</th>
            </tr>

            <?php
            include "../koneksi.php";

            if (isset($_POST["cari"])) {
                $data = mysqli_real_escape_string($koneksi, $_POST["keyword"]);
                $result = mysqli_query($koneksi, "SELECT * FROM tb_peminjaman WHERE nama_barang LIKE '%$data%'");
            } else {
                $result = mysqli_query($koneksi, "SELECT * FROM tb_peminjaman") or die(mysqli_error($koneksi));
            }

            while ($data = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?php echo $data['id_iventaris']; ?></td>
                    <td><?php echo $data['nama_barang']; ?></td>
                    <td><?php echo $data['nama_peminjam']; ?></td>
                    <td><?php echo $data['tanggal_pinjam']; ?></td>
                    <td><?php echo $data['tanggal_kembali']; ?></td>
                    <td><?php echo $data['status']; ?></td>
                    <td><?php echo $data['petugas']; ?></td>
                    <td>
                        <div style="text-align:center;">
                            <a href="keluar.php?id=<?php echo $data['id']; ?>"><button>keluar</button></a>
                            <a href="hapus.php?id=<?php echo $data['id']; ?>"><button>Hapus</button></a>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>

</html>
