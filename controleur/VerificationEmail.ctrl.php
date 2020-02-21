 <?php
include_once("../modele/DAO.class.php");

$code=$_POST['codeValidation']??0;
$codeIncorrect=0;//Signifie qu'il n'y a pas d'erreur
$codeCorrect_hash=$clientConnecte?(hash('sha256',$client->id.$client->email)):"";
$codeCorrect= substr($codeCorrect_hash, 0, 5);

if ($clientConnecte&&!$clientVerifie){
  //Si client connecté , fournit un code et n'est pas encore vérifié
    if($dao->setEmailVerfie($_SESSION['Client']->id,$code)){
      //si c'est le bon redirection vers le profil
      header("Location:../controleur/Accueil.ctrl.php");
    }else{
      //sinon renvoi vers la page de verif
      $codeIncorrect=1;
      include("../vue/VerificationEmailview.php");
    }

}elseif (!$clientConnecte) {
  //si pas connecté on l'envoi vers se connecters
  header("Location:../controleur/Accueil.ctrl.php");

}elseif ($clientConnecte&&$clientVerifie) {
  //si connecté et vérifié -> son profil
  header("Location:../controleur/Accueil.ctrl.php");

}elseif ($clientConnecte&&!$clientVerifie) {
  //si client connecté et pas encore verfié
  include("../vue/VerificationEmailview.php");

}else{
  // $codeIncorrect=1;
  include("../vue/VerificationEmailview.php");
}
 ?>
