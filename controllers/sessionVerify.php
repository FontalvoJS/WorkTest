<?php
session_start();
if (!isset($_SESSION['user']) || empty($_SESSION['user']['id'])) {
    header("Location: ../index.php");
} else {
    $username = $_SESSION['user']['name'];
    $user_id = $_SESSION['user']['id'];
}
