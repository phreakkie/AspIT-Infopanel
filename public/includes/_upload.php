<?php
$target_dir = "uploads/";
$extention = explode(".", basename($_FILES["src"]["name"]));
$extention = end($extention);
$file_name = uniqid() . "." . $extention;
$target_file = $target_dir . $file_name;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check to see if image file is an actual image or fake image
if (isset($_POST['submit'])){
    $check = getimagesize($_FILES["src"]["tmp_name"]);
        if($check !== false){
        $uploadOk = 1;
    }else{
        echo "File is not an image";
        $uploadOk = 1;
    }
}


//Check file size
if($_FILES["src"]["size"] > 2000000){
    echo "Sorry, your file is too large";
    $uploadOk = 0;
}

//Limit file type
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"){
    echo "Sorry, only JPG, PNG and JPEG files are allowed.";
    $uploadOk = 0;
}


//Check if $uploadOk has set to 0 by an error
if($uploadOk == 0 || $uploadOk == 2){
    echo "Sorry, your file was not uploaded";
//else try to upload file
}else{
    if(!move_uploaded_file($_FILES["src"]["tmp_name"], $target_file)){
    
        echo "Sorry, there was en error uploading your file";
    }
}