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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
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
                          <span style="font-size:30px; cursor:pointer; color:#fff;" onclick="openNav()">&#9776;</span>
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
	<div id="blog" class="col-xs-12">
        <div class="post">
            <div class="post-image"><img class="img-responsive" src="img/main.png" /></div>
            <div class="post-tit">Zacznij naukę języka angielskiego z nami</div>
            <div class="post-tre">Dołącz do grona uczących się osób i zadbaj o swoją przyszłość. Nasz portal oferuje naukę języka angielskiego na różnych poziomach zaawansowania. Każdy znajdzie tu przez to coś dla siebie.
            Jeśli jesteś dopiero początkującą osobą, zacznij od sekcji <i>Słownictwo</i>, gdzie znajdziesz różnego rodzaju słówka.
            Jeśli miałeś już doczynienia z językiem angielskim, to oprócz powyższej sekcji możesz rozpocząć przygodę z sekcją <i>Gramatyka</i>, gdzie znajdziesz informację o czasach, częściach mowy oraz innych ważnych aspektach nauki tego języka.
            Jeśli czujesz, że poznałeś język angielski wystarczająco dobrze, zajrzyj koniecznie do sekcji <i>Ćwiczenia</i>. To tam będziesz mógł przećwiczyć zdobytą już wiedzę oraz sprawdzić swoje umiejętności.</div>
            <div class="post-podpis"><b>Dołącz do nas już dziś</b></div>  
        </div>
    </div>
</div>
</body>
</html>
