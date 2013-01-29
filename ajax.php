<?php
	session_start();
	include './connect.php';

	function getFilePath($file, $filetype = null)
	{
		$type = $filetype; $dir = 'processes';
		if ($filetype == 'page') {
			$dir = 'pages';
		}
		return './'.$dir.'/'.$file.'.'.$filetype.'.php';
	}
	include getFilePath($_GET['p'], $_GET['t']);
?>