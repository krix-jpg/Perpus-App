<?php
if($_POST) {

    include '../config/database.php';
    include '../object/Kategori.php';

    $database = new Database();
    $db = $database->getConnection();

    $kategori = new Kategori($db);

    $kategori->NamaKategori = $_POST['NamaKategori'];
    $kategori->ID = $_POST['id'];

    $kategori->update();
}
header("Location: http://localhost/perpus_app/Kategori/index.php");
?>