<?php

// include "Lib/autoload.php";

// $request = new Model_Request();
// $productModel = new Model_Product();

// if (!$request->isPost()) {
//     // Display the list of products
//     $products = $productModel->show();
//     $productView = new View_Product();
//     echo $productView->toHtml($products);
// } else {
//     // Handle form submission
//     $postData = $request->getPostData('pdata');
    
//     if (isset($postData['submit'])) {
//         // Insert or update based on the presence of 'product_id'
//         if (isset($postData['product_id']) && !empty($postData['product_id'])) {
//             $productId = $postData['product_id'];
//             unset($postData['product_id']);
//             $productModel->update($postData, ['product_id' => $productId]);
//         } else {
//             $productModel->save($postData);
//         }

//         // Redirect to index.php after successful submission
//         header("Location: index.php");
//         exit();
//     }
// }


// // Inside index.php, before the existing code

// if (isset($_GET['action']) && !empty($_GET['action'])) {
//     $action = $_GET['action'];
//     $productId = $_GET['id'];

//     if ($action === 'edit') {
//         // Fetch the product details and display the form for editing
//         $productDetails = $productModel->show('*', ['product_id' => $productId]);
//         $productView = new View_Product();
//         echo $productView->createForm($productDetails[0]);
//         exit();
//     } elseif ($action === 'delete') {
//         // Delete the product and redirect to index.php
//         $productModel->del(['product_id' => $productId]);
//         header("Location: index.php");
//         exit();
//     }
// }




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
        // Delete the product and redirect to index.php
        $productModel->del(['product_id' => $productId]);
        header("Location: index.php");
        exit();
    }
}



























<!-- <!-- 

// include "Lib/autoload.php";

// $request = new Model_Request();

// if(!$request->isPost()) {
// 	$product = new View_Product();
// 	echo $product->toHtml();
// } else {
// 	// print_r($request->getParams('pdata'));
// 	$product = new Model_Product();
// 	$product->save($request->getParams('pdata'));
// 	// print_r();
// } -->


<!-- // include "Lib/autoload.php";

// $request = new Model_Request();
// $productModel = new Model_Product();

// if (!$request->isPost()) {
//     // Display the list of products
//     $products = $productModel->show();
//     $productView = new View_Product();
//     echo $productView->toHtml($products);
// } else {
//     // Handle form submission
//     $postData = $request->getPostData('pdata');
    
//     if (isset($postData['submit'])) {
//         // Insert or update based on the presence of 'product_id'
//         if (isset($postData['product_id']) && !empty($postData['product_id'])) {
//             $productId = $postData['product_id'];
//             unset($postData['product_id']);
//             $productModel->update($postData, ['product_id' => $productId]);
//         } else {
//             $productModel->save($postData);
//         }

//         // Redirect to index.php after successful submission
//         header("Location: index.php");
//         exit();
//     }
// }

// // Handle edit and delete actions
// if (isset($_GET['action']) && !empty($_GET['action'])) {
//     $action = $_GET['action'];
//     $productId = $_GET['id'];

// 	if ($request->getParams('action') == 'edit') {
// 		$productId = $request->getParams('id');
// 		// Fetch the product details by ID
// 		$productDetails = $productModel->show('*', "product_id = $productId");
// 		// Render the form with the fetched product details
// 		$product = new View_Product();
// 		echo $product->toHtml($productDetails);
// 	}
// 	elseif ($action === 'delete') {
//         // Delete the product and redirect to index.php
//         $productModel->del(['product_id' => $productId]);
//         header("Location: index.php");
//         exit();
//     }
// } -->





<!-- include "Lib/autoload.php";

$request = new Model_Request();
$productModel = new Model_Product();

if (!$request->isPost()) {
    // Display the list of products
    $products = $productModel->show();
    $productView = new View_Product();
    echo $productView->toHtml($products);
} else {
    // Handle form submission for both insert and update
   // Handle form submission for both insert and update
$productData = $request->getPostData('pdata');

if ($request->getParams('action') == 'insert') {
    // Insert new product
    $productModel->save($productData);
} elseif ($request->getParams('action') == 'edit') {
    // Update existing product
    $productId = $request->getParams('id');
    $productModel->update($productData, ["product_id" => $productId]);
} elseif ($request->getParams('action') == 'delete') {
    // Handle product deletion (you need to implement this logic)
    $productId = $request->getParams('id');
    $productModel->del(["product_id" => $productId]);
}

// Redirect to the product list after form submission
header('Location: index.php');
exit();

}
?> -->


<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

// include "Lib/autoload.php";

// $request = new Model_Request();
// $productModel = new Model_Product();

// if (!$request->isPost()) {

	
//     // Display the list of products
//     $products = $productModel->show();
//     $productView = new View_Product();
//     echo $productView->toHtml($products);
// } else {
	
// 	if ($request->isPost()) {
// 		echo "Form submitted!";
// 	}
//     // Handle form submission for both insert and update
//     $productData = $request->getPostData('pdata');

//     if ($request->getParams('action') == 'insert') {
//         // Insert new product
//         $productModel->save($productData);
//     } elseif ($request->getParams('action') == 'edit') {
//         // Update existing product
//         $productId = $request->getParams('id');
//         $productModel->update($productData, ["product_id" => $productId]);
//     } elseif ($request->getParams('action') == 'delete') {
//         // Handle product deletion (you need to implement this logic)
//         $productId = $request->getParams('id');
//         $productModel->del(["product_id" => $productId]);
//     }

//     // Redirect to the product list after form submission
//     // header('Location: index.php');
//     // exit();
// }


// error_reporting(E_ALL);
// ini_set('display_errors', 1);

// include "Lib/autoload.php";

// $request = new Model_Request();
// $productModel = new Model_Product();

// if (!$request->isPost()) {
//     // Display the list of products
//     $products = $productModel->show();
//     $productView = new View_Product();
//     echo $productView->toHtml($products);
// } else {
//     if ($request->isPost()) {
//         echo "Form submitted!";
//         var_dump($request->getParams());
//         var_dump($productData);  // Check if the data is being received
//     }

//     // Handle form submission for both insert and update
//     $productData = $request->getPostData('pdata');

//     if ($request->getParams('action') == 'insert') {
//         // Insert new product
//         $productModel->save($productData);
//     } elseif ($request->getParams('action') == 'edit') {
//         // Update existing product
//         $productId = $request->getParams('id');
//         $productModel->update($productData, ["product_id" => $productId]);
//     } elseif ($request->getParams('action') == 'delete') {
//         // Handle product deletion (you need to implement this logic)
//         $productId = $request->getParams('id');
//         $productModel->del(["product_id" => $productId]);
//     }

//     // Commenting out the redirect for debugging purposes
//     // header('Location: index.php');
//     // exit();
// }

// error_reporting(E_ALL);
// ini_set('display_errors', 1);

// include "Lib/autoload.php";

// $request = new Model_Request();
// $productModel = new Model_Product();
// $productData = null;

// if (!$request->isPost()) {
//     // Display the list of products
//     $products = $productModel->show();
//     $productView = new View_Product();
//     echo $productView->toHtml($products);
// } else {
//     if ($request->isPost()) {
//         echo "Form submitted!";
//         var_dump($request->getParams());
//         $productData = $request->getPostData('pdata');  // Declare $productData here
//         var_dump($productData);  // Check if the data is being received
//     }

//     // Handle form submission for both insert and update
//     if ($request->getParams('action') == 'insert') {
//         // Insert new product
//         $productModel->save($productData);
//     } elseif ($request->getParams('action') == 'edit') {
//         // Update existing product
//         $productId = $request->getParams('id');
//         $productModel->update($productData, ["product_id" => $productId]);
//     } elseif ($request->getParams('action') == 'delete') {
//         // Handle product deletion (you need to implement this logic)
//         $productId = $request->getParams('id');
//         $productModel->del(["product_id" => $productId]);
//     }

//     // Redirect to the product list after form submission
//     // header('Location: index.php');
//     // exit();
// }



include "Lib/autoload.php";

$request = new Model_Request();
$productModel = new Model_Product();

if (!$request->isPost()) {
    // Display the list of products
    $products = $productModel->show();
    $productView = new View_Product();
    echo $productView->toHtml($products);
} else {
    // Handle form submission for both insert and update
    $productData = $request->getPostData('pdata');

    if ($request->getParams('action') == 'insert') {
        // Insert new product
        $productModel->save($productData);
    } elseif ($request->getParams('action') == 'edit') {
        // Update existing product
        $productId = $request->getParams('id');
        $productModel->update($productData, ["product_id" => $productId]);
    } elseif ($request->getParams('action') == 'delete') {
        // Handle product deletion
        $productId = $request->getParams('id');
        $productModel->del(["product_id" => $productId]);
    }

    // Redirect to the product list after form submission
    header('Location: index.php');
    exit();
}
?>



?>
