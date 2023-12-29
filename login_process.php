<?php
session_start();

$adminUsername = 'ralphis';  // Set Username
$adminPassword = '12345';  // Set password

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    if ($username === $adminUsername && $password === $adminPassword) {
        $_SESSION['logged_in'] = true;
        header("Location: create.php");
        exit;
    } else {
        echo "Incorrect username or password!";
    }
}
?>