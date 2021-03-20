<?php

function connexion()
{
	$con = mysqli_connect("localhost", "root", "", "foot");
	if ($con == null)
	{
		echo "<br> Erreur de connexion au serveur ! <br>";
	}
	return $con;
}

function deconnexion ($con)
{
	mysqli_close($con);
}

/* Gestion des Joueurs */
function insertJoueurs ($tab)
{
	$con = connexion ();
	if($con != null)
	{
		$requete = "insert into joueurs values (null,'".$tab['nom']."','".$tab['prenom']."','".$tab['age']."');";
		mysqli_query($con, $requete);
		deconnexion($con);
	}
}

function selectAllJoueurs()
{
	$con = connexion ();
	if($con != null)
	{
		$requete = "select * from joueurs;";
		$resultats = mysqli_query($con, $requete);
		deconnexion($con);
		return $resultats;
	}else {
		return null;
	}
}

function deleteJoueurs($idjoueurs)
{
	$con = connexion();
	if($con != null)
	{
		$requete = "delete from joueurs where idjoueurs = ".$idjoueurs.";";
		mysqli_query($con, $requete);
		deconnexion($con);
	}
}

/* Gestion des Coach */
function insertCoach ($tab)
{
	$con = connexion ();
	if($con != null)
	{
		$requete = "insert into coach values (null,'".$tab['nom']."','".$tab['prenom']."','".$tab['adresse']."','".$tab['email']."','".$tab['tel']."');";
		mysqli_query($con, $requete);
		deconnexion($con);
	}
}

function selectAllCoach ()
{
	$con = connexion ();
	if($con != null)
	{
		$requete = "select * from coach;";
		$resultats = mysqli_query($con, $requete);
		deconnexion($con);
		return $resultats;
	}
}

function deleteCoach($idcoach)
{
	$con = connexion();
	if($con != null)
	{
		$requete = "delete from coach where idcoach = ".$idcoach.";";
		mysqli_query($con, $requete);
		deconnexion($con);
	}
}

/* Gestion des Maillots */
function insertMaillot ($tab)
{
	$con = connexion ();
	if($con != null)
	{
		$requete = "insert into maillot values (null,'".$tab['nom']."','".$tab['prenom']."','".$tab['numero']."','".$tab['couleur']."');";
		mysqli_query($con, $requete);
		deconnexion($con);
	}
}

function selectAllMaillot ()
{
	$con = connexion ();
	if($con != null)
	{
		$requete = "select * from maillot;";
		$resultats = mysqli_query($con, $requete);
		deconnexion($con);
		return $resultats;
	}
}

function deleteMaillot($idmaillot)
{
	$con = connexion();
	if($con != null)
	{
		$requete = "delete from maillot where idmaillot = ".$idmaillot.";";
		mysqli_query($con, $requete);
		deconnexion($con);
	}
}

/* Gestion des Equipes */
function insertEquipe ($tab)
{
	$con = connexion ();
	if($con != null)
	{
		$requete = "insert into equipe values (null,'".$tab['nomE']."','".$tab['nomC']."','".$tab['prenomC']."','".$tab['numeroC']."','".$tab['idcoach']."');";
		mysqli_query($con, $requete);
		deconnexion($con);
	}
}

function selectAllEquipe ()
{
	$con = connexion ();
	if($con != null)
	{
		$requete = "select * from equipe;";
		$resultats = mysqli_query($con, $requete);
		deconnexion($con);
		return $resultats;
	}
}

function deleteEquipe($idequipe)
{
	$con = connexion();
	if($con != null)
	{
		$requete = "delete from equipe where idequipe = ".$idequipe.";";
		mysqli_query($con, $requete);
		deconnexion($con);
	}
}

/* Gestion des Stades */
function insertStade ($tab)
{
	$con = connexion ();
	if($con != null)
	{
		$requete = "insert into stade values (null,'".$tab['nom']."','".$tab['ville']."','".$tab['idequipe']."');";
		mysqli_query($con, $requete);
		deconnexion($con);
	}
}

function selectAllStade ()
{
	$con = connexion ();
	if($con != null)
	{
		$requete = "select * from stade;";
		$resultats = mysqli_query($con, $requete);
		deconnexion($con);
		return $resultats;
	}
}

function deleteStade($idstade)
{
	$con = connexion();
	if($con != null)
	{
		$requete = "delete from stade where idstade = ".$idstade.";";
		mysqli_query($con, $requete);
		deconnexion($con);
	}
}

/* Gestion des Matchs */
function insertMatch ($tab)
{
	$con = connexion ();
	if($con != null)
	{
		$requete = "insert into matchs values (null,'".$tab['nomdom']."','".$tab['nomext']."','".$tab['dateM']."','".$tab['stadeM']."','".$tab['idequipe']."');";
		mysqli_query($con, $requete);
		deconnexion($con);
	}
}

function selectAllMatch ()
{
	$con = connexion ();
	if($con != null)
	{
		$requete = "select * from matchs;";
		$resultats = mysqli_query($con, $requete);
		deconnexion($con);
		return $resultats;
	}
}

function deleteMatch($idmatchs)
{
	$con = connexion();
	if($con != null)
	{
		$requete = "delete from matchs where idmatchs = ".$idmatchs.";";
		mysqli_query($con, $requete);
		deconnexion($con);
	}
}