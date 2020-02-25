<?php
// require_once('../modele/ProduitclassDAO.php');// inclus la class Produit DAO
include_once("../modele/DAO.class.php");


if((count($_POST)==6 &&$_POST["nom"] && $_POST["prenom"] && $_POST["mail"] && $_POST["pass"] && $_POST["pass2"])){
//   On verifie que les deux mots de passes sont bien les meme   //
        if($_POST["pass"] === $_POST["pass2"]){
          //construction du Client
                if($dao->addClient($_POST["nom"] ,$_POST["prenom"] ,$_POST["mail"] ,$_POST["pass"])){
                  include('../vue/Inscriptionview.php');

                }else{
                  //L'ajout est toujuours possible sauf si la contrainte email unique est levée
                  $mailDejaUtilisé=1;
                  include('../vue/Inscriptionview.php');

                }
        }else {
          //si les deux mots de passe ne sont pas les memes
          $motDePasseDifférent=1;
          include('../vue/Inscriptionview.php');
        }
}
else if (count($_POST)==2 && $_POST["email"] && $_POST["password"]) {
  if($dao->connexion($_POST["email"], $_POST["password"])) {
    header("Refresh:0");
    include('../vue/Inscriptionview.php');
  }
  else {
    $echecConnexion=1;
    include('../vue/Inscriptionview.php');
  }
}
else {
  include('../vue/Inscriptionview.php');
  // var_dump($_POST["nom"]);
  // var_dump($_POST);
  // var_dump(count($_POST));

}


?>
