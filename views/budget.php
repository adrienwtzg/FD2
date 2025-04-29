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
    <div class="row">
      <div class="col-1"></div>
      <div class="col-1">
        <select class="custom-select" id="year">
          <option selected>2025</option>
          <option>2026</option>
        </select>
      </div>
    </div>
    
    <div class="container">
      <h4 class="text-center">Income</h4>
      <table style="margin-bottom: 5%;" id="tableIncome" class="table table-hover table-responsive">
          
      </table>
      <br>
      <h4 class="text-center">Expenses</h4>
      <table style="margin-bottom: 5%;" id="tableExpenses" class="table table-hover table-responsive">
          
      </table>
      <br>
      <h4 class="text-center">Savings</h4>
      <table style="margin-bottom: 5%;" id="tableSavings" class="table table-hover table-responsive">
          
      </table>
      
    </div>
    <script>
    
     

      function displayCategories() {

        // Table Structure
        $('#tableIncome').empty();
        $('#tableExpenses').empty();
        $('#tableSavings').empty();
        let header = ""+
          "<tr>"+
            "<th style=\"width: 400px;\"></th>"+
            "<th style=\"text-align: center; width: 100px;\">Jan</th>"+
            "<th style=\"text-align: center; width: 100px;\">Mar</th>"+
            "<th style=\"text-align: center; width: 100px;\">Feb</th>"+
            "<th style=\"text-align: center; width: 100px;\">Apr</th>"+
            "<th style=\"text-align: center; width: 100px;\">May</th>"+
            "<th style=\"text-align: center; width: 100px;\">Jun</th>"+
            "<th style=\"text-align: center; width: 100px;\">Jul</th>"+
            "<th style=\"text-align: center; width: 100px;\">Aug</th>"+
            "<th style=\"text-align: center; width: 100px;\">Sep</th>"+
            "<th style=\"text-align: center; width: 100px;\">Oct</th>"+
            "<th style=\"text-align: center; width: 100px;\">Nov</th>"+
            "<th style=\"text-align: center; width: 100px;\">Dec</th>"+
          "</tr>";
          
        $('#tableIncome').append(header);
        $('#tableExpenses').append(header);
        $('#tableSavings').append(header);

        $.ajax({
          url: 'model/getBudgetFromCategoryAndYear.php',
          data: {idCategory: 2, year: 2025},
          success: function(data) {
            let clearData = JSON.parse(data);
            console.log(clearData);
            if (clearData.length == 0) {
              
            }
            else {
            clearData.forEach(function (item) {             
              if (item[2] == "Income") {
                $('#tableIncome').append(""+
                  "<tr>"+
                    "<td class=\"text-center\">"+item[1]+"</td>"+
                    "<td class=\"text-center\"><input type=\"text\" style=\"text-align: right;\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\"></td>"+
                  "</tr>"
                );
              }
              else if (item[2] == "Expenses") {
                $('#tableExpenses').append(""+
                  "<tr>"+
                    "<td class=\"text-center\">"+item[1]+"</td>"+
                    "<td class=\"text-center\"><input type=\"text\" style=\"text-align: right;\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\"></td>"+
                  "</tr>"
                );
              }
              else {
                $('#tableSavings').append(""+
                  "<tr>"+
                    "<td class=\"text-center\">"+item[1]+"</td>"+
                    "<td class=\"text-center\"><input type=\"text\" style=\"text-align: right;\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\"></td>"+
                  "</tr>"
                );
              }
              
          });
        }
          },
          type: 'GET'
        });
      }
      

      $(document).ready(function(){
        
        displayCategories();

      });
    </script>
  </body>
</html>
