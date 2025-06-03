
<style>
  tr {
    line-height: 5px;
    min-height: 5px;
    height: 5px;
  }
  table td {
  position: relative;
  }

  table td input {
    position: absolute;
    display: block;
    top:0;
    left:0;
    margin: 2%;
    height: 90%;
    width: 90%;
    border: 0;
    border-collapse: collapse;
    padding: 10px;
    box-sizing: border-box;
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
      <table style="margin-bottom: 3%; border: 1px solid black;" id="tableAllocated" class="table table-hover table-bordered">
          
      </table>
      <br>
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
              "<th style=\"color: white; text-align: center; width: 100px;\">Feb</th>"+
              "<th style=\"color: white; text-align: center; width: 100px;\">Mar</th>"+
              "<th style=\"color: white; text-align: center; width: 100px;\">Apr</th>"+
              "<th style=\"color: white; text-align: center; width: 100px;\">May</th>"+
              "<th style=\"color: white; text-align: center; width: 100px;\">Jun</th>"+
              "<th style=\"color: white; text-align: center; width: 100px;\">Jul</th>"+
              "<th style=\"color: white; text-align: center; width: 100px;\">Aug</th>"+
              "<th style=\"color: white; text-align: center; width: 100px;\">Sep</th>"+
              "<th style=\"color: white; text-align: center; width: 100px;\">Oct</th>"+
              "<th style=\"color: white; text-align: center; width: 100px;\">Nov</th>"+
              "<th style=\"color: white; text-align: center; width: 100px;\">Dec</th>"+
              "<th style=\"color: white; text-align: center; width: 100px;\">"+$('#year').val()+"</th>"+
            "</tr>";
      }

      function focusAndCursor(selector){
        var input = $(selector);
        setTimeout(function() {
          // this focus on last character if input isn't empty
          tmp = input.val(); input.focus().val("").blur().focus().val(tmp);
        }, 200);
      }

      function NWC(x) {
          return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "'");
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

            //Total of columns
            let sumIncome = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
            let sumExpenses = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
            let sumSavings = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

            let clearData = JSON.parse(data);
            if (clearData.length == 0) {
              
            }
            else {
            clearData.forEach(function (item) {   
              //Total of rows
              let sum = item[3]*1 + item[4]*1 + item[5]*1 + item[6]*1 + item[7]*1 + item[8]*1 + item[9]*1 + item[10]*1 + item[11]*1 + item[12]*1 + item[13]*1 + item[14]*1;
              if(sum == ""){sum="-";}

              if (item[2] == "Income") {

                sumIncome[0] += item[3]*1;
                sumIncome[1] += item[4]*1;
                sumIncome[2] += item[5]*1;
                sumIncome[3] += item[6]*1;
                sumIncome[4] += item[7]*1;
                sumIncome[5] += item[8]*1;
                sumIncome[6] += item[9]*1;
                sumIncome[7] += item[10]*1;
                sumIncome[8] += item[11]*1;
                sumIncome[9] += item[12]*1;
                sumIncome[10] += item[13]*1;
                sumIncome[11] += item[14]*1;

                $('#tableIncome').append(""+
                  "<tr>"+
                    "<td class=\"text-center\">"+item[1]+"</td>"+
                    "<td class=\"text-center\"><input placeholder=\"-\" id=\""+item[0]+"i1\" onchange=\"changeBudget($('#year').val(), 1, "+item[0]+", '"+item[0]+"i1', "+item[0]+")\" type=\"text\" style=\"text-align: right;\" value=\""+item[3]+"\"></td>"+
                    "<td class=\"text-center\"><input placeholder=\"-\" id=\""+item[0]+"i2\" onchange=\"changeBudget($('#year').val(), 2, "+item[0]+", '"+item[0]+"i2', "+item[0]+")\" type=\"text\" style=\"text-align: right;\" value=\""+item[4]+"\"></td>"+
                    "<td class=\"text-center\"><input placeholder=\"-\" id=\""+item[0]+"i3\" onchange=\"changeBudget($('#year').val(), 3, "+item[0]+", '"+item[0]+"i3', "+item[0]+")\" type=\"text\" style=\"text-align: right;\" value=\""+item[5]+"\"></td>"+
                    "<td class=\"text-center\"><input placeholder=\"-\" id=\""+item[0]+"i4\" onchange=\"changeBudget($('#year').val(), 4, "+item[0]+", '"+item[0]+"i4', "+item[0]+")\" type=\"text\" style=\"text-align: right;\" value=\""+item[6]+"\"></td>"+
                    "<td class=\"text-center\"><input placeholder=\"-\" id=\""+item[0]+"i5\" onchange=\"changeBudget($('#year').val(), 5, "+item[0]+", '"+item[0]+"i5', "+item[0]+")\" type=\"text\" style=\"text-align: right;\" value=\""+item[7]+"\"></td>"+
                    "<td class=\"text-center\"><input placeholder=\"-\" id=\""+item[0]+"i6\" onchange=\"changeBudget($('#year').val(), 6, "+item[0]+", '"+item[0]+"i6', "+item[0]+")\" type=\"text\" style=\"text-align: right;\" value=\""+item[8]+"\"></td>"+
                    "<td class=\"text-center\"><input placeholder=\"-\" id=\""+item[0]+"i7\" onchange=\"changeBudget($('#year').val(), 7, "+item[0]+", '"+item[0]+"i7', "+item[0]+")\" type=\"text\" style=\"text-align: right;\" value=\""+item[9]+"\"></td>"+
                    "<td class=\"text-center\"><input placeholder=\"-\" id=\""+item[0]+"i8\" onchange=\"changeBudget($('#year').val(), 8, "+item[0]+", '"+item[0]+"i8', "+item[0]+")\" type=\"text\" style=\"text-align: right;\" value=\""+item[10]+"\"></td>"+
                    "<td class=\"text-center\"><input placeholder=\"-\" id=\""+item[0]+"i9\" onchange=\"changeBudget($('#year').val(), 9, "+item[0]+", '"+item[0]+"i9', "+item[0]+")\" type=\"text\" style=\"text-align: right;\" value=\""+item[11]+"\"></td>"+
                    "<td class=\"text-center\"><input placeholder=\"-\" id=\""+item[0]+"i10\" onchange=\"changeBudget($('#year').val(), 10, "+item[0]+", '"+item[0]+"i10', "+item[0]+")\" type=\"text\" style=\"text-align: right;\" value=\""+item[12]+"\"></td>"+
                    "<td class=\"text-center\"><input placeholder=\"-\" id=\""+item[0]+"i11\" onchange=\"changeBudget($('#year').val(), 11, "+item[0]+", '"+item[0]+"i11', "+item[0]+")\" type=\"text\" style=\"text-align: right;\" value=\""+item[13]+"\"></td>"+
                    "<td class=\"text-center\"><input placeholder=\"-\" id=\""+item[0]+"i12\" onchange=\"changeBudget($('#year').val(), 12, "+item[0]+", '"+item[0]+"i12', "+item[0]+")\" type=\"text\" style=\"text-align: right;\" value=\""+item[14]+"\"></td>"+
                    "<td class=\"text-center\"><b style=\"float: right;\">"+NWC(sum)+"</b></td>"+
                  "</tr>"
                );
              }
              else if (item[2] == "Expenses") {

                sumExpenses[0] += item[3]*1;
                sumExpenses[1] += item[4]*1;
                sumExpenses[2] += item[5]*1;
                sumExpenses[3] += item[6]*1;
                sumExpenses[4] += item[7]*1;
                sumExpenses[5] += item[8]*1;
                sumExpenses[6] += item[9]*1;
                sumExpenses[7] += item[10]*1;
                sumExpenses[8] += item[11]*1;
                sumExpenses[9] += item[12]*1;
                sumExpenses[10] += item[13]*1;
                sumExpenses[11] += item[14]*1;

                $('#tableExpenses').append(""+
                  "<tr>"+
                    "<td class=\"text-center\">"+item[1]+"</td>"+
                    "<td class=\"text-center\"><input placeholder=\"-\" id=\""+item[0]+"e1\" onchange=\"changeBudget($('#year').val(), 1, "+item[0]+", '"+item[0]+"e1', "+item[0]+")\" type=\"text\" style=\"text-align: right;\" value=\""+item[3]+"\"></td>"+
                    "<td class=\"text-center\"><input placeholder=\"-\" id=\""+item[0]+"e2\" onchange=\"changeBudget($('#year').val(), 2, "+item[0]+", '"+item[0]+"e2', "+item[0]+")\" type=\"text\" style=\"text-align: right;\" value=\""+item[4]+"\"></td>"+
                    "<td class=\"text-center\"><input placeholder=\"-\" id=\""+item[0]+"e3\" onchange=\"changeBudget($('#year').val(), 3, "+item[0]+", '"+item[0]+"e3', "+item[0]+")\" type=\"text\" style=\"text-align: right;\" value=\""+item[5]+"\"></td>"+
                    "<td class=\"text-center\"><input placeholder=\"-\" id=\""+item[0]+"e4\" onchange=\"changeBudget($('#year').val(), 4, "+item[0]+", '"+item[0]+"e4', "+item[0]+")\" type=\"text\" style=\"text-align: right;\" value=\""+item[6]+"\"></td>"+
                    "<td class=\"text-center\"><input placeholder=\"-\" id=\""+item[0]+"e5\" onchange=\"changeBudget($('#year').val(), 5, "+item[0]+", '"+item[0]+"e5', "+item[0]+")\" type=\"text\" style=\"text-align: right;\" value=\""+item[7]+"\"></td>"+
                    "<td class=\"text-center\"><input placeholder=\"-\" id=\""+item[0]+"e6\" onchange=\"changeBudget($('#year').val(), 6, "+item[0]+", '"+item[0]+"e6', "+item[0]+")\" type=\"text\" style=\"text-align: right;\" value=\""+item[8]+"\"></td>"+
                    "<td class=\"text-center\"><input placeholder=\"-\" id=\""+item[0]+"e7\" onchange=\"changeBudget($('#year').val(), 7, "+item[0]+", '"+item[0]+"e7', "+item[0]+")\" type=\"text\" style=\"text-align: right;\" value=\""+item[9]+"\"></td>"+
                    "<td class=\"text-center\"><input placeholder=\"-\" id=\""+item[0]+"e8\" onchange=\"changeBudget($('#year').val(), 8, "+item[0]+", '"+item[0]+"e8', "+item[0]+")\" type=\"text\" style=\"text-align: right;\" value=\""+item[10]+"\"></td>"+
                    "<td class=\"text-center\"><input placeholder=\"-\" id=\""+item[0]+"e9\" onchange=\"changeBudget($('#year').val(), 9, "+item[0]+", '"+item[0]+"e9', "+item[0]+")\" type=\"text\" style=\"text-align: right;\" value=\""+item[11]+"\"></td>"+
                    "<td class=\"text-center\"><input placeholder=\"-\" id=\""+item[0]+"e10\" onchange=\"changeBudget($('#year').val(), 10, "+item[0]+", '"+item[0]+"e10', "+item[0]+")\" type=\"text\" style=\"text-align: right;\" value=\""+item[12]+"\"></td>"+
                    "<td class=\"text-center\"><input placeholder=\"-\" id=\""+item[0]+"e11\" onchange=\"changeBudget($('#year').val(), 11, "+item[0]+", '"+item[0]+"e11', "+item[0]+")\" type=\"text\" style=\"text-align: right;\" value=\""+item[13]+"\"></td>"+
                    "<td class=\"text-center\"><input placeholder=\"-\" id=\""+item[0]+"e12\" onchange=\"changeBudget($('#year').val(), 12, "+item[0]+", '"+item[0]+"e12', "+item[0]+")\" type=\"text\" style=\"text-align: right;\" value=\""+item[14]+"\"></td>"+
                    "<td class=\"text-center\"><b style=\"float: right;\">"+NWC(sum)+"</b></td>"+
                  "</tr>"
                );
              }
              else {

                sumSavings[0] += item[3]*1;
                sumSavings[1] += item[4]*1;
                sumSavings[2] += item[5]*1;
                sumSavings[3] += item[6]*1;
                sumSavings[4] += item[7]*1;
                sumSavings[5] += item[8]*1;
                sumSavings[6] += item[9]*1;
                sumSavings[7] += item[10]*1;
                sumSavings[8] += item[11]*1;
                sumSavings[9] += item[12]*1;
                sumSavings[10] += item[13]*1;
                sumSavings[11] += item[14]*1;

                $('#tableSavings').append(""+
                  "<tr>"+
                    "<td class=\"text-center\">"+item[1]+"</td>"+
                    "<td class=\"text-center\"><input placeholder=\"-\" id=\""+item[0]+"s1\" onchange=\"changeBudget($('#year').val(), 1, "+item[0]+", '"+item[0]+"s1', "+item[0]+")\" type=\"text\" style=\"text-align: right;\" value=\""+item[3]+"\"></td>"+
                    "<td class=\"text-center\"><input placeholder=\"-\" id=\""+item[0]+"s2\" onchange=\"changeBudget($('#year').val(), 2, "+item[0]+", '"+item[0]+"s2', "+item[0]+")\" type=\"text\" style=\"text-align: right;\" value=\""+item[4]+"\"></td>"+
                    "<td class=\"text-center\"><input placeholder=\"-\" id=\""+item[0]+"s3\" onchange=\"changeBudget($('#year').val(), 3, "+item[0]+", '"+item[0]+"s3', "+item[0]+")\" type=\"text\" style=\"text-align: right;\" value=\""+item[5]+"\"></td>"+
                    "<td class=\"text-center\"><input placeholder=\"-\" id=\""+item[0]+"s4\" onchange=\"changeBudget($('#year').val(), 4, "+item[0]+", '"+item[0]+"s4', "+item[0]+")\" type=\"text\" style=\"text-align: right;\" value=\""+item[6]+"\"></td>"+
                    "<td class=\"text-center\"><input placeholder=\"-\" id=\""+item[0]+"s5\" onchange=\"changeBudget($('#year').val(), 5, "+item[0]+", '"+item[0]+"s5', "+item[0]+")\" type=\"text\" style=\"text-align: right;\" value=\""+item[7]+"\"></td>"+
                    "<td class=\"text-center\"><input placeholder=\"-\" id=\""+item[0]+"s6\" onchange=\"changeBudget($('#year').val(), 6, "+item[0]+", '"+item[0]+"s6', "+item[0]+")\" type=\"text\" style=\"text-align: right;\" value=\""+item[8]+"\"></td>"+
                    "<td class=\"text-center\"><input placeholder=\"-\" id=\""+item[0]+"s7\" onchange=\"changeBudget($('#year').val(), 7, "+item[0]+", '"+item[0]+"s7', "+item[0]+")\" type=\"text\" style=\"text-align: right;\" value=\""+item[9]+"\"></td>"+
                    "<td class=\"text-center\"><input placeholder=\"-\" id=\""+item[0]+"s8\" onchange=\"changeBudget($('#year').val(), 8, "+item[0]+", '"+item[0]+"s8', "+item[0]+")\" type=\"text\" style=\"text-align: right;\" value=\""+item[10]+"\"></td>"+
                    "<td class=\"text-center\"><input placeholder=\"-\" id=\""+item[0]+"s9\" onchange=\"changeBudget($('#year').val(), 9, "+item[0]+", '"+item[0]+"s9', "+item[0]+")\" type=\"text\" style=\"text-align: right;\" value=\""+item[11]+"\"></td>"+
                    "<td class=\"text-center\"><input placeholder=\"-\" id=\""+item[0]+"s10\" onchange=\"changeBudget($('#year').val(), 10, "+item[0]+", '"+item[0]+"s10', "+item[0]+")\" type=\"text\" style=\"text-align: right;\" value=\""+item[12]+"\"></td>"+
                    "<td class=\"text-center\"><input placeholder=\"-\" id=\""+item[0]+"s11\" onchange=\"changeBudget($('#year').val(), 11, "+item[0]+", '"+item[0]+"s11', "+item[0]+")\" type=\"text\" style=\"text-align: right;\" value=\""+item[13]+"\"></td>"+
                    "<td class=\"text-center\"><input placeholder=\"-\" id=\""+item[0]+"s12\" onchange=\"changeBudget($('#year').val(), 12, "+item[0]+", '"+item[0]+"s12', "+item[0]+")\" type=\"text\" style=\"text-align: right;\" value=\""+item[14]+"\"></td>"+
                    "<td class=\"text-center\"><b style=\"float: right;\">"+NWC(sum)+"</b></td>"+
                  "</tr>"
                );
              }
              
          });
        }
        let sumTotalIncome = sumIncome[0] + sumIncome[1] + sumIncome[2] + sumIncome[3] + sumIncome[4] + sumIncome[5] + sumIncome[6] + sumIncome[7] + sumIncome[8] + sumIncome[9] + sumIncome[10] +sumIncome[11];
        let sumTotalExpenses = sumExpenses[0] + sumExpenses[1] + sumExpenses[2] + sumExpenses[3] + sumExpenses[4] + sumExpenses[5] + sumExpenses[6] + sumExpenses[7] + sumExpenses[8] + sumExpenses[9] + sumExpenses[10] +sumExpenses[11];
        let sumTotalSavings = sumSavings[0] + sumSavings[1] + sumSavings[2] + sumSavings[3] + sumSavings[4] + sumSavings[5] + sumSavings[6] + sumSavings[7] + sumSavings[8] + sumSavings[9] + sumSavings[10] +sumSavings[11];
        $('#tableIncome').append(""+
        "<tr>"+
          "<td class=\"text-center\"><b >Total</b></td>"+
          "<td class=\"text-center\"><b style=\"float: right;\">"+((sumIncome[0] == 0)?"-":NWC(sumIncome[0]))+"</b></td>"+
          "<td class=\"text-center\"><b style=\"float: right;\">"+((sumIncome[1] == 0)?"-":NWC(sumIncome[1]))+"</b></td>"+
          "<td class=\"text-center\"><b style=\"float: right;\">"+((sumIncome[2] == 0)?"-":NWC(sumIncome[2]))+"</b></td>"+
          "<td class=\"text-center\"><b style=\"float: right;\">"+((sumIncome[3] == 0)?"-":NWC(sumIncome[3]))+"</b></td>"+
          "<td class=\"text-center\"><b style=\"float: right;\">"+((sumIncome[4] == 0)?"-":NWC(sumIncome[4]))+"</b></td>"+
          "<td class=\"text-center\"><b style=\"float: right;\">"+((sumIncome[5] == 0)?"-":NWC(sumIncome[5]))+"</b></td>"+
          "<td class=\"text-center\"><b style=\"float: right;\">"+((sumIncome[6] == 0)?"-":NWC(sumIncome[6]))+"</b></td>"+
          "<td class=\"text-center\"><b style=\"float: right;\">"+((sumIncome[7] == 0)?"-":NWC(sumIncome[7]))+"</b></td>"+
          "<td class=\"text-center\"><b style=\"float: right;\">"+((sumIncome[8] == 0)?"-":NWC(sumIncome[8]))+"</b></td>"+
          "<td class=\"text-center\"><b style=\"float: right;\">"+((sumIncome[9] == 0)?"-":NWC(sumIncome[9]))+"</b></td>"+
          "<td class=\"text-center\"><b style=\"float: right;\">"+((sumIncome[10] == 0)?"-":NWC(sumIncome[10]))+"</b></td>"+
          "<td class=\"text-center\"><b style=\"float: right;\">"+((sumIncome[11] == 0)?"-":NWC(sumIncome[11]))+"</b></td>"+
          "<td class=\"text-center\"><b style=\"float: right;\">"+((sumTotalIncome == 0)?"-":NWC(sumTotalIncome))+"</b></td>"+
        "</tr>");
        $('#tableExpenses').append(""+
        "<tr>"+
          "<td class=\"text-center\"><b >Total</b></td>"+
          "<td class=\"text-center\"><b style=\"float: right;\">"+((sumExpenses[0] == 0)?"-":NWC(sumExpenses[0]))+"</b></td>"+
          "<td class=\"text-center\"><b style=\"float: right;\">"+((sumExpenses[1] == 0)?"-":NWC(sumExpenses[1]))+"</b></td>"+
          "<td class=\"text-center\"><b style=\"float: right;\">"+((sumExpenses[2] == 0)?"-":NWC(sumExpenses[2]))+"</b></td>"+
          "<td class=\"text-center\"><b style=\"float: right;\">"+((sumExpenses[3] == 0)?"-":NWC(sumExpenses[3]))+"</b></td>"+
          "<td class=\"text-center\"><b style=\"float: right;\">"+((sumExpenses[4] == 0)?"-":NWC(sumExpenses[4]))+"</b></td>"+
          "<td class=\"text-center\"><b style=\"float: right;\">"+((sumExpenses[5] == 0)?"-":NWC(sumExpenses[5]))+"</b></td>"+
          "<td class=\"text-center\"><b style=\"float: right;\">"+((sumExpenses[6] == 0)?"-":NWC(sumExpenses[6]))+"</b></td>"+
          "<td class=\"text-center\"><b style=\"float: right;\">"+((sumExpenses[7] == 0)?"-":NWC(sumExpenses[7]))+"</b></td>"+
          "<td class=\"text-center\"><b style=\"float: right;\">"+((sumExpenses[8] == 0)?"-":NWC(sumExpenses[8]))+"</b></td>"+
          "<td class=\"text-center\"><b style=\"float: right;\">"+((sumExpenses[9] == 0)?"-":NWC(sumExpenses[9]))+"</b></td>"+
          "<td class=\"text-center\"><b style=\"float: right;\">"+((sumExpenses[10] == 0)?"-":NWC(sumExpenses[10]))+"</b></td>"+
          "<td class=\"text-center\"><b style=\"float: right;\">"+((sumExpenses[11] == 0)?"-":NWC(sumExpenses[11]))+"</b></td>"+
          "<td class=\"text-center\"><b style=\"float: right;\">"+((sumTotalExpenses == 0)?"-":NWC(sumTotalExpenses))+"</b></td>"+
        "</tr>");
        $('#tableSavings').append(""+
        "<tr>"+
          "<td class=\"text-center\"><b >Total</b></td>"+
          "<td class=\"text-center\"><b style=\"float: right;\">"+((sumSavings[0] == 0)?"-":NWC(sumSavings[0]))+"</b></td>"+
          "<td class=\"text-center\"><b style=\"float: right;\">"+((sumSavings[1] == 0)?"-":NWC(sumSavings[1]))+"</b></td>"+
          "<td class=\"text-center\"><b style=\"float: right;\">"+((sumSavings[2] == 0)?"-":NWC(sumSavings[2]))+"</b></td>"+
          "<td class=\"text-center\"><b style=\"float: right;\">"+((sumSavings[3] == 0)?"-":NWC(sumSavings[3]))+"</b></td>"+
          "<td class=\"text-center\"><b style=\"float: right;\">"+((sumSavings[4] == 0)?"-":NWC(sumSavings[4]))+"</b></td>"+
          "<td class=\"text-center\"><b style=\"float: right;\">"+((sumSavings[5] == 0)?"-":NWC(sumSavings[5]))+"</b></td>"+
          "<td class=\"text-center\"><b style=\"float: right;\">"+((sumSavings[6] == 0)?"-":NWC(sumSavings[6]))+"</b></td>"+
          "<td class=\"text-center\"><b style=\"float: right;\">"+((sumSavings[7] == 0)?"-":NWC(sumSavings[7]))+"</b></td>"+
          "<td class=\"text-center\"><b style=\"float: right;\">"+((sumSavings[8] == 0)?"-":NWC(sumSavings[8]))+"</b></td>"+
          "<td class=\"text-center\"><b style=\"float: right;\">"+((sumSavings[9] == 0)?"-":NWC(sumSavings[9]))+"</b></td>"+
          "<td class=\"text-center\"><b style=\"float: right;\">"+((sumSavings[10] == 0)?"-":NWC(sumSavings[10]))+"</b></td>"+
          "<td class=\"text-center\"><b style=\"float: right;\">"+((sumSavings[11] == 0)?"-":NWC(sumSavings[11]))+"</b></td>"+
          "<td class=\"text-center\"><b style=\"float: right;\">"+((sumTotalSavings == 0)?"-":NWC(sumTotalSavings))+"</b></td>"+
        "</tr>");

        $('#tableAllocated').empty();

        let red = "#ff0066";
        let green = "#00cc66";
        let allocate = [];
        let sumYear;
        let sumYearCalc = 0;

        for (let i = 0; i < sumIncome.length; i++) { 
          sumYearCalc += sumIncome[i]-sumExpenses[i]-sumSavings[i];
          if (sumIncome[i]-sumExpenses[i]-sumSavings[i] < 0) {
            allocate[i] = "<td><span style=\"float: right; color: #ff0066;\">"+(sumIncome[i]-sumExpenses[i]-sumSavings[i])+"</span></td>";
          }
          else if (sumIncome[i]-sumExpenses[i]-sumSavings[i] > 0) {
            allocate[i] = "<td><span style=\"float: right;\">"+(sumIncome[i]-sumExpenses[i]-sumSavings[i])+"</span></td>";
          }
          else {
            allocate[i] = "<td><span style=\"float: right; color: #00cc66;\">🗸</span></td>";
          }
        }
        
        if (sumYearCalc < 0) {
          sumYear = "<td><span style=\"float: right; color: #ff0066;\">"+sumYearCalc+"</span></td>";
        }
        else if (sumYearCalc > 0) {
          sumYear = "<td><span style=\"float: right;\">"+sumYearCalc+"</span></td>";
        }
        else {
          sumYear = "<td><span style=\"float: right; color: #00cc66;\">🗸</span></td>";
        }
        

        $('#tableAllocated').append(""+
          "<tr style=\"background-color: white;\">"+
            "<th style=\"text-align: center; width: 370px;\">To allocate</th>"+
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
            "<th style=\"text-align: center; width: 100px;\">2025</th>"+
          "</tr>"+
          "<tr style=\"font-weight: bold; background-color: white;\">"+
            "<td style=\"text-align: center;\"><span>-----></span></td>"+
            NWC(allocate[0])+
            NWC(allocate[1])+
            NWC(allocate[2])+
            NWC(allocate[3])+
            NWC(allocate[4])+
            NWC(allocate[5])+
            NWC(allocate[6])+
            NWC(allocate[7])+
            NWC(allocate[8])+
            NWC(allocate[9])+
            NWC(allocate[10])+
            NWC(allocate[11])+
            NWC(sumYear)+
          "</tr>");

          },
          type: 'GET'
        });
      }
      
      function changeBudget(year, month, idCategory, inputId, idBudget) {
        if ($('#'+inputId).val() == "" || $('#'+inputId).val() == "0") {
          $.ajax({
              url: 'model/delBudget.php',
              data: {year: year, month: month, idCategory: idCategory},
              success: function(data) {
                //displayCategories();
                
              },
              type: 'POST'
            });
        }
        else {
          let newAmount = parseInt($('#'+inputId).val(), 10);

          if (Number.isInteger(newAmount)) {
            $.ajax({
              url: 'model/changeBudget.php',
              data: {year: year, month: month, idCategory: idCategory, newAmount: newAmount},
              success: function(data) {
                //displayCategories();
                
                
              },
              type: 'POST'
            });
          }
          else {
            $('#'+inputId).val("");
            alert("Veuillez entrer un nombre !");
          }
        }
        
        

        
      }


      // Execute a function when the user presses a key on the keyboard
      $('body').on('keyup', function(e) {
        if(e.keyCode == 13) { // when Enter key is pressed trigger click event for first button 
            displayCategories()
        }
      });

      $(document).ready(function(){
        
        displayCategories();

      });

      $('#year').change(function(){
        displayCategories();
      });
    </script>
  </body>
</html>
