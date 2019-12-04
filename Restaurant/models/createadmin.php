<?php

require("../config/connexion.php");
$bdd=bd_connect();
$email='noemie@mercier.fr';
$mdp=password_hash("bonzour",PASSWORD_DEFAULT);
$nom='Mercier';
$prenom='Noemie';

$query=$bdd->prepare("INSERT INTO `ADMIN`(`email`, `mdp`, `nom`, `prenom`) VALUES (?,?,?,?)");
$query->execute(array($email,$mdp,$nom,$prenom));
$query->errorInfo();

