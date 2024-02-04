<?php

include "Lib/autoload.php";

$request = new Model_Request();
$productModel = new Model_Product();

if (!$request->isPost()) {
    // Display the list of products
    $products = $productModel->show();
    $productView = new View_Product();
    echo $productView->toHtml($products);
} else {
    // Handle form submission
    $postData = $request->getPostData('pdata');
    
    if (isset($postData['submit'])) {
        // Insert or update based on the presence of 'product_id'
        if (isset($postData['product_id']) && !empty($postData['product_id'])) {
            $productId = $postData['product_id'];
            unset($postData['product_id']);
            $productModel->update($postData, ['product_id' => $productId]);
        } else {
            $productModel->save($postData);
        }

        // Redirect to index.php after successful submission
        header("Location: index.php");
        exit();
    }
}

// Handle edit and delete actions
if (isset($_GET['action']) && !empty($_GET['action'])) {
    $action = $_GET['action'];
    $productId = $_GET['id'];

    if ($action === 'edit') {
        // Fetch the product details and display the form for editing
        $productDetails = $productModel->show('*', ['product_id' => $productId]);
        $productView = new View_Product();
        echo $productView->createForm($productDetails[0]);
        exit();
    } elseif ($action === 'delete') {
        // ... existing code
        $productModel->del(['product_id' => $productId]);
        header("Location: index.php");
                    exit();
    }
}

?>
