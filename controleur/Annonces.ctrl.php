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

$annoncesPostees = $dao->getAnnonces();


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
  // var_dump($_POST["nom"]);
  // var_dump($_POST);
  // var_dump(count($_POST));

}


?>
