<?php
function uploadFile1(){
      move_uploaded_file($_FILES['image1']["tmp_name"], './images/' . $_FILES['image1']['name']);
}

function uploadFile2(){
         move_uploaded_file($_FILES['image2']["tmp_name"], './images/' . $_FILES['image2']['name']);
 }

 function uploadFile3(){
         move_uploaded_file($_FILES['image3']["tmp_name"], './images/' . $_FILES['image3']['name']);
 }
?>