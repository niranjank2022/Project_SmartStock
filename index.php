<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);

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
// require_once "blueprint.php";

if (isset($_GET['home'])) {
    include_once 'home.php';
} else if (isset($_GET['dashboard'])) {
    include_once 'dashboard.php';
} else if (isset($_GET['manage-records'])) {
    include_once 'manage-records.php';
} else if (isset($_GET['floor0'])) {
    include_once "blueprint0.php";
} else if (isset($_GET['floor1'])) {
    include_once "blueprint1.php";
} else if (isset($_GET['floor2'])) {
    include_once "blueprint2.php";
} else if (isset($_GET['floor3'])) {
    include_once "blueprint3.php";
} else if (isset($_GET['logout'])) {
    include_once "logout.php";
} 
else if (isset($_GET['logout'])) {
    include_once "logout.php";
}
else {
    include_once 'manage-records.php';
}

require_once "footer.php";
