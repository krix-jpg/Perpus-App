<?php
if ($_POST) {
    include '../config/Database.php';
    include '../object/Penerbit.php';

    $database = new Database();
    $db = $database->getConnection();

    $penerbit = new Penerbit($db);
    $penerbit->NamaPenerbit = $_POST['namapenerbit'];
    $penerbit->Alamat = $_POST['alamat'];
    $penerbit->NoTelp = $_POST['notelp'];

    $penerbit->create();
}

header("Location: http://localhost/perpus_app/penerbit/index.php");
?>

</body>
</html>
