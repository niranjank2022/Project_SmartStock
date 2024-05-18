<?php
unset($_SESSION['user_email']);
session_abort();
header('Location:login.php');
