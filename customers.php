<!DOCTYPE html>
<html lang="en">

<head>
    <title>Customers</title>
    <meta charset="UTF-8">
  </head>

  <body>

    <a href="./restaurant.php">Restaurant</a>
    <a href="./orders.php">Orders</a>
    <a href="./customers.php">Customers</a>
    <a href="./dates.php">Dates</a>
    <a href="./employees.php">Employees</a>
    <br></br>

    <h1>Add new customers here</h1>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        First name: <input type="text" name="first_name"><br>
        Last name: <input type="text" name="last_name"><br>
        Customer ID: <input type="number" name="customer_id"><br>
        Credit: <input type="number" name="credit"><br>
        <input type="submit" value="Add customer">
        <br></br>
	</form>

    <?php
        include 'connectdb.php';

        $customerID = $_POST["customer_id"];
        $fname = $_POST["first_name"];
        $lname = $_POST["last_name"];
        $credit = $_POST["credit"];
        
        $result = $connection->query("SELECT * FROM customerAccount WHERE customer_id = '$customerID'");
        
        if($result->rowCount() > 0) 
        {
            echo "Customer already exists.";
        } 
        else 
        {
            $numRows = $connection->exec("INSERT INTO customerAccount (customer_id, first_name, last_name, credit) 
                                          VALUES ('$customerID', '$fname', '$lname', '$credit')");
        
            if ($numRows > 0) 
            {
                echo "The customer was added!";
            } 
            else
            {
                echo "Error adding customer.";
            }
        }
        
        $connection = NULL;
    ?>

  </body>

</html>