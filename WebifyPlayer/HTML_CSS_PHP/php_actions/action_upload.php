<?php
<<<<<<< HEAD
$id = $_GET['id'];
=======
session_start();
$id = $_SESSION['id'];
$target_dir = "../../profile_pictures/";
>>>>>>> REFORMAT
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if($imageFileType == "jpg")
    $target_file = "../../profile_pictures/profilephoto_user".$id.".jpg";

else if($imageFileType == "png")
    $target_file = "../../profile_pictures/profilephoto_user".$id.".png";

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo ("<script>alert('File is not an image');setTimeout(\"location.href = '../userprofile/user';\",20);</script>");

        $uploadOk = 0;
    }
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo ("<script>alert('Image too large');setTimeout(\"location.href = '../userprofile/user.php';\",20);</script>");
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "jpeg") {
    echo ("<script>alert('Only JPG photos are allowed');setTimeout(\"location.href = '../userprofile/user.php';\",100);</script>");
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo ("<script>alert('Error Uploading');setTimeout(\"location.href = 'user.php';\",20);</script>");
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
<<<<<<< HEAD
        header('Location: ../userprofile/user.php?&id='.$id);
=======
        header('Location: ../userprofile/user.php');
>>>>>>> REFORMAT
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
