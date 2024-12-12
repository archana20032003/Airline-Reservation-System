<!DOCTYPE html>
<html lang="en">
<head>
  <title>Search Flights</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href="https://lh3.googleusercontent.com/-HtZivmahJYI/VUZKoVuFx3I/AAAAAAAAAcM/thmMtUUPjbA/Blue_square_A-3.PNG" />
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="forcompany.css">
  <link rel="stylesheet" href="homepage.css">
  <link rel="stylesheet" href="AdminSignin.css">
  <script src="login.js"> </script>
  <link rel="stylesheet" type="text/css" href="Search.css">
  <script src="notavailable.js"></script>
</head>
<body>
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
    </div>
    <div class="col-sm-8 text-left"> 
      <h1>Search Results</h1>
<?php
include_once 'connection.php';

if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));
}

function test_input($data) {
  return htmlspecialchars(stripslashes(trim($data)));
}

$from = isset($_POST["from"]) ? test_input($_POST["from"]) : "";
$to = isset($_POST["to"]) ? test_input($_POST["to"]) : "";
$depart = isset($_POST["depart"]) ? $_POST["depart"] : "";
$return = isset($_POST["return"]) ? $_POST["return"] : "";

$sql = "SELECT FL.number AS FLnumber, company, type, departure, d_time, arrival, a_time, capacity, price
        FROM flight FL, airplane AP,class C
        WHERE FL.airplane_id = AP.ID AND FL.number = C.number AND departure = '$from' AND arrival = '$to' 
        GROUP BY FL.number            
        ORDER BY FL.number";

$result = mysqli_query($conn, $sql);
$rowcount = mysqli_num_rows($result);

$sql2 = "SELECT FL.number AS FLnumber, company, type, departure, d_time, arrival, a_time, capacity, price
        FROM flight FL, airplane AP ,class C
        WHERE FL.airplane_id = AP.ID AND FL.number = C.number AND departure = '$to' AND arrival = '$from'
        GROUP BY FL.number            
        ORDER BY FL.number";

$result2 = mysqli_query($conn, $sql2);
$rowcount2 = mysqli_num_rows($result2);
$rowtotal = $rowcount * $rowcount2;

if ($rowtotal == 0) {
    echo "<div class='alert alert-info'><strong>Search Result: </strong>".$rowtotal." result</div>";
} else {
    echo "<div class='alert alert-info'><strong>Search Result: </strong>".$rowtotal." result(s)</div>";
    echo "<table class='table table-bordered table-striped table-hover'>
          <thead>
          <tr>
            <th>Flight</th>
            <th>Aircraft</th>
            <th>Date</th>
            <th>Departure</th>
            <th>Departure Time</th>
            <th>Arrival</th>
            <th>Arrival Time</th>
            <th>Capacity</th>
            <th>Price</th>
            <th>Remain Seats</th>
            <th>Reserve</th>
          </tr>
          </thead>";
    while ($row = mysqli_fetch_array($result)) {
        while ($row2 = mysqli_fetch_array($result2)) {
            echo "<tr>";
            echo "<td>" . $row['FLnumber'] . "</td>";
            echo "<td>" . $row['company']." ".$row['type']. "</td>";
            echo "<td>" . $depart . "</td>";
            echo "<td>" . $row['departure'] . "</td>";
            echo "<td>" . $row['d_time'] . "</td>";
            echo "<td>" . $row['arrival'] . "</td>";
            echo "<td>" . $row['a_time'] . "</td>";
            echo "<td>" . $row['capacity'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "<td>".$availableNumber."</td>";
            echo "<td></td>"; // Reserve button column
            echo "</tr>";
        }
    }
    echo " </tbody></table>";
}

mysqli_close($conn);
?>
 </div>
    
    </div>
  </div>
  </body>
</html>
