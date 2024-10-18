<?php
session_start();

include_once 'dbconn.php';
include_once 'Properties.php';

$database = new Database();
$db = $database->getConnection();


$property = new Property($db);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    # Get inputed product details from html elements
    $property->name = $_POST['name'];
    $property->description = $_POST['description'];
    $property->price = $_POST['price'];
    $property->category_id = $_POST['category_id'];
    $property->rooms = $_POST['rooms'];
    $property->washrooms = $_POST['washrooms'];
    $property->area_size = $_POST['area_size'];
    $property->state = $_POST['state'];
    $property->town = $_POST['town'];
    $property->address = $_POST['address'];
    $property->color = $_POST['color'];
    $property->brand = $_POST['brand'];
    $property->drive = $_POST['drive'];
}



if ($property->addProperty()) {
    // Get inserted products ID
    $lastInsertedId = $db->lastInsertId();

    // Handle file upload for the product image
    $image_path = $property->uploadImage($_FILES['image']);

    if ($image_path) {
        # Add product picture if the upload is successful
        if ($property->addPropertyPics($lastInsertedId, $image_path, 'active')) {
            $_SESSION['messages'] = 'Property added succesfully!';
            $_SESSION['message-type'] = 'success';

            header('Location:../admin/create-listing.php');
            exit;
        }else {
            $_SESSION['messages'] = 'Property added, but failed to save the image!';
            $_SESSION['message-type'] = 'secondary';

            header('Location:../admin/create-listing.php');
            exit;
        }
    }else {
        $_SESSION['messages'] = 'Property added, but image upload failed!';
        $_SESSION['message-type'] = 'primary';

        header('Location:../admin/create-listing.php');
        exit;
    }
}else{
    $_SESSION['messages'] = 'Failed to add property';
    $_SESSION['message-type'] = 'danger';
   
    header('Location:../admin/create-listing.php');
    exit;
}
?>