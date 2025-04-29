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
      <table style="margin-bottom: 5%;" id="tableIncome" class="table table-hover table-responsive">
          
      </table>
      <br>
      <table style="margin-bottom: 5%;" id="tableExpenses" class="table table-hover table-responsive">
          
      </table>
      <br>
      <table style="margin-bottom: 5%;" id="tableSavings" class="table table-hover table-responsive">
          
      </table>
      
    </div>
    <script>
    
     function displayTableHead(type, color) {
      return ""+
          "<tr>"+
            "<th style=\"color: "+color+";text-align: center; width: 400px;\">"+type+"</th>"+
            "<th style=\"color: "+color+";text-align: center; width: 100px;\">Jan</th>"+
            "<th style=\"color: "+color+";text-align: center; width: 100px;\">Mar</th>"+
            "<th style=\"color: "+color+";text-align: center; width: 100px;\">Feb</th>"+
            "<th style=\"color: "+color+";text-align: center; width: 100px;\">Apr</th>"+
            "<th style=\"color: "+color+";text-align: center; width: 100px;\">May</th>"+
            "<th style=\"color: "+color+";text-align: center; width: 100px;\">Jun</th>"+
            "<th style=\"color: "+color+";text-align: center; width: 100px;\">Jul</th>"+
            "<th style=\"color: "+color+";text-align: center; width: 100px;\">Aug</th>"+
            "<th style=\"color: "+color+";text-align: center; width: 100px;\">Sep</th>"+
            "<th style=\"color: "+color+";text-align: center; width: 100px;\">Oct</th>"+
            "<th style=\"color: "+color+";text-align: center; width: 100px;\">Nov</th>"+
            "<th style=\"color: "+color+";text-align: center; width: 100px;\">Dec</th>"+
          "</tr>";
     }

      function displayCategories() {

        let blue = "#0070c0";
        let red = "#ff0066";
        let green = "#00cc66";

        // Table Structure
        $('#tableIncome').empty();
        $('#tableExpenses').empty();
        $('#tableSavings').empty();
        $('#tableIncome').append(displayTableHead("Income", green));
        $('#tableExpenses').append(displayTableHead("Expenses", red));
        $('#tableSavings').append(displayTableHead("Savings", blue));

        $.ajax({
          url: 'model/getBudgetFromCategoryAndYear.php',
          data: {year: 2025},
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
                    "<td class=\"text-center\"><input type=\"text\" style=\"text-align: right;\" value=\""+item[3]+"\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\" style=\"text-align: right;\" value=\""+item[4]+"\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\" style=\"text-align: right;\" value=\""+item[5]+"\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\" style=\"text-align: right;\" value=\""+item[6]+"\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\" style=\"text-align: right;\" value=\""+item[7]+"\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\" style=\"text-align: right;\" value=\""+item[8]+"\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\" style=\"text-align: right;\" value=\""+item[9]+"\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\" style=\"text-align: right;\" value=\""+item[10]+"\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\" style=\"text-align: right;\" value=\""+item[11]+"\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\" style=\"text-align: right;\" value=\""+item[12]+"\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\" style=\"text-align: right;\" value=\""+item[13]+"\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\" style=\"text-align: right;\" value=\""+item[14]+"\"></td>"+
                  "</tr>"
                );
              }
              else if (item[2] == "Expenses") {
                $('#tableExpenses').append(""+
                  "<tr>"+
                    "<td class=\"text-center\">"+item[1]+"</td>"+
                    "<td class=\"text-center\"><input type=\"text\" style=\"text-align: right;\" value=\""+item[3]+"\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\" style=\"text-align: right;\" value=\""+item[4]+"\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\" style=\"text-align: right;\" value=\""+item[5]+"\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\" style=\"text-align: right;\" value=\""+item[6]+"\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\" style=\"text-align: right;\" value=\""+item[7]+"\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\" style=\"text-align: right;\" value=\""+item[8]+"\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\" style=\"text-align: right;\" value=\""+item[9]+"\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\" style=\"text-align: right;\" value=\""+item[10]+"\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\" style=\"text-align: right;\" value=\""+item[11]+"\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\" style=\"text-align: right;\" value=\""+item[12]+"\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\" style=\"text-align: right;\" value=\""+item[13]+"\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\" style=\"text-align: right;\" value=\""+item[14]+"\"></td>"+
                  "</tr>"
                );
              }
              else {
                $('#tableSavings').append(""+
                  "<tr>"+
                    "<td class=\"text-center\">"+item[1]+"</td>"+
                    "<td class=\"text-center\"><input type=\"text\" style=\"text-align: right;\" value=\""+item[3]+"\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\" style=\"text-align: right;\" value=\""+item[4]+"\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\" style=\"text-align: right;\" value=\""+item[5]+"\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\" style=\"text-align: right;\" value=\""+item[6]+"\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\" style=\"text-align: right;\" value=\""+item[7]+"\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\" style=\"text-align: right;\" value=\""+item[8]+"\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\" style=\"text-align: right;\" value=\""+item[9]+"\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\" style=\"text-align: right;\" value=\""+item[10]+"\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\" style=\"text-align: right;\" value=\""+item[11]+"\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\" style=\"text-align: right;\" value=\""+item[12]+"\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\" style=\"text-align: right;\" value=\""+item[13]+"\"></td>"+
                    "<td class=\"text-center\"><input type=\"text\" style=\"text-align: right;\" value=\""+item[14]+"\"></td>"+
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
