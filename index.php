<?php

include_once "database.php";
session_start();

if (isset($_SESSION['user_email'])) {
    $user_email = $_SESSION['user_email'];
    $query = "SELECT * FROM login_details WHERE email = '$user_email'";
    $result = mysqli_query($connection, $query);
    $user_data = mysqli_fetch_assoc($result);
} else {
    header('Location:login.php');
}

include_once "header.php";


if (isset($_GET['home'])) {
    include_once 'home.php';
} else if (isset($_GET['dashboard'])) {
    include_once 'dashboard.php';
} else if (isset($_GET['add-records'])) {
    include_once 'add-records.php';
} else if (isset($_GET['manage-records'])) {
    include_once 'manage-records.php';
} else if (isset($_GET['logout'])) {
    include_once "logout.php";
} else {
    include_once 'manage-records.php';
}

require_once "footer.php";
