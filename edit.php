<!DOCTYPE html>
<html lang="en">

<head>
    <title>Fat Cherry's project</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Using bootstrap frameworks -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/add.css">
</head>

<body>
    <!-- header bar -->
    <header class="header">
        <div>
            <a href="index.php">
                <img class="logo" src="images/logo.png">
            </a>
            <h1>Management System</h1>
        </div>
    </header>
    <!-- navagation bar -->
    <div class="sidenav">
        <a href="system.html">
            <i class="fa fa-fw fa-home"></i>
        </a>
        <a href="add.php">
            <i class="fa fa-plus-circle"></i>
        </a>
        <a href="list.php">
            <i class="fa fa-th-list"></i>
        </a>
        <a href="">
            <i class="fa fa-users"></i>
        </a>
        <a href="">
            <i class="fa fa-tags"></i>
        </a>
        <a href="">
            <i class="fa fa-envelope-square"></i>
        </a>
    </div>
    <!-- edit the main part -->
    <div id="main">
        <?php
        require("dbconfig.php");
        $link = mysqli_connect(HOST, USER, PASSWORD, DBNAME) or die("data fails");
        $sql = "SELECT * FROM `productlist` WHERE id = {$_GET['id']}";
        $result = mysqli_query($link, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            $shop = mysqli_fetch_assoc($result);
        } else {
            die("Can't find the editting product");
        }
        ?>
        <form action="action.php?action=update" method="post" enctype="multipart/form-data">
            <div class="formContent">
                <div class="formContent">
                    <input type="hidden" id="id" name="id" value="<?php echo $shop['id']; ?>" />
                    <input type="hidden" id="id" name="old" value="<?php echo $shop['id']; ?>" />
                    <label for="title" class="title">Title</label>
                    <input id="title" name="title" type="text" value="<?php echo $shop['title']; ?>" />
                </div>
                <div class="formContent">
                    <label for="catalog" class="catalog">Catalog</label>
                    <!-- <select id="catalog" name = "catalog" required="required" /> -->
                    <select id="catalog" name="catalog" value="<?php echo $shop['catalog']; ?>">
                        <?php include("dbconfig.php");
                        foreach ($typelist as $k => $v) {
                            $sd = ($shop['catalog'] == $k) ? "selected" : "";
                            echo "<option value='{$k}' {$sd}> {$v}</option>";
                        }
                        ?>
                    </select>
                    <label for="price" class="price">Price</label>
                    <input id="price" name="price" value="<?php echo $shop['price']; ?>" />
                    <label for="rating" class="rating">Rating</label>
                    <input id="rating" name="rating" value="<?php echo $shop['rating']; ?>" />
                </div>
                <div class="formContent">
                    <label for="description" class="description">Description</label>
                    <input id="description" name="description" type="text" value="<?php echo $shop['description']; ?>" />
                    <!-- <textarea id="description" name="description" type="text" value="<?php echo $shop['description']; ?>" ></textarea> -->
                </div>
                <div class="formContent">
                    <label for="upload-file" class="pic">Image1</label>
                    <input type="file" name="image1" />
                </div>
                <div class="formContent">
                    <label for="upload-file" class="pic">Image2</label>
                    <input type="file" name="image2" />
                </div>
                <div class="formContent">
                    <label for="upload-file" class="pic">Image3</label>
                    <input type="file" name="image3" />
                </div>
                <div class="formContentButton">
                    <input type="submit" value="update">&nbsp;&nbsp;&nbsp;
                    <input type="reset" value="reset">
                </div>
        </form>
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