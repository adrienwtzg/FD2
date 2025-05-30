<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include '../db/db_connect.php';


$idCat = (isset($_POST["idCat"]) ? $_POST["idCat"] : "");


$db = connectDB();
$query = $db->prepare("DELETE FROM `categories` WHERE `idCategory` = (?)");
$query->bindParam(1, $idCat);

if ($query->execute()) {
    echo json_encode(true);
}
else {
  echo json_encode(false);
}
?>
