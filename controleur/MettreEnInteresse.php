<?php
require_once('../modele/DAO.class.php');

$idAnnonce=$_GET['idAnnonce']??0;//On verifie que l'id de l'annonce n'est pas vide sinon il vaut 0
$action=$_GET['action']??'';//On verifie que l'action n'est pas vide sinon on lui affecte ' '(vide)

if ($idAnnonce && $idClient) {
  if ($action=='add') { //Si l'action dans l'url vaut add
    $dao->ajoutInteresse($idClient,$idAnnonce);//On ajoute l'id du client et l'id du produit dans une liste de favoris.
    $dao->updateAddNbInteresse($idAnnonce);

  }elseif ($action=='delete') {//Si l'action dans l'url vaut delete
    $dao->deleteInteresse($idClient,$idAnnonce);//On supprime l'id du client et l'id du produit de la liste des favoris.
    $dao->updateDeleteNbInteresse($idAnnonce);

  }else {
    print("Action Erroné");
  }
}
header("Location: ../controleur/AnnonceDetail.ctrl.php?id=$idAnnonce");//On redirige vers la page du produit détaillé avec l'identifiant du produit correspondant.

 ?>
