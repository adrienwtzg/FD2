<?php
if (isset($_SESSION["log"])) {
  header('Location: index.php?page=projets');
}
//Message d'erreur de connexion
if (isset($_SESSION['loginError']))
{
    echo $_SESSION['loginError'];
    unset($_SESSION['loginError']);
}
?>
<style>
  tr {
    line-height: 5px;
    min-height: 5px;
    height: 5px;
  }
</style>
    <div class="marge"></div>
    <div class="container">
      <table class="table table-hover table-responsive">
        <thead>
          <tr>
            <th style="width: 300px;"></th>
            <th style="width: 100px;">Mar</th>
            <th style="width: 100px;">Feb</th>
            <th style="width: 100px;">Jan</th>
            <th style="width: 100px;">Apr</th>
            <th style="width: 100px;">May</th>
            <th style="width: 100px;">Jun</th>
            <th style="width: 100px;">Jul</th>
            <th style="width: 100px;">Aug</th>
            <th style="width: 100px;">Sep</th>
            <th style="width: 100px;">Oct</th>
            <th style="width: 100px;">Nov</th>
            <th style="width: 100px;">Dec</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
          </tr>
          <tr>
            <td class="text-center"><h5>Income</h5></td>
          </tr>
          <tr>
            <td class="text-center">Salaire (net)</td>
            <td class="text-center"><input type="text" style="text-align: right;"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
          </tr>
          <tr>
            <td class="text-center">Tati</td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
          </tr>
          <tr>
          <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
          </tr>
          <tr>
            <td class="text-center"><h5>Expenses</h5></td>
          </tr>
          <tr>
            <td class="text-center">Salaire (net)</td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
          </tr>
          <tr>
            <td class="text-center">Tati</td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
          </tr>
          <tr>
            <td class="text-center">Tati</td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
          </tr>
          <tr>
            <td class="text-center">Tati</td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
          </tr>
          <tr>
            <td class="text-center">Tati</td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
          </tr>
          <tr>
            <td class="text-center">Tati</td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
          </tr>
          <tr>
            <td class="text-center">Tati</td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
          </tr>
          <tr>
            <td class="text-center">Tati</td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
          </tr>
          <tr>
          <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
          </tr>
          <tr>
            <td class="text-center"><h5>Savings</h5></td>
          </tr>
          <tr>
            <td class="text-center">Salaire (net)</td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
          </tr>
          <tr>
            <td class="text-center">Tati</td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
          </tr>
          <tr>
            <td class="text-center">Tati</td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
          </tr>
          <tr>
            <td class="text-center">Tati</td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
          </tr>
          <tr>
            <td class="text-center">Tati</td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
          </tr>
          <tr>
            <td class="text-center">Tati</td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
          </tr>
          <tr>
            <td class="text-center">Tati</td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
          </tr>
          <tr>
            <td class="text-center">Tati</td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
          </tr>
          <tr>
            <td class="text-center">Tati</td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
          </tr>
          <tr>
            <td class="text-center">Tati</td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
          </tr>
          <tr>
            <td class="text-center">Tati</td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
          </tr>
          <tr>
            <td class="text-center">Tati</td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
          </tr>
          <tr>
            <td class="text-center">Tati</td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
            <td class="text-center"><input type="text"></td>
          </tr>
          <tr>
          <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
          </tr>
        </tbody>
      </table>
      
    </div>
  </body>
</html>
