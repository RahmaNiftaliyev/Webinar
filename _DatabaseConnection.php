<?php
    $conn_servername = "localhost:3309";
    $conn_username = "root";
    $conn_password = "karapecmax";
    $conn_dbname = "webinar";

    $conn = new mysqli($conn_servername, $conn_username, $conn_password, $conn_dbname);
    $conn->set_charset("utf8");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }    
?>