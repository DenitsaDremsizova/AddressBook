<?php

error_reporting( ~E_DEPRECATED & ~E_NOTICE );
 
 $connect = mysqli_connect('localhost','root','', 'address_book');
  
 if ( !$connect ) {
 	die("Connection failed : " . mysqli_error());
 } 

?>

