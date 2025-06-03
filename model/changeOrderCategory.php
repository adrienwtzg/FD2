<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include '../db/db_connect.php';

$idCategory = (isset($_POST["idCategory"]) ? $_POST["idCategory"] : "");
$direction = (isset($_POST["direction"]) ? $_POST["direction"] : "");

$db = connectDB();
$query = $db->prepare("SELECT ord, type FROM categories WHERE idCategory = ?");
$query->bindParam(1, $idCategory);

if ($query->execute()) {
  $tab = $query->fetchAll();

  if ($direction == 0 && $tab[0][0] > 1) {
    $new = $tab[0][0] - 1;
  }
  else {
    $new = $tab[0][0] + 1;
  }

  $second = $db->prepare("UPDATE categories SET ord = ? WHERE ord = ? AND type = ?");
  $second->bindParam(1, $tab[0][0]);
  $second->bindParam(2, $new);
  $second->bindParam(3, $tab[0][1]);

  $main = $db->prepare("UPDATE categories SET ord = ? WHERE idCategory = ?");
  $main->bindParam(1, $new);
  $main->bindParam(2, $idCategory);

  if ($second->execute()) {
    if ($main->execute()) {
      echo json_encode(true);
    }
  }


  
}
else {
  echo json_encode(1);
}
?>