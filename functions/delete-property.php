<?php 

include_once 'dbconn.php';
include_once 'Properties.php';

$database = new Database();
$db = $database->getConnection();

$property = new Property($db);

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($property->deleteProperty($id)) {
        $_SESSION['message'] = 'Property deleted successfully!';
        $_SESSION['message-type'] = 'Success';

    } else {
        $_SESSION['message'] = 'Failed to delete property';
        $_SESSION['message-type'] = 'danger';
    }

    header('Location: ../admin/property-listings.php');
    exit;
}else{
    $_SESSION['message'] = 'No property ID provided for deletion';
    $_SESSION['message-type'] = 'danger';
    header('Location: ../admin/property-listings.php');
    exit;
}

?>