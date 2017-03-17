<?php
include_once 'dbconnect.php';

$name = "";
$phone = "";
$email = "";
$address = "";
$picName = "";

if (isset($_POST['save'])) {
    $name = htmlentities(trim($_POST['name']));
    $phone = htmlentities(trim($_POST['phone']));
    $email = htmlentities(trim($_POST['email']));
    $address = htmlentities(trim($_POST['address']));

    $query = "SELECT email FROM contacts WHERE email='$email'";
    $result = mysqli_query($connect, $query);
    $count = mysqli_num_rows($result);

    $error = false;
    if ($count != 0) {
        $error = true;
    }

    //upload picture:
    if (isset($_FILES['contactPic'])) {
        $uploadedPicName = $_FILES['contactPic']['tmp_name'];
        $picName = $_FILES['contactPic']['name'];

        if (is_uploaded_file($uploadedPicName)) {
            if (move_uploaded_file($uploadedPicName, 'pics/' . $picName)) {
                echo 'Picture Successfully uploaded';
            } else {
                $picName = 'default.jpg';
            }
        } else {
            $picName = 'default.jpg';
        }
    } else {
        $picName = 'default.jpg';
    }
    
    if (!empty($name) && !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) && !$error) {
        $query = "INSERT INTO contacts VALUES(null,'$name','$phone','$email','$address','./pics/$picName')";
        mysqli_query($connect, $query);
        
    }
}
?>

<html>
    <head>
        <title>Add New Contact</title>
    </head>
    <body>
        <form enctype="multipart/form-data" action="<?= $_SERVER['PHP_SELF']?>" method="post">
            <fieldset>
                <legend>Add New Contact</legend>
                <label for="name">Name: </label>
                <input type="text" id="name" name="name" value="<?= $name ?>">
                </br></br>
                <label for="email">E-mail: </label>
                <input type="email" id="email" name="email" value="<?= $email ?>">
                </br></br>
                <label for="phone">Phone: </label>
                <input type="text" id="phone" name="phone" value="<?= $phone ?>">
                </br></br>
                <label for="address">Address: </label>
                <input type="text" id="address" name="address" value="<?= $address ?>">
                </br></br>
                <input type="hidden" name="MAX_FILE_SIZE" value="8000000">
                <label for="contactPic"> Picture: </label>
                <input type="file" accept="img/*" name="contactPic" id="contactPic">
                </br></br>
                <input type="submit" name="save" value="Save">
            </fieldset>
        </form>
    </body>
</html>


