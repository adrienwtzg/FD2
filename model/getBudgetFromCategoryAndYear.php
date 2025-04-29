<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include '../db/db_connect.php';

$idCategory = (isset($_GET["idCategory"]) ? $_GET["idCategory"] : "");
$year = (isset($_GET["year"]) ? $_GET["year"] : "");


$db = connectDB();


$qCats = $db->prepare("SELECT * FROM categories");


$qBud = $db->prepare("SELECT * FROM `budget` WHERE `year` = ? AND `idCategory` = ?");
$qBud->bindParam(1, $year);
$qBud->bindParam(2, $idCategory);



if ($qCats->execute()) {
  $cats = $qCats->fetchAll();
  

  if ($qBud->execute()) {
    $buds = $qBud->fetchAll();
    $result = [];
    $c = 0;
    foreach ($cats as $cat) {
      $result[$c][0] = $cat["idCategory"];
      $result[$c][1] = $cat["name"];
      $result[$c][2] = $cat["type"];
      
      foreach ($buds as $bud) {
        if($bud[4] == $cat["idCategory"]) {
          $result[$c][3] = $bud["idCategory"];
          $result[$c][4] = $bud["year"];
          $result[$c][5] = $bud["month"];
          $result[$c][6] = $bud["amount"];
        }
        else {
          $result[$c][3] = null ;
          $result[$c][4] = null ;
          $result[$c][5] = null ;
          $result[$c][6] = null ;
        }
      }
      $c += 1;
    }
    
    echo json_encode($result);

  }
  else {
    echo json_encode(1);
  }
}
else {
  echo json_encode(1);
}
?>