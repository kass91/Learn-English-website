<?php
session_start();
	if (isset($_GET['id']) && isset($_SESSION['admin']) && $_SESSION['admin'] && $_GET['id'] != 1) {
			$myConnection= mysqli_connect("localhost","root","", "learnenglish") or die ("could not connect to mysql");            $guery=mysqli_query($myConnection, "set names 'utf8'");
			$sqlCommand="DELETE FROM user WHERE IDuser='".mysqli_real_escape_string($myConnection, $_GET['id'])."'"; 
			$query=mysqli_query($myConnection, $sqlCommand);			           
	}
header('Location: users.php');
?>