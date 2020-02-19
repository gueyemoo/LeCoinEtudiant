 <?php
include_once("../modele/DAO.class.php");

$code=$_GET['code']??0;
$codeIncorrect=0;//aucun probleme pour le moment
// $codeCorrect_hash=$clientConnecte?(hash('sha256',$client->id.$client->email)):"";
// $codeCorrect= substr($codeCorrect_hash, 0, 5);

// if ($clientConnecte&&$code&&!$clientVerifie){
//   //Si client connecté , fournit un code et n'est pas encore vérifié
//     if($dao->setEmailVerfie($_SESSION['Client']->id,$code)){
//       //si c'est le bon redirection vers le profil
//       header("Location:../controler/profil.ctrl.php");
//     }else{
//       //sinon renvoi vers la page de verif
//       $codeIncorrect=1;
//       include("../view/afficherVerificationEmail.php");
//     }
//
// }elseif (!$clientConnecte) {
//   //si pas connecté on l'envoi vers se connecters
//   header("Location:../controler/seConnecter.ctrl.php");
//
// }elseif ($clientConnecte&&$clientVerifie) {
//   //si connecté et vérifié -> son profil
//   header("Location:../controler/profil.ctrl.php");
//
// }elseif ($clientConnecte&&!$clientVerifie) {
//   //si client connecté et pas encore verfié
//   include("../view/afficherVerificationEmail.php");
//
// }else{
//   $codeIncorrect=1;
//   include("../view/afficherVerificationEmail.php");
// }

include("../vue/VerificationEmailview.php")
 ?>
