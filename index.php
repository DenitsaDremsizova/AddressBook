<?php
include_once 'dbconnect.php';


$query = "SELECT id, ContactName, Picture, SUBSTRING(ContactName, 1, 1) AS 'Letter' FROM contacts ORDER BY ContactName;";
$result = mysqli_query($connect, $query);
$arr = array();

$index = 0;
while ($row = mysqli_fetch_array($result)) {
    $arr[$index] = $row;
    $index++;
}

for($index=0; $index < count($arr); $index++){
    if($index!=0 && $arr[$index]['Letter'] === $arr[$index-1]['Letter']){
        $arr[$index]['FirstElementWithLetter'] = false;
    } else {
        $arr[$index]['FirstElementWithLetter'] = true;
    }
}

?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Address Book</title>
        <link href="assets/css/styles.css" rel="stylesheet" type="text/css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        

    </head>
    <body>
        <div id="main" role="main">

            <div class="element custom">

                <div class="element-header">
                    <h2>My contacts</h2>
                </div>

                <div class="element-content">
                    <ul class="list">
                        <?php
                        foreach ($arr as $contact) {
                            if($contact['FirstElementWithLetter']){
                                echo "<li id='index-$contact[3]' class='li-$contact[0]'>"
                                        . "<a href='./profile.php?contact_id=$contact[0]'>"
                                        . "<img src='$contact[2]' class='contactPic'>"
                                        . "<span class='name'>$contact[1]</span>"
                                        . "</a>"
                                        . "<img src='./assets/images/delete-button.png' class='delete-button' id='$contact[0]'>"
                                        . "</li>";
                            } else {
                            echo "<li class='li-$contact[0]'>"
                                . "<a href='./profile.php?contact_id=$contact[0]'>"
                                    . "<img src='$contact[2]' class='contactPic'>"
                                    . "<span class='name'>$contact[1]</span>"
                                    . "</a>"
                                    . "<img src='./assets/images/delete-button.png' class='delete-button' id='$contact[0]'>"
                                    . "</li>";
                                
                            }
                        }
                        ?>
                        <div class="element-sidebar">
                            <a href="#index-#">#</a>
                            <a href="#index-A">A</a>
                            <a href="#index-B">B</a>
                            <a href="#index-C">C</a>
                            <a href="#index-D">D</a>
                            <a href="#index-E">E</a>
                            <a href="#index-F">F</a>
                            <a href="#index-G">G</a>
                            <a href="#index-H">H</a>
                            <a href="#index-I">I</a>
                            <a href="#index-J">J</a>
                            <a href="#index-K">K</a>
                            <a href="#index-L">L</a>
                            <a href="#index-M">M</a>
                            <a href="#index-N">N</a>
                            <a href="#index-O">O</a>
                            <a href="#index-P">P</a>
                            <a href="#index-Q">Q</a>
                            <a href="#index-R">R</a>
                            <a href="#index-S">S</a>
                            <a href="#index-T">T</a>
                            <a href="#index-U">U</a>
                            <a href="#index-V">V</a>
                            <a href="#index-W">W</a>
                            <a href="#index-X">X</a>
                            <a href="#index-Y">Y</a>
                            <a href="#index-Z">Z</a>
                        </div>
                </div>
                <a href="./add-new.php" id="add-new">+ Add new contact</a>

            </div>

        </div>​

        <script src="assets/js/javascript.js" type="text/javascript"></script>
        <script src="assets/js/delete-button.js" type="text/javascript"></script>

    </body>
</html>

