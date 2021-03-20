<?php
	require_once("fonctions.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Stade</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style type="text/css">
	input[type="number"] {
		text-align: center;
	}
	</style>
</head>
<body style="background-image: url(img/fond.jpg);">

<center>
	<h1>Gestion des Stades</h1>
	<a href="stade.php"><img src="img/stade.png" width="200" height="200"><br></a>
<h2>Ajouter un Stade</h2>
<form method="post" action="stade.php">
	<table border="0" id="ajout">
		<tr>
			<td>Nom du Stade &nbsp;:</td>
			<td><input type="text" name="nom" placeholder="Parc des Princes" required></td>
		</tr>
		<tr>
			<td>Lieu du Stade &nbsp;:</td>
			<td><input type="text" name="ville" placeholder="Paris" required></td>
		</tr>
		<tr>
			<td>ID de l'Equipe :</td>
			<td><input type="number" name="idequipe" placeholder="1" min="1" max="1" required></td>
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
	insertStade($_POST);
	echo "<br> <font color='#7FFF00'>Insertion réussie !</font> </br>";
} else {
	echo "<br> <font color='white'>Veuillez insérer un stade</font> </br>";
}

if(isset($_GET['idstade']))
{
	$idstade = $_GET['idstade'];
	deleteStade($idstade);
	echo "<br> <font color='#7FFF00'>Supression réussie !</font> </br>";
} else {
	echo "<br> <font color='white'>Veuillez supprimer un stade</font> </br>";
}

?>
<br>
<h2>Liste des Stades</h2>
<table id="tableau" border="1" style="text-align: center;">
	<tr style="background-color: yellow; color: black;">
		<td>&nbsp;ID du Stade&nbsp;</td>
	    <td>&nbsp;Nom du Stade&nbsp;</td>
	    <td>&nbsp;Lieu du Stade&nbsp;</td>
	    <td>&nbsp;ID Equipe&nbsp;</td>
	    <td>&nbsp;Supprimer&nbsp;</td>
	</tr>

<?php
$lesStades = selectAllStade();

foreach($lesStades as $unStade)
{
	echo "<tr> <td>".$unStade['idstade']."</td>
			   <td>".$unStade['nom']."</td>
			   <td>".$unStade['ville']."</td>
			   <td>".$unStade['idequipe']."</td>
			   <td> <center> <a href='stade.php?page=5&idstade=".$unStade['idstade']."'>
			        <img src='img/Delete.png' width='30' height='30'></a> </center></td>
	      </tr>";
} 

?>
</table>
<br><br>
<a href="index.php"><img src="img/retour.png" width="50" height="50"></a>
</center>

</body>
</html>