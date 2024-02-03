<!-- // Inside View_Product.php

public function toHtml($products)
{
    $html = '<a href="index.php">Add New Product</a><br>';
    $html .= '<table border="1">';
    $html .= '<tr><th>Product Name</th><th>Actions</th></tr>';

    foreach ($products as $product) {
        $html .= '<tr>';
        $html .= '<td>' . $product['product_name'] . '</td>';
        $html .= '<td><a href="index.php?action=edit&id=' . $product['product_id'] . '">Edit</a>';
        $html .= ' | <a href="index.php?action=delete&id=' . $product['product_id'] . '">Delete</a></td>';
        $html .= '</tr>';
    }

    $html .= '</table>';

    return $html;
} -->
<?php
class View_Product
{
    public function __construct()
    {

    }

    public function createForm($productData = [])
    {
        // Existing form creation code

        // Populate the form with product data for editing
        foreach ($productData as $key => $value) {
            $form = str_replace('name="' . $key . '"', 'name="' . $key . '" value="' . $value . '"', $form);
        }

        return $form;
    }

    // Existing functions remain unchanged

    public function toHtml($products)
    {
        $html = '<a href="index.php">Add New Product</a><br>';
        $html .= '<table border="1">';
        $html .= '<tr><th>Product Name</th><th>Actions</th></tr>';

        foreach ($products as $product) {
            $html .= '<tr>';
            $html .= '<td>' . $product['product_name'] . '</td>';
            $html .= '<td><a href="index.php?action=edit&id=' . $product['product_id'] . '">Edit</a>';
            $html .= ' | <a href="index.php?action=delete&id=' . $product['product_id'] . '">Delete</a></td>';
            $html .= '</tr>';
        }

        $html .= '</table>';

        return $html;
    }
}










<?php
// class View_Product
// {
//     public function __construct()
//     {

//     }

//     public function createForm()
//     {
//         $form = '<form action="" method="POST">';
//         	$form .= '<div>';
// 	        	$form .= $this->createTextField('pdata[product_name]', "Product Name: ");
// 	        $form .= '</div>';
// 	        $form .= '<div>';
// 	        	$form .= $this->createTextField('pdata[sku]', "Sku: ");
// 	        $form .= '</div>';
// 	        $form .= '<div>';
// 	        	$form .= $this->createTextField('pdata[price]', "Price: ");
// 	        $form .= '</div>';
// 	        $form .= '<div>';
// 	        	$form .= $this->createTextField('pdata[manufacturer_cost]', "Cost: ");
// 	        $form .= '</div>';
// 	        $form .= '<div>';
// 	        	$form .= $this->createSelectField('pdata[category]', 'Category', ['' => 'Select Category', 'Living room', 'Dining & kitchen','Office','Mattresses','Bar & Game Room','Outdoor','Decor','Lighting'],'dining & kitchen');
// 	        $form .= '</div>';
//             $form .= '<div>';
// 	        	$form .= $this->createRadioBtn('pdata[status]','Status', ['Enabled','Disabled']);
// 	        $form .= '</div>';
//             $form .= '<div>';
// 	        	$form .= $this->createRadioBtn('pdata[product_type]','Product Type', ['Simple','Bundle']);
// 	        $form .= '</div>';
// 	        $form .= '<div>';
// 	        	$form .= $this->creteSubmitBtn('Submit');
// 	        $form .= '</div>';
// 		$form .= '</form>';
// 		return $form;
//     }

//     public function createTextField($name, $title, $value = '', $id = '')
//     {
//         return '<span> ' . $title . ' </span><input id="' . $id . '" type="text" name="' . $name . '" value="' . $value . '">';
//     }


//     // public function createSelectField($name, $title, $options = [], $selectedValue = '', $id = '')
//     // {
//     // $selectField = '<span> ' . $title . ' </span><select id="' . $id . '" name="' . $name . '">';

//     // foreach ($options as $value => $label) {
//     //     $selected = ($value == $selectedValue) ? 'selected="selected"' : '';
//     //     $selectField .= '<option value="' . $value . '" ' . $selected . '>' . $label . '</option>';
//     // }
//     // $selectField .= '</select>';
//     // return $selectField;
//     // }

//     public function createSelectField($name, $title, $options = [], $selectedValue = '', $id = '')
//     {
//     $selectField = '<span> ' . $title . ' </span><select id="' . $id . '" name="' . $name . '">';

//     foreach ($options as $value) {
//         $selected = ($value == $selectedValue) ? 'selected="selected"' : '';
//         $selectField .= '<option value="' . $value . '" ' . $selected . '>' . $value . '</option>';
//     }

