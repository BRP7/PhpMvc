<?php
include "Lib/autoload.php";

$modelProduct = new Model_Product();
$viewProduct = new View_Product();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle add action
    $action = isset($_POST['action']) ? $_POST['action'] : null;

    if ($action === 'add') {
        // Add logic for adding...
    }
}

// Check if the edit or delete button is clicked
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action'])) {
    $action = $_GET['action'];
    $productId = isset($_GET['id']) ? $_GET['id'] : null;

    if ($action === 'edit') {
        // Check if productId is set before calling getProduct
        // $modelProduct = new Model_Product();
            $productData = $modelProduct->show("product_id,product_name,sku"); // Assuming $productId is set appropriately
// Pass $productId as an argument
            // Add more logic for editing...
        } else {
            echo "Invalid product ID for edit action.";
        }
    } elseif ($action === 'delete') {
        // Handle delete action
        if (!empty($productId)) {
            $modelProduct->deleteProduct($productId); // Pass $productId as an argument
            // Add more logic for deleting...
        } else {
            echo "Invalid product ID for delete action.";
        }
    }


// Display the product list
// $viewProduct->show();
?>
