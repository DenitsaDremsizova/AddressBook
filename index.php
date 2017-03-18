<?php
include_once 'dbconnect.php';

$query = "SELECT ContactName, Picture FROM contacts";
$result = mysqli_query($connect, $query);
$arr = array();

$index = 0;
while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
    $arr[$index] = $row;
    $arr[$index] = implode("#", $arr[$index]);
    $index++;
}
sort($arr);

for($index = 0; $index < count($arr); $index++){
    $arr[$index] = explode("#", $arr[$index]);
}

?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Address Book</title>
        <link href="assets/css/styles.css" rel="stylesheet" type="text/css"/>
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
    echo "<li><a href='#'><img src='$contact[1]' class='contactPic'><span class='name'>$contact[0]</span></a></li>";
}
?>
                    <!--                        <li id="index-A" data-group="work">
                                                <a href="#">Amy Laudrie<span>amylaudrie@gmail.com</span></a>
                                                </li>
                                                <li data-group="family">
                                                    <a href="#">April Meiny<span>aprilmeiny@mail.com</span></a>
                                                </li>
                                                <li id="index-B" data-group="work">
                                                    <a href="#">Benny Iridos<span>benyiridos@mail.com</span></a>
                                                </li>
                                                <li data-group="work">
                                                    <a href="#">Bill Doe<span>benyiridos@mail.com</span></a>
                                                </li>
                                                
                        -->                                                
                        <li>
                            <a href="./add-new.php" id="add-new">+ Add new contact</a>
                        </li>
                    </ul>

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

            </div>

        </div>​
        <script src="assets/js/javascript.js" type="text/javascript"></script>
    </body>
</html>

