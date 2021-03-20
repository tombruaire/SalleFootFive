<?php
	require_once("fonctions.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Match</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style type="text/css">
	input[type="number"] {
		text-align: center;
	}

	#tableau-match {
    	text-align: center; 
    	background-color: black; 
    	width: 60%; 
    	font: 14pt 'Comic Sans MS', Helvetica, Arial, sans-serif;
    	color: aqua;
    	border-color: black;
	}

	</style>
</head>
<body style="background-image: url(img/fond.jpg);">

<center>
	<h1>Gestion des Matchs</h1>
	<a href="match.php"><img src="img/Coupe.png" width="150" height="200"><br></a>
<h2>Ajouter un Match</h2>
<form method="post" action="match.php">
	<table border="0" id="ajout">
		<tr>
			<td>Equipe domicile :</td>
			<td><input type="text" name="nomdom" placeholder="PSG" required></td>
		</tr>
		<tr>
			<td>Equipe exterieur :</td>
			<td><input type="text" name="nomext" placeholder="OM" required></td>
		</tr>
		<tr>
			<td>Date du Match :</td>
			<td><input type="date" name="dateM" required></td>
		</tr>
		<tr>
			<td>Stade :</td>
			<td><input type="text" name="stadeM" placeholder="Parc des Princes" required></td>
		</tr>
		<tr>
			<td>ID Equipe domicile :</td>
			<td>
				<select name="idequipe">
					<?php
					$lesEquipes = selectAllEquipe();

					foreach($lesEquipes as $uneEquipe)
					{
						echo "<option value ='".$uneEquipe['idequipe']."'>".$uneEquipe['nomE']."</option>";
					}
					?>
				</select>
			</td>
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
	insertMatch($_POST);
	echo "<br> <font color='#7FFF00'>Insertion réussie !</font> </br>";
} else {
	echo "<br> <font color='white'>Veuillez insérer un match</font> </br>";
}

if(isset($_GET['idmatchs']))
{
	$idmatchs = $_GET['idmatchs'];
	deleteMatch($idmatchs);
	echo "<br> <font color='#7FFF00'>Supression réussie !</font> </br>";
} else {
	echo "<br> <font color='white'>Veuillez supprimer un match</font> </br>";
}

?>
<br>
<h2>Liste des Matchs</h2>
<table id="tableau-match" border="1" style="text-align: center;">
	<tr style="background-color: yellow; color: black;">
		<td>&nbsp;ID du Match&nbsp;</td>
	    <td>&nbsp;Equipe domicile&nbsp;</td>
	    <td>&nbsp;Equipe exterieur&nbsp;</td>
	    <td>&nbsp;Date du Match&nbsp;</td>
	    <td>&nbsp;Stade&nbsp;</td>
	    <td>&nbsp;ID Equipe dom&nbsp;</td>
	    <td>&nbsp;Supprimer&nbsp;</td>
	</tr>

<?php
$lesMatchs = selectAllMatch();

foreach($lesMatchs as $unMatch)
{
	echo "<tr> <td>".$unMatch['idmatchs']."</td>
			   <td>".$unMatch['nomdom']."</td>
			   <td>".$unMatch['nomext']."</td>
			   <td>".$unMatch['dateM']."</td>
			   <td>".$unMatch['stadeM']."</td>
			   <td>".$unMatch['idequipe']."</td>
			   <td> <center> <a href='match.php?page=6&idmatchs=".$unMatch['idmatchs']."'>
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