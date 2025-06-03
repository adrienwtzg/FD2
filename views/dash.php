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
    
    <div class="row" >
      <div class="col-1"></div>
        <div class="col-5">
          <h1 id="titleTrans" style="text-align: center;"></h1>
          <br>
          <table class="table" id="tableIncomeDash" style="background-color: white; border-radius: 10px;">
            <thead style="background-color: #00cc66; border-top-left-radius: 10px; border-top-right-radius: 10px;  color: white;">
              <th class="col-3">Income</th>
              <th class="col-1" style="text-align: center;">Tracked</th>
              <th class="col-1" style="text-align: center;">Budget</th>
              <th class="col-3" style="text-align: center;">Compl.</th>
              <th class="col-1" style="text-align: center;">Remaining</th>
              <th class="col-1" style="text-align: center;">Excess</th>
            </thead>
            <tbody class="table-group-divider table-divider-color" id="bodyIncomeDash">
              
              
            </tbody>
          </table>
        </div>
        <div class="col-6"></div>
    </div>
    <div class="row" >
      <div class="col-1"></div>
        <div class="col-5">
          <table class="table" id="tableExpensesDash" style="background-color: white; border-radius: 10px;">
            <thead style="background-color: #ff0066; border-top-left-radius: 10px; border-top-right-radius: 10px;  color: white;">
              <th class="col-3">Expenses</th>
              <th class="col-1" style="text-align: center;">Tracked</th>
              <th class="col-1" style="text-align: center;">Budget</th>
              <th class="col-3" style="text-align: center;">Compl.</th>
              <th class="col-1" style="text-align: center;">Remaining</th>
              <th class="col-1" style="text-align: center;">Excess</th>
            </thead>
            <tbody class="table-group-divider table-divider-color" id="bodyExpensesDash">
              
            </tbody>
          </table>
        </div>
        <div class="col-6"></div>
    </div>
    <div class="row" >
      <div class="col-1"></div>
        <div class="col-5">
          <table class="table" style="background-color: white; border-radius: 10px;">
            <thead style="background-color: #0070c0; border-top-left-radius: 10px; border-top-right-radius: 10px;  color: white;">
              <th class="col-3">Savings</th>
              <th class="col-1" style="text-align: center;">Tracked</th>
              <th class="col-1" style="text-align: center;">Budget</th>
              <th class="col-3" style="text-align: center;">Compl.</th>
              <th class="col-1" style="text-align: center;">Remaining</th>
              <th class="col-1" style="text-align: center;">Excess</th>
            </thead>
            <tbody class="table-group-divider table-divider-color" id="bodySavingsDash">
              
            </tbody>
          </table>
        </div>
        <div class="col-6"></div>
    </div>
    <script src="https://momentjs.com/downloads/moment.js"></script>
    <script>
      
      

      function displayDash(){
        let blue = "#0070c0";
        let red = "#ff0066";
        let green = "#00cc66";
        $('#bodyIncomeDash').empty();
        $('#bodyExpensesDash').empty();
        $('#bodySavingsDash').empty();
        $.ajax({
          url: 'model/getDash.php',
          data: {period: $('#periodSel').val(), year: $('#yearSel').val()},
          success: function(data) {
            let clearData = JSON.parse(data);
            if (clearData.length == 0) {
              
            }
            else {
              
              clearData.forEach(function (item) {
                let prct = Math.round(100 * ((item[4] == null || item[3] == null) ? 0 : (item[3] / item[4])))/100;
                if (item[1] == "Income") {
                  $('#bodyIncomeDash').append(""+
                    "<tr>"+
                      "<th scope=\"row\">"+item[0]+"</th>"+
                      "<td><span style=\"float: right;\">"+((item[3] == null)?"-":item[3])+"</span></td>"+
                      "<td><span style=\"float: right;\">"+((item[4] == null)?"-":item[4])+"</span></td>"+
                      "<td>"+
                        "<div class=\"progress\" style=\"height: 1.5rem; margin-right: 1rem; margin-left: 2rem;\">"+
                          "<div class=\"progress-bar\" role=\"progressbar\" style=\"width: "+(100*prct)+"%; background-color: "+green+";\" aria-valuenow=\""+(100*prct)+"\" aria-valuemin=\"0\" aria-valuemax=\"100\">"+(100*prct)+"%</div>"+
                        "</div>"+
                      "</td>"+
                      "<td><span style=\"float: right;\">"+((item[3]>=item[4])?"-":(item[4]-item[3]))+"</span></td>"+
                      "<td><span style=\"float: right;\">"+((item[4]>=item[3])?"-":(item[3]-item[4]))+"</span></td>"+
                    "</tr>");
                }
                else if (item[1] == "Expenses") {
                  $('#bodyExpensesDash').append(""+
                    "<tr>"+
                      "<th scope=\"row\">"+item[0]+"</th>"+
                      "<td><span style=\"float: right;\">"+((item[3] == null)?"-":item[3])+"</span></td>"+
                      "<td><span style=\"float: right;\">"+((item[4] == null)?"-":item[4])+"</span></td>"+
                      "<td>"+
                        "<div class=\"progress\" style=\"height: 1.5rem; margin-right: 1rem; margin-left: 2rem;\">"+
                          "<div class=\"progress-bar\" role=\"progressbar\" style=\"width: "+(100*prct)+"%; background-color: "+red+";\" aria-valuenow=\""+(100*prct)+"\" aria-valuemin=\"0\" aria-valuemax=\"100\">"+(100*prct)+"%</div>"+
                        "</div>"+
                      "</td>"+
                      "<td><span style=\"float: right;\">"+((item[3]>=item[4])?"-":(item[4]-item[3]))+"</span></td>"+
                      "<td><span style=\"float: right;\">"+((item[4]>=item[3])?"-":(item[3]-item[4]))+"</span></td>"+
                    "</tr>");
              }
              else {
                  $('#bodySavingsDash').append(""+
                    "<tr>"+
                      "<th scope=\"row\">"+item[0]+"</th>"+
                      "<td><span style=\"float: right;\">"+((item[3] == null)?"-":item[3])+"</span></td>"+
                      "<td><span style=\"float: right;\">"+((item[4] == null)?"-":item[4])+"</span></td>"+
                      "<td>"+
                        "<div class=\"progress\" style=\"height: 1.5rem; margin-right: 1rem; margin-left: 2rem;\">"+
                          "<div class=\"progress-bar\" role=\"progressbar\" style=\"width: "+(100*prct)+"%; background-color: "+blue+";\" aria-valuenow=\""+(100*prct)+"\" aria-valuemin=\"0\" aria-valuemax=\"100\">"+(100*prct)+"%</div>"+
                        "</div>"+
                      "</td>"+
                      "<td><span style=\"float: right;\">"+((item[3]>=item[4])?"-":(item[4]-item[3]))+"</span></td>"+
                      "<td><span style=\"float: right;\">"+((item[4]>=item[3])?"-":(item[3]-item[4]))+"</span></td>"+
                    "</tr>");
                }
              
              
          });
          }
          },
          type: 'POST'
        });
      }

      $('#yearSel').change(function(){
        displayTitleTrans();
        displayDash();
      });

      $('#periodSel').change(function(){
        displayTitleTrans();
        displayDash();
      });

      function displayTitleTrans(){
        $('#titleTrans').empty();
        $('#titleTrans').append($('#periodSel  option:selected').text()+" - "+$('#yearSel').val()) 
      }

      

      //MAIN 
      $(document).ready(function(){
        
        $("#periodSel").val(moment().format('M'));
        $("#yearSel").val(moment().format('YYYY'));
        displayTitleTrans();
        displayDash();

        
        
      });

      
    </script>
  </body>
</html>
