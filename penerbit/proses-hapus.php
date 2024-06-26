<?php
if($_GET["ID"]) {
    include '../config/Database.php';
    include '../object/Penerbit.php';

    $database = new Database();
    $db = $database->getConnection();

    $penerbit = new Penerbit ($db);
    $penerbit->ID = $_GET["ID"];

    $penerbit->delete();
}

header("Location: http://localhost/perpus_app/penerbit/index.php");
?>
</body>
</html>
