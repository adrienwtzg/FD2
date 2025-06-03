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
    
    </style>
    <table  id="tableTransInput" style=" padding: 5px;" class="table table-borderless">
          <tr>
            <th class="col-2">
              <select class="custom-select" id="category">
                <option>Salaire (net)</option>
                <option>Courses</option>
                <option>Assurance maladie</option>
              </select>
            </th>
            <th class="col-10"></th>
          </tr>
        </table>
    <div class="row">
      <div class="col-2">
        
      </div>
      <div class="col-2">
        
      </div>
      
    </div>
    <br>
    <div class="row">
      <div class="col-1"></div>
      <div class="col-10" style="background-color: white; padding: 20px; border-radius: 15px;">
        <h2 style="text-align: center;">Vacances - 2025</h2>
        <br>
        <canvas id="myChart" style="width:100%"></canvas>
      
        
      </div>
      <div class="col-1"></div>
      
    </div>
    <div class="marge"></div>
    <div class="marge"></div>
    <div class="row">
      <div class="col-3"></div>
      <div class="col-3">
        <table class="table">
        
        <tbody class="table-group-divider table-divider-color">
          <tr>
            <th scope="row">Vacances Tessin</th>
            <td>Jul 25</td>
            <td>1'000</td>
            <td>
              <div class="custom-control custom-checkbox">
                  
                  <button class="btn btn-outline-secondary btn-sm" style="border: 0;">📝</button>
                  <button class="btn btn-outline-secondary btn-sm" style="border: 0;">❌</button>
                </div>
            </td>
          </tr>
          <tr>
            <th scope="row">Voyage Floride</th>
            <td>Mai 26</td>
            <td>10'000</td>
            <td>
              <div class="custom-control custom-checkbox">
                  
                  <button class="btn btn-outline-secondary btn-sm" style="border: 0;">📝</button>
                  <button class="btn btn-outline-secondary btn-sm" style="border: 0;">❌</button>
                </div>
            </td>
          </tr>
          <tr>
            <th scope="row">Ski Zermatt 4 jours</th>
            <td>Jan 26</td>
            <td>1'000</td>
            <td>
              <div class="custom-control custom-checkbox">
                  
                  <button class="btn btn-outline-secondary btn-sm" style="border: 0;">📝</button>
                  <button class="btn btn-outline-secondary btn-sm" style="border: 0;">❌</button>
                </div>
            </td>
          </tr>
          
        </tbody>
      </table>
      </div>
      <div class="col-3"></div>
      <div class="col-3"></div>
      
    </div>
  </body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
  <script>
    const xValues = ["jan 25","feb 25","mar 25","apr 25","may 25","jun 25","jul 25","aug 25", "sep 25", "oct 25", "nov 25", "dec 25"];
    const yValues1 = [1250, 2000, 2150, 2260, 2670, 3250, 4000];
    const yValues2 = [,,,,,,4000, 5000, 6000];

   
    /*new Chart("myChaart", {
      type: "line",
      data: {
        labels: xValues,
        datasets: [{
          fill: false,
          lineTension: 0,
          backgroundColor: "rgba(0,0,255,1.0)",
          borderColor: "rgba(0,0,255,1.0)",
          data: yValues
        }]
      },
      options: {
        legend: {display: false},
        plugins: [{
          afterDatasetsDraw: function(chart) {
            var ctx = chart.ctx;
            chart.data.datasets.forEach(function(dataset, index) {
                var datasetMeta = chart.getDatasetMeta(index);
                if (datasetMeta.hidden) return;
                datasetMeta.data.forEach(function(point, index) {
                  var value = dataset.data[index],
                      x = point.getCenterPoint().x,
                      y = point.getCenterPoint().y,
                      radius = point._model.radius,
                      fontSize = 14,
                      fontFamily = 'Verdana',
                      fontColor = 'black',
                      fontStyle = 'normal';
                  ctx.save();
                  ctx.textBaseline = 'middle';
                  ctx.textAlign = 'center';
                  ctx.font = fontStyle + ' ' + fontSize + 'px' + ' ' + fontFamily;
                  ctx.fillStyle = fontColor;
                  ctx.fillText(value, x, y - radius - fontSize);
                  ctx.restore();
                });
            });
          }
      }]
      }
    });*/

    var chart = new Chart("myChart", {
      type: 'line',
      data: {
          labels: xValues,
          datasets: [{
            label: "Balance",
            data: yValues1,
            tension: 0,
            backgroundColor: 'rgba(0, 119, 290, 0.5)',
            borderColor: 'rgba(0, 119, 290, 0.6)',
            fill: false
          },{
            label: "Forecast",
            data: yValues2,
            tension: 0,
            borderDash: [10,5],
            backgroundColor: 'rgba(0, 119, 290, 0.5)',
            borderColor: 'rgba(0, 119, 290, 0.6)',
            fill: false
          }]
      },
      options: {
          scales: {
            yAxes: [{
                ticks: {
                  beginAtZero: true
                }
            }]
          }
      },
      plugins: [{
          afterDatasetsDraw: function(chart) {
            var ctx = chart.ctx;
            chart.data.datasets.forEach(function(dataset, index) {
                var datasetMeta = chart.getDatasetMeta(index);
                if (datasetMeta.hidden) return;
                datasetMeta.data.forEach(function(point, index) {
                  var value = dataset.data[index],
                      x = point.getCenterPoint().x,
                      y = point.getCenterPoint().y,
                      radius = point._model.radius,
                      fontSize = 14,
                      fontFamily = 'Verdana',
                      fontColor = 'black',
                      fontStyle = 'normal';
                  ctx.save();
                  ctx.textBaseline = 'middle';
                  ctx.textAlign = 'center';
                  ctx.font = fontStyle + ' ' + fontSize + 'px' + ' ' + fontFamily;
                  ctx.fillStyle = fontColor;
                  ctx.fillText(value, x, y - radius - fontSize);
                  ctx.restore();
                });
            });
          }
      }]
    });
  </script>
</html>
