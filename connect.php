<?php
	$hostdb = 'localhost';
	$userdb = 'root';
	$passdb = 'root';
	$namedb = 'vx';

	mysql_connect($hostdb, $userdb, $passdb) or die (mysql_errno()."# ".mysql_error());
	mysql_select_db($namedb) or die (mysql_errno()."# ".mysql_error());
	mysql_query('SET NAMES UTF8');
?>