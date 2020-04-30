<?php
// require_once('../modele/ProduitclassDAO.php');// inclus la class Produit DAO
include_once("../modele/DAO.class.php");

$id = $_GET['id']??1;

$action=$_GET['actionAnn']??'';//On verifie que l'action n'est pas vide sinon on lui affecte ' '(vide)

$id=max(($_GET['id']??1),1);
$id=min($id,$dao->nbAnnonce());
$annonce = $dao->getAnnonceById($id); //On recupere l'annonce depuis son identifiant

// var_dump($annonce->categorie);
$cat = $dao->getCategorieById($annonce->categorie);
$user = $dao->getClient($annonce->idClient);
// $firstId=$_GET['firstId']??1;



if($idClient){
  $Favoris=$dao->isFavoris($idClient,$id);//On verifie que l'annonce est dans la liste des favoris
  $Interesse=$dao->isInteresse($idClient,$id); // On verifie que l'annonce est dans la liste des interesses
}

if (count($_POST)==2 && $_POST["email"] && $_POST["password"]) {
  if($dao->connexion($_POST["email"], $_POST["password"])) {
    header("Refresh:0");
    include('../vue/AnnonceDetailview.php');
  }
  else {
    $echecConnexion=1;
    include('../vue/AnnonceDetailview.php');
  }
}
else {
  include('../vue/AnnonceDetailview.php');
}
?>
