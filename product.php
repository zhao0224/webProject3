<!DOCTYPE html>
<html lang="en">

<head>
    <title>Fat Cherry's project</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Using bootstrap frameworks -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/product.css">
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
    <?php
    require("dbconfig.php");
    $link = mysqli_connect(HOST, USER, PASSWORD, DBNAME) or die("data fails");
    $sql = "SELECT * FROM  productlist WHERE id = $_GET[id] ";
    $result = mysqli_query($link, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $title = $row["title"];
        $price = $row["price"];
        $description = $row["description"];
        $image1 = $row["image1"];
        $image2 = $row["image2"];
        $image3 = $row["image3"];
        $rating = '';
        for ($i = 0; $i < $row["rating"]; $i++) {
            $rating .= '<span class="fa fa-star checked"></span>';
        }
    }
    ?>
    <!-- <div class="product"> -->
    <div class="container" id="mainPart">
        <!-- picture display -->
        <div class="col-sm-6">
            <div id="myCarousel" class="carousel slide">
                <div id="wrapper">
                    <div class="content">
                        <ul class="imgs">
                            <li class="img"><img id="image" src="<?php echo $image1 ?>" /></li>
                            <li class="img"><img id="image2" src="<?php echo $image2 ?>" /></li>
                            <li class="img"><img id="image3" src="<?php echo $image3 ?>" /></li>
                        </ul>
                    </div>
                    <ul class='dots'>
                        <li><img class="dot_img" id="image4" src="<?php echo $image1 ?>" /></li>
                        <li><img class="dot_img" id="image5" src="<?php echo $image2 ?>" /></li>
                        <li><img class="dot_img" id="image6" src="<?php echo $image3 ?>" /></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- description part -->
        <div class="col-sm-6">
            <div class="description">
                <h1 id="title"><?php echo $title ?></h1>
                <h2>$<span id="price"><?php echo $price ?></span> / Piece</h2>
                <div><?php echo $rating ?></div>
                <br>
                <p id="description"><?php echo $description ?></p>
                <p class="calPrice">Total Price: </p>
                <input type="text" id="tPrice" value="0">
                <h3 id="quantity">Select Quantity</h3>
                <div class="quantity-button">
                    <input type="button" id="sub" value="-" onclick="subs">
                    <input type="text" class="inputNum" id="textNum" value="0">
                    <input type="button" id="plus" value="+" onclick="plus">
                    <input type=button id="button" value='Add to Cart' />
                </div>　　
            </div>
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
    <script src="js/product.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>