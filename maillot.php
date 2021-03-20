<?php
	require_once("fonctions.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Maillot</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/maillot.css">
	<style type="text/css">
	#tableau-maillot {
    	text-align: center; 
    	background-color: black; 
    	width: 50%; 
    	font: 14pt 'Comic Sans MS', Helvetica, Arial, sans-serif;
    	color: aqua;
    	border-color: black;
	}
	</style>
</head>
<body style="background-image: url(img/fond.jpg);">

<center>
	<h1>Gestion des Maillots</h1>


<a href="maillot.php"><img src="img/maillot.png" width="200" height="200"></a>
<h2>Ajouter un Maillot</h2>
<form method="post" action="maillot.php">
	<table border="0" id="ajout">
		<tr>
			<td>Nom sur le Maillot :</td>
			<td><input type="text" name="nom" placeholder="Nom du Joueur" required></td>
		</tr>
		<tr>
			<td>Prenom sur le Maillot :</td>
			<td><input type="text" name="prenom" placeholder="Prénom du Joueur" required></td>
		</tr>
		<tr>
			<td>Numero du Maillot :</td>
			<td><input type="number" name="numero" min="1" max="50" placeholder="19" required></td>
		</tr>
		<tr>
			<td>Couleur du Maillot</td>
            <td><input type="text" name="couleur" placeholder="Bleu" required></td>
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
	insertMaillot($_POST);
	echo "<br> <font color='#7FFF00'>Insertion réussie !</font> </br>";
} else {
	echo "<br> <font color='white'>Veuillez insérer un maillot</font> </br>";
}

if(isset($_GET['idmaillot']))
{
	$idmaillot = $_GET['idmaillot'];
	deleteMaillot($idmaillot);
	echo "<br> <font color='#7FFF00'>Supression réussie !</font> </br>";
} else {
	echo "<br> <font color='white'>Veuillez supprimer un maillot</font> </br>";
}

?>
<br>
<h2>Liste des Maillots</h2>
<table id="tableau-maillot" border="1" style="text-align: center;">
	<tr style="background-color: yellow; color: black;">
		<td>&nbsp;ID du Maillot&nbsp;</td>
	    <td style="width: 20%;">&nbsp;Nom&nbsp;</td>
	    <td style="width: 15%;">&nbsp;Prénom&nbsp;</td>	
	    <td>&nbsp;Numéro du Maillot&nbsp;</td>
	    <td>&nbsp;Couleur du Maillot&nbsp;</td>
	    <td>&nbsp;Supprimer&nbsp;</td>
	</tr>

<?php
$lesMaillots = selectAllMaillot();

foreach($lesMaillots as $unMaillot)
{
	echo "<tr> <td>".$unMaillot['idmaillot']."</td>
			   <td>".$unMaillot['nom']."</td>
			   <td>".$unMaillot['prenom']."</td>
			   <td>".$unMaillot['numero']."</td>
			   <td>".$unMaillot['couleur']."</td>
			   <td> <center> <a href='maillot.php?page=3&idmaillot=".$unMaillot['idmaillot']."'>
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
