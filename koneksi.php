
<?php
session_start();
$server = "localhost";
$username = "root";
$password = "";
$database = "db_ukk";

$koneksi = mysqli_connect($server, $username, $password, $database);

if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

function cari($keyword) {
    global $koneksi;

    $sql = "SELECT * FROM tb_iventaris
            WHERE 
            cari LIKE '%$keyword%'
            ";
    return mysqli_query($koneksi, $sql);
}
?>
