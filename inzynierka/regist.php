<?php
session_start();
if (isset($_POST['regist']) && $_POST['password1'] == $_POST['password2'] && !empty($_POST['login']) && !empty($_POST['e-mail']) && !empty($_POST['password1']) ) {
	$myConnection= mysqli_connect("localhost","root","", "learnenglish") or die ("could not connect to mysql"); 
	$guery=mysqli_query($myConnection, "set names 'utf8'");
	$sqlCommand="SELECT * FROM user WHERE nick = '".mysqli_real_escape_string($myConnection, $_POST['login'])."'"; 
                          $query=mysqli_query($myConnection, $sqlCommand);
	if (mysqli_num_rows($query) > 0) {
			$_SESSION['error'] = true;
			header('Location: register.php');
			die();
	}
                   $sqlCommand="INSERT INTO `user` (`nick`, `e-mail`, `pass`) VALUES ('".mysqli_real_escape_string($myConnection, $_POST['login'])."', '".mysqli_real_escape_string($myConnection, $_POST['e-mail'])."', PASSWORD('".mysqli_real_escape_string($myConnection, $_POST['password1'])."'));"; 
				   var_dump($sqlCommand);
                          $query=mysqli_query($myConnection, $sqlCommand);
						  $_SESSION['register_success'] = true;
	header('Location: log.php');
} else {
	$_SESSION['error'] = true;
	header('Location: register.php');	
}
?>