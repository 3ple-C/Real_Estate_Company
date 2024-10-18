<?php   

session_start();

include 'dbconn.php';
include 'function_main.php';

$database = new Database();
$db = $database->getConnection();

if ($db === null) {
    $_SESSION['error'] = 'Failed to connect to databse';
    header('Location:../sign-up.php');
    exit;
}

$user = new User($db);

// CHeck if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    // set user properties
    $user->name = $_POST['name'];
    $user->email = $_POST['email'];
    $user->password = $_POST['password'];
    $user->role = 'customer';

    if ($user->emailExists()) {
        $_SESSION['error'] = 'The email you entered already exists try another email';
        $_SESSION['message_type'] = 'danger';
        header('Location:../sign-up.php');
        exit;
    } else {
        // register user
        if ($user->register()) {
            $_SESSION['success'] = "Registration Successful";
            $_SESSION['message_type'] = 'success';
        } else {
            $_SESSION['error'] = "Registration Failed";
            $_SESSION['message_type'] = 'danger';
        }

        header('Location:../sign-up.php');
        exit;
    }
}
?>