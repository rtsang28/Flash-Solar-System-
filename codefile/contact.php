<?php
$headers  = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
if(empty($_POST['senderEmail'])){
	echo"no email address found";
	exit;
}
$senderName		= $_POST['senderName'];
$senderEmail	= $_POST['senderEmail'];
$senderMsg		= nl2br($_POST['senderMsg']);
$senderSex		= $_POST['senderSex'];
$senderRpl		= $_POST['senderRpl'];
$sitename		= "your site name here";
$to 			= "admin@yourdomain.co.uk";
$ToName 		= "Your name";
$date 			= date("m/d/Y H:i:s");
$ToSubject 		= "Email From $senderName via $sitename";
$comments 		= $msgPost;
$EmailBody 		= "A visitor to $sitename has left the following information<br />
              	Sent By: $senderName
			 	<br /><br />
				Message Sent:
			  	<br />$senderMsg<br /><br />
				Sex: $senderSex<br /><br />
				Require reply: $senderRpl
			  	<br />";  
$EmailFooter	= "<br />Sent: $date<br /><br />";
$Message 		= $EmailBody.$EmailFooter;
$ok = mail($to, $ToSubject, $Message, $headers . "From:$senderName <".$senderEmail.">");
if($ok){
	echo "retval=1";
}else{
	echo "retval=0";
}

?>