<?php
	session_start();
	if (!isset($_SESSION['serviceno'])) {
		header('Location: facultylogin.php');
	}
	
?>