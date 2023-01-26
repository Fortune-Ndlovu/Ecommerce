<!-- 
    Q1- List categories
    -- 1 - Create a new database table that stores product categories.
    -- 2 - Get the list of categories from the database.
    -- 3 - Display the list of categories on a categories page.
    -- 4 - Clicking a category should take you to a page that shows all the products in that category.
    -- 5 - Tip: the link should include the category id (similar to our CMS example of editing pages) so a link could be localhost/ssp1/ecommerce/category?id=1
 -->

<!-- 
    Q2- List products in these categories.
    -- 1 - create a database table to hold products and each product should have a column that specifies the category id that it is in.
    -- 2 - Then when you are on the category page you should get the category id from the url and then query all products that have that category id.
    -- 3 - Display the products with an image, information and price, plus an button/link to add to cart getting each from the database table.
 -->

<!-- 
    Q3- Add a product to cart.
    -- 1 - Use the SESSION object to save the id of the products that the user has added to their cart.
    -- 2 - Create an array for the cart items to be pushed into.
    -- 3 - Query the products table where the product id matches the id of products in the array and display. 
 -->

<!-- 
    Q4- Remove an item from the cart.
    -- 1 - Use the SESSION object to save the id of the products that the user has added to their cart.
    -- 2 - Based on the clicked items in the cart array remove the id in question.










Create a database driven ecommerce website. All of the site content and products must be taken from the database.

The site should display categories, then clicking through should display products in that category.
Each product should have an add to cart button that enables a visitor to add to cart.
They should also be able to remove it from the cart.
For extra credit try to enable a login/logout system with PHP sessions.

Your site must have the following functionality:

List categories. You should have a database table that stores your product categories.
Get the list of these categories and display them on a categories page.
Clicking a category should take you to a page that shows all the products in that category.
Tip: the link should include the category id (similar to our CMS example of editing pages) so a link could be localhost/ssp1/ecommerce/category?id=1

List products in these categories.
When you go to a category page you should get the category id from the url then get all products in that category and display them with an image,
information and price, plus an button/link to add to cart.

Tip: create a database table to hold products and each product should have a column that specifies the category id that it is in.
Then when you are on the category page you should get the category id from the url and then query all products that have that category id.

Add a product to cart.
Method 1 - Use a database table to store each product when the user adds it to the cart.
Add the id of the product to a database table after the user clicks the button to add to cart.
After clicking this button the user should be directed to the cart page where the items in the cart are listed.
Method 2 - Use the SESSION object to save the id of the products that the user has added to their cart.

Remove an item from the cart. Immediately after adding an item to the cart you should be able to click a delete button beside it to remove it from the cart.
Marking structure:

- Approximately 20% for achieving each of the requirements above.

- 10% for usability

- 10% for code logic.

Please export the full SQL for your database and include it with your submission

The site itself works very well but when I look at the programming I see some issues.
Firstly don’t hardcode the path to the images in the database, just add the image name.

When I moved server to test I had to change every image name. Secondly,
on each category page you are writing a full database query and foreach loop for every product.
For example, on the perfumes.php page you have 6 selects (1 for each product) and 6 foreach loops.
Firstly this is a drastic overuse of code and makes using a database pointless.
Secondly, what is another product is added to the database, you have to update the code again.
You should have one select statement that gets all the products in this category then loops through the products and displays them.
1 select and 1 foreach.
 -->
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

    <?php
    // session_start();
    // if (isset($_SESSION['user'])) {
        include "./include/header.php";
    ?>
    <main>
        <section class="hero-container">

            <div class="slideshow-container">
                <div class="mySlides fade">
                    <img src="img/online.jpg" width="300px" height="680px" style="width:100%">
                </div>

                <div class="mySlides fade">
                    <img src="img/phone.jpg" width="300px" height="680px" style="width:100%">
                </div>

                <div class="mySlides fade">
                    <img src="img/shopping.jpg" width="300px" height="680px" style="width:100%">
                </div>
            </div>
            <br>
            <div style="text-align:center">
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>
            <div class="hero-para">
                <h6>Discover a world of useful products suggested just for you.
                </h6>
                <a title="Shop now" type="button" href="#ecategories" class="btn btn-primary btn-lg"><span
                        class="dArrow"><i aria-hidden="true" class="fa-solid fa-arrow-down"></i></span> Shop Now <span
                        class="dArrow"><i aria-hidden="true" class="fa-solid fa-arrow-down"></i></span></a>
            </div>

        </section>
        <?php
            include "conn.php";
            ?>
        <section class="categories" id="ecategories">
            <h1>Shop by categories</h1>
            <div class="first-cat">
                <div class="container text-center">
                    <div class="row">
                        <?php
                            $categories = $pdo->prepare('SELECT * FROM categories WHERE category_id = category_id');
                            $categories->execute();
                            $categories = $categories->fetchAll();
                            foreach ($categories as $cat1) {
                                echo ' 
                                        <div class="col-sm">
                                            <a title="' . $cat1["category_name"] . '" href="' . $cat1["category_link"] . '?id=' . $cat1["category_id"] . '" class="fcLink" id="linkEffect">
                                                <div class="card" style="width: 18rem;">
                                                    <img src="' . $cat1["category_image"] . '" class="card-img-top" alt="Card image cap" width="200px" height="200px">
                                                    <div class="card-body">
                                                        <h3>' . $cat1["category_name"] . '</h3>
                                                        <p class="card-text">' . $cat1["category_description"] . '</p>
                                                    </div>
                                                </div>
                                            </a><br />
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
    <?php
        include "./include/footer.php";
    // } else {
    //     // header('Location:loginForm.php');
    // }
    ?>
</body>
<script src="libs/script.js" defer></script>

</html>