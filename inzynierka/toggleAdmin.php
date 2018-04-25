<?php
session_start();
	if (isset($_GET['id']) && isset($_SESSION['admin']) && $_SESSION['admin'] && $_SESSION['id'] == 1 && $_GET['id'] != 1) {
			$myConnection= mysqli_connect("localhost","root","", "learnenglish") or die ("could not connect to mysql"); 
			$guery=mysqli_query($myConnection, "set names 'utf8'");
			$sqlCommand="SELECT * FROM user WHERE IDuser='".mysqli_real_escape_string($myConnection, $_GET['id'])."'"; 
			$query=mysqli_query($myConnection, $sqlCommand);	  
			$row = mysqli_fetch_array($query);	
			if (!$row) $_SESSION['error'] = true;
			else {
				$set = ($row['admin'] == 1) ? '0' : '1';
				$sqlCommand="UPDATE user SET admin=$set WHERE IDuser='".mysqli_real_escape_string($myConnection, $_GET['id'])."'"; 
				$query=mysqli_query($myConnection, $sqlCommand);			           
			}
	}
header('Location: users.php');
?>