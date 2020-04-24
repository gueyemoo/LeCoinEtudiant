<?php
include_once("../modele/DAO.class.php");

//Recupere les types d'annonces possibles
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

//Recupere les départements de France
$departements = $dao->getAllNomDepartement();

$date1 = date('Y-m-d h:i:s a'); // Date du jour
setlocale(LC_TIME, "fr_FR", "French");
$dateHeuredajout = strftime("%A %d %B %G %T", strtotime($date1));


//Verifie que les champs de $_POST sont bien rempli
if((count($_POST)>=6 &&$_POST["titre"] && $_POST["contenu"] && $_POST["adresse"])){
  //Affecte à $id un identifiant unique après l'ajout de la randonnées, permettant d'identifier la randonnée ajouté.
  //et ajoute une randonnee


  $id = $dao->addAnnonce($client->id,$_POST["type"],$_POST["categorie"],$_POST["sousCategorie"],$_POST['titre'],$_POST["contenu"],$_POST['adresse'],0,0,$_POST['departement'],$_POST['datePrevu'],$_POST['heurePrevu'],$dateHeuredajout);

  //Verifie qu'il y a bien eu envoie du formulaire
  if(isset($_POST['submit'])){
    //Recupere le nom de l'image
    $name       = $_FILES['image']['name'];
    $temp_name  = $_FILES['image']['tmp_name'];
    //Verifie que le nom de l'image n'est pas vide
    if(isset($name) and !empty($name)){
      $location = '../modele/data/upload/'; //Defini la localisation du dossier ou mettre l'image

      $temp = explode(".", $temp_name); //Separe le nom de l'image à l'extension
      $newfilename = $id . '.' . 'jpg'; //Renomme l'image upload par l'id de l'a randonnee ajouté
      if(move_uploaded_file($temp_name, $location.$newfilename)){ //Deplace l'image ajouté vers le dossier d'image

        // echo "<br>";
        // echo 'votre importation a marcher';
      }
    } else {
      // echo "<br>";
      // echo 'Selectionner un fichier dabord !!';
    }
  }
  //Renvoie vers la page des randonnees après l'ajout
  // header('Location: randonnees.ctrl.php?duree=toutesDurees&diff=toutesDiff&lieu=toutLieux');
}









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
