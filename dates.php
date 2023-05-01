<!DOCTYPE html>
<html lang="en">

<head>
  <title>Dates</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <a href="./restaurant.php">Restaurant</a>
  <a href="./orders.php">Orders</a>
  <a href="./customers.php">Customers</a>
  <a href="./dates.php">Dates</a>
  <a href="./employees.php">Employees</a>
  <br></br>

  <h1>View number of orders by date</h1>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="date">Enter date in format YYYY-MM-DD:</label>
    <input type="text" name="date" id="date" required>
    <input type="submit" name="submit" value="View Orders">
    <?php
    include 'connectdb.php';
    if (isset($_POST['submit'])) 
    {
      $date = $_POST['date'];
      $result = $connection->query("SELECT orders.order_date, COUNT(orders.order_id) AS num_orders 
                                            FROM orders 
                                            WHERE orders.order_date = '$date'
                                            GROUP BY orders.order_date");

      if ($row = $result->fetch()) 
      {
        echo "<table><tr><th>Date</th><th>Number of Orders</th></tr>";
        echo "<tr><td>" . $row['order_date'] . "</td><td>" . $row['num_orders'] . "</td></tr></table>";
      } 
      else 
      {
        echo "No orders for this date";
      }
    }
    ?>
  </form>
</body>

</html>