<?php
    if (isset($_GET["no"])) {
        $no = $_GET["n"];

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $database = "furaha_ebooks";

    $connection = new mysqli ($servername, $username, $password, $database);


    $sql = "DELETE FROM orders WHERE no = $no";
    $results = $connection -> query($sql);
    echo $results;
} 
    header("location:/index.php");
    exit;
