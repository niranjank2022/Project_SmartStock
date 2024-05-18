<?php

// Database access credentials
$db_hostname = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "smart_stock";

$connection = mysqli_connect($db_hostname, $db_username, 
                                $db_password, $db_name);
if (!$connection) {
    echo "<h1>Error occurred!</h1>";
}
