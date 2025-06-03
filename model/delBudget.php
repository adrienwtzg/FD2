<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include '../db/db_connect.php';


$year = (isset($_POST["year"]) ? $_POST["year"] : "");
$month = (isset($_POST["month"]) ? $_POST["month"] : "");
$idCategory = (isset($_POST["idCategory"]) ? $_POST["idCategory"] : "");

$db = connectDB();


$upd = $db->prepare("DELETE FROM `budget` WHERE `year` = ? AND `month` = ? AND `idCategory` = ?");
$upd->bindParam(1, $year);
$upd->bindParam(2, $month);
$upd->bindParam(3, $idCategory);

if ($upd->execute()) {
  echo json_encode(true);
}
else {
  echo json_encode(false);
}



?>
