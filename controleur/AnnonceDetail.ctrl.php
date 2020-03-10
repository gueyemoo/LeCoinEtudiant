<?php
// require_once('../modele/ProduitclassDAO.php');// inclus la class Produit DAO
include_once("../modele/DAO.class.php");

$id = $_GET['id']??1;

$id=max(($_GET['id']??1),1);
$id=min($id,$dao->nbAnnonce());
$annonce = $dao->getAnnonceById($id); //On recupere l'identifiant de l'annonce

// var_dump($annonce->categorie);
$cat = $dao->getCategorieById($annonce->categorie);
$user = $dao->getClient($annonce->idClient);
// $firstId=$_GET['firstId']??1;
// var_dump($annonce);
// var_dump($cat);
// var_dump($cat->nom);




include('../vue/AnnonceDetailview.php');
?>
