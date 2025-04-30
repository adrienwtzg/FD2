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
      <table style="margin-bottom: 3%;" id="tableIncome" class="table table-hover table-responsive">
          
      </table>
      <br>
      <table style="margin-bottom: 3%;" id="tableExpenses" class="table table-hover table-responsive">
          
      </table>
      <br>
      <table style="margin-bottom: 3%;" id="tableSavings" class="table table-hover table-responsive">
          
      </table>
      
    </div>
    <script>
    
      function displayTableHead(type, color) {
        return ""+
            "<tr style=\"background-color: "+color+";\">"+
              "<th style=\"color: white; text-align: center; width: 400px;\">"+type+"</th>"+
              "<th style=\"color: white; text-align: center; width: 100px;\">Jan</th>"+
              "<th style=\"color: white; text-align: center; width: 100px;\">Mar</th>"+
              "<th style=\"color: white; text-align: center; width: 100px;\">Feb</th>"+
              "<th style=\"color: white; text-align: center; width: 100px;\">Apr</th>"+
              "<th style=\"color: white; text-align: center; width: 100px;\">May</th>"+
              "<th style=\"color: white; text-align: center; width: 100px;\">Jun</th>"+
              "<th style=\"color: white; text-align: center; width: 100px;\">Jul</th>"+
              "<th style=\"color: white; text-align: center; width: 100px;\">Aug</th>"+
              "<th style=\"color: white; text-align: center; width: 100px;\">Sep</th>"+
              "<th style=\"color: white; text-align: center; width: 100px;\">Oct</th>"+
              "<th style=\"color: white; text-align: center; width: 100px;\">Nov</th>"+
              "<th style=\"color: white; text-align: center; width: 100px;\">Dec</th>"+
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
          data: {year: $('#year').val()},
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
                    "<td class=\"text-center\"><input id=\""+item[0]+"i1\" onchange=\"changeBudget($('#year').val(), 1, "+item[0]+", '"+item[0]+"i1')\" type=\"text\" style=\"text-align: right;\" value=\""+item[3]+"\"></td>"+
                    "<td class=\"text-center\"><input id=\""+item[0]+"i2\" onchange=\"changeBudget($('#year').val(), 1, "+item[0]+", '"+item[0]+"i2')\" type=\"text\" style=\"text-align: right;\" value=\""+item[4]+"\"></td>"+
                    "<td class=\"text-center\"><input id=\""+item[0]+"i3\" onchange=\"changeBudget($('#year').val(), 1, "+item[0]+", '"+item[0]+"i3')\" type=\"text\" style=\"text-align: right;\" value=\""+item[5]+"\"></td>"+
                    "<td class=\"text-center\"><input id=\""+item[0]+"i4\" onchange=\"changeBudget($('#year').val(), 1, "+item[0]+", '"+item[0]+"i4')\" type=\"text\" style=\"text-align: right;\" value=\""+item[6]+"\"></td>"+
                    "<td class=\"text-center\"><input id=\""+item[0]+"i5\" onchange=\"changeBudget($('#year').val(), 1, "+item[0]+", '"+item[0]+"i5')\" type=\"text\" style=\"text-align: right;\" value=\""+item[7]+"\"></td>"+
                    "<td class=\"text-center\"><input id=\""+item[0]+"i6\" onchange=\"changeBudget($('#year').val(), 1, "+item[0]+", '"+item[0]+"i6')\" type=\"text\" style=\"text-align: right;\" value=\""+item[8]+"\"></td>"+
                    "<td class=\"text-center\"><input id=\""+item[0]+"i7\" onchange=\"changeBudget($('#year').val(), 1, "+item[0]+", '"+item[0]+"i7')\" type=\"text\" style=\"text-align: right;\" value=\""+item[9]+"\"></td>"+
                    "<td class=\"text-center\"><input id=\""+item[0]+"i8\" onchange=\"changeBudget($('#year').val(), 1, "+item[0]+", '"+item[0]+"i8')\" type=\"text\" style=\"text-align: right;\" value=\""+item[10]+"\"></td>"+
                    "<td class=\"text-center\"><input id=\""+item[0]+"i9\" onchange=\"changeBudget($('#year').val(), 1, "+item[0]+", '"+item[0]+"i9')\" type=\"text\" style=\"text-align: right;\" value=\""+item[11]+"\"></td>"+
                    "<td class=\"text-center\"><input id=\""+item[0]+"i10\" onchange=\"changeBudget($('#year').val(), 1, "+item[0]+", '"+item[0]+"i10')\" type=\"text\" style=\"text-align: right;\" value=\""+item[12]+"\"></td>"+
                    "<td class=\"text-center\"><input id=\""+item[0]+"i11\" onchange=\"changeBudget($('#year').val(), 1, "+item[0]+", '"+item[0]+"i11')\" type=\"text\" style=\"text-align: right;\" value=\""+item[13]+"\"></td>"+
                    "<td class=\"text-center\"><input id=\""+item[0]+"i12\" onchange=\"changeBudget($('#year').val(), 1, "+item[0]+", '"+item[0]+"i12')\" type=\"text\" style=\"text-align: right;\" value=\""+item[14]+"\"></td>"+
                  "</tr>"
                );
              }
              else if (item[2] == "Expenses") {
                $('#tableExpenses').append(""+
                  "<tr>"+
                    "<td class=\"text-center\">"+item[1]+"</td>"+
                    "<td class=\"text-center\"><input id=\""+item[0]+"e1\" onchange=\"changeBudget($('#year').val(), 1, "+item[0]+", '"+item[0]+"e1')\" type=\"text\" style=\"text-align: right;\" value=\""+item[3]+"\"></td>"+
                    "<td class=\"text-center\"><input id=\""+item[0]+"e2\" onchange=\"changeBudget($('#year').val(), 1, "+item[0]+", '"+item[0]+"e2')\" type=\"text\" style=\"text-align: right;\" value=\""+item[4]+"\"></td>"+
                    "<td class=\"text-center\"><input id=\""+item[0]+"e3\" onchange=\"changeBudget($('#year').val(), 1, "+item[0]+", '"+item[0]+"e3')\" type=\"text\" style=\"text-align: right;\" value=\""+item[5]+"\"></td>"+
                    "<td class=\"text-center\"><input id=\""+item[0]+"e4\" onchange=\"changeBudget($('#year').val(), 1, "+item[0]+", '"+item[0]+"e4')\" type=\"text\" style=\"text-align: right;\" value=\""+item[6]+"\"></td>"+
                    "<td class=\"text-center\"><input id=\""+item[0]+"e5\" onchange=\"changeBudget($('#year').val(), 1, "+item[0]+", '"+item[0]+"e5')\" type=\"text\" style=\"text-align: right;\" value=\""+item[7]+"\"></td>"+
                    "<td class=\"text-center\"><input id=\""+item[0]+"e6\" onchange=\"changeBudget($('#year').val(), 1, "+item[0]+", '"+item[0]+"e6')\" type=\"text\" style=\"text-align: right;\" value=\""+item[8]+"\"></td>"+
                    "<td class=\"text-center\"><input id=\""+item[0]+"e7\" onchange=\"changeBudget($('#year').val(), 1, "+item[0]+", '"+item[0]+"e7')\" type=\"text\" style=\"text-align: right;\" value=\""+item[9]+"\"></td>"+
                    "<td class=\"text-center\"><input id=\""+item[0]+"e8\" onchange=\"changeBudget($('#year').val(), 1, "+item[0]+", '"+item[0]+"e8')\" type=\"text\" style=\"text-align: right;\" value=\""+item[10]+"\"></td>"+
                    "<td class=\"text-center\"><input id=\""+item[0]+"e9\" onchange=\"changeBudget($('#year').val(), 1, "+item[0]+", '"+item[0]+"e9')\" type=\"text\" style=\"text-align: right;\" value=\""+item[11]+"\"></td>"+
                    "<td class=\"text-center\"><input id=\""+item[0]+"e10\" onchange=\"changeBudget($('#year').val(), 1, "+item[0]+", '"+item[0]+"e10')\" type=\"text\" style=\"text-align: right;\" value=\""+item[12]+"\"></td>"+
                    "<td class=\"text-center\"><input id=\""+item[0]+"e11\" onchange=\"changeBudget($('#year').val(), 1, "+item[0]+", '"+item[0]+"e11')\" type=\"text\" style=\"text-align: right;\" value=\""+item[13]+"\"></td>"+
                    "<td class=\"text-center\"><input id=\""+item[0]+"e12\" onchange=\"changeBudget($('#year').val(), 1, "+item[0]+", '"+item[0]+"e12')\" type=\"text\" style=\"text-align: right;\" value=\""+item[14]+"\"></td>"+
                  "</tr>"
                );
              }
              else {
                $('#tableSavings').append(""+
                  "<tr>"+
                    "<td class=\"text-center\">"+item[1]+"</td>"+
                    "<td class=\"text-center\"><input id=\""+item[0]+"s1\" onchange=\"changeBudget($('#year').val(), 1, "+item[0]+", '"+item[0]+"s1')\" type=\"text\" style=\"text-align: right;\" value=\""+item[3]+"\"></td>"+
                    "<td class=\"text-center\"><input id=\""+item[0]+"s2\" onchange=\"changeBudget($('#year').val(), 1, "+item[0]+", '"+item[0]+"s2')\" type=\"text\" style=\"text-align: right;\" value=\""+item[4]+"\"></td>"+
                    "<td class=\"text-center\"><input id=\""+item[0]+"s3\" onchange=\"changeBudget($('#year').val(), 1, "+item[0]+", '"+item[0]+"s3')\" type=\"text\" style=\"text-align: right;\" value=\""+item[5]+"\"></td>"+
                    "<td class=\"text-center\"><input id=\""+item[0]+"s4\" onchange=\"changeBudget($('#year').val(), 1, "+item[0]+", '"+item[0]+"s4')\" type=\"text\" style=\"text-align: right;\" value=\""+item[6]+"\"></td>"+
                    "<td class=\"text-center\"><input id=\""+item[0]+"s5\" onchange=\"changeBudget($('#year').val(), 1, "+item[0]+", '"+item[0]+"s5')\" type=\"text\" style=\"text-align: right;\" value=\""+item[7]+"\"></td>"+
                    "<td class=\"text-center\"><input id=\""+item[0]+"s6\" onchange=\"changeBudget($('#year').val(), 1, "+item[0]+", '"+item[0]+"s6')\" type=\"text\" style=\"text-align: right;\" value=\""+item[8]+"\"></td>"+
                    "<td class=\"text-center\"><input id=\""+item[0]+"s7\" onchange=\"changeBudget($('#year').val(), 1, "+item[0]+", '"+item[0]+"s7')\" type=\"text\" style=\"text-align: right;\" value=\""+item[9]+"\"></td>"+
                    "<td class=\"text-center\"><input id=\""+item[0]+"s8\" onchange=\"changeBudget($('#year').val(), 1, "+item[0]+", '"+item[0]+"s8')\" type=\"text\" style=\"text-align: right;\" value=\""+item[10]+"\"></td>"+
                    "<td class=\"text-center\"><input id=\""+item[0]+"s9\" onchange=\"changeBudget($('#year').val(), 1, "+item[0]+", '"+item[0]+"s9')\" type=\"text\" style=\"text-align: right;\" value=\""+item[11]+"\"></td>"+
                    "<td class=\"text-center\"><input id=\""+item[0]+"s10\" onchange=\"changeBudget($('#year').val(), 1, "+item[0]+", '"+item[0]+"s10')\" type=\"text\" style=\"text-align: right;\" value=\""+item[12]+"\"></td>"+
                    "<td class=\"text-center\"><input id=\""+item[0]+"s11\" onchange=\"changeBudget($('#year').val(), 1, "+item[0]+", '"+item[0]+"s11')\" type=\"text\" style=\"text-align: right;\" value=\""+item[13]+"\"></td>"+
                    "<td class=\"text-center\"><input id=\""+item[0]+"s12\" onchange=\"changeBudget($('#year').val(), 1, "+item[0]+", '"+item[0]+"s12')\" type=\"text\" style=\"text-align: right;\" value=\""+item[14]+"\"></td>"+
                  "</tr>"
                );
              }
              
          });
        }
          },
          type: 'GET'
        });
      }
      
      function changeBudget(year, month, idCategory, inputId) {
        let newAmount = parseInt($('#'+inputId).val(), 10);

        if (Number.isInteger(newAmount)) {
          alert(newAmount);
        }
        else {
          alert("Veuillez entrer un nombre !");
        }

        displayCategories();
      }

      $(document).ready(function(){
        
        displayCategories();

      });

      $('#year').change(function(){
        displayCategories();
      });
    </script>
  </body>
</html>
