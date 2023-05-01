<!DOCTYPE html>
<html lang="en">

<head>
    <title>Orders</title>
    <meta charset="UTF-8">
  </head>

  <body>

    <a href="./restaurant.php">Restaurant</a>
    <a href="./orders.php">Orders</a>
    <a href="./customers.php">Customers</a>
    <a href="./dates.php">Dates</a>
    <a href="./employees.php">Employees</a>
    <br></br>

    <h1>View orders by a certain date</h1> 
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<label for="date">Enter date in format YYYY-MM-DD:</label>
		<input type="text" name="date" id="date" required>
		<input type="submit" name="submit" value="View Orders">
	</form>
    <table>
        <?php
            include 'connectdb.php';
            $date = $_POST['date'];
            $result = $connection->query("SELECT customerAccount.first_name, customerAccount.last_name, items.item_name, orders.total_amount, orders.tip, delivery_people.delivery_first_name, delivery_people.delivery_last_name
                                            FROM orders
                                            INNER JOIN customerAccount ON orders.customer_id = customerAccount.customer_id
                                            INNER JOIN items ON orders.item_id = items.item_id
                                            INNER JOIN delivery_people ON orders.delivery_person_id = delivery_people.delivery_person_id
                                            WHERE orders.order_date = '$date'");

                while ($row = $result->fetch()) 
                {
                    echo "<tr><th>First Name</th><th>Last Name</th><th>Item</th><th>Total Amount</th><th>Tip</th><th>Delivery Person</th></tr>";
                    echo "<tr><td>".$row['first_name'].
                        "</td><td>".$row['last_name'].
                        "</td><td>".$row['item_name'].
                        "</td><td>".$row['total_amount'].
                        "</td><td>".$row['tip'].
                        "</td><td>".$row['delivery_first_name'].
                        " ".$row['delivery_last_name']."</td></tr>";
                }
        ?>
    </table>

  </body>

</html>