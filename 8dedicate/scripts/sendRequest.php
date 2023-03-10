<?php	
	$fields = array("Name", "Company", "Position","Email","Phone");
	$fields_count = count($fields);
	$post_keys = array_keys($_POST);

	$to = 'odc@gmail.com';
	$subject = "8Dedicate Landing Request";
	$message = "Request from 8Dedicate.com\r\n\r\n";
	$headers = "From: {$_POST['name']} <website@8dedicate.com>\r\n";
	$headers .= "Content-type: text/plain; charset=utf-8\r\n";

	for($i=0;$i < $fields_count;$i++){
		$message .= "{$fields[$i]}: {$_POST[$post_keys[$i]]} \n";
	}

	if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		if(mail($to,$subject,$message,$headers))
			echo "Request was sent!\r\n";
		else echo "Request wasn't sent!";
	} else {
		echo "Invalid email. Please provide an correct an email.";
	}
?>