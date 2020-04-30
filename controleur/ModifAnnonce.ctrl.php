<?php
//Inclus le DAO(data object access)
include_once("../modele/DAO.class.php");

//Recupere les données de l'annonces en fonction de l'id en parametre
$annonce = $dao->getAnnonceById($_GET["id"]);

$format_basique = $annonce->datePrevu;
$Date = date("Y-m-d", strtotime($format_basique)); //Cela permet de mettre par défaut la date choisi par l'utilisateur dans le champ en respectant le format de date par défaut accepter

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

//Verifie que les champs de $_POST sont bien rempli
if((count($_POST)>=6 &&$_POST["titre"] && $_POST["contenu"] && $_POST["adresse"])){

  if(!isset($_POST["sousCategorie"])) {
    $_POST["sousCategorie"]= "";
  }

  $datePrevu = $_POST['datePrevu'];
  $newDate = date("d-m-Y", strtotime($datePrevu));

  //Mets à jour une randonnee
  $dao->updateAnnonce($annonce->id,$_POST["type"],$_POST["categorie"],$_POST["sousCategorie"],$_POST['titre'],$_POST["contenu"],$_POST['adresse'],$_POST['departement'],$newDate,$_POST['heurePrevu']);

  //Verifie qu'il y a bien eu envoie du formulaire
  if(isset($_POST['updatesubmit'])){
    //Recupere le nom de l'image
    $name       = $_FILES['image']['name'];
    $temp_name  = $_FILES['image']['tmp_name'];
    //Verifie que le nom de l'image n'est pas vide
    if(isset($name) and !empty($name)){
      $location = '../modele/data/upload/'; //Defini la localisation du dossier ou mettre l'image

      $temp = explode(".", $temp_name); //Separe le nom de l'image à l'extension
      $newfilename = $annonce->id . '.' . 'jpg'; //Renomme l'image upload par l'id de l'a randonnee ajouté
      if(move_uploaded_file($temp_name, $location.$newfilename)){ //Deplace l'image ajouté vers le dossier d'image

        // echo "<br>";
        // echo 'votre importation a marcher';
      }
    } else {
      // echo "<br>";
      // echo 'Selectionner un fichier dabord !!';
    }
  }
  //Renvoie vers la page de la randonnee concerner après la mise à jour de ces informations
  // header("Location: ../controleur/AnnonceDetail.ctrl.php?id=$annnonce->id");
}
include('../vue/ModifAnnonceview.php');
?>
