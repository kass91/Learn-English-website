<?php
session_start();
if (isset($_POST['submit'])) {
	$myConnection= mysqli_connect("localhost","root","","learnenglish") or die ("could not connect to mysql"); 
                   $sqlCommand="SELECT * FROM `user` WHERE `nick`='".mysqli_real_escape_string($myConnection, $_POST['login'])."' AND `pass`=PASSWORD('".mysqli_real_escape_string($myConnection, $_POST['password'])."')";
                          $guery=mysqli_query($myConnection, "set names 'utf8'");
                          $query=mysqli_query($myConnection, $sqlCommand);      
						  $set = false;      
						  while($row = mysqli_fetch_array($query)){
							  $_SESSION['id'] = $row['IDUser'];
							  $_SESSION['login'] = $row['nick'];
							    if ($row['admin'] == 1)
								$_SESSION['admin'] = true;
								else
								$_SESSION['admin'] = false;
							  $set = true;}
						if (!$set) $_SESSION['error'] = true;
}
header('Location: log.php');?>