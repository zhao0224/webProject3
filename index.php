<!DOCTYPE html>
<html lang="en">

<head>
    <title>Fat Cherry's project</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Using bootstrap frameworks -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
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
    <!-- 1st part of the index page -->
    <div class="wrapper">
        <img src="images/index1.jpg">
        <div class="text-block">
            <h2>Toys Make You Smile</h2>
            <p>No matter how old you are, toys are the sort of your happiness and love</p>
        </div>
    </div>
    <br>
    <br>
    <!-- collection list -->
    <div class="container">
        <h1 class="big-1">COLLECTION LIST</h1>
        <br>
        <h2 class="small">COLLECTION LIST</h2>
        <br>
        <br>
        <div class="row">
            <div class="col-sm-6">
                <div class="panel-body">
                    <a href="animal%20toys.php">
                        <img id="collectionPic" src="images/collection1-2.jpg" alt="collection1">
                    </a>
                </div>
                <div class="text-box">
                    <a href="animal%20toys.php">
                        <h2>Animal Toys</h2>
                    </a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="panel-body">
                    <a href="picture%20books.php">
                        <img id="collectionPic" src="images/collection2-2.jpg" alt="collection2">
                    </a>
                </div>
                <div class="text-box">
                    <a href="picture%20books.php">
                        <h2>Picture Books</h2>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <!-- 3rd part of index page -->
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <br>
                <br>
                <h1 class="mb-4">Eco Love For Everyone </h1>
                <br>
                <br>
                <p>Premium quality organic and eco-friendly clothes, toys, essentials and so on.</p>
                <br>
                <p>We love to make buying for yourself and giving beautiful gifts easy.</p>
                <br>
                <p>Quick friendly service and beautiful quality are our specialty.</p>
                <br>
                <div class="shopbutton">
                    <a href="shop.php">
                        <button class="shop-button">Shop All Products</button>
                    </a>
                </div>
            </div>
            <div class="col-sm-6">
                <img id="icoPic" src="images/index2.jpg">
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <!-- Featured Products -->
    <div class="container">
        <h1 class="big-2">Featured Products</h1>
        <br>
        <h2 class="small">Featured Products</h2>
        <br>
        <br>
        <div id="product-list">
            <?php
            require("dbconfig.php");
            $link = mysqli_connect(HOST, USER, PASSWORD, DBNAME) or die("data fails");
            $sql = "SELECT id, title, price, rating, image1 FROM productlist";
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
    <div class="container">
        <div class="subscribe">
            <h1 class="big-3">Subscribe</h1>
            <br>
            <h2 class="small">Subcribe to Our Newsletter</h2>
            <br>
            <div class="email-submit">
                <form action="#" class="subscribe-form">
                    <div class="form-group">
                        <input type="text" class="form-control-e" placeholder="Enter Email Address">
                        <br>
                        <button class="submit-px-3">Subscribe</button>
                        <br>
                    </div>
                </form>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>