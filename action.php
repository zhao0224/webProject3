<?php
require("dbconfig.php");
require("function.php");
$link = mysqli_connect(HOST, USER, PASSWORD, DBNAME) or die("data fails");
switch ($_GET['action']) {
    case "add":
        $title = $_POST["title"];
        $catalog = $_POST["catalog"];
        $price = $_POST["price"];
        $description = $_POST["description"];
        $rating = $_POST["rating"];
        $image1 = './images/' . $_FILES['image1']['name'];
        $image2 = './images/' . $_FILES['image2']['name'];
        $image3 = './images/' . $_FILES['image3']['name'];
        if (empty($title)) {
            die("Product must have value");
        }
        uploadFile1();
        uploadFile2();
        uploadFile3();
        $sql =  "INSERT INTO productlist(title, catalog, price, description, rating, image1, image2, image3) VALUES(\"$title\", \"$catalog\", $price, \"$description\",  $rating , \"$image1\",  \"$image2\", \"$image3\")";
        mysqli_query($link, $sql);
        header("Location:list.php");
        break;
    case "del":
        $sql = "DELETE FROM `productlist` WHERE `productlist`.`id` = {$_GET['id']}";
        mysqli_query($link, $sql);
        if (mysqli_affected_rows($link) > 0) {
            @unlink($_GET['picname1']);
            @unlink($_GET['picname2']);
            @unlink($_GET['picname3']);
        }
        echo "Files deleted successful";
        header("Location:list.php");
        break;
    case "update":
        $id = $_POST["id"];
        $title = $_POST["title"];
        $catalog = $_POST["catalog"];
        $price = $_POST["price"];
        $description = $_POST["description"];
        $rating = $_POST["rating"];
        $sql = "UPDATE `productlist` SET `title`='{$title}',`catalog`='{$catalog}',`price`= {$price},`description`='{$description}',`rating`={$rating} WHERE  id = {$id}";
        mysqli_query($link, $sql);
        header("Location:list.php");
        break;
}