<?php
	session_start();
   	$myConnection= mysqli_connect("localhost","root","", "learnenglish") or die ("could not connect to mysql"); 
	$sqlCommand="SELECT * FROM exe WHERE typ='".mysqli_real_escape_string($myConnection, $_GET['type'])."'";
	$guery=mysqli_query($myConnection, "set names 'utf8'");
	$query=mysqli_query($myConnection, $sqlCommand);            
	
	$pointCount = 0;
	$count = 0;
	while($row = mysqli_fetch_array($query)){
		$count++;
		if (isset($_POST["{$row['IDEx']}"])) {
			if ($_POST["{$row['IDEx']}"] == $row['poprawna'])
				$pointCount++;
		}
	}
	$wynik = "{$pointCount}/{$count} (".(sprintf("%.2f", (($pointCount/$count)*100)))."%)";
	$typ = mysqli_real_escape_string($myConnection, $_GET['type']);
	$sqlCommand="INSERT INTO `wyniki` (`IDUser`, `typ`, `data`, `wynik`) VALUES ('{$_SESSION['id']}', '{$typ}', NOW(), '{$wynik}');";
	$query=mysqli_query($myConnection, $sqlCommand);
	header('Location: log.php');
?>