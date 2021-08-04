<?php
	require "init.php"
?>
<?php
	$msg = "default";
	$_SESSION = array();
	session_destroy();
	header('Location: /index.php');
	?>