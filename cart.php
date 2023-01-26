<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d268b9c6f3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/styles.css">
    <title>Fortune Ndlovu: Ecommerce</title>
</head>

<body>
    <?php include "./include/header.php"; ?>
    <main>
        <section class="categories" id="ecategories">
            <h1>Cart</h1>
            <?php
            include "conn.php";

            if (!isset($_SESSION["cart"])) {
                $cartIds = array();
                $_SESSION["cart"][] = $cartIds;
                echo "no cart";
            } else {
                $cartIds = $_SESSION["cart"];
                echo "cart exists";
            }

            //Retreive the product ID using the GET request while assaining to a variable
            $product_id = $_GET["id"];

            //Then add to the cart array using the array_push function
            array_push($cartIds, $product_id);
            $_SESSION["cart"] = $cartIds;
            ?>

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <table class="table table-image">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Price</th>
                                    <th scope="col"> </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($cartIds as $cartItem) {
                                    $products = $pdo->prepare("SELECT * FROM products WHERE product_id=$cartItem");
                                    $products->execute();
                                    $products = $products->fetch();
                                    
                                    echo '
                                        <tr>
                                            <th scope="row">' . $products["product_id"] . '</th>
                                            <td class="w-25">
                                                <img src="' . $products["product_image"] . '" class="img-fluid img-thumbnail" alt="cart item">
                                            </td>
                                            <td>' . $products["product_title"] . '</td>
                                            <td>' . $products["product_description"] . '</td>
                                            <td>' . $products["product_price"] . '</td>
                                            <td><a href="delete.php?id=' . $products["product_id"] . '" type="button" class="btn btn-danger">Remove</a></td>
                                        </tr>
                                    ';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </section>


        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
        </script>
    </main>
</body>
<script src="libs/script.js" defer></script>

</html>