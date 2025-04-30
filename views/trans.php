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
    line-height: 10px;
    min-height: 10px;
    height: 10px;
  }
  td {
    padding-left: 20%;
    padding-right: 20%;
  }
</style>
    <div class="marge"></div>
    <div class="container">
      <table id="tableTrans" class="table">
          <tr>
            <th>Date</th>
            <th>Type</th>
            <th>Category</th>
            <th>Amount</th>
            <th>Details</th>
            <th>Effective Date</th>
          </tr>
          <tr>
            <td>29 sep 25</td>
            <td>Income</td>
            <td>Salaire (net)</td>
            <td>4070</td>
            <td><i>Le salaire qui est versé à la fin du moin depuis Hirslanden</i></td>
            <td>-> 1 oct 25</td>
          </tr>
          <tr>
            <td>29 sep 25</td>
            <td>Income</td>
            <td>Salaire (net)</td>
            <td>4070</td>
            <td><i>Le salaire qui est versé à la fin du moin depuis Hirslanden</i></td>
            <td>-> 1 oct 25</td>
          </tr>
          <tr>
            <td>29 sep 25</td>
            <td>Income</td>
            <td>Salaire (net)</td>
            <td>4070</td>
            <td><i>Le salaire qui est versé à la fin du moin depuis Hirslanden</i></td>
            <td>-> 1 oct 25</td>
          </tr>
      </table>
    </div>
    <script>
    

      $(document).ready(function(){
        
        displayCategories();

      });

      
    </script>
  </body>
</html>
