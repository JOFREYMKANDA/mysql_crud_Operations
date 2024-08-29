<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $database = "furaha_ebooks";

    $connection = new mysqli ($servername, $username, $password, $database);

    $name = "";
    $books = "";
    $contacts = "";
    $delivery_location = "";
    $delivery_time = "";
    $delivery_fee = "";
    $books_price = "";
    $total = "";
    $status = "";

    $error_message = "";
    $success_message = "";

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {

        if (!isset($_GET["no"])) {
            header ("location:/index.php");
            exit;
        }

        $no = $_GET[" no"];

        //reading the row of the selected user from the database

        $sql = "SELECT * FROM orders WHERE no = $no";
        $results = $connection -> query($sql);
        $row = $results -> fetch_assoc();

        if (!$row) {
            header ("location:/index.php");
            exit;
        } 

        $name = $row["name"];
        $books = $row["books"];
        $contacts = $row["contacts"];
        $delivery_location = $row["delivery_location"];
        $delivery_time = $row["delivery_time"];
        $delivery_fee = $row["delivery_fee"];
        $books_price = $row["books_price"];
        $total = $row["total"];
        $status = $row["status"];
         
    } 

        //POST method updating order

        $name = $_POST["name"];
        $books = $_POST["books"];
        $contacts = $_POST["contacts"];
        $delivery_location = $_POST["delivery_location"];
        $delivery_time = $_POST["delivery_time"];
        $delivery_fee = $_POST["delivery_fee"];
        $books_price = $_POST["books_price"];
        $total = $_POST["total"];
        $status = $_POST["status"];

        do {
            if (empty($name) || empty($contacts)) {
                $error_message = "Fill the required fields";
                break;
            }

            $sql = "UPDATE orders " . 
                    "SET name = '$name', books = '$books', contacts = '$contacts', delivery_location = '$delivery_location', delivery_time = '$delivery_time', delivery_fee = '$delivery_fee', books_price = '$books_price', total = '$total', status = '$status' " .
                    "WHERE no = $no ";

            $results = $connection -> query($sql);

            if (!$results) {
                $error_message = "Invalid query ". $connection -> error;
                break;
            }

            $success_message = "Order updated successfull";

            header ("location:index.php");

        } while(false);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        <div class="container my-5">
            <h2>New Order</h2>
            <?php
                if (!empty($error_message)) {
                    echo "
                        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                            <strong>$error_message</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
                        </div>
                    ";
                }
            ?>

            <form method="post">
                <input type="hidden" name='no' value='<?php echo $no;?>'>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Customer name</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="name" value="<?php echo $name;?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Books</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="books" value="<?php echo $books;?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Contacts</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="contacts" value="<?php echo $contacts;?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Delivery Location</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="delivery_location" value="<?php echo $delivery_location;?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Delivery Time</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="delivery_time" value="<?php echo $delivery_time;?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Delivery Fee</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="delivery_fee" value="<?php echo $delivery_fee;?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Books Price</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="books_price" value="<?php echo $books_price;?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Total</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="total" value="<?php echo $total;?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Status</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="status" value="<?php echo $status;?>">
                    </div>
                </div>

                <?php
                    if (!empty($success_message)) {
                        echo "
                            <div class='row mb-3'>
                                <div class='offset-sm-3 col-sm-6'>
                                    <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                        <strong>$success_message</strong>
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
                                    </div>
                                </div>
                            </div>
                        ";
                    }
                ?>

                <div class="row mb-3">
                    <div class="offset-sm-3 col-sm-3 d-grid">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <div class="col-sm-3 d-grid">
                        <a class="btn btn-outline-primary" href="/index.php" role="button">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </body> 
</html>