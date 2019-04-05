<?php
 
 if(isset($_POST['email'])) {
  
	  
  
	 // EDIT THE 2 LINES BELOW AS REQUIRED
  
	 $email_to = " info@jeffaviles.com";
  
	 $email_subject = "Content";
  
	  
  
	  
  
	 function died($error) {
  
		 // your error code can go here
  
		 echo "<h1>Helaas</h1><h2>er blijkt iets mis te zijn met uw ingevulde formulier.</h2>";
  
		 echo "<strong><p>De volgende punten waren niet correct opgegeven.</p></strong><br />";
  
		 echo $error."<br /><br />";
  
		 echo "<p>Keer terug naar het formulier en probeer het opnieuw.</p><br />";
		 echo "<p><a href='../../index.php'>keer terug naar de homepagina</a></p>";
		 die();
		 
  
	 }
   
  
	 $first_name = $_POST['first_name']; // required
  
	 $last_name = $_POST['last_name']; // required
  
	 $email_from = $_POST['email']; // required
  
	 $telephone = $_POST['telephone']; // not required
  
	 $comments = $_POST['comments']; // required
  
	  
  
	 $error_message = "";
  
	 $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  
   if(!preg_match($email_exp,$email_from)) {
  
	 $error_message .= '<li><p>Het ingevulde e-mail adres blijkt niet te kloppen<p></li>';
  
   }
  
	 $string_exp = "/^[A-Za-z .'-]+$/";
  
   if(!preg_match($string_exp,$first_name)) {
  
	 $error_message .= '<li><p>De ingevulde voornaam blijkt niet te kloppen</p></li>';
  
   }
  
   if(!preg_match($string_exp,$last_name)) {
  
	 $error_message .= '<li><p>De ingevulde achternaam blijkt niet te kloppen</p></li>';
  
   }
  
   if(strlen($comments) < 2) {
  
	 $error_message .= '<li><p>Het ingevulde bericht blijkt niet te kloppen</p></li>';
  
   }
  
   if(strlen($error_message) > 0) {
  
	 died($error_message);
  
   }
  
	 $email_message = "Send Details for services.\n\n";
  
	  
  
	 function clean_string($string) {
  
	   $bad = array("content-type","bcc:","to:","cc:","href");
  
	   return str_replace($bad,"",$string);
  
	 }
  
	  
  
	 $email_message .= "FistName: ".clean_string($first_name)."\n";
  
	 $email_message .= "LastName: ".clean_string($last_name)."\n";
  
	 $email_message .= "Email Adress: ".clean_string($email_from)."\n";
  
	 $email_message .= "Phone Number: ".clean_string($telephone)."\n";
  
	 $email_message .= "Message: ".clean_string($comments)."\n";
  
	  
  
	  
  
 // create email headers
  
 $headers = 'From: '.$email_from."\r\n".
  
 'Reply-To: '.$email_from."\r\n" .
  
 'X-Mailer: PHP/' . phpversion();
  
 @mail($email_to, $email_subject, $email_message, $headers);  
  
 ?>
  
  
  
 <!-- include your own success html here -->
  
  
  
 
 <p style='color:black'><a href="index.html">go back to the homepage</a></p>
  
  
  
 <?php
  
 }
  
 ?>