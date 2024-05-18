<?php
include_once "database.php";
session_start();

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM login_details WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) == 1) {
        $user_data = mysqli_fetch_assoc($result);
        $_SESSION['user_email'] = $user_data['email'];
        $_SESSION['user_id'] = $user_data['user_id'];
        header('Location:index.php?dashboard');
    } else {
        header('Location:login.php?loginE');
    }
} else if (isset($_POST['add-record'])) {
    $item_name = $_POST['item-name'];
    $desc = $_POST['item-description'];
    $year = $_POST['purchase-year'];
    $value = $_POST['purchase-value'];
    $no_of_items = $_POST['no-of-items'];
    $condition = $_POST['condition'];
    $depr_rate = $_POST['depr-rate'];
    $location = $_POST['location'];

    $query = "SELECT * FROM items_info WHERE item_name = '$item_name'";
    if (mysqli_num_rows(mysqli_query($connection, $query)) >= 1) {
        // Shouldnt be present
    }
    else {
                
        $query = "INSERT INTO items_info(item_name, description, depreciation_rate, purchase_year, purchase_value) 
            VALUES('$item_name', '$desc', $depr_rate, $year, $value)";
        mysqli_query($connection, $query);
        
    }

    $query = "SELECT * FROM location WHERE location_name = '$location'";
    if (mysqli_num_rows(mysqli_query($connection, $query)) == 0 ) {
        $query = "INSERT INTO location(location_name) VALUES ('$location')";
        mysqli_query($connection, $query);

    }
    $query = "SELECT * from items_info WHERE item_name = '$item_name'";
    $result = mysqli_query($connection, $query);
    $item_id = mysqli_fetch_column($result, 0);

    $query = "SELECT * from location WHERE location_name = '$location'";
    $result = mysqli_query($connection, $query);
    $location_id = mysqli_fetch_column($result, 0);

    $query = "SELECT * FROM availability WHERE item_id = $item_id AND location_id = $location_id";
    if (mysqli_num_rows(mysqli_query($connection, $query)) >= 1) {
        // Shouldnt be present
    }
    else {        
        $query = "INSERT INTO availability VALUES ($item_id, $location_id, $no_of_items, '$condition')";
        mysqli_query($connection, $query);
    }

    header('Location:manage-records.php');
}
