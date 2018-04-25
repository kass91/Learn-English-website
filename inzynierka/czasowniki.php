<?php
session_start(); ?>
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
        <div class="post3">
            <div class="post-image3"></div>
            <div class="post-tit3">Czasowniki - Verbs</div>
            <div class="post-tre3">
            	<blockquote>W języku angielskim wyróżniamy następujące rodzaje czasowników:
<br/>
<br/>czasowniki główne (np. go, learn, speak, work),
<br/>czasowniki posiłkowe (do, be, have),
<br/>czasowniki modalne (can, could, may, might, ought, shall, should, will, would, must).</blockquote><br /><br />
                 <div class="panel-group">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title"> <a data-toggle="collapse" href="#collapse1">Czasowniki główne</a></h4>
                  </div>
                  <div id="collapse1" class="panel-collapse collapse">
                    <div class="panel-body">
					<?php
   					$myConnection= mysqli_connect("localhost","root","", "learnenglish") or die ("could not connect to mysql"); 
					if (isset($_GET['id']))
					$sqlCommand="SELECT * FROM verbs WHERE IDVerb='".mysqli_real_escape_string($myConnection, $_GET['id'])."'";			
					else
                        $sqlCommand="SELECT * FROM verbs WHERE nazwa = 'Czasowniki główne'";
                        $guery=mysqli_query($myConnection, "set names 'utf8'");
                        $query=mysqli_query($myConnection, $sqlCommand);            
                        while($row = mysqli_fetch_array($query)){ ?>
                       <br /><?php echo "$row[2]";?> <?php } ?></div>
                    <div class="panel-footer">Przykłady
                    <br /> <?php
   						$myConnection= mysqli_connect("localhost","root","", "learnenglish") or die ("could not connect to mysql"); 
                                $sqlCommand="SELECT * FROM verbs WHERE nazwa = 'Czasowniki główne'";
                                $guery=mysqli_query($myConnection, "set names 'utf8'");
                                $query=mysqli_query($myConnection, $sqlCommand);            
                                  while($row = mysqli_fetch_array($query)){ ?>

                    <br /><?php echo "$row[3]";?> <?php } ?></div>
                  </div>
                </div>
                </div>
                <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"> <a data-toggle="collapse" href="#collapse2">Czasowniki posiłkowe</a></h4>
                  </div>
                  <div id="collapse2" class="panel-collapse collapse">
                    <div class="panel-body">
					<?php
   					$myConnection= mysqli_connect("localhost","root","", "learnenglish") or die ("could not connect to mysql"); 
					if (isset($_GET['id']))
					$sqlCommand="SELECT * FROM verbs WHERE IDVerb='".mysqli_real_escape_string($myConnection, $_GET['id'])."'";			
					else
                        $sqlCommand="SELECT * FROM verbs WHERE nazwa = 'Czasowniki posiłkowe'";
                        $guery=mysqli_query($myConnection, "set names 'utf8'");
                        $query=mysqli_query($myConnection, $sqlCommand);            
                        while($row = mysqli_fetch_array($query)){ ?>
                       <br /><?php echo "$row[2]";?> <?php } ?></div>
                    <div class="panel-footer">Przykłady
                    <br /> <?php
   						$myConnection= mysqli_connect("localhost","root","", "learnenglish") or die ("could not connect to mysql"); 
                                $sqlCommand="SELECT * FROM verbs WHERE nazwa = 'Czasowniki posiłkowe'";
                                $guery=mysqli_query($myConnection, "set names 'utf8'");
                                $query=mysqli_query($myConnection, $sqlCommand);            
                                  while($row = mysqli_fetch_array($query)){ ?>

                    <br /><?php echo "$row[3]";?> <?php } ?></div>
                  </div>              
                 </div>
            <?php if ((isset($_SESSION['id'])) && isset($_SESSION['login'])){ ?>
            <div class="panel-group">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title"> <a data-toggle="collapse" href="#collapse3">Ćwiczenia</a></h4>
                  </div>
                  <div id="collapse3" class="panel-collapse collapse">
                    <div class="panel-body">
                    <?php
					$myConnection= mysqli_connect("localhost","root","", "learnenglish") or die ("could not connect to mysql"); 
					$sqlCommand="SELECT * FROM wyniki WHERE `typ`='8' AND `IDUser`='{$_SESSION['id']}' ORDER BY `data` DESC LIMIT 5";
					$guery=mysqli_query($myConnection, "set names 'utf8'");
					$query=mysqli_query($myConnection, $sqlCommand);            
					$set = false;
					$wyniki = '';
					while($row = mysqli_fetch_array($query)){ 
						$set = true;
						$wyniki .= '<p>'.$row['data'].' - '.$row['wynik'].'</p>';
					}
					if ($set) {
					?>
                    <div id="wyniki">
                    Twoje ostatnie 5 prób:<br/>
                    <?php echo $wyniki; ?>
                    <button type="button" id="tryAgain">Spróbuj ponownie</button>                    
                    </div>
                    <?php } ?>
                    <div id="test" <?php if ($set) echo 'style="display:none;"'; ?>>
                    <form method="post" action="checkExercise.php?type=8">
					<?php
					$sqlCommand="SELECT * FROM exe WHERE `typ`='8'";
					$guery=mysqli_query($myConnection, "set names 'utf8'");
					$query=mysqli_query($myConnection, $sqlCommand);            
					$i = 1;
					while($row = mysqli_fetch_array($query)){ 
						echo '<div id="pytanie'.$row['IDEx'].'">';
				   		echo '<p>'.($i++).'. '.$row['pytanie'].'</p>';
						echo '<label><input type="radio" name="'.$row['IDEx'].'" value="1"> '.$row['odp1'].'</label> ';
						echo '<label><input type="radio" name="'.$row['IDEx'].'" value="2"> '.$row['odp2'].'</label> ';
						echo '<label><input type="radio" name="'.$row['IDEx'].'" value="3"> '.$row['odp3'].'</label>';
						echo '</div>';
				   	} ?>
                    <input type="submit" name="wyslij" value="Wyślij" />
                  </form>
                  </div>
                </div>
                </div>
            </div>
            </div>
            <?php } ?>
            </div><br/>
            <div class="post-podpis3"></div>  
        </div>
    </div>
    </div>
<script type="text/javascript">
	$('button#tryAgain').click(function() {
		$('div#wyniki').hide();
		$('div#test').show();
	});
</script>
</body>
</html>
