<?php
session_start();
$myConnection= mysqli_connect("localhost","root","", "learnenglish") or die ("could not connect to mysql"); 
$guery=mysqli_query($myConnection, "set names 'utf8'");
if(isset($_POST['delete'])){
			$sqlCommand="DELETE FROM `exe` WHERE IDEx='".mysqli_real_escape_string($myConnection, $_POST['IDEx'])."'"; 
			$query=mysqli_query($myConnection, $sqlCommand);			           
	};
if(isset($_POST['zapisz'])){
			$odp1 = mysqli_real_escape_string($myConnection, $_POST['odp1']);
			$odp2 = mysqli_real_escape_string($myConnection, $_POST['odp2']);
			$odp3 = mysqli_real_escape_string($myConnection, $_POST['odp3']);
	
			$sqlCommand="UPDATE `exe` SET `odp1`='{$odp1}', `odp2`='{$odp2}', `odp3`='{$odp3}', `poprawna`='{$_POST['poprawna']}' WHERE `IDEx`='".mysqli_real_escape_string($myConnection, $_POST['IDEx'])."'"; 
			$query=mysqli_query($myConnection, $sqlCommand);	         
	};
if(isset($_POST['dodaj'])){
			$pytanie = mysqli_real_escape_string($myConnection, $_POST['pytanie']);
			$odp1 = mysqli_real_escape_string($myConnection, $_POST['odp1']);
			$odp2 = mysqli_real_escape_string($myConnection, $_POST['odp2']);
			$odp3 = mysqli_real_escape_string($myConnection, $_POST['odp3']);
	
			$sqlCommand="INSERT INTO `exe` (`pytanie`,`odp1`,`odp2`,`odp3`,`poprawna`,`typ`) VALUES ('{$pytanie}', '{$odp1}', '{$odp2}', '{$odp3}', '{$_POST['poprawna']}', '{$_GET['type']}')"; 
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
	<div id="blog" class="col-lg-12 pull-right">
        <div class="post">
       		<div class='post-tit'><?php
            	if (isset($_GET['type']))
					switch ($_GET['type']) {
						case 1:	echo 'Ciało Ludzkie'; break;
						case 2: echo 'Święta'; break;
						case 3: echo 'Kolory'; break;
						case 4: echo 'Czas, Dni, Miesące'; break;
						case 5: echo 'Czas Present'; break;
						case 6: echo 'Czas Past'; break;
						case 7: echo 'Czas Future'; break;	
						case 8: echo 'Czasowniki'; break;
						case 9: echo 'Rzeczowniki'; break;	
						case 10: echo 'Czasowniki Modalne'; break;
					}
			?></div>
            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 cwiczenia-ed">
			<?php
   					$myConnection= mysqli_connect("localhost","root","", "learnenglish") or die ("could not connect to mysql"); 
					if (isset($_GET['type'])) {
					$sqlCommand="SELECT * FROM `exe` WHERE typ='".mysqli_real_escape_string($myConnection, $_GET['type'])."'";
					$guery=mysqli_query($myConnection, "set names 'utf8'");
					$query=mysqli_query($myConnection, $sqlCommand);     
					     
					$pytania = '';
					while($row = mysqli_fetch_array($query)){ ?>
                    	<div id="pytanie<?php echo $row['IDEx']; ?>" class="pytanie_details" style="display:none;">
                           <form method="post" action="editExercise.php?type=<?php echo mysqli_real_escape_string($myConnection, $_GET['type']); ?>"><div class="col-xs-10">
                           <?php $pytania .= '<option value="'.$row['IDEx'].'">'.$row['pytanie'].'</option>'; ?>
                           <label>Odpowiedź 1.</label><input type="text" name="odp1" value="<?php echo $row['odp1'];?>" /><br/>
                           <label>Odpowiedź 2.</label><input type="text" name="odp2" value="<?php echo $row['odp2'];?>" /><br/>
                           <label>Odpowiedź 3.</label><input type="text" name="odp3" value="<?php echo $row['odp3'];?>" /><br/>
                           <label>Poprawna</label><select name="poprawna">
                               <option value="1"<?php echo ($row['poprawna']==1 ? ' selected' : '')?>>Odpowiedź 1.</option>
                               <option value="2"<?php echo ($row['poprawna']==2 ? ' selected' : '')?>>Odpowiedź 2.</option>
                               <option value="3"<?php echo ($row['poprawna']==3 ? ' selected' : '')?>>Odpowiedź 3.</option></select><br/>
                           </div>
                           <input type="hidden" value="<?php echo $row['IDEx'];?>" name="IDEx" />
                           <div class="col-xs-12">
                             <input class="btn btn-success" type="submit" name="zapisz" value="zapisz"/>
                             <input class="btn btn-danger" type="submit" name="delete" value="usuń"/>
                           </div>                       
                           </form>
                       </div>
				   <?php } } ?>
                       <div class="col-xs-12" id="divSelectPytania">
                           <select style="width:100%" id="pytania">
                           <?php echo $pytania; ?>
                           </select>
                       </div>
                   </div>
                   <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                   <form method="post" action="editExercise.php?type=<?php echo mysqli_real_escape_string($myConnection, $_GET['type']); ?>">
                       <label>Pytanie</label> <input type="text" name="pytanie"/><br/> 
                       <label>Odpowiedź 1.</label> <input type="text" name="odp1"/><br/>
                       <label>Odpowiedź 2.</label> <input type="text" name="odp2"/><br/>
                       <label>Odpowiedź 3.</label> <input type="text" name="odp3"/><br/>
                       <label>Poprawna</label> <select name="poprawna">
                       <option value="1">Odpowiedź 1.</option>
                       <option value="2">Odpowiedź 2.</option>
                       <option value="3">Odpowiedź 3.</option></select><br/>
                       <br /><input class="btn btn-success" type="submit" name="dodaj" value="dodaj" />
				   </form></div>
        </div>
    </div>
  </div>
 </div>
 <script type="text/javascript">
 	$('#divSelectPytania').detach().prependTo($('.post > .col-lg-7'));
	$('select#pytania').change(function() {
		var el = $('#pytanie'+$(this).val());
		if (el.length > 0) {
			$('.pytanie_details').hide();
			el.show();		
		}
	}).change();
 </script>
</body>
</html>
<?php
unset($_SESSION['register_success']);
unset($_SESSION['error']);
?>