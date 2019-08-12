<!DOCTYPE html>
<html>
<head>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  <!-- Bootstrap core JavaScript-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- Page level plugin JavaScript--><script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
</head>

<body>
  <div class="container">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Country</th>
                        <th>City</th>
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

      $query = "SELECT * FROM citydata";

      if ($result = $mysqli->query($query)) {

          while ($row = $result->fetch_assoc()) {

              echo '<tr>';
              echo '  <td>'.$row["COUNTRY"].'<td>';
              echo '  <td>'.$row["CITY_STATE"].'<td>';
              echo '<tr>';
          }

      /*freeresultset*/
      $result->free();
      }

?>

                    </tbody>
                  </table>
      </div>
</body>
<script>
    $(document).ready(function() {
          $('#dataTable').DataTable();
    });
</script>
</html>
