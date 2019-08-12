<!DOCTYPE html>
<html>
<head>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  <!-- Bootstrap core JavaScript-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- Page level plugin JavaScript--><script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>

<body>
  <div class="container">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>City</th>
                        <th>Country</th>
                        <th>Avg Max Temp Dec</th>
                        <th>Avg Rain (mm) Dec</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Country</th>
                        <th>City</th>
                      </tr>
                    </tfoot>
                    <tbody>
<?php
      $username = "tripsixf";
      $password = "pr3tManger.";
      $database = "tripsixf_db";
      $mysqli = new mysqli("localhost", $username, $password, $database);

      $query = "SELECT COUNTRY, CITY_STATE, AVGMAXTEMP_DEC, AVGPREC_DEC FROM citydata";

      if ($result = $mysqli->query($query)) {

          while ($row = $result->fetch_assoc()) {

              echo '<tr>';
              echo '  <td>'.$row["CITY_STATE"].'</td>';
              echo '  <td>'.$row["COUNTRY"].'</td>';
              echo '  <td>'.$row["AVGMAXTEMP_DEC"].'</td>';
              echo '  <td>'.$row["AVGPREC_DEC"].'</td>';
              echo '</tr>';
          }

      /*freeresultset*/
      $result->free();
      }

?>

                    </tbody>
                  </table>
      </div>

<div id="chart_div"></div>

</body>


<script>
    $(document).ready(function() {
          $('#dataTable').DataTable();
    });
</script>


<script>
    google.charts.load('current', { 'packages': ['map'] });
    google.charts.setOnLoadCallback(drawMap);

    function drawMap() {
      var data = google.visualization.arrayToDataTable([
        ['Country', 'Population'],
        ['China', 'China: 1,363,800,000'],
        ['India', 'India: 1,242,620,000'],
        ['US', 'US: 317,842,000'],
        ['Indonesia', 'Indonesia: 247,424,598'],
        ['Brazil', 'Brazil: 201,032,714'],
        ['Pakistan', 'Pakistan: 186,134,000'],
        ['Nigeria', 'Nigeria: 173,615,000'],
        ['Bangladesh', 'Bangladesh: 152,518,015'],
        ['Russia', 'Russia: 146,019,512'],
        ['Japan', 'Japan: 127,120,000']
      ]);

    var options = {
      showTooltip: true,
      showInfoWindow: true
    };

    var map = new google.visualization.Map(document.getElementById('chart_div'));

    map.draw(data, options);
  };
  </script>
</html>
