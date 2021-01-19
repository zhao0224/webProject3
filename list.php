<!DOCTYPE html>
<html lang="en">

<head>
    <title>Fat Cherry's project</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Using bootstrap frameworks -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/list.css">
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
    <!-- this edit the product list -->
    <div class="mainPart">
        <table class="listTable">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Picture 1</th>
                <th>Picture 2</th>
                <th>Picture 3</th>           
                <th>Price</th>
                <th>Description</th>
                <th>Rating</th>
                <th>Option</th>
            </tr>
            <?php
            require("dbconfig.php");
            $link = mysqli_connect(HOST, USER, PASSWORD, DBNAME) or die("data fails");
            $sql = "SELECT * FROM `productlist`";
            $result = mysqli_query($link, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>{$row['id']}</td>";
                echo "<td>{$row['title']}</td>";
                echo "<td><img class='tdPic' src='$row[image1]'/></td>";
                echo "<td><img class='tdPic' src='$row[image2]'/></td>";
                echo "<td><img class='tdPic' src='$row[image3]'/></td>";        
                echo "<td>{$row['price']}</td>";
                echo "<td>{$row['description']}</td>";
                echo "<td>{$row['rating']}</td>";
                echo "<td>
                    <a href='action.php?action=del&id={$row['id']}&picname1={$row['image1']}&picname2={$row['image2']}&picname3={$row['image3']}'>delete</a> 
                   <br>
                    <a href='edit.php?id={$row['id']}'>edit</a>
                </td>";
                echo "</tr>";
            }
            ?>
        </table>
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