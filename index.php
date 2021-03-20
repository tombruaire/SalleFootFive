<?php
	require_once("fonctions.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Accueil</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<style type="text/css">
	#popup_this {
    	top: 50%;
    	left: 50%;
    	text-align: center;
    	margin-top: -50px;
    	margin-left: -100px;
    	position: fixed;
    	background: #fff;
    	padding: 30px;
	}

	.b-close {
    	position: absolute;
    	right: 0;
    	top: 0;
    	cursor: pointer;
    	color: #fff;
   		background: #ff0000;
    	padding: 5px 10px;
	}

	#popup_this > h3 {
		color: blue;
	}

	#popup_this > p {
		font: 12pt "Comic Sans MS", Helveltica, Arial, sans-serif;
	}
	</style>
</head>
<body style="background-image: url(img/fond.jpg);">

<center>
	<h1>Gestion des salles de Foot Five</h1>
	<div id="logo">
	<a href="index.php"><img src="img/logo.png"></a>
	</div>

<h3>Veuillez cliquez ci-dessous pour selectionner une des tables :</h3>
<br>
<nav class="menu">
   <input type="checkbox" href="#" class="menu-open" name="menu-open" id="menu-open">
   <label class="menu-open-button" for="menu-open">
    <span class="lines ligne-1"></span>
    <span class="lines ligne-2"></span>
    <span class="lines ligne-3"></span>
  </label>

   	<a href="joueurs.php?page=1" class="menu-item rond-blanc-vert">Joueurs</a>
   	<a href="coach.php?page=2" class="menu-item rond-blanc-vert">Coach</a>
   	<a href="maillot.php?page=3" class="menu-item rond-blanc-vert">Maillot</a>
   	<a href="equipe.php?page=4" class="menu-item rond-blanc-vert">Equipe</a>
   	<a href="stade.php?page=5" class="menu-item rond-blanc-vert">Stade</a>
   	<a href="match.php?page=6" class="menu-item rond-blanc-vert">Matchs</a>
</nav>

<?php

if (isset($_GET['page']))
{
	$page = $_GET['page'];
} else {
	$page = 0;
}

switch ($page)
{
	case 1 : require_once("joueurs.php"); break;
	case 2 : require_once("coach.php"); break;
	case 3 : require_once("maillot.php"); break;
	case 4 : require_once("equipe.php"); break;
	case 5 : require_once("stade.php"); break;
	case 5 : require_once("match.php"); break;
}


?>

<footer>
	<br><br>
</footer>
</center>

</body>
</html>