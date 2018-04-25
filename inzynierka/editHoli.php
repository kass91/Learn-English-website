<?php
session_start();
$myConnection= mysqli_connect("localhost","root","", "learnenglish") or die ("could not connect to mysql"); 
$guery=mysqli_query($myConnection, "set names 'utf8'");
if(isset($_POST['delete'])){
			$sqlCommand="DELETE FROM `holidays` WHERE IDHol='".mysqli_real_escape_string($myConnection, $_POST['IDHol'])."'"; 
			$query=mysqli_query($myConnection, $sqlCommand);			           
	};
if(isset($_POST['edycja'])){
			$sqlCommand="UPDATE `holidays` SET `EN`='".$_POST['weren']."', `PL`='".$_POST['werpl']."' WHERE `IDHol`='".mysqli_real_escape_string($myConnection, $_POST['IDHol'])."'"; 
			$query=mysqli_query($myConnection, $sqlCommand);	
			echo $sqlCommand;		           
	};
if(isset($_POST['dodaj'])){
			$sqlCommand="INSERT INTO `holidays` (`EN`,`PL`) values('".$_POST['english']."', '".$_POST['polish']."')"; 
			$query=mysqli_query($myConnection, $sqlCommand);			           
	};
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pl">
<head>
<meta http-equiv="content-type" content="text/html" charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>System internetowy do nauki języka angielskiego</title>
<script src='java-script.js'></script>
<link href="css/bootstrap.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link rel='stylesheet' href='css-style.css' />

<script>
function openNav() {
    document.getElementById("menu-bok").style.width = "250px";
}

function closeNav() {
    document.getElementById("menu-bok").style.width = "0";
}
</script>
</head>

<body>

<!--poczatek menu-->
<div id="menu-row" class="menu-row col-xs-12" style="top: 0px;">
            <div class="container">
                <div class="menu navbar navbar-default row">

                    <nav class="navbar navbar-inverse">
                      <div class="container-fluid">
                        <div class="navbar-header">
                          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span> 
                          </button>                         
                        </div>
                        <div class="collapse navbar-collapse" id="myNavbar">
                            <span style="font-size:30px;cursor:pointer; color:#fff;" onclick="openNav()">&#9776;</span>
                          <ul class="nav navbar-nav">                           
                           <li id="menu-item-2" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-22">
                                   <a href="main.php" title="główna">Główna</a>
                                </li>
                                <li id="menu-item-3" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-47">
                                    <a href="about.php" title="o nas">O nas</a>
                                </li>
                                <li id="menu-item-4" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-48">
                                    <a href="kontakt.php" title="kontakt">Kontakt</a>
                                </li>
                                <li id="menu-item-5" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-49">
                                    <?php if (isset($_SESSION['admin']) && $_SESSION['admin']) { ?>
                                    <a href="log.php" title="panel">Panel administratora</a>
                                    <?php } else if (isset($_SESSION['admin']) && !$_SESSION['admin']) { ?>
                                    <a href="log.php" title="panel">Panel użytkownika</a>                           
                                    <?php } else { ?>
                                    <a href="log.php" title="zaloguj">Zaloguj się</a>
                                    <?php } ?>
                                </li>
                          </ul>
                        </div>
                      </div>
                    </nav>  
                </div>
            </div>
        </div>

<!--- Menu boczne ---->
<div id="menu-bok" class="menu-bok">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
	<div class="menu-naz">Gramatyka</div>
    <div class="menu-link">
    	<a href="czasy.php" title="czasy">Czasy</a>
        <a href="czasowniki.php" title="czasowniki">Czasowniki</a>
        <a href="rzeczowniki.php" title="rzeczowniki">Rzeczowniki</a>
        <a href="czasmod.php" title="czasowniki modalne">Czasowniki modalne</a>
    </div>
    <div class="menu-naz">Słownictwo</div>
    <div class="menu-link">
    	<a href="czas.php" title="czas">czas</a>
        <a href="colors.php" title="kolory">kolory</a>
        <a href="swieta.php" title="święta">święta</a>
        <a href="cialo.php" title="ciało">ciało</a>
    </div>
</div>

<!--koniec menu-->

<!--BLOG-->
<div class="container">
	<div id="blog" class="col-lg-12">
        <div class="post">
       		<div class='post-tit'>Święta</div>
            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12"><?php
   					$myConnection= mysqli_connect("localhost","root","", "learnenglish") or die ("could not connect to mysql"); 
					if (isset($_GET['id']))
					$sqlCommand="SELECT * FROM `holidays` WHERE IDHol='".mysqli_real_escape_string($myConnection, $_GET['id'])."'";			
					else
                        $sqlCommand="SELECT * FROM `holidays`";
                        $guery=mysqli_query($myConnection, "set names 'utf8'");
                        $query=mysqli_query($myConnection, $sqlCommand);            
                        while($row = mysqli_fetch_array($query)){ ?>
                       <br /><div class="col-xs-12"><form method="post" action="editHoli.php"><input type="text" name="weren" value="<?php echo "$row[1]";?>" /> - <input type="text" name="werpl" value="<?php echo "$row[2]";?>" /> <input type="submit" name="edycja" value="edytuj"/> <input type="submit" name="delete" value="usuń"/><input type="hidden" value="<?php echo "$row[0]";?>" name="IDHol" /></form></div>
				   <?php } ?>
                   </div>
                   <div class="col-lg-4">
                   <form method="post" action="editHoli.php">
                       <label>Wersja angielska</label> <input type="text" name="english"/> 
                       <label>Wersja polska</label> <input type="text" name="polish"/>
                       <br /><input type="submit" name="dodaj" value="dodaj" />
				   </form></div>
        </div>
    </div>
  </div>
 </div>
</body>
</html>
<?php
unset($_SESSION['register_success']);
unset($_SESSION['error']);
?>