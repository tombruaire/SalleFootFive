<?php
	require_once("fonctions.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Coach</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/coach.css">
</head>
<body style="background-image: url(img/fond.jpg);">

<center>
	<h1>Gestion des Coach</h1>
<a href="coach.php"><img src="img/coach.png" width="200" height="200"></a>
<h2>Ajouter un Coach</h2>
<form method="post" action="">
	<table border="0" id="ajout">
		<tr>
			<td>Nom du Coach :</td>
			<td><input type="text" name="nom" placeholder="Bruaire" required></td>
		</tr>
		<tr>
			<td>Prénom du Coach :</td>
			<td><input type="text" name="prenom" placeholder="Tom" required></td>
		</tr>
		<tr>
			<td>Adresse du Coach :</td>
			<td><input type="text" name="adresse" placeholder="5 rue de Paris" required></td>
		</tr>
		<tr>
			<td>Email du Coach :</td>
			<td><input type="text" name="email" placeholder="exemple@gmail.com" required></td>
		</tr>
		<tr>
			<td>Téléphone du Coach :</td>
			<td><input type="text" name="tel" placeholder="0606060606" required></td>
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
	insertCoach($_POST);
	echo "<br> <font color='#7FFF00'>Insertion réussie !</font> </br>";
} else {
	echo "<br> <font color='white'>Veuillez insérer un coach</font> </br>";
}

if(isset($_GET['idcoach']))
{
	$idcoach = $_GET['idcoach'];
	deleteCoach($idcoach);
	echo "<br> <font color='#7FFF00'>Supression réussie !</font> </br>";
} else {
	echo "<br> <font color='white'>Veuillez supprimer un coach</font> </br>";
}
?>
<br>
<h2>Liste des Coach</h2>
<table id="tableau" border="1" style="text-align: center;">
	<tr style="background-color: yellow; color: black;">
		<td>&nbsp;ID&nbsp;</td>
	    <td>&nbsp;Nom du Coach&nbsp;</td>
	    <td>&nbsp;Prénom du Coach&nbsp;</td>	
	    <td>&nbsp;Adresse du Coach&nbsp;</td>
	    <td>&nbsp;Email du Coach</td>
	    <td>&nbsp;Téléphone du Coach&nbsp;</td>
	    <td>&nbsp;Supprimer&nbsp;</td>
	</tr>
<?php
$lesCoachs = selectAllCoach();

foreach($lesCoachs as $unCoach)
{
	echo "<tr> <td>".$unCoach['idcoach']."</td>
			   <td>".$unCoach['nom']."</td>
			   <td>".$unCoach['prenom']."</td>
			   <td>".$unCoach['adresse']."</td>
			   <td>".$unCoach['email']."</td>
			   <td>".$unCoach['tel']."</td>
			   <td> <center> <a href='coach.php?page=2&idcoach=".$unCoach['idcoach']."'>
			        <img src='img/Delete.png' width='30' height='30'></a> </center></td>
	      </tr>";
} 

?>

</table>
<br><br>
<a href="index.php"><img src="img/retour.png" width="50" height="50"></a>
</center>
<br><br>
</body>
</html>
