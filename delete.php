<?php
    session_start();

    // if the cart exists in the session.
    // If it does, it retrieve the product ID from the GET request
    if (isset($_SESSION['cart'])) {
        $product_id = $_GET['id'];

        // find the index of that product ID in the cart array.
        $index = array_search($product_id, $_SESSION['cart']);
        if ($index !== false) {
            
            // If the product ID is found, remove it is from the array
            unset($_SESSION['cart'][$index]);

            // Update the cart session with the new array after the product is removed
            $_SESSION['cart'] = array_values($_SESSION['cart']);
        }
    }

    // Redirect to the cart page
    header('Location: cart.php');
?>