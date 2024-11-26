<?php
session_start();

include_once 'dbconn.php';  // Include database connection
include_once 'Properties.php';

// Initialize database connection
$database = new Database();
$db = $database->getConnection();

// Initialize Property object
$property = new Property($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    // Prepare the data array
    $data = array(
        'name' => $_POST['name'],
        'description' => $_POST['description'],
        'price' => $_POST['price'],
        'category_id' => $_POST['category_id']
    );

    // Add category-specific fields
    if ($_POST['category_id'] == 1) { // Buildings
        $data['rooms'] = $_POST['rooms'];
        $data['washrooms'] = $_POST['washrooms'];
        $data['area_size'] = $_POST['area_size'];
        $data['state'] = $_POST['state'];
        $data['town'] = $_POST['town'];
        $data['address'] = $_POST['address'];
    } elseif ($_POST['category_id'] == 2) { // Lands
        $data['area_size'] = $_POST['area_size'];
        $data['state'] = $_POST['state'];
        $data['town'] = $_POST['town'];
        $data['address'] = $_POST['address'];
    } elseif ($_POST['category_id'] == 3) { // Cars
        $data['color'] = $_POST['color'];
        $data['brand'] = $_POST['brand'];
        $data['drive'] = $_POST['drive'];
    }

    // Handle image uploads if present
    $newImages = null;
    if (isset($_FILES['images']) && !empty($_FILES['images']['name'][0])) {
        $newImages = $_FILES['images'];
    }

    if ($property->updateProperty($id, $data, $newImages)) {
        $_SESSION['message'] = 'Property updated successfully!';
        $_SESSION['message-type'] = 'success';
    } else {
        $_SESSION['message'] = 'Failed to update property';
        $_SESSION['message-type'] = 'danger';
    }

    if ($_POST['category_id'] == 2) {
        header('Location: ../admin/property-listings.php');
        exit;
    } elseif ($_POST['category_id'] == 1) {
        header('Location: ../admin/property-buildings.php');
        exit;
    } else{
        header('Location: ../admin/property-cars.php');
        exit;
    }
    
}
