<?php
	$to = "silkzter@gmail.com";
	$subject = "Order OTOP 3D";
	$message = "Order :\n" . $_POST["order"] . "\nName :\n" . $_POST["name"] . "\nTelephone :\n" . $_POST["tel"] . "\nE-mail\n" . $_POST["email"];
	$from = "silkzter@gmail.com";
	$headers = "From:" . $from;
	mail($to,$subject,$message,$headers);
	header("Location: ../");
?>
