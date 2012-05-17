<?php
include 'function.php';
if ( ( strcmp($_FILES["bgFile"]["type"], "image/jpeg") == 0 )  && ( strcmp(fileName($_FILES["bgFile"]["name"], "jpg"), "bg") == 0 ) ) {
	if ( file_exists("image/" . $_FILES["bgFile"]["name"]) ) {
		unlink("images/bg.jpg");
	}
	move_uploaded_file($_FILES["bgFile"]["tmp_name"], "images/" . $_FILES["bgFile"]["name"]);
}
	header("location: uploader.php");
?>
