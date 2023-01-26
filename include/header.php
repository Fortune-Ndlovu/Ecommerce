<?php
include "conn.php";
//accessing an instance of an object.
$stmt = $pdo->prepare('SELECT * FROM categories ORDER BY category_id ASC');
$stmt->execute();
$categories = $stmt->fetchAll();
// echo "<pre>";
// var_dump($categories);
// echo "</pre>";
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="vt">
    <div class="vt-menu">
        <ul class="vtf-navbar">
            <li><span>Hello. <a title="Login/Logout" class="navbar-brand" href="../FortuneNdlovu_Ecommerce/loginForm.php">Login/Logout</a></span></li>
        </ul>
        <ul class="vts-navbar">
            <li><span><a title="Sell" class="navbar-brand" href="#">Sell</a></span></li>
            <li><span><a title="Notifications" class="navbar-brand" href="#"><i class="fa-solid fa-bell"></i></a></span></li>
            <li><span><a title="Cart" class="navbar-brand" href="../FortuneNdlovu_Ecommerce/cart.php"><i aria-hidden="true" class="fa-solid fa-cart-shopping"></i></a></span></li>
        </ul>
    </div>
</nav>
<!--  -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<span><a title="FortuneEcommerce" class="navbar-brand" href="/SSP1/FortuneNdlovu_Ecommerce/index.php">FortuneEcommerce</a></span>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button><!-- hamburger btn -->

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <!-- navigation menu -->
            <li class="nav-item">
                <a title="Home" class="nav-link" href="/SSP1/FortuneNdlovu_Ecommerce/index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a title="About" class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item dropdown">
                <a title="Shop by category" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Shop by category
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php $categories = $pdo->prepare('SELECT * FROM categories WHERE category_id=category_id');
                    $categories->execute();
                    $categories = $categories->fetchAll();
                    foreach ($categories as $cat1) {
                        echo '<a title="' . $cat1["category_name"] . '" class="dropdown-item" href="' . $cat1["category_link"] . '?id=' . $cat1["category_id"] . '">' . $cat1["category_name"] . '</a>';
                    } ?>
                </div>
            </li>
            <li class="nav-item">
                <a title="Help" class="nav-link" href="#">Help</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button title="Search" class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>