//     $selectField .= '</select>';
//     return $selectField;
//     }
//     // public function createRadioBtn($name, $title, $options = [], $selectedValue = '', $id = ''){
//     //     $radioBtn='<span> ' . $title . ' </span><input type="radio" id="' . $id . '" name="' . $name '"';
//     //     foreach ($options as $value) {
//     //         $selected = ($value == $selectedValue) ? 'selected="selected"' : '';
//     //         $radioBtn .= '<option value="' . $value . '" ' . $selected . '>' . $value . '</option>';
//     //     }
//     //     $radioBtn .= '/>"';
//     // }


//     public function createRadioBtn($name, $title, $options = [], $selectedValue = '', $id = ''){
//         $radioBtn = '<span>' . $title . '</span>';
    
//         foreach ($options as $value) {
//             $checked = ($value == $selectedValue) ? 'checked' : '';
//             $radioBtn .= '<label><input type="radio" id="' . $id . '" name="' . $name . '" value="' . $value . '" ' . $checked . '> ' . $value . '</label>';
//         }
    
//         return $radioBtn;
//     }
    


//     public function creteSubmitBtn($title)
//     {
//         return '<input type="submit" name="submit" value="'.$title.'">';
//     }

//     public function toHtml()
//     {
//     	return $this->createForm();
//     }
// } -->

// class View_Product
// {
//     public function __construct()
//     {

//     }

//     public function createForm($productData = [])
//     {
//         $form = '<form action="" method="POST">';
//                 	$form .= '<div>';
//         	        	$form .= $this->createTextField('pdata[product_name]', "Product Name: ");
//         	        $form .= '</div>';
//         	        $form .= '<div>';
//         	        	$form .= $this->createTextField('pdata[sku]', "Sku: ");
//         	        $form .= '</div>';
//         	        $form .= '<div>';
//         	        	$form .= $this->createTextField('pdata[price]', "Price: ");
//         	        $form .= '</div>';
//         	        $form .= '<div>';
//         	        	$form .= $this->createTextField('pdata[manufacturer_cost]', "Cost: ");
//         	        $form .= '</div>';
//         	        $form .= '<div>';
//         	        	$form .= $this->createSelectField('pdata[category]', 'Category', ['' => 'Select Category', 'Living room', 'Dining & kitchen','Office','Mattresses','Bar & Game Room','Outdoor','Decor','Lighting'],'dining & kitchen');
//         	        $form .= '</div>';
//                     $form .= '<div>';
//         	        	$form .= $this->createRadioBtn('pdata[status]','Status', ['Enabled','Disabled']);
//         	        $form .= '</div>';
//                     $form .= '<div>';
//         	        	$form .= $this->createRadioBtn('pdata[product_type]','Product Type', ['Simple','Bundle']);
//         	        $form .= '</div>';
//         	        $form .= '<div>';
//         	        	$form .= $this->creteSubmitBtn('Submit');
//         	        $form .= '</div>';
        

//         // Populate the form with product data for editing
//         foreach ($productData as $key => $value) {
//             $form = str_replace('name="' . $key . '"', 'name="' . $key . '" value="' . $value . '"', $form);
//         }

//         return $form;
//     }

//     // Existing functions remain unchanged


//     public function createTextField($name, $title, $value = '', $id = '')
//         {
//             return '<span> ' . $title . ' </span><input id="' . $id . '" type="text" name="' . $name . '" value="' . $value . '">';
//         }
    
    
//         // public function createSelectField($name, $title, $options = [], $selectedValue = '', $id = '')
//         // {
//         // $selectField = '<span> ' . $title . ' </span><select id="' . $id . '" name="' . $name . '">';
    
//         // foreach ($options as $value => $label) {
//         //     $selected = ($value == $selectedValue) ? 'selected="selected"' : '';
//         //     $selectField .= '<option value="' . $value . '" ' . $selected . '>' . $label . '</option>';
//         // }
//         // $selectField .= '</select>';
//         // return $selectField;
//         // }
    
//         public function createSelectField($name, $title, $options = [], $selectedValue = '', $id = '')
//         {
//         $selectField = '<span> ' . $title . ' </span><select id="' . $id . '" name="' . $name . '">';
    
//         foreach ($options as $value) {
//             $selected = ($value == $selectedValue) ? 'selected="selected"' : '';
//             $selectField .= '<option value="' . $value . '" ' . $selected . '>' . $value . '</option>';
//         }
    
//         $selectField .= '</select>';
//         return $selectField;
//         }
//         // public function createRadioBtn($name, $title, $options = [], $selectedValue = '', $id = ''){
//         //     $radioBtn='<span> ' . $title . ' </span><input type="radio" id="' . $id . '" name="' . $name '"';
//         //     foreach ($options as $value) {
//         //         $selected = ($value == $selectedValue) ? 'selected="selected"' : '';
//         //         $radioBtn .= '<option value="' . $value . '" ' . $selected . '>' . $value . '</option>';
//         //     }
//         //     $radioBtn .= '/>"';
//         // }
    
    
//         public function createRadioBtn($name, $title, $options = [], $selectedValue = '', $id = ''){
//             $radioBtn = '<span>' . $title . '</span>';
        
//             foreach ($options as $value) {
//                 $checked = ($value == $selectedValue) ? 'checked' : '';
//                 $radioBtn .= '<label><input type="radio" id="' . $id . '" name="' . $name . '" value="' . $value . '" ' . $checked . '> ' . $value . '</label>';
//             }
        
//             return $radioBtn;
//         }
        
    
    
//         public function creteSubmitBtn($title)
//         {
//             return '<input type="submit" name="submit" value="'.$title.'">';
//         }
    
//     //     public function toHtml()
//     //     {
//     //     	return $this->createForm();
//     //     }
//     public function toHtml($products)
//     {
//         $html = '<a href="index.php">Add New Product</a><br>';
    
//         if (!empty($products)) {
//             $html .= '<table border="1">';
//             $html .= '<tr><th>Product Name</th><th>Actions</th></tr>';
    
//             foreach ($products as $product) {
//                 $html .= '<tr>';
//                 $html .= '<td>' . $product['product_name'] . '</td>';
//                 $html .= '<td><a href="index.php?action=edit&id=' . $product['product_id'] . '">Edit</a>';
//                 $html .= ' | <a href="index.php?action=delete&id=' . $product['product_id'] . '">Delete</a></td>';
//                 $html .= '</tr>';
//             }
    
//             $html .= '</table>';
//         } else {
//             $html .= 'No products found.';
//         }
    
//         // Output the HTML
//         echo $html;
    
//         // Properly terminate the script
//         return;
//     }
    
    
    
//     //  die();
// }

    

// class View_Product
// {
//     public function __construct()
//     {
//     }

//     public function createForm($productDetails = [])
//     {
//         $form = '<form action="" method="POST">';
//         // ... Your existing form fields here ...
//         $form .= '<div>';
//                 	        	$form .= $this->createTextField('pdata[product_name]', "Product Name: ");
//                 	        $form .= '</div>';
//                 	        $form .= '<div>';
//                 	        	$form .= $this->createTextField('pdata[sku]', "Sku: ");
//                 	        $form .= '</div>';
//                 	        $form .= '<div>';
//                 	        	$form .= $this->createTextField('pdata[price]', "Price: ");
//                 	        $form .= '</div>';
//                 	        $form .= '<div>';
//                 	        	$form .= $this->createTextField('pdata[manufacturer_cost]', "Cost: ");
//                 	        $form .= '</div>';
//                 	        $form .= '<div>';
//                 	        	$form .= $this->createSelectField('pdata[category]', 'Category', ['' => 'Select Category', 'Living room', 'Dining & kitchen','Office','Mattresses','Bar & Game Room','Outdoor','Decor','Lighting'],'dining & kitchen');
//                 	        $form .= '</div>';
//                             $form .= '<div>';
//                 	        	$form .= $this->createRadioBtn('pdata[status]','Status', ['Enabled','Disabled']);
//                 	        $form .= '</div>';
//                             $form .= '<div>';
//                 	        	$form .= $this->createRadioBtn('pdata[product_type]','Product Type', ['Simple','Bundle']);
//                 	        $form .= '</div>';
//                 	        $form .= '<div>';
//                 	        	$form .= $this->creteSubmitBtn('Submit');
//                 	        $form .= '</div>';

//         $form .= '</form>';
//         return $form;
//     }
//     public function createTextField($name, $title, $value = '', $id = '')
//             {
//                 return '<span> ' . $title . ' </span><input id="' . $id . '" type="text" name="' . $name . '" value="' . $value . '">';
//             }

//     public function creteSubmitBtn($title)
//             {
//                 return '<input type="submit" name="submit" value="'.$title.'">';
//             }

//     public function createRadioBtn($name, $title, $options = [], $selectedValue = '', $id = ''){
//                     $radioBtn = '<span>' . $title . '</span>';
                
//                     foreach ($options as $value) {
//                         $checked = ($value == $selectedValue) ? 'checked' : '';
//                         $radioBtn .= '<label><input type="radio" id="' . $id . '" name="' . $name . '" value="' . $value . '" ' . $checked . '> ' . $value . '</label>';
//                     }
                
//                     return $radioBtn;
//                 }
//         public function createSelectField($name, $title, $options = [], $selectedValue = '', $id = '')
//         {
//         $selectField = '<span> ' . $title . ' </span><select id="' . $id . '" name="' . $name . '">';
    
//         foreach ($options as $value) {
//             $selected = ($value == $selectedValue) ? 'selected="selected"' : '';
//             $selectField .= '<option value="' . $value . '" ' . $selected . '>' . $value . '</option>';
//         }
    
