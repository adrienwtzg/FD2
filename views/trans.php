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
<div class="row">
  <div class="col-1" style="padding-left: 1%; padding-top: 0.5%;">
    <select class="custom-select" id="periodSel">
      <option value="1">January</option>
      <option value="2">February</option>
      <option value="3">March</option>
      <option value="4">April</option>
      <option value="5">May</option>
      <option value="6">June</option>
      <option value="7">July</option>
      <option value="8">August</option>
      <option value="9">September</option>
      <option value="10">October</option>
      <option value="11">November</option>
      <option value="12">December</option>
      <option value="0">All year</option>
    </select>
    <select class="custom-select" id="yearSel"  style="margin-top: 5%;">
      <option>2025</option>
      <option>2026</option>
    </select>
  </div>
</div>


    <div class="marge"></div>
    <div class="row">
    <div class="col-2"></div>
      <div class="col-8">
        <div style="background-color: white; padding: 1%; border-radius: 10px;">
          <div class="form-row">
            <div class="form-group col-md-1">
              <label for="dateTrans">Date</label>
              <input type="date" class="form-control" id="dateTrans">
            </div>
            <div class="form-group col-md-2">
              <label for="typeSelect">Type</label>
              <select id="typeSelect" class="form-control">
                <option selected>Income</option>
                <option>Expenses</option>
                <option>Savings</option>
              </select>
            </div>
            <div class="form-group col-md-2">
              <label for="categorySelect">Category</label>
              <select id="categorySelect" class="form-control">
               
              </select>
            </div>
            <div class="form-group col-md-1">
              <label for="amount">Amount</label>
              <input type="text" class="form-control" id="amount">
            </div>
            <div class="form-group col-md-6">
              <label for="details">Details</label>
              <input type="text" class="form-control" id="details">
            </div>
          </div>
          <div class="form-group">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="nextMonth">
              <label class="form-check-label" for="nextMonth">
                Next month ?
              </label>
            </div>
          </div>
          <button class="btn btn-primary" id="addTrans">Add transaction</button>
        </div>
      <div class="marge"></div>
      <h1 id="titleTrans" style="text-align: center;">January 2025</h1>
      <br>
      <table id="tableTrans" style=" padding: 5px; background-color: white; border-radius: 10px;" class="table table-bordered">
          
            
          
      </table>
      </div>
      <div class="col-2"></div>
    </div>
    <script src="https://momentjs.com/downloads/moment.js"></script>
    <script>
      

      //Displays categories with type in form
      function displayCategorySelect(type){
        $('#categorySelect').empty();
        $.ajax({
          url: 'model/getCategories.php',
          success: function(data) {
            let clearData = JSON.parse(data);
            if (clearData.length == 0) {
              
            }
            else {
            clearData.forEach(function (item) {
              if (item[2] == type) {
                $('#categorySelect').append("<option value=\""+item[0]+"\">"+item[1]+"</option>");
              }
          });
          }
          },
          type: 'GET'
        });
      }

      function displayTransactions(){
        $('#tableTrans').empty();
        $('#tableTrans').append(""+
          "<tr>"+
            "<th class=\"col-1\">Date</th>"+
            "<th class=\"col-1\">Type</th>"+
            "<th class=\"col-2\">Category</th>"+
            "<th class=\"col-1\">Amount</th>"+
            "<th class=\"col-4\">Details</th>"+
            "<th class=\"col-2\" colspan=\"2\">Effective Date</th>"+
          "</tr>");
        $.ajax({
          url: 'model/getTransactionsByTimespan.php',
          data: {period: $('#periodSel').val(), year: $('#yearSel').val()},
          success: function(data) {
            let clearData = JSON.parse(data);
            if (clearData.length == 0) {
              
            }
            else {
            clearData.forEach(function (item) {
              let effective = "null";
              let colorT = "black";
              if (item[4] != 1) {
                colorT = "grey";
              }
              if (item[9] == "Income") {
                $('#tableTrans').append(""+
                  "<tr>"+
                    "<td>"+moment(item[1]).format('DD MMM YY')+"</td>"+
                      "<td>"+item[9]+"</td>"+
                      "<td>"+item[8]+"</td>"+
                      "<td><span style=\"color: #00cc66;\">"+item[2]+"</span></td>"+
                      "<td><i><small>"+item[3]+"</small></i></td>"+
                      "<td style=\"color: "+colorT+"\">-> "+moment(item[5]).format('DD MMM YY')+"</td>"+
                      "<td class=\text-center\" style=\"padding-top: 0; padding-bottom: 0;\">"+
                        "<button class=\"btn btn-outline-secondary btn-xs\" style=\"border: 0;\">📝</button>"+
                        "<button class=\"btn btn-outline-secondary btn-xs\" style=\"border: 0;\">❌</button>"+
                      "</td>"+
                    "</tr>");
              }
              else {
                $('#tableTrans').append(""+
                  "<tr>"+
                    "<td>"+moment(item[1]).format('DD MMM YY')+"</td>"+
                      "<td>"+item[9]+"</td>"+
                      "<td>"+item[8]+"</td>"+
                      "<td><span style=\"float: right; color: #ff0066;\">"+item[2]+"</span></td>"+
                      "<td><i><small>"+item[3]+"</small></i></td>"+
                      "<td style=\"color: "+colorT+"\">-> "+moment(item[5]).format('DD MMM YY')+"</td>"+
                      "<td class=\text-center\" style=\"padding-top: 0; padding-bottom: 0;\">"+
                        "<button class=\"btn btn-outline-secondary btn-xs\" style=\"border: 0;\">📝</button>"+
                        "<button class=\"btn btn-outline-secondary btn-xs\" style=\"border: 0;\">❌</button>"+
                      "</td>"+
                    "</tr>");
              }
              
          });
          }
          },
          type: 'POST'
        });
      }

      $('#typeSelect').change(function(){
        displayCategorySelect($('#typeSelect').val());
      });

      $('#yearSel').change(function(){
        displayTitleTrans();
        displayTransactions();
      });

      $('#periodSel').change(function(){
        displayTitleTrans();
        displayTransactions();
      });

      function displayTitleTrans(){
        $('#titleTrans').empty();
        $('#titleTrans').append($('#periodSel  option:selected').text()+" - "+$('#yearSel').val()) 
      }

      //Add a Transaction when Add buitton lcicked
      $("#addTrans").click(function(){
          let nextM = 0;
          let effective = null;
          console.log(dateTrans);
          if ($("#nextMonth").is(':checked')) {
            nextM = 1;
            effective = moment($("#dateTrans").val()).add(1, 'M').startOf('month').format("YYYY-MM-DD");
          }
          else {
            effective = moment($("#dateTrans").val()).format("YYYY-MM-DD");
          }
          console.log(effective);
          $.ajax({
            url: 'model/addTransaction.php',
            data: {date: $("#dateTrans").val(), idCategory: $("#categorySelect").val(), amount: $("#amount").val(), details: $("#details").val(), next: nextM, effectiveDate: effective},
            success: function(data) {
              let clearData = JSON.parse(data);
              if (clearData) {
                displayTransactions();
              }
              else {
                alert("ERROR: La categorie n'a pas été ajoutée");
              }
            },
            type: 'POST'
          });
        });

        //MAIN 
        $(document).ready(function(){

          $("#periodSel").val(moment().format('M'));
          $("#yearSel").val(moment().format('YYYY'));

          displayCategorySelect($('#typeSelect').val());

          displayTransactions();
          
          displayTitleTrans();
        
      });

      
    </script>
  </body>
</html>
