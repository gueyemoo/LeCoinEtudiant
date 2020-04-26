<?php
// require_once('../modele/ProduitclassDAO.php');// inclus la class Produit DAO
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

//Recupere les départements de France
$departements = $dao->getAllNomDepartement();

if(!isset($_GET["type"])) {
  //premier acces a la page : 0 filtre
  $annoncesPostees = $dao->getAnnonces();

} else if (isset($_GET["sousCategorie"])) {
  //applications de filtres, on regarde si une sousCat est choisie
  //appel fonction DAO filtres, ici une categorie et/ou une souscat est choisie
  $annoncesPostees = $dao->getAnnoncesFiltre($_GET["type"], $_GET["categorie"], $_GET["sousCategorie"], $_GET["dep"], $_GET["date"]);
} else {
  //appel fonction filtres avec valeur par defaut en param sousCat
  //ici pas de categorie et donc aucune sousCat n'est choisie
  $annoncesPostees = $dao->getAnnoncesFiltre($_GET["type"], $_GET["categorie"], 0, $_GET["dep"], $_GET["date"]);
}


$types = $dao->getTypes();

//Recupere les catégories d'annonces possible d'un types
$categoriesSports = $dao->getCategoriesSports();

//Recupere les sous catégorie du Sports
$athletismes = $dao->getSousCategoriesAthletisme();
$SportCollectifs = $dao->getSousCategoriesSportCollectif();
$Cyclisme = $dao->getSousCategoriesCyclisme();
$SportCible = $dao->getSousCategoriesSportCible();
$SportGlisse = $dao->getSousCategoriesSportGlisse();
$SportNautique = $dao->getSousCategoriesSportNautique();
$SportCombats = $dao->getSousCategoriesSportCombat();
$SportRaquette = $dao->getSousCategoriesSportRaquette();
$SportAutre = $dao->getSousCategoriesAutres();


if (count($_POST)==2 && $_POST["email"] && $_POST["password"]) {
  if($dao->connexion($_POST["email"], $_POST["password"])) {
    header("Refresh:0");
    include('../vue/Annoncesview.php');
  }
  else {
    $echecConnexion=1;
    include('../vue/Annoncesview.php');
  }
}
else {
  include('../vue/Annoncesview.php');
}

?>
