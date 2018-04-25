<?php
session_start();
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
        <!--- Log in ---->
        <form action="login.php" method="post">
            <div id='login'>
            <?php if (isset($_SESSION['admin']) && $_SESSION['admin']) { ?>
				<div class='post-tit'>Panel administratora</div>
            <div class="form-group">
			Cześć <?php echo $_SESSION['login'] ; ?>
            <br /><div class="pan-ad-tit"></div>
            <br /><a href="users.php" class="btn btn-primary">Zarządzanie użytkownikami</a>
           	<div class="dropdown">
                  <button class="dropbtn btn btn-success">Słownictwo</button>
                  <div class="dropdown-content">
                    <a href="editCialo.php">Human Body</a>
                    <a href="editHoli.php">Holidays</a>
                    <a href="editCol.php">Colors</a>
                    <a href="editDays.php">Days</a>
                    <a href="editMon.php">Months</a>
                    <a href="editTime.php">Czas / Time</a>
                  </div>
				</div> 
                <div class="dropdown">
                  <button class="dropbtn btn btn-success">Gramatyka</button>
                  <div class="dropdown-content">
                    <a href="editCzasy.php">Czasy</a>
                    <a href="editVerb.php">Czasowniki</a>
                    <a href="editNoun.php">Rzeczowniki</a>
                    <a href="editMod.php">Czasowniki modalne</a>
                  </div>
				</div>
                <div class="dropdown">
                  <button class="dropbtn btn btn-success">Ćwiczenia</button>
                  <div class="dropdown-content">
                    <a href="editExercise.php?type=1">Słownictwo - Human body</a>
                    <a href="editExercise.php?type=2">Słownictwo - Holidays</a>
                    <a href="editExercise.php?type=3">Słownictwo - Colors</a>
                    <a href="editExercise.php?type=4">Słownictwo - Czas, Dni, Miesące</a>
                    <a href="editExercise.php?type=5">Gramatyka - Present</a>
                    <a href="editExercise.php?type=6">Gramatyka - Past</a>
                    <a href="editExercise.php?type=7">Gramatyka - Future</a>
                    <a href="editExercise.php?type=8">Gramatyka - Czasowniki</a>
                    <a href="editExercise.php?type=9">Gramatyka - Rzeczowniki</a>
                    <a href="editExercise.php?type=10">Gramatyka - Modalne</a>
                  </div>
				</div>     
            
            <br /><br/><?php $dzien = date("d");
				$miesiac = date("m");
				$rok = date("Y");
				switch($miesiac){
					case '01':$miesiac='stycznia';break;
					case '02':$miesiac='lutego';break;
					case '03':$miesiac='marca';break;
					case '04':$miesiac='kwietnia';break;
					case '05':$miesiac='maja';break;
					case '06':$miesiac='czerwca';break;
					case '07':$miesiac='lipca';break;
					case '08':$miesiac='sierpnia';break;
					case '09':$miesiac='września';break;
					case '10':$miesiac='października';break;
					case '11':$miesiac='listopada';break;
					case '12':$miesiac='grudnia';break;
					default:$miesiac='niezidentyfikowany';break;}
					print "Dziś jest <strong>$dzien $miesiac $rok</strong>";
					?>
            <br/><a href='logout.php' class='btn btn-default'>Wyloguj</a>
			<?php } ?>
           </div>
            <?php 
			if ((isset($_SESSION['admin']) && !$_SESSION['admin']) && isset($_SESSION['login']) && isset($_SESSION['id'])) {?>
            <div class='post-tit'>Panel użytkownika</div>
            <div class="form-group">
			Cześć <b><?php echo $_SESSION['login'] ; ?></b>
           <div id="post" class="post" >
                  <div class="title">
                      Twoje ćwiczenia
                  </div>
                 <?php
					$myConnection= mysqli_connect("localhost","root","", "learnenglish") or die ("could not connect to mysql"); 
					$sqlCommand="SELECT * FROM `wyniki` WHERE `IDUser`='{$_SESSION['id']}' ORDER BY `data` DESC";
					$guery=mysqli_query($myConnection, "set names 'utf8'");
					$query=mysqli_query($myConnection, $sqlCommand);            
					while($row = mysqli_fetch_array($query)){ 
						switch ($row['typ']) {
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
						echo " {$row['data']} {$row['wynik']} <br />";
						
					}
					?>
                    </div>
             <br/><?php $dzien = date("d");
				$miesiac = date("m");
				$rok = date("Y");
				switch($miesiac){
					case '01':$miesiac='stycznia';break;
					case '02':$miesiac='lutego';break;
					case '03':$miesiac='marca';break;
					case '04':$miesiac='kwietnia';break;
					case '05':$miesiac='maja';break;
					case '06':$miesiac='czerwca';break;
					case '07':$miesiac='lipca';break;
					case '08':$miesiac='sierpnia';break;
					case '09':$miesiac='września';break;
					case '10':$miesiac='października';break;
					case '11':$miesiac='listopada';break;
					case '12':$miesiac='grudnia';break;
					default:$miesiac='niezidentyfikowany';break;}
					print "Dziś jest <strong>$dzien $miesiac $rok</strong>";
					?> 
            <br/><br/><a href='logout.php' class='btn btn-default'>Wyloguj</a>
            </div>
			<?php } else if (!isset($_SESSION['admin'])) {?>
            <div class='post-tit'>Logowanie</div>
            <?php if (isset($_SESSION['register_success'])) { ?>
              <div class="form-group">
                <label>Konto zostało utworzone, możesz się teraz zalogować</label>
              </div>
             <?php } ?>
            <?php if (isset($_SESSION['error'])) { ?>
              <div class="form-group">
                <label>Błąd logowania</label>
              </div>
             <?php } ?>
              <div class="form-group">
                <label for="exampleInputLogin1">Login</label>
                <input type="text" class="form-control" id="exampleInputLogin1" placeholder="Login" name="login">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
              </div>
              <div class="form-group">
              <label>
              <button type="submit" class="btn btn-default" name="submit">Zaloguj</button>
              </label>
              <br />Nie posiadasz konta?
              <br /><label>
              <a href="register.php" class="btn btn-default">ZAREJESTRUJ SIĘ</a>
              </label>
              </div>
              <?php }?>
              </div>
            </form>
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