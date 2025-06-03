<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include '../db/db_connect.php';



$period = (isset($_POST["period"]) ? $_POST["period"] : "");
$year = (isset($_POST["year"]) ? $_POST["year"] : "");



$db = connectDB();

if ($period == 0) {
  $query = $db->prepare("SELECT * FROM transactions LEFT JOIN categories ON transactions.idCategory = categories.idCategory WHERE YEAR(effectiveDate) = ? ORDER BY transactions.effectiveDate DESC, transactions.date DESC");
  $query->bindParam(1, $year);
}
else {
  $query = $db->prepare("SELECT * FROM transactions LEFT JOIN categories ON transactions.idCategory = categories.idCategory WHERE YEAR(effectiveDate) = ? AND MONTH(effectiveDate) = ? ORDER BY transactions.effectiveDate DESC, transactions.date DESC");
  $query->bindParam(1, $year);
  $query->bindParam(2, $period);
}





if ($query->execute()) {
  $tab = $query->fetchAll();
  echo json_encode($tab);
}
else {
  echo json_encode(1);
}
?>