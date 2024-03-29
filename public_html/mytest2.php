<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  <!-- Bootstrap core JavaScript-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- Page level plugin JavaScript--><script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
  <!--
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
        google.charts.load("current", {
          "packages":["map"],
          // Note: you will need to get a mapsApiKey for your project.
          // See: https://developers.google.com/chart/interactive/docs/basic_load_libs#load-settings
          "mapsApiKey": "AIzaSyDpKwyCuOYPIFy2dg19L-Nhjlds3PpflDo"
      });
        google.charts.setOnLoadCallback(drawChart);
        function drawChart(chartArray) {
          var data = google.visualization.arrayToDataTable(chartArray
            /* [
               ['Lat', 'Long', 'Name'],
               [37.4232, -122.0853, 'Work'],
               [37.4289, -122.1697, 'University'],
               [37.6153, -122.3900, 'Airport'],
               [37.4422, -122.1731, 'Shopping']
               ]
            */
          );

          var map = new google.visualization.Map(document.getElementById('map_div'));
          map.draw(data, {
            showTooltip: true,
            showInfoWindow: true
          });
        }
  </script>
  -->
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
                        <th>Lat</th>
                        <th>Lng</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Country</th>
                        <th>City</th>
                        <th>Avg Max Temp Dec</th>
                        <th>Avg Rain (mm) Dec</th>
                        <th>Lat</th>
                        <th>Lng</th>
                      </tr>
                    </tfoot>
                    <tbody>
<?php
      $username = "tripsixf";
      $password = "pr3tManger.";
      $database = "tripsixf_db";
      $mysqli = new mysqli("localhost", $username, $password, $database);

      $query = "SELECT COUNTRY, CITY_STATE, AVGMAXTEMP_DEC, AVGPREC_DEC, substring(g_latlng, 1, position(\",\" in g_latlng)-1) as LAT,  substring(g_latlng, position(\",\" in g_latlng)+2, 99) as LNG FROM citydata";

      if ($result = $mysqli->query($query)) {

          while ($row = $result->fetch_assoc()) {

              echo '<tr>';
              echo '  <td>'.$row["CITY_STATE"].'</td>';
              echo '  <td>'.$row["COUNTRY"].'</td>';
              echo '  <td>'.$row["AVGMAXTEMP_DEC"].'</td>';
              echo '  <td>'.$row["AVGPREC_DEC"].'</td>';
              echo '  <td>'.$row["LAT"].'</td>';
              echo '  <td>'.$row["LNG"].'</td>';
              echo '</tr>';
          }

      /*freeresultset*/
      $result->free();
      }

?>

                    </tbody>
                  </table>
      </div>

<div id="map_div" style="width: 600px; height: 300px; text-align:center"></div>

</body>

<script>

      function initMap() {
        var myLatLng = {lat: -25.363, lng: 131.044};

        var map = new google.maps.Map(document.getElementById('map_div'), {
          zoom: 4,
          center: myLatLng
        });

        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: 'Hello World!'
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpKwyCuOYPIFy2dg19L-Nhjlds3PpflDo&callback=initMap">
    </script>
<script>
    $(document).ready(function() {
          $('#dataTable').DataTable();
    });
    $('#dataTable').on( 'page.dt', function () {
      var table = $('#dataTable').DataTable();
      // console.log(table.column( 4, {page:'current'} ).data());
      // console.log(table.column( 5, {page:'current'} ).data());
      // console.log(table.column( 0, {page:'current'} ).data());
    });
</script>



</html>
