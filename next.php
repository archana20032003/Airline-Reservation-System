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
  <script src="login.js"></script>
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

      function test_input($data) {
         return htmlspecialchars(stripslashes(trim($data)));
      }
      $from = isset($_POST["from"]) ? test_input($_POST["from"]) : "";
      $to = isset($_POST["to"]) ? test_input($_POST["to"]) : "";
      $depart = isset($_POST["depart"]) ? $_POST["depart"] : "";
     

      $sql = "SELECT FL.number AS FLnumber, company, type, departure, d_time, arrival, a_time, C.name AS classname, capacity, price, COUNT(*)
               FROM flight FL, class C, airplane AP, airport A,book B
               WHERE (FL.number = C.number) AND (FL.airplane_id = AP.ID) AND
               ((((city LIKE '%$from%') AND (code = departure)) OR ((city LIKE '%$to%') AND (code = arrival)))
               OR (((departure LIKE '%$from%') AND (arrival LIKE '%$to%'))))
               GROUP BY FL.number
               HAVING COUNT(*) > 1
               ORDER BY FL.number";
      $result = mysqli_query($conn, $sql);

      $rowcount = mysqli_num_rows($result);

      if($rowcount == 0) {
         echo "<div class='alert alert-info'><strong>Search Result: </strong>".$rowcount." result</div>";
      } else {
         echo "<div class='alert alert-info'><strong>Search Result: </strong>".$rowcount." result(s)</div>";

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
                  <th>Class</th>
                  <th>Capacity</th>
                  <th>Price</th>
                  <th>Remain Seats</th>
                  <th>Reserve</th>
               </tr>
               </thead>";
         while($row = mysqli_fetch_array($result)) {
            echo "<tbody><tr>";
            echo "<td>" . $row['FLnumber'] . "</td>";
            echo "<td>" . $row['company']." ".$row['type']. "</td>";
            echo "<td>" . $depart . "</td>";
            echo "<td>" . $row['departure'] . "</td>";
            echo "<td>" . $row['d_time'] . "</td>";
            echo "<td>" . $row['arrival'] . "</td>";
            echo "<td>" . $row['a_time'] . "</td>";
            echo "<td>" . $row['classname'] . "</td>";
            echo "<td>" . $row['capacity'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";

            $seatreserved = "SELECT flightno, classtype, COUNT(*)
                             FROM book B
                             WHERE B.date = '$depart' AND B.flightno = '".$row['FLnumber']."' AND B.classtype ='".$row['classname']."' AND paid=1
                             GROUP BY flightno, classtype";
            $reserved = mysqli_query($conn, $seatreserved);   
            $reservedNumber = mysqli_fetch_array($reserved);
            
            $capacity = mysqli_query($conn, "SELECT capacity FROM class C WHERE C.number='".$row['FLnumber']."' AND C.name= '".$row['classname']."'");
            $capacityNumber = mysqli_fetch_array($capacity);

            if(mysqli_num_rows($reserved) > 0) {            
               $availableNumber = $capacityNumber['capacity'] - $reservedNumber['COUNT(*)'];
            } else {
               $availableNumber = $capacityNumber['capacity'];
            }
            
            echo "<td>".$availableNumber."</td>";

            if($availableNumber > 0) {
               echo '<td>
                     <form action="book.php" method="post">
                        <input type="hidden" name="flightno" value="'.$row['FLnumber'].'">
                        <input type="hidden" name="classtype" value="'.$row['classname'].'">
                        <input type="hidden" name="price" value="'.$row['price'].'">
                        <input type="hidden" name="date" value="'.$depart.'">
                        <input type="hidden" name="type" value="onewaynonstop">
                        <button type="submit" class="btn btn-primary">Book Now</button>
                     </form>
                     </td>';
            } else {
               echo "<td><button type='button' class='btn btn-warning' onclick='myFunction()'>Not Available</button></td>";
            }
            echo "</tr>";
         }
         echo " </tbody></table>";
      }

      mysqli_close($conn);
      ?>
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <a href="#signUpPage" title="To Top">
     <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <p>Airprice.com</p>     
</footer>
</body>
</html>
