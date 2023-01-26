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
    <style>
    .card {
        opacity: 0.8;
        transition: 0.5s ease-in-out;
        color: #343a40;
    }

    .card:hover {
        opacity: 1;
        transform: scale(1.1);
        transition: 1s ease-in-out;
        background-color: aliceblue;
        box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);
    }
    </style>
</head>

<body>
    <?php include "./include/header.php" ?>
    <main>

        <?php
        include "conn.php";
        ?>
        <section class="categories" id="ecategories">
            <h1>Perfumes Products</h1>
            <div class="first-cat">
                <div class="container text-center">
                    <div class="row">
                        <?php
                        $products = $pdo->prepare('SELECT * FROM products WHERE category_product_featured="fragrance"');
                        $products->execute();
                        $products = $products->fetchAll();
                        foreach ($products as $fragrance) {
                            echo ' 
                                <div class="col-sm">
                                    <div class="card" style="width: 18rem;">
                                        <img src="' . $fragrance["product_image"] . '" class="card-img-top" alt="Card image cap" width="200px" height="200px">
                                        <div class="card-body">
                                            <h3>' . $fragrance["product_title"] . '</h3>
                                            <p class="card-text">' . $fragrance["product_description"] . '</p>
                                            <p class="card-text">Price: £' . $fragrance["product_price"] . '</p>
                                            <a title="Add Cart" href="cart.php?id=' . $fragrance["product_id"] . '" class="btn btn-success">Add Cart</a> 
                                        </div>
                                    </div><br/>
                                </div>
                            ';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <!--  -->
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
    <?php include "./include/footer.php" ?>
</body>
<script src="libs/script.js" defer></script>

</html>