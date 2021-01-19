<!DOCTYPE html>
<html lang="en">

<head>
    <title>Fat Cherry's project</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Using bootstrap frameworks -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/search.css">
</head>

<body>
    <!-- navagation bar -->
    <header class="hearder">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <!-- logo inserted here -->
                    <a href="index.php" class="navbar-left"><img class="logo" src="images/logo.png"></a>
                </div>
                <!-- menu -->
                <div class="collapse navbar-collapse" id="micon">
                    <ul class="nav navbar-nav navbar-right mynav">
                        <!-- home -->
                        <li>
                            <a href="index.php" id="home">Home</a>
                        </li>
                        <!-- shop-dropdown -->
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="">Shop
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="shop.php">Shop All Products</a>
                                </li>
                                <li>
                                    <a href="animal%20toys.php">Animal Toys</a>
                                </li>
                                <li>
                                    <a href="picture%20books.php">Picture Books</a>
                                </li>
                            </ul>
                        </li>
                        <!-- contact us -->
                        <li>
                            <a href="contact%20us.html">Contact Us</a>
                        </li>
                        <!-- search bar -->
                        <li>
                            <form class="navbar-form navbar-right" id="search_box" action="search.php" method="GET">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search" name="searchword">
                                    <div class="input-group-btn">
                                        <button class="btn btn-default" type="submit">
                                            <i class="glyphicon glyphicon-search">
                                                <a href="search.php"></a>
                                            </i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </li>
                        <!-- user button -->
                        <li>
                            <a href="signin.html">
                                <span class="glyphicon glyphicon-user"></span>
                            </a>
                        </li>
                        <!-- shopping cart button -->
                        <li>
                            <a href="">
                                <span class="glyphicon glyphicon-shopping-cart"></span> Cart
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- search results -->
    <div class="searchresults">
        <div class="container">
            <!-- title -->
            <div class="title">
                <br>
                <h1>Animal Toys</h1>
                <br>
            </div>
            <!-- sort and filter button -->
            <div class="container">
                <div class="priceF">
                    <span> Price</span>
                    <input type="number" id="f-p-low" min="0" max="9999"> -
                    <input type="number" id="f-p-high" min="0" max="9999">
                    <button onclick="filter('price')">Filter</button>
                </div>
                <div class="ratingF">
                    <span> Rating </span>
                    <input type="number" id="f-r-low" min="0" max="5"> -
                    <input type="number" id="f-r-high" min="0" max="5">
                    <button onclick="filter('rating')">Filter</button>
                </div>
                <div class="dropdown" id="drop3">
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">SORT BY
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <a onclick="sort('price', 'h2l')">Price highest to lowest</a>
                        </li>
                        <li>
                            <a onclick="sort('price', 'l2h')">Price lowest to highest</a>
                        </li>
                        <li>
                            <a onclick="sort('rating', 'h2l')">Ratings highest to lowest</a>
                        </li>
                        <li>
                            <a onclick="sort('rating', 'l2h')">Ratings lowest to highest</a>
                        </li>
                    </ul>
                </div>
            </div>
            <br>
            <!-- results products -->
            <div id="product-list">
                <?php
                require("dbconfig.php");
                $link = mysqli_connect(HOST, USER, PASSWORD, DBNAME) or die("data fails");
                $sql = "SELECT id, title, price, rating, image1 FROM productlist WHERE catalog = 'Animal Toys'";
                $result = mysqli_query($link, $sql);
                $queryResult = mysqli_num_rows($result);
                while ($row = mysqli_fetch_assoc($result)) {
                    $rating = '';
                    for ($i = 0; $i < $row["rating"]; $i++) {
                        $rating .= '<span class="fa fa-star checked"></span>';
                    }
                    echo "<div class='product'>
                    <h3><a class='productName' href='product.php?id=$row[id]'> $row[title]</a></h3>
                    <a href='product.php?id=$row[id]'><img class='productPic' src='$row[image1]'/></a>
                    <p class='productPrice'>$$row[price]</p>
                    <p>$rating</p>
                    </div>";
                }
                ?>
            </div>
        </div>
    </div>
    <!-- footer of index page -->
    <footer>
        <div class="gcs-footer">
            <div class="footer-top">
                <a href="#">Twitter</a> |
                <a href="#">Facebook</a> |
                <a href="#">YouTube</a> |
                <a href="#">Instagram</a>
            </div>
            <p>Copyright &copy; 2020 Fat Cherry Group. All rights reserved Fat Cherry Group</p>
        </div>
    </footer>
    <!-- using bootstrap -->
    <script src="js/search.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>