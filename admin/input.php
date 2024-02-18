<!DOCTYPE html>
<html>

<head>
    <title>Membuat CRUD Dengan PHP Dan MySQL - Menampilkan data dari database</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>

<body>
    <div class="judul">
        <h1> INPUT IVENTARIS </h1>
    </div>

    <br />
    <div style="text-align:center;">
        <a class="tombol" href="admin.php">Kembali</a>
        <br />
        <h3>Input data barang</h3>
    </div>
    <form action="proses.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>ID IVENTARIS</td>
                <td><input type="text" name="id_iventaris"></td>
            </tr>
            <tr>
                <td>NAMA BARANG</td>
                <td><input type="text" name="nama_barang"></td>
            </tr>
            <tr>
                <td>KONDISI</td>
                <td><input type="text" name="kondisi"></td>
            </tr>
            <tr>
                <td>STOK</td>
                <td><input type="text" name="stok"></td>
            </tr>
            <tr>
                <td>TANGGAL REGISTER</td>
                <td><input type="date" name="tanggal_register"></td>
            </tr>
            <tr>
                <td>FOTO</td>
                <td><input type="file" name="foto"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan"></td>
            </tr>
        </table>
    </form>
</body>

</html>
