<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2>List of Orders</h2>
        <a class="btn btn-primary" href="/create.php" role="button">New Order</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</t>
                    <th>Contacts</th>
                    <th>Delivery Location</t>
                    <th>Dellivery Time</th>
                    <th>Delivery Fee</th>
                    <th>Status</t>
                    <th>Created At</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "root";
                    $database = "furaha_ebooks";

                    //Create connection
                    $connection = new mysqli($servername, $username, $password, $database); 

                    //check connection
                    if ($connection -> connect_error) {
                        die ("Connection Failed " . $connection -> connect_error);
                    } else { //read all rows from the table
                        $sql = "SELECT * FROM orders";
                        $result = $connection -> query($sql);
                    }
                    //checking if the query was successfull
                    if (!$result) {
                        die ("Invalid query " . $connection ->error);
                    }

                    while ($row = $result -> fetch_assoc()) {
                        echo "
                        <tr>
                            <td>$row[no]</td>
                            <td>$row[name]</td>
                            <td>$row[contacts]</td>
                            <td>$row[delivery_location]</td>
                            <td>$row[delivery_time]</td>
                            <td>$row[delivery_fee]</td>
                            <td>$row[status]</td>
                            <td>$row[created_at]</td>
                            <td>
                                <a class='btn btn-primary btn-sm' href='/edit.php?id=$row[no]'>Edit</a>
                                <a class='btn btn-danger btn-sm' href='/delete.php?id=$row[no]'>Delete</a>
                            </td>
                        </tr>    
                        ";
                    }

                ?>
                
                
            </tbody>
        </table>
    </div>
</body>
</html>