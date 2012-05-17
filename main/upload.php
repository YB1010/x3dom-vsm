<?php
include 'function.php';
$htmltype = $_FILES["htmlFile"]["type"];
$htmlname = $_FILES["htmlFile"]["name"];
$imgtype = $_FILES["imgFile"]["type"];
$imgname = $_FILES["imgFile"]["name"];

if ( checkHTMLType($htmltype) ) {
	$htmlname = fileName($htmlname, "html");
	
	if ( checkImgType($imgtype) ) {
		$imgname = fileName($imgname, getImgType($imgtype));
		
		if ( strcmp($htmlname, $imgname) == 0 ) {
			$name = $_REQUEST["name"];
			$price = $_REQUEST["price"];
			$description = $_REQUEST["description"];
			$contact = $_REQUEST["contact"];

			$msg = 
"	new Array(\"" . $htmlname . "\",
		\"" . $name . "\"
		\"" . $price . "\"
		\"" . $description . "\"
		\"" . $contact . "\"
	)
);";

			if ( file_exists("data/models/" . $_FILES["hmtlFile"]["name"]) || file_exists("data/thumbs/" . $_FILES["imgFile"]["name"]) ) {
				echo $_FILES["htmlFile"]["name"] . " or " . $_FILES["imgFile"]["name"] . " already exists. ";
			} else {
				move_uploaded_file($_FILES["htmlFile"]["tmp_name"], "data/models/" . $_FILES["htmlFile"]["name"]);
				move_uploaded_file($_FILES["imgFile"]["tmp_name"], "data/thumbs/" . $_FILES["imgFile"]["name"]);
			}

			writeRemoveLastLine("js/data.js", $msg);
		} else {
			echo "File name of HTML file and image file are must be the same";
		}
	} else {
		echo "File type of image file is not support (support png only)";
	}
} else {
	echo "File type is not HTML file";
}
	header("location: uploader.php");
?>
