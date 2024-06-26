<?php
if($_POST) {

    include '../config/Database.php';
    include '../object/Penerbit.php';

    $database = new Database();
    $db = $database->getconnection();

    $penerbit = new Penerbit($db);

    $penerbit->NamaPenerbit = $_POST['namapenerbit'];
    $penerbit->Alamat = $_POST['alamat'];
    $penerbit->NoTelp = $_POST['notelp'];
    $penerbit->ID = $_POST['id'];

    $penerbit->update();
}
header("Location: http://localhost/perpus_app/penerbit/index.php");
?>
</body>
</html>