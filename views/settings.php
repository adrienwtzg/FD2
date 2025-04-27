<?php

include 'db/db_connect.php';

/*$db = connectDB();

$stmt = $db->prepare("INSERT INTO categories (name, type) VALUES (?, ?)");
$cat="Loyer";
$typ="Expenses";
$stmt->bindParam(1, $cat);
$stmt->bindParam(2, $typ);

$stmt->execute();
*/

?>
<div class="marge"></div>
  <div class="row" style="margin-top: 1%; margin-left: 1%;">
    <div class="col-2" style="background-color: white; border-radius: 5px; padding: 1%;">
      <h3>Categories</h3>
      <br>
      <h4 style="text-align: center;">Income</h4>
      <ul class="list-group">
        <li class="list-group-item">
          <div class="input-group">
            <input type="text" style="color: black;" class="form-control" value="Loyer">
            <div class="input-group-append">
              <button class="btn btn-outline-secondary" style="border: 0;" type="button">❌</button>
            </div>
          </div>
        </li>
        <li class="list-group-item">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-append">
              <button class="btn btn-outline-secondary"  style="border: 0;" type="button">❌</button>
            </div>
          </div>
        </li>
      </ul>
      <br>
      <h4 style="text-align: center;">Expenses</h4>
      <ul class="list-group">
        <li class="list-group-item">
          <div class="input-group">
            <input type="text" style="color: black;" class="form-control" value="Loyer">
            <div class="input-group-append">
              <button class="btn btn-outline-secondary" style="border: 0;" type="button">❌</button>
            </div>
          </div>
        </li>
        <li class="list-group-item">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-append">
              <button class="btn btn-outline-secondary"  style="border: 0;" type="button">❌</button>
            </div>
          </div>
        </li>
      </ul>
    </div>
    <div class="col-4"></div>
    <div class="col-4"></div>
  </div>
  
    
  </body>
</html>
