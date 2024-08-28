<?php
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

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $books = $_POST['books'];
        $contacts = $_POST['contacts'];
        $delivery_location = $_POST['delivery_location'];
        $delivery_time = $_POST['delivery_time'];
        $delivery_fee = $_POST['delivery_fee'];
        $books_price = $_POST['books_price'];
        $total = $_POST['total'];
        $status = $_POST['status'];

        do {
            if (empty($name)) {
                $error_message = "Fill the required fields";
                break;
            }

            //Adding a new order

            $name = "";
            $books = "";
            $contacts = "";
            $delivery_location = "";
            $delivery_time = "";
            $delivery_fee = "";
            $books_price = "";
            $total = "";
            $status = "";

            $success_message = "Order added successfull";
        } while (false);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Customer name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value='<?php echo $name;?>'>
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