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

    $item_id = $_POST['item-id'];
    $location_id = $_POST['location-id'];
    $working = $_POST['count-working'];
    $defect = $_POST['count-defect'];

    if ($_POST['item-id'] != -1) {
        $query = "SELECT * FROM tracker WHERE location_id = '$location_id' AND item_id = '$item_id'";
        $result = mysqli_query($connection, $query);
        if (mysqli_num_rows($result) >= 1) {
            $query = "UPDATE tracker SET count_working = count_working + $working, count_defect = count_defect + $defect WHERE location_id = '$location_id' AND item_id = '$item_id';";
            $result = mysqli_query($connection, $query);
        } else {
            $query = "INSERT INTO tracker VALUES ('$location_id', '$item_id', '$working', '$defect');";
            $result = mysqli_query($connection, $query);
        }
    } else {
        $item_name = $_POST['item-name'];
        $desc = $_POST['item-description'];
        $year = $_POST['purchase-year'];
        $value = $_POST['purchase-value'];
        $depr_rate = $_POST['depr-rate'];

        $query = "INSERT INTO items(item_name, item_description, item_depreciation_rate, item_purchase_year, item_purchase_price) VALUES ('$item_name', '$desc', '$depr_rate', '$year', '$value')";
        $result = mysqli_query($connection, $query);

        $query = "SELECT item_id FROM items WHERE item_name = '$item_name'";
        $result = mysqli_query($connection, $query);
        $data = mysqli_fetch_assoc($result);
        $item_id = $data['item_id'];

        $query = "INSERT INTO tracker VALUES ('$location_id', $item_id, '$working', '$defect');";
        $result = mysqli_query($connection, $query);
    }

    header('Location:index.php?manage-records');
}

if (isset($_POST['editItem'])) {

    $item_id = $_POST['item_id'];
    $query = "SELECT * FROM items WHERE item_id = '$item_id'";
    $result = mysqli_query($connection, $query);
    $data = mysqli_fetch_assoc($result);

    $response = [];
    $response['item_id'] = $item_id;
    $response['item_name'] = $data['item_name'];
    $response['description'] = $data['item_description'];
    $response['year'] = $data['item_purchase_year'];
    $response['price'] = $data['item_purchase_price'];
    $response['depr_rate'] = $data['item_depreciation_rate'];

    $query = "SELECT * FROM tracker NATURAL JOIN locations WHERE item_id = '$item_id'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        $options = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $options[] = [
                'location_id' => $row['location_id'],
                'location_name' => $row['location_name']
            ];
        }
        $response['done'] = true;
        $response['options'] = $options;
    } else {
        $response['done'] = false;
        $response['result'] = 'Database Error';
    }

    echo json_encode($response);
}

if (isset($_POST['deleteItem'])) {

    $item_id = $_POST['item_id'];
    $query = "SELECT * FROM items WHERE item_id = '$item_id'";
    $result = mysqli_query($connection, $query);
    $data = mysqli_fetch_assoc($result);
    $item_name = $data['item_name'];

    $query = "SELECT * FROM tracker NATURAL JOIN locations WHERE item_id = '$item_id'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        $options = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $options[] = [
                'location_id' => $row['location_id'],
                'location_name' => $row['location_name']
            ];
        }
        $response = array(
            'done' => true,
            'item_id' => $data['item_id'],
            'item_name' => $data['item_name'],
            'options' => $options
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
    $item_id = mysqli_real_escape_string($connection, $_POST['edit-item-id']);
    $location_id = mysqli_real_escape_string($connection, $_POST['edit-location-name']);
    
    $updates = array(
        'item_description' => mysqli_real_escape_string($connection, $_POST['edit-item-description']),
        'item_purchase_year' => mysqli_real_escape_string($connection, $_POST['edit-purchase-year']),
        'item_purchase_price' => mysqli_real_escape_string($connection, $_POST['edit-purchase-value']),
        'item_depreciation_rate' => mysqli_real_escape_string($connection, $_POST['edit-depr-rate']),
        'count_working' => mysqli_real_escape_string($connection, $_POST['edit-count-working']),
        'count_defect' => mysqli_real_escape_string($connection, $_POST['edit-count-defect'])
    );
    echo "hello";
    print_r($updates);
    // Fetch existing data
    $query = "SELECT * FROM items NATURAL JOIN tracker NATURAL JOIN locations WHERE location_id = '$location_id' AND item_id = '$item_id'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        $data = mysqli_fetch_assoc($result);

        // Loop through updates and perform update if values are different
        foreach ($updates as $key => $value) {
            if ($data[$key] != $value) {
                $query = "UPDATE items NATURAL JOIN tracker NATURAL JOIN locations SET $key = '$value' WHERE location_id = '$location_id' AND item_id = '$item_id'";
                mysqli_query($connection, $query);
                echo "suren";
            }
        }
    }

    // Redirect to manage records page
    header('Location:index.php?manage-records');
}

if (isset($_POST['delete-record'])) {
    $item_id = $_POST['delete-item-id'];
    $location_id = $_POST['delete-location-name'];
    if ($location_id != -1) {
        $query = "DELETE FROM tracker WHERE item_id = '$item_id' AND location_id = '$location_id'";
        $result = mysqli_query($connection, $query);
    } else {
        $query = "DELETE FROM tracker WHERE item_id = '$item_id'";
        $result = mysqli_query($connection, $query);
    }
    header("Location:index.php?manage-records");
}

if (isset($_POST['changeCount'])) {
    $item_id = $_POST['item_id'];
    $location_id = $_POST['location_id'];
    $query = "SELECT * FROM tracker WHERE item_id = '$item_id' AND location_id = '$location_id'";
    $result = mysqli_query($connection, $query);
    if ($result) {
        $data = mysqli_fetch_assoc($result);
        $response = array(
            "done" => true,
            "count_working" => $data['count_working'],
            "count_defect" => $data['count_defect']
        );
    } else {
        $response = array(
            "done" => false,
            "result" => "Database Error"
        );
    }

    echo json_encode($response);
}