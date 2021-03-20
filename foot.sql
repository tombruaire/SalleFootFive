/***** BASE DE DONNÉES ********/
/******************************/
/**Tom**Bruaire**BTS**SIO**1A**/
Drop database if exists foot; /* Supprimer la Base de Donnée 'foot' s'il elle existe */
Create database foot; /* Création de la Base de Donnée 'foot' */
/***************************/
use foot; /* Utiliser la base 'foot' */

/*** GESTION DES JOUEURS ***/
Create table joueurs (
	idjoueurs int(3) not null auto_increment,
	nom varchar(50),
	prenom varchar(50),
	age varchar(50),
	primary key(idjoueurs)
);

insert into joueurs values
(null, "Mbappe", "Kylian", "21"),
(null, "Icardi", "Mauro", "22");

/*** GESTION DES COACHS ***/
Create table coach (
	idcoach int(3) not null auto_increment,
	nom varchar(50),
	prenom varchar(50),
	adresse varchar(100),
	email varchar(50),
	tel varchar(20),
	primary key(idcoach)
);

insert into coach values
(null, "Tuchel", "Thomas", "31 Rue du Parc des Princes", "t.tuchel@gmail.com", "0606060606"),
(null, "Deschamps", "Didier", "32 Rue de Saint-Denis", "d.deschamps@gmail.com", "0707070707");

/*** GESTION DES MAILLOTS ***/
Create table maillot (
	idmaillot int(3) not null auto_increment,
	nom varchar(50),
	prenom varchar(50),
	numero int(2),
	couleur varchar(20),
	primary key(idmaillot)
);

insert into maillot values
(null, "MBAPPE", "Kylian", 7, "Bleu"),
(null, "MBAPPE", "Kylian", 7, "Bleu");

/*** GESTION DES EQUIPES ***/
Create table equipe (
	idequipe int(3) not null auto_increment,
	nomE varchar(50),
	nomC varchar(50),
	prenomC varchar(50),
	numeroC int(2),
	idcoach int(3) not null,
	primary key(idequipe),
	foreign key(idcoach) references coach(idcoach)
);

insert into equipe values
(null,  "PSG", "Silva", "Thiago", 22, 1), 
(null, "OM", "Payet", "Dimitri", 12, 1);

/*** GESTION DES STADES ***/
Create table stade (
	idstade int(3) not null auto_increment,
	nom varchar(50),
	ville varchar(50),
	idequipe int(3),
	primary key(idstade),
	foreign key(idequipe) references equipe(idequipe)
);

insert into stade values
(null, "Parc des Princes", "Paris", 1), 
(null, "Velodrome", "Marseille", 1);

/*** GESTION DES MATCHS ***/
create table matchs ( 
	idmatchs int(3) not null auto_increment,
	nomdom varchar(50),
	nomext varchar(50),
	dateM date,
	stadeM varchar(50),
	idequipe int(3),
	primary key(idmatchs),
	foreign key(idequipe) references equipe(idequipe)
);

insert into matchs values
(null, "PSG", "OM", "2020-06-06", "Parc des Princes", 1), 
(null, "OM", "Lyon", "2020-07-06", "Velodrome", 1);