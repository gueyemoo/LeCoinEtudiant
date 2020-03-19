<?php
include_once("../modele/DAO.class.php");

function getCategorie($idAnnonce, $dao) {
  $categorie = $dao->getCategorie($idAnnonce);
  return $categorie;
}

function getAdresse($idAnnonce, $dao) {
  $addr = $dao->getAdresse($idAnnonce);
  return $addr;
}

function getDateAnnonce($idAnnonce, $dao) {
  $date = $dao->getDateAnnonce($idAnnonce);
  return $date;
}

function getHeure($idAnnonce, $dao) {
  $heure = $dao->getHeure($idAnnonce);
  return $heure;
}
// var_dump($_SESSION['Client']->id);
$annoncesPostees = $dao->getAnnoncesClient($_SESSION['Client']->id);

$annoncesFavoris = $dao->getAnnoncesFav($_SESSION['Client']->id);

$annnoncesInteresse = $dao->getAnnoncesInteresse($_SESSION['Client']->id);

if (count($_POST)==2 && $_POST["email"] && $_POST["password"]) {
  if($dao->connexion($_POST["email"], $_POST["password"])) {
    header("Refresh:0");
    include('../vue/Profilview.php');
  }
  else {
    $echecConnexion=1;
    include('../vue/Profilview.php');
  }
}
else {
  include('../vue/Profilview.php');
}


?>
