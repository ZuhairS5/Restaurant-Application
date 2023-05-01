<!DOCTYPE html>
<html lang="en">

<head>
    <title>Employees</title>
    <meta charset="UTF-8">
</head>

  <body>

    <a href="./restaurant.php">Restaurant</a>
    <a href="./orders.php">Orders</a>
    <a href="./customers.php">Customers</a>
    <a href="./dates.php">Dates</a>
    <a href="./employees.php">Employees</a>
    <br></br>

  <h1>View employees'schedules</h1>
  <?php
    include "connectdb.php";
    $query = "SELECT * FROM Employee";
    $result = $connection->query($query);
    while ($row = $result->fetch())
    {
      echo '<input type = "radio" name = "employee" value = "';
      echo $row["ID"];
      echo '">' . $row["firstName"] . " " . $row["lastName"] . "<br>";
    }
  ?>
  <table>
    <tr><th>Employee</th><th>Day</th><th>Start</th><th>End</th></tr>;

    <?php
      $employee = $_POST["ID"];
      $query  = "SELECT * FROM shift WHERE ID = '$employee' AND day IN ('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday')";
      $result = $connection->query($query);
      while ($row = $result->fetch())
      {
        echo "<tr><td>" . $row['fname'] . 
              "</td><td>" . $row['lname'] .
              "</td><td>" . $row['shiftDay'] . 
              "</td><td>" . $row['sTime'] .
              "</td><td>" . $row['eTime'] .
              " "."</td></tr></table>";
      }
    ?>
  </table>
</body>

</html>