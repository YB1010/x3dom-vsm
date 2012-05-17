<?php

function writeRemoveLastLine($JSfile, $msg)
{
	$fileArray = file($JSfile);
	array_pop($fileArray);

	$handle = fopen($JSfile, "w");
	
	foreach($fileArray as $i){
		fprintf($handle, "%s", $i);
	}
	fprintf($handle, "%s", $msg);
						
	fclose($handle);
}

function fileName($fullname, $type){
	return substr($fullname, 0, (strlen($fullname) - ( strlen($type) + 1 ) ) ); 
}

function checkHTMLType($htmltype)
{
	if (strcmp($htmltype, "text/html") != 0 )
		return false;
	return true;
}

function checkImgType($imgtype)
{
	$imagetype = array("image/png");
	foreach ($imagetype as $subtype ) {
		if(strcmp($imgtype, $subtype) == 0 )
			return true;
	}
	return false;
}

function getImgType($imgtype)
{
	$imagetype = array("image/png");
	$type = array("png");
	$i = 0;
	foreach ($imagetype as $subtype ) {
		if(strcmp($imgtype, $subtype) == 0 )
			return $type[$i];
		$i++;
	}
}
?>