//         $selectField .= '</select>';
//         return $selectField;
//         }
//         public function toHtml($products)
//         {
//             $html = '';  // Initialize the HTML variable
    
//             // Check if products exist
//             if (!empty($products)) {
//                 $html .= '<table>';
//                 $html .= '<tr><th>Product Name</th><th>Actions</th></tr>';
//                 foreach ($products as $product) {
//                     $html .= '<tr>';
//                     $html .= '<td>' . $product['product_name'] . '</td>';
//                     $html .= '<td><a href="?action=edit&id=' . $product['product_id'] . '">Edit</a> | <a href="?action=delete&id=' . $product['product_id'] . '">Delete</a></td>';
//                     $html .= '</tr>';
//                 }
//                 $html .= '</table>';
//             } else {
//                 $html .= '<p>No products found.</p>';
//             }
    
//             // Add "Add New Product" button
//             $html .= '<br><a href="?action=insert">Add New Product</a>';
    
//             // Display the form only if the action is "insert"
//             if ($_GET['action'] == 'insert') {
//                 $html .= '<br>' . $this->createForm();  // Display the form
//             }
    
//             return $html;
//         }
// }







class View_Product
{
    public function __construct()
    {

    }

    public function createForm()
    {
        $form = '<form action="" method="POST">';
        $form .= '<div>';
        $form .= $this->creteTextField('pdata[product_name]', "Product Name: ");
        $form .= '</div>';
        $form .= '<div>';
        $form .= $this->creteTextField('pdata[sku]', "Sku: ");
        $form .= '</div>';
        $form .= '<div>';
        $form .= $this->creteTextField('pdata[price]', "Price: ");
        $form .= '</div>';
        $form .= '<div>';
        $form .= $this->creteTextField('pdata[manufacturer_cost]', "Cost: ");
        $form .= '</div>';
        $form .= '<div>';
        $form .= $this->createSelectField('pdata[category]', 'Category', ['' => 'Select Category', 'Living room', 'Dining & kitchen','Office','Mattresses','Bar & Game Room','Outdoor','Decor','Lighting'],'dining & kitchen');
        $form .= '</div>';
        $form .= '<div>';
        $form .= $this->createRadioBtn('pdata[status]','Status', ['Enabled','Disabled']);
        $form .= '</div>';
        $form .= '<div>';
        $form .= $this->createRadioBtn('pdata[product_type]','Product Type', ['Simple','Bundle']);
        $form .= '</div>';
        $form .= '<div>';
        $form .= $this->creteSubmitBtn('Submit');
        $form .= '</div>';
        $form .= '</form>';
        return $form;
    }

    public function creteTextField($name, $title, $value = '', $id = '')
    {
        return '<span> ' . $title . ' </span><input id="' . $id . '" type="text" name="' . $name . '" value="' . $value . '">';
    }

    public function createSelectField($name, $title, $options = [], $selectedValue = '', $id = '')
    {
        $selectField = '<span> ' . $title . ' </span><select id="' . $id . '" name="' . $name . '">';

        foreach ($options as $value) {
            $selected = ($value == $selectedValue) ? 'selected="selected"' : '';
            $selectField .= '<option value="' . $value . '" ' . $selected . '>' . $value . '</option>';
        }

        $selectField .= '</select>';
        return $selectField;
    }

    public function createRadioBtn($name, $title, $options = [], $selectedValue = '', $id = ''){
        $radioBtn = '<span>' . $title . '</span>';

        foreach ($options as $value) {
            $checked = ($value == $selectedValue) ? 'checked' : '';
            $radioBtn .= '<label><input type="radio" id="' . $id . '" name="' . $name . '" value="' . $value . '" ' . $checked . '> ' . $value . '</label>';
        }

        return $radioBtn;
    }

    public function creteSubmitBtn($title)
    {
        return '<input type="submit" name="submit" value="'.$title.'">';
    }

    public function toHtml($products)
    {
        $html = '';  // Initialize the HTML variable

        // Check if products exist
        if (!empty($products)) {
            $html .= '<table>';
            $html .= '<tr><th>Product Name</th><th>Actions</th></tr>';

            foreach ($products as $product) {
                $html .= '<tr>';
                $html .= '<td>' . $product['product_name'] . '</td>';
                $html .= '<td>';
                $html .= '<a href="index.php?action=edit&id=' . $product['product_id'] . '">Edit</a> | ';
                $html .= '<a href="index.php?action=delete&id=' . $product['product_id'] . '">Delete</a>';
                $html .= '</td>';
                $html .= '</tr>';
            }

            $html .= '</table>';
        } else {
            $html .= '<p>No products found.</p>';
        }

        // Display the form only if the action is "insert"
        if (isset($_GET['action']) && $_GET['action'] == 'insert') {
            $html .= '<br>' . $this->createForm();  // Display the form
        }

        return $html;
    }
}
?>
