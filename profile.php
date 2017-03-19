<?php 

	include_once 'dbconnect.php';

	if(isset($_GET['contact_id'])){
		$id = $_GET['contact_id'];		
	}
	
	
	$query = "SELECT * FROM contacts WHERE id=".$id;
	$result = mysqli_query($connect, $query);
	$row = mysqli_fetch_array($result);
	
	
	if(isset($_POST['submit'])){
		$to = 'kznikov@gmail.com';
		$subject = $_POST['subject'];
		$message = $_POST['message'];
		$headers = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: admin@localhost.com' . "\r\n";
				
		if(mail($to, $subject, $message, $headers)){
			echo "<h2 id='success_msg'>Your message has been sent successfully!</h2>";
		}
	}

?>


<!DOCTYPE html>
<html>
   <head>
      <meta charset=UTF-8">
      <title><?=$row['ContactName'] ?></title>
      <link href="assets/css/styles.css" rel="stylesheet" type="text/css" />
     
   </head>
   <body id="profile">  
      <div id="wrapper">
         <div id="content">
            <header>
             
               <section id="contact-details">
                  
                  <div class="header_1"><img src="<?php if(file_exists($row['Picture'])) echo $row['Picture']; else echo "./pics/profile.jpg";?>" width="250" height="250" alt="<?=$row['ContactName'] ?>" /></div>
                  
                  <div class="header_2">
                   <a href="./"><button id="all_contacts">All Contacts</button></a>
                     <h1><span><?=$row['ContactName'] ?></span></h1>
                     <ul class="info_1">
                        <li class="address"><?=$row['Address'] ?></li>
                     </ul>
                     <ul class="info_2">
                        <li class="phone"><?=$row['Phone'] ?></li>
                        <li class="email"><?=$row['Email'] ?></a></li>
                     </ul>
            
                  </div>
  
               </section>
             
            </header>
         
            <div class="clear">&nbsp;</div>
          
          
         
           	<div class="form-style-6">
				<h1>Contact <?=$row['ContactName'] ?></h1>
				<form action="" method="post"> 
				<input type="text" name="subject" placeholder="Subject" />
				<textarea name="message" placeholder="Type your Message"></textarea>
				<input name="submit" type="submit" value="Send Email" />
				</form>
				</div>
            <div class="clear">&nbsp;</div>
        
         </div>
        
      </div>
     
   </body>
</html>