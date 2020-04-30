<?php
require_once('../modele/DAO.class.php');

$idAnnonce=$_GET['id']??0;//On verifie que l'id de l'annonce n'est pas vide sinon il vaut 0 et on le recupere
$action=$_GET['actionAnn']??'';//On verifie que l'action n'est pas vide sinon on lui affecte ' '(vide)

  if ($idAnnonce && $idClient) {
    if ($action=='delete') { //Si l'action dans l'url vaut delete
      $dao->deleteAnnonce($idAnnonce); //On supprime l'annonce via son id
    }
  }

header("Location: ../controleur/Profil.ctrl.php?annonces=part");//On redirige vers la page du profil de l'utilisateur.

?>
