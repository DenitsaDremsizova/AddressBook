<?php
include_once 'dbconnect.php';

$name = "";
$phone = "";
$email = "";
$address = "";
$picName = "";

$invalidInputMsg = "";

if (isset($_POST['save'])) {
    if(isset($_POST['name']) && isset($_POST['email'])){
    $name = str_replace("'", "''", htmlentities(trim($_POST['name'])));
    $phone = htmlentities(trim($_POST['phone']));
    $email = htmlentities(trim($_POST['email']));
    $address = str_replace("'", "''", htmlentities(trim($_POST['address'])));

    if($phone === "") {
        $phone = NULL;
    }
    $query = "SELECT email FROM contacts WHERE email='$email'";
    $checkEmail = mysqli_query($connect, $query);
    $countcheckEmail = mysqli_num_rows($checkEmail);
    
    $query = "SELECT ContactName FROM contacts WHERE ContactName='$name'";
    $checkName = mysqli_query($connect, $query);
    $countcheckName = mysqli_num_rows($checkName);

    $error = false;
    if ($countcheckEmail != 0) {
        $error = true;
        $invalidInputMsg = "E-mail already added to Contact List";
    }
    
    if ($countcheckName != 0) {
        $error = true;
        $invalidInputMsg = "Name already added to Contact List";
    }
    
    $query = "SELECT MAX(Id) FROM contacts";
    $id = mysqli_query($connect, $query);
    $id = mysqli_fetch_array($id, MYSQLI_NUM);
    $id = implode("", $id)+1;

    //upload picture:
    if (isset($_FILES['contactPic'])) {
        $uploadedPicName = $_FILES['contactPic']['tmp_name'];
        $picOriginalName = $_FILES['contactPic']['name'];
        $picOriginalName = explode(".", $picOriginalName);
        $extension = end($picOriginalName);
        $picName = "$id.$extension";

        if (is_uploaded_file($uploadedPicName)) {
            if (move_uploaded_file($uploadedPicName, 'pics/' . $picName)) {
                
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
        $query = "INSERT INTO contacts VALUES($id,'$name', '$phone','$email','$address','./pics/$picName')";
        if(mysqli_query($connect, $query)){
        header('Location:./index.php');
        } else {
            $invalidInputMsg = "Failed to add contact. Please try again!";
        }
    }
    
    
} else{
    $invalidInputMsg = 'Name and E-mail are required fields';
}
}
?>

<html>
    <head>
        <title>Add New Contact</title>
        <link href="assets/css/styles.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="wrapper">
            <form enctype="multipart/form-data" action="<?= $_SERVER['PHP_SELF'] ?>" method="post" id="new-contact-form">
                <div class="element-header">
                    <h2>Add New Contact</h2>
                </div>
                <fieldset class="new-contact-field">
                    <label for="name">Name: </label></br>
                    <input type="text" id="name" name="name" value="<?= $name ?>" class="new-contact-input" required>
                    </br>
                </fieldset>
                <fieldset class="new-contact-field">
                    <label for="email">E-mail: </label></br>
                    <input type="email" id="email" name="email" value="<?= $email ?>" class="new-contact-input" required>
                    </br>
                </fieldset>
                <fieldset class="new-contact-field">
                    <label for="phone">Phone: </label></br>
                    <input type="text" id="phone" name="phone" value="<?= $phone ?>" class="new-contact-input">
                    </br>
                </fieldset>
                <fieldset class="new-contact-field">
                    <label for="address">Address: </label> </br>
                    <input type="text" id="address" name="address" value="<?= $address ?>" class="new-contact-input">
                    </br>
                </fieldset>
                <fieldset class="new-contact-field">
                    <input type="hidden" name="MAX_FILE_SIZE" value="8000000">
                    <label for="contactPic"> Picture: </label></br>
                    <input type="file" accept="img/*" name="contactPic" id="contactPic" class="inputfile">
                    </br>
                </fieldset>
                
                <input type="submit" name="save" value="Save" id="new-contact-save-button">
            </form>
            <a href="./index.php" id="back-to-home"> Back to My Contacts </a>
            <div id="error-msg">
                <p><?php echo $invalidInputMsg;?></p>
            </div>
        </div>
    </body>
</html>


