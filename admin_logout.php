<?php
	require "admin_init.php"
?>
<?php
	$msg = "";
	$_SESSION = array();
	session_destroy();
	header('Location: /admin.php');
?>