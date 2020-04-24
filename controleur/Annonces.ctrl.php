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

$annoncesPostees = $dao->getAnnonces();
//
// // tout les sports:
// $sports = $dao->getCategorieByIdGlobal(83);
//
// // tout les idpere de sport:
// $categoriesSports = $dao->getCategoriesSports();
//
// // array comportant un array de chaque categories:
// $toutesCategories = $dao->getAllCategorie();

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
    include('../vue/Annoncesview.php');
  }
  else {
    $echecConnexion=1;
    include('../vue/Annoncesview.php');
  }
}
else {
  include('../vue/Annoncesview.php');
  // var_dump($_POST["nom"]);
  // var_dump($_POST);
  // var_dump(count($_POST));
}

?>
