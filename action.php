<?php
include_once "database.php";
session_start();
error_reporting(~E_ALL & ~E_NOTICE & ~E_DEPRECATED);

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM login_details WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) == 1) {
        $user_data = mysqli_fetch_assoc($result);
        $_SESSION['user_email'] = $user_data['email'];
        $_SESSION['user_id'] = $user_data['user_id'];
        header('Location:index.php?home');
    } else {
        header('Location:login.php?loginE');
    }
}

if (isset($_POST['add-record'])) {
    if ($_POST['item-id'] != -1) {

        $location_id = $_POST['location-id'];
        $item_id = $_POST['item-id'];
        $working = $_POST['count-working'];
        $defect = $_POST['count-defect'];

        $query = "SELECT * FROM tracker WHERE location_id = $location_id AND item_id = $item_id";
        $result = mysqli_query($connection, $query);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $working += $row['count-working'];
            $defect += $row['count-defect'];
        }
    } else {
        $item_name = $_POST['item-name'];
        $location_id = $_POST['location-id'];
        $item_id = $_POST['item-id'];
        $desc = $_POST['item-description'];
        $year = $_POST['purchase-year'];
        $value = $_POST['purchase-value'];
        $depr_rate = $_POST['depr-rate'];

        $query = "INSERT INTO items(item_name, item_description, item_depreciation_rate, item_purchase_year, item_purchase_price) 
            VALUES('$item_name', '$desc', $depr_rate, $year, $value)";
        mysqli_query($connection, $query);
    }

    $query = "INSERT INTO tracker VALUES ($location_id, $item_id, $working, $defect);";
    mysqli_query($connection, $query);

    header('Location:index.php?manage-records');
}

if (isset($_POST['editItem'])) {

    $item_id = intval($_POST['item_id']);
    $query = "SELECT * FROM items_info NATURAL JOIN availability NATURAL JOIN location WHERE item_id=$item_id";
    $result = mysqli_query($connection, $query);
    if ($result) {
        $data = mysqli_fetch_assoc($result);
        $response = array(
            'done' => true,
            'item_id' => $item_id,
            'item_name' => $data['item_name'],
            'description' => $data['description'],
            'depr_rate' => $data['depreciation_rate'],
            'year' => $data['purchase_year'],
            'price' => $data['purchase_value'],
            'location' => $data['location_name'],
            'no_of_items' => $data['no_of_items'],
            'condition' => $data['curr_condition']
        );
    } else {
        $response = array(
            'done' => false,
            'result' => 'Database Error'
        );
    }

    echo json_encode($response);
}

if (isset($_POST['deleteItem'])) {

    $item_id = intval($_POST['item_id']);
    $query = "SELECT * FROM items WHERE item_id = $item_id";
    $result = mysqli_query($connection, $query);
    if ($result) {
        $data = mysqli_fetch_assoc($result);
        $response = array(
            'done' => true,
            'item_id' => $item_id,
            'item_name' => $data['item_name']
        );
    } else {
        $response = array(
            'done' => false,
            'result' => 'Database Error'
        );
    }

    echo json_encode($response);
}

if (isset($_POST['edit-record'])) {
    $item_id = $_POST['edit-item-id'];
    $item_name = $_POST['edit-item-name'];
    $updates = array(
        'description' => $_POST['edit-item-description'],
        'purchase_year' => $_POST['edit-purchase-year'],
        'purchase_value' => $_POST['edit-purchase-value'],
        'no_of_items' => $_POST['edit-no-of-items'],
        'curr_condition' => $_POST['edit-condition'],
        'depreciation_rate' => $_POST['edit-depr-rate'],
        'location' => $_POST['edit-location'],
    );

    $query = "UPDATE items_info SET description = '" . $_POST['edit-item-description'] . "' WHERE item_id = $item_id";
    $result = mysqli_query($connection, $query);
    $query = "UPDATE items_info SET depreciation_rate = " . $_POST['edit-depr-rate'] . " WHERE item_id = $item_id";
    $result = mysqli_query($connection, $query);
    $query = "UPDATE items_info SET purchase_year = " . $_POST['edit-purchase-year'] . " WHERE item_id = $item_id";
    $result = mysqli_query($connection, $query);
    $query = "UPDATE items_info SET purchase_value = " . $_POST['edit-purchase-value'] . " WHERE item_id = $item_id";
    $result = mysqli_query($connection, $query);

    $query = "UPDATE availability SET no_of_items = " . $_POST['edit-no-of-items'] . " WHERE item_id = $item_id";
    $result = mysqli_query($connection, $query);
    $query = "UPDATE availability SET curr_condition = '" . $_POST['edit-condition'] . "' WHERE item_id = $item_id";
    $result = mysqli_query($connection, $query);

    // $query = "UPDATE items_info SET location_id = ( SELECT location_id FROM location WHERE location_name = '" . $_POST['location'] . "' )";
    // $result = mysqli_query($connection, $query);

    // $query = "SELECT * FROM items_info NATURAL JOIN availability NATURAL JOIN location WHERE item_id=$item_id";
    // $result = mysqli_query($connection, $query);
    // $row = mysqli_fetch_assoc($result);
    // $query = "UPDATE items_info I JOIN location L ON (I.location_id = L.location_id) JOIN availability A ON (I.item_id = A.item_id) SET ";
    // $arr = array();
    // foreach ($result as $key => $value) {
    //     echo $key . $value;
    //     if ($row[$key] != $value) {
    //         array_push($arr, "$key = $value");
    //     }
    // }
    // $query = $query . implode($arr) . " WHERE item_id = $item_id";
    // $result = mysqli_query($connection, $query);
    header("Location:index.php?manage-records");
}

if (isset($_POST['delete-record'])) {
    // $item_id = $_POST['delete-item-id'];
    // $location_id = $_POST['delete-location-name'];
    // $query = "DELETE FROM items WHERE item_id = $item_id";
    // $result1 = mysqli_query($connection, $query);
    // $query = "DELETE FROM tracker WHERE location_id = $location_id AND item_id = $item_id";
    // $result2 = mysqli_query($connection, $query);
    header("Location:index.php?manage-records");
}