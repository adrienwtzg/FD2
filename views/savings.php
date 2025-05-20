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
    <div class="marge" style="padding-right: 90%; padding-left: 1%; padding-top: 1%;">
      <select class="custom-select" id="typeSavings">
          <option selected>Prevision</option>
          <option>Transactions</option>
        </select>
      </div>
    <div class="row">
      <div class="col-2">
        
      </div>
      <div class="col-2">
        <select class="custom-select" id="saving">
          <option selected>Vacances</option>
          <option>2026</option>
        </select>
      </div>
      
    </div>
    <br>
    <div class="row">
      <div class="col-2"></div>
      <div class="col-8" style="background-color: white; padding: 20px;">
        <canvas id="myChart" style="width:100%"></canvas>
      </div>
      <div class="col-2"></div>
      
    </div>
  </body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
  <script>
    const xValues = ["jan 25","fev 25","mars","mars","mars","mars","mars","mars",];
    const yValues = [7,8,8,9,9,9,10,11,14,14,15];

    new Chart("myChart", {
      type: "line",
      data: {
        labels: xValues,
        datasets: [{
          fill: false,
          lineTension: 0,
          backgroundColor: "rgba(0,0,255,1.0)",
          borderColor: "rgba(0,0,255,0.1)",
          data: yValues
        }]
      },
      options: {
        legend: {display: false},
        scales: {
          yAxes: [{ticks: {min: 6, max:16}}],
        }
      }
    });
  </script>
</html>
