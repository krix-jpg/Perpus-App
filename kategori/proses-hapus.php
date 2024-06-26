<?php
if($_GET["ID"]) {
    include '../config/Database.php';
    include '../object/Kategori.php';

    $database = new Database();
    $db = $database->getConnection();

    $kategori = new Kategori ($db);
    $kategori->ID = $_GET["ID"];

    $kategori->delete();
}

header("Location: http://localhost/perpus_app/kategori/index.php");
?>
</body>
</html>
