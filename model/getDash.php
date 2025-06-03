<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include '../db/db_connect.php';

$period = (isset($_POST["period"]) ? $_POST["period"] : "");
$year = (isset($_POST["year"]) ? $_POST["year"] : "");

$db = connectDB();

if ($period == 0) {
  $query = $db->prepare("SELECT name, type, ord, tra.tracked, bud.budget FROM categories INNER JOIN (SELECT idCategory, sum(amount) as budget FROM budget WHERE year = ? GROUP BY idCategory) as bud ON bud.idCategory = categories.idCategory LEFT JOIN (SELECT idCategory, sum(amount) as tracked FROM transactions WHERE YEAR(effectiveDate) = ? GROUP BY idCategory) as tra ON tra.idCategory = categories.idCategory ORDER BY type, ord");
  $query->bindParam(1, $year);
  $query->bindParam(2, $year);
}
else{
  $query = $db->prepare("SELECT name, type, ord, tra.tracked, bud.budget FROM categories INNER JOIN (SELECT idCategory, sum(amount) as budget FROM budget WHERE month = ? AND year = ? GROUP BY idCategory) as bud ON bud.idCategory = categories.idCategory LEFT JOIN (SELECT idCategory, sum(amount) as tracked FROM transactions WHERE MONTH(effectiveDate) = ? AND YEAR(effectiveDate) = ? GROUP BY idCategory) as tra ON tra.idCategory = categories.idCategory ORDER BY type, ord");
  $query->bindParam(1, $period);
  $query->bindParam(2, $year);
  $query->bindParam(3, $period);
  $query->bindParam(4, $year);
}



if ($query->execute()) {
  $tab = $query->fetchAll();
  
  echo json_encode($tab);
}
else {
  echo json_encode(1);
}
?>