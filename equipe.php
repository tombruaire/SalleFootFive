<?php
	require_once("fonctions.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Equipe</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/equipe.css">
</head>
<body style="background-image: url(img/fond.jpg);">

<center>
	<h1>Gestion des Equipes</h1>
	<a href="equipe.php"><img src="img/equipe.png" width="200" height="200"><br></a>
<h2>Ajouter une Equipe</h2>
<form method="post" action="equipe.php">
	<table border="0" id="ajout">
		<tr>
			<td>Nom de l'Equipe :</td>
			<td><input type="text" name="nomE" placeholder="PSG" required></td>
		</tr>
		<tr>
			<td>Nom du Capitaine :</td>
			<td><input type="text" name="nomC" placeholder="Nom du Joueur" required></td>
		</tr>
		<tr>
			<td>Prenom du Capitaine :</td>
			<td><input type="text" name="prenomC" placeholder="Prénom du Joueur" required></td>
		</tr>
		<tr>
			<td>Numero du Capitaine :</td>
			<td><input type="number" name="numeroC" placeholder="6" min="0" max="50" required></td>
		</tr>
		<tr>
			<td>Id Coach :</td>
			<td><input type="number" name="idcoach" placeholder="1" min="1" max="1" required></td>
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
	insertEquipe($_POST);
	echo "<br> <font color='#7FFF00'>Insertion de l'équipe réussie !</font> </br>";
} else {
	echo "<br> <font color='white'>Veuillez insérer une équipe</font> </br>";
}

if(isset($_GET['idequipe']))
{
	$idequipe = $_GET['idequipe'];
	deleteEquipe($idequipe);
	echo "<br> <font color='#7FFF00'>Supression de l'équipe réussie !</font> </br>";
} else {
	echo "<br> <font color='white'>Veuillez supprimer une équipe</font> </br>";
}

?>
<br>
<h2>Liste des Equipes</h2>
<table id="tableau-equipe" border="1" style="text-align: center;">
	<tr style="background-color: yellow; color: black;">
		<td>&nbsp;ID de l'Equipe&nbsp;</td>
		<td>&nbsp;Nom de l'équipe&nbsp;</td>
	    <td>&nbsp;Nom du Capitaine&nbsp;</td>
	    <td>&nbsp;Prénom du capitaine&nbsp;</td>	
	    <td>&nbsp;Numéro du capitaine&nbsp;</td>
	    <td>&nbsp;Id du Coach&nbsp;</td>
	    <td>&nbsp;Supprimer&nbsp;</td>
	</tr>

<?php
$lesEquipes = selectAllEquipe();

foreach($lesEquipes as $uneEquipe)
{
	echo "<tr> <td>".$uneEquipe['idequipe']."</td>
			   <td>".$uneEquipe['nomE']."</td>
			   <td>".$uneEquipe['nomC']."</td>
			   <td>".$uneEquipe['prenomC']."</td>
			   <td>".$uneEquipe['numeroC']."</td>
			   <td>".$uneEquipe['idcoach']."</td>
			   <td> <center> <a href='equipe.php?page=4&idequipe=".$uneEquipe['idequipe']."'>
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