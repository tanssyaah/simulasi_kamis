<!DOCTYPE html>
<html>
<head>
    <title>Membuat CRUD Dengan PHP Dan MySQL - Menampilkan data dari database</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="judul">       
        <h1>PROGRAM IVENTARIS</h1>
    </div>
    <br/>
 
    <?php 
    if(isset($_GET['pesan'])){
        $pesan = $_GET['pesan'];
        if($pesan == "input"){
            echo "Data berhasil di input.";
        }else if($pesan == "update"){
            echo "Data berhasil di update.";
        }else if($pesan == "hapus"){
            echo "Data berhasil di hapus.";
        }
    }
    ?>
    <br/>
    <div style="text-align:center;">
    <a class="tombol" href="home/home.php">HOME</a>
	<a class="tombol" href="admin/admin.php">ADMIN</a>
	<a class="tombol" href="peminjaman/peminjaman.php">PEMINJAMAN</a>
    <a class="tombol" href="admin_peminjaman/admin_peminjaman.php">ADMIN PEMINJAMAN</a>
    </div>
</body>
</html>
