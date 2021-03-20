<?php
	require_once("fonctions.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Joueurs</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style type="text/css">
	#tableau-joueur {
    	text-align: center; 
    	background-color: black; 
    	width: 40%; 
    	font: 14pt 'Comic Sans MS', Helvetica, Arial, sans-serif;
    	color: aqua;
    	border-color: black;
	}
	</style>
</head>
<body style="background-image: url(img/fond.jpg);">

<center>
	<h1>Gestion des Joueurs</h1>
	<a href="joueurs.php?page=1"><img src="img/joueur.png" width="240" height="240"></a>
<h2>Ajouter un Joueur</h2>
<form method="post" action="joueurs.php">
	<table border="0" id="ajout">
		<tr>
			<td>Nom du joueur :</td>
			<td><input type="text" placeholder="MBAPPE" name="nom" required></td>
		</tr>
		<tr>
			<td>Prenom du joueur :</td>
			<td><input type="text" placeholder="Kylian" name="prenom" required></td>
		</tr>
		<tr>
			<td>Age du joueur :</td>
			<td><input type="number" name="age" min="1" max="40" placeholder="26" style="text-align: center;" required></td>
		</tr>
		<tr>
			<td></td><td>
				<input type="reset" name="Annuler" value="Annuler">
				<input type="submit" name="Valider" value="Valider">
			</td>
		</tr>
	</table>
</form>

<?php
if(isset($_POST['Valider']))
{
	insertJoueurs($_POST);
	echo "<br> <font color='#7FFF00'>Insertion du joueur réussie !</font> </br>";
} else {
	echo "<br> <font color='white'>Veuillez insérer un joueur</font> </br>";
}

if(isset($_GET['idjoueurs']))
{
	$idjoueurs = $_GET['idjoueurs'];
	deleteJoueurs($idjoueurs);
	echo "<br> <font color='#7FFF00'>Supression du joueur réussie !</font> </br>";
} else {
	echo "<br> <font color='white'>Veuillez supprimer un joueur</font> </br>";
}

?>

<br>
<h2><font color="#7FFF00">Liste des Joueurs</font></h2>
<table id="tableau-joueur" border="1">
	<tr style="background-color: yellow; color: black;">
		<td>&nbsp;ID&nbsp;</td>
	    <td>&nbsp;Nom du Joueur&nbsp;</td>
	    <td>&nbsp;Prénom du Joueur&nbsp;</td>	
	    <td>&nbsp;Âge du Joueur&nbsp;</td>
	    <td>&nbsp;Supprimer&nbsp;</td>
	</tr>

<?php
$lesjoueurs = selectAllJoueurs();

foreach($lesjoueurs as $unjoueur)
{
	echo "<tr> <td>".$unjoueur['idjoueurs']."</td>
			   <td>".$unjoueur['nom']."</td>
			   <td>".$unjoueur['prenom']."</td>
			   <td>".$unjoueur['age']."</td>
			   <td> <center> <a href='joueurs.php?page=1&idjoueurs=".$unjoueur['idjoueurs']."'>
			        <img src='img/Delete.png' width='30' height='30'></a> </center></td>
	      </tr>";
} 

?>
</table>
<br><br>
<a href="index.php"><img src="img/retour.png" width="50" height="50"></a>
<br><br>

</center>

</body>
</html>