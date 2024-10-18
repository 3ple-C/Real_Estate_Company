<?php 

include_once 'dbconn.php';
include_once 'Category.php';

$database = new Database();
$db = $database->getConnection();

$category = new Category($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category->name = $_POST['category'];

   if ($category->addCategory()) {
        $_SESSION['messages'] = 'Category added successfully';
        $_SESSION['message-type'] = 'success';
        header('Location:../admin/property_category.php');
        exit;
    } else {
        $_SESSION['messages'] = 'Failed to add category';
        $_SESSION['message-type'] = 'danger';
        header('Location:../admin/property_category.php');
        exit;
   }
}

?>