<?php
if ($_POST) {
    include '../object/Buku.php';   
    include '../object/Kategori.php';
    include '../object/Penerbit.php';
    include '../config/Database.php';


    $database = new Database();
    $db = $database->getConnection();

    $buku = new Buku($db);

    $buku->ISBN = $_POST["isbn"];
    $buku->Judul = $_POST["judul"];
    $buku->Pengarang = $_POST["pengarang"];
    $buku->Kategori_ID = $_POST["kategori_id"];
    $buku->Penerbit_ID = $_POST["penerbit_id"]; 
    $buku->Deskripsi = $_POST["deskripsi"];
    $buku->Stok = $_POST["stok"];

    $buku->create();

}

header("Location: http://localhost/perpus_app/buku/index.php");
?>
