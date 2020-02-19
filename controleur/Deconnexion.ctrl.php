<?php
include_once("../modele/DAO.class.php");

$_SESSION['Connexion'] = false;
$_SESSION = false;

session_destroy();
include('../vue/Accueilview.php');
// include_once("../controleur/Accueil.ctrl.php");

 ?>
