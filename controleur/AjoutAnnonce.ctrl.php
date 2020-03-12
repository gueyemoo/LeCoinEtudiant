<?php
include_once("../modele/DAO.class.php");

if (count($_POST)==2 && $_POST["email"] && $_POST["password"]) {
  if($dao->connexion($_POST["email"], $_POST["password"])) {
    include('../vue/AjoutAnnonceview.php');
  }
  else {
    $echecConnexion=1;
    include('../vue/AjoutAnnonceview.php');
  }
}
else {
  include('../vue/AjoutAnnonceview.php');
}
 ?>
