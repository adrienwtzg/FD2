<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include '../db/db_connect.php';

$idCategory = (isset($_GET["idCategory"]) ? $_GET["idCategory"] : "");
$year = (isset($_GET["year"]) ? $_GET["year"] : "");

$db = connectDB();
$query = $db->prepare("SELECT * FROM `budget` WHERE `year` = ? AND `idCategory` = ?");
$query->bindParam(1, $year);
$query->bindParam(2, $idCategory);

if ($query->execute()) {
  $tab = $query->fetchAll();
  echo json_encode($tab);
}
else {
  echo json_encode(1);
}
?>