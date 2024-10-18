<?php
// This file is where user registration happens

session_start(); //Start session to store user info/messages

include_once 'dbconn.php';
include_once 'function_main.php';

$database = new Database();
$db = $database->getConnection(); // Get the connection result from dbconnection in dbconn.php

//Check if the connection is successful
if ($db === null) {
    $_SESSION['error'] = 'Failed to connect to databse';
    header('Location:../login.php');
    exit;
}

// Create User Instance
$user = new User($db); //Input connection value on User initialization 

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the email & password
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Attempt to log in user
    if ($user->login($email, $password)) {
        // Login Successful
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_name'] = $user->name;
        $_SESSION['user_role'] = $user->role;

        if ($_SESSION['user_role'] === 'admin') {
            header("Location:../admin/dashboard.php"); // Redirect 
            exit;
        } else {
            header("Location:../index.php"); // Redirect 
            exit;
        }
    } else {
        // 
        $_SESSION['error'] = "Invalid email or password.";
        $_SESSION['message_type'] = 'danger';
        header('Location:../login.php');
        exit;
    }
}
