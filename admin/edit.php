<!DOCTYPE html>
<html>
<head>
    <title>EDIT DATA IVENTARIS</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
    <div class="judul">       
        <h1>EDIT DATA IVENTARIS</h1>
        <a class="tombol" href="admin.php">Kembali</a>
    </div>

    <?php
    include "../koneksi.php";

    // Mengambil id dari URL
    $id = $_GET['id'];
    $query_mysql = mysqli_query($koneksi, "SELECT * FROM tb_iventaris WHERE id='$id'") or die(mysqli_error($koneksi));
    while($data = mysqli_fetch_array($query_mysql)){
    ?>
    <form action="proses_edit.php" method="post" enctype="multipart/form-data">        
        <table>
            <tr>
                <td>ID BARANG</td>
                <td>
                    <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                    <input type="text" name="id_iventaris" value="<?php echo $data['id_iventaris'] ?>">
                </td>                    
            </tr>    
            <tr>
                <td>NAMA BARANG</td>
                <td><input type="text" name="nama_barang" value="<?php echo $data['nama_barang'] ?>"></td>                    
            </tr>    
            <tr>
                <td>KONDISI</td>
                <td><input type="text" name="kondisi" value="<?php echo $data['kondisi'] ?>"></td>                    
            </tr>    
            <tr>
                <td>STOK</td>
                <td><input type="text" name="stok" value="<?php echo $data['stok'] ?>"></td>                    
            </tr>    
            <tr>
                <td>TANGGAL REGISTER</td>
                <td><input type="text" name="tanggal_register" value="<?php echo $data['tanggal_register'] ?>"></td>                    
            </tr>    
            <tr>
                <td>FOTO</td>
                <td>
                    <input type="file" name="foto">
                    <p>Current Photo: <img src="<?php echo $data['foto']; ?>" width="100"></p>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan"></td>                    
            </tr>                
        </table>
    </form>
    <?php } ?>
</body>
</html>
