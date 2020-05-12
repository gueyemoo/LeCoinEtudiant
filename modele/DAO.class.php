<?php
require_once('../modele/Client.class.php');
require_once('../modele/Annonce.class.php');
require_once('../modele/Categorie.class.php');
require_once('../modele/Departement.class.php');

class DAO
{
  private $db;

  function __construct()
  {
    try {
      $this->db = new PDO('sqlite:../modele/data/data.db');
    } catch (Exception $e) {
      die("erreur de connexion:".$e->getMessage());
    }


  }

  //------------------------------------------------------------------------//
  //--------------------   FONCTIONS POUR LES CLIENTS   --------------------//
  //------------------------------------------------------------------------//
  function get(int $id):Client{//On récupere l'identifiant
    $requ="SELECT * FROM Client WHERE id='$id'";
    $res = $this->db->query($requ);
    $result = $res->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Client");
    return $result[0];
  }

  function connexion($email, $pass) : bool {
    $pass=hash("sha256", $pass);
    $requeteSQLmdp = "SELECT motdepasse FROM client WHERE email =\"$email\""; //récupération du mdp avec email
    $retour=$this->db->query($requeteSQLmdp);
    if ($retour) {  //si requete a aboutie, alors email existe
      $mdp = $retour->fetch()[0];
      if ($pass == $mdp) {  // vérification du mdp saisie avec celui de la base de données
        $requeteSQLid = "SELECT id FROM client WHERE email =\"$email\""; //recupération de l'id du client
        $retour=$this->db->query($requeteSQLid);
        $id = $retour->fetch()[0];
        $Client = $this->getClient($id);
        $_SESSION['Client'] = $Client;  //ouverture de la session du client
        $_SESSION['Connexion'] = true;
        return true;
      }
    }
    return false; //la requete n'a pas aboutie, email ou mdp incorrect
  }




  function getAllClient() : array {
    //   RENVOIES TOUT LES CLIENTS DE LA BASE DE DONNEE   //
    $tableau_retour = array();
    $requeteSQL = 'SELECT * FROM client';
    $reponseDeRequete=$this->db->query($requeteSQL);
    $tableau_retour= $reponseDeRequete->fetchAll(PDO::FETCH_CLASS,"Client");
    return $tableau_retour;
  }

  function getClient($id) : Client {
    //   RENVOIE LE CLIENT AYANT L'ID DEMANDEE   //
    $requeteSQL = "SELECT * FROM client WHERE id =$id";
    $reponseDeRequete=$this->db->query($requeteSQL);
    $Client = $reponseDeRequete->fetchAll(PDO::FETCH_CLASS,"Client");
    return $Client[0];
  }

  function addClient(string $nom, string $prenom , string $email, string $pass) : bool {
    //   AJOUTE UN CLIENT DANS LA BASE DE DONNEE   //
    if($nom&&$prenom&&$email&&$pass){ //verifie que tous les arguments ont une valeur
      //recuperation de l'id du client
      $requeteSQL = 'SELECT max(id) FROM client';
      $reponseDeRequete=$this->db->query($requeteSQL);
      $max= $reponseDeRequete->fetch()[0];
      $idClient= intval($max)+1;
      //hash du pass pour le stockage
      $pass=hash("sha256",$pass);

      //insertion du client dans la base
      $requeteSQL = "INSERT INTO client VALUES ($idClient,'$nom','$prenom','$email','$pass',0)";
      $retour=$this->db->query($requeteSQL);

      //AJOUT SESSION
      if($retour){
        //si l'ajout c'est bien passé , contrainte email unique
        $Client = $this->getClient($idClient);
        $_SESSION['Client'] = $Client;
        $_SESSION['Connexion'] = true;
        $code_hash=hash('sha256',$Client->id.$Client->email);
        $code= substr($code_hash, 0, 5);



        // Mail html
        $headers = 'From: lecoinetudiant2020@gmail.com' . "\r\n" .
        'MIME-Version: 1.0' . "\r\n" .
        'Content-Type: text/html; charset=utf-8';
        $to      = $Client->email;
        $subject = 'Vérification de votre email LeCoinEtudiant';
        $message_html ='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="format-detection" content="telephone=no" />
        <title> Mail de verification LeCoinEtudiant</title>
        <style type="text/css">
        html { background-color:#E1E1E1; margin:0; padding:0; }
        body, #bodyTable, #bodyCell, #bodyCell{height:100% !important; margin:0; padding:0; width:100% !important;font-family:"Roboto", Roboto, "Segoe UI", Helvetica, Arial, "Lucida Grande", sans-serif;}
        table{border-collapse:collapse;}
        table[id=bodyTable] {width:100%!important;margin:auto;max-width:500px!important;color:#7A7A7A;font-weight:normal;}
        img, a img{border:0; outline:none; text-decoration:none;height:auto; line-height:100%;}
        a {text-decoration:none !important;border-bottom: 1px solid;}
        h1, h2, h3, h4, h5, h6{color:#5F5F5F; font-weight:normal; font-family:Helvetica; font-size:20px; line-height:125%; text-align:Left; letter-spacing:normal;margin-top:0;margin-right:0;margin-bottom:10px;margin-left:0;padding-top:0;padding-bottom:0;padding-left:0;padding-right:0;}

        .ReadMsgBody{width:100%;} .ExternalClass{width:100%;}
        .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div{line-height:100%;}
        table, td{mso-table-lspace:0pt; mso-table-rspace:0pt;}
        #outlook a{padding:0;}
        img{-ms-interpolation-mode: bicubic;display:block;outline:none; text-decoration:none;}
        body, table, td, p, a, li, blockquote{-ms-text-size-adjust:100%; -webkit-text-size-adjust:100%; font-weight:normal!important;}
        .ExternalClass td[class="ecxflexibleContainerBox"] h3 {padding-top: 10px !important;}
        h1{display:block;font-size:26px;font-style:normal;font-weight:normal;line-height:100%;}
        h2{display:block;font-size:20px;font-style:normal;font-weight:normal;line-height:120%;}
        h3{display:block;font-size:17px;font-style:normal;font-weight:normal;line-height:110%;}
        h4{display:block;font-size:18px;font-style:italic;font-weight:normal;line-height:100%;}
        .flexibleImage{height:auto;}
        .linkRemoveBorder{border-bottom:0 !important;}
        table[class=flexibleContainerCellDivider] {padding-bottom:0 !important;padding-top:0 !important;}
        body, #bodyTable{background-color:#E1E1E1;}
        #emailHeader{background-color:#E1E1E1;}
        #emailBody{background-color:#FFFFFF;}
        #emailFooter{background-color:#E1E1E1;}
        .nestedContainer{background-color:#F8F8F8; border:1px solid #CCCCCC;}
        .emailButton{background-color:#222; border-collapse:separate;}
        .buttonContent{color:#FFFFFF; font-family:Helvetica; font-size:18px; font-weight:bold; line-height:100%; padding:15px; text-align:center;}
        .buttonContent a{color:#FFFFFF; display:block; text-decoration:none!important; border:0!important;}
        .emailCalendar{background-color:#FFFFFF; border:1px solid #CCCCCC;}
        .emailCalendarMonth{background-color:#222; color:#FFFFFF; font-family:Helvetica, Arial, sans-serif; font-size:16px; font-weight:bold; padding-top:10px; padding-bottom:10px; text-align:center;}
        .emailCalendarDay{color:#222; font-family:Helvetica, Arial, sans-serif; font-size:60px; font-weight:bold; line-height:100%; padding-top:20px; padding-bottom:20px; text-align:center;}
        .imageContentText {margin-top: 10px;line-height:0;}
        .imageContentText a {line-height:0;}
        #invisibleIntroduction {display:none !important;}
        span[class=ios-color-hack] a {color:#275100!important;text-decoration:none!important;}
        span[class=ios-color-hack2] a {color:#205478!important;text-decoration:none!important;}
        span[class=ios-color-hack3] a {color:#8B8B8B!important;text-decoration:none!important;}
        .a[href^="tel"], a[href^="sms"] {text-decoration:none!important;color:#606060!important;pointer-events:none!important;cursor:default!important;}
        .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {text-decoration:none!important;color:#606060!important;pointer-events:auto!important;cursor:default!important;}
        @media only screen and (max-width: 480px){
          body{width:100% !important; min-width:100% !important;}
          table[id="emailHeader"],
          table[id="emailBody"],
          table[id="emailFooter"],
          table[class="flexibleContainer"],
          td[class="flexibleContainerCell"] {width:100% !important;}
          td[class="flexibleContainerBox"], td[class="flexibleContainerBox"] table {display: block;width: 100%;text-align: left;}
          td[class="imageContent"] img {height:auto !important; width:100% !important; max-width:100% !important; }
          img[class="flexibleImage"]{height:auto !important; width:100% !important;max-width:100% !important;}
          img[class="flexibleImageSmall"]{height:auto !important; width:auto !important;}
          table[class="flexibleContainerBoxNext"]{padding-top: 10px !important;}

          table[class="emailButton"]{width:100% !important;}
          td[class="buttonContent"]{padding:0 !important;}
          td[class="buttonContent"] a{padding:15px !important;}

        }


        @media only screen and (-webkit-device-pixel-ratio:.75){
        }

        @media only screen and (-webkit-device-pixel-ratio:1){
        }

        @media only screen and (-webkit-device-pixel-ratio:1.5){
        }
        @media only screen and (min-device-width : 320px) and (max-device-width:568px) {
        }
        </style>
        </head>
        <body bgcolor="#FFF" leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">

        <center style="background-color:#E1E1E1;">
        <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable" style="table-layout: fixed;max-width:100% !important;width: 100% !important;min-width: 100% !important;">
        <tr>
        <td align="center" valign="top" id="bodyCell">

        <table bgcolor="#E1E1E1" border="0" cellpadding="0" cellspacing="0" width="500" id="emailHeader">

        <tr>
        <td align="center" valign="top">
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
        <td align="center" valign="top">
        <table border="0" cellpadding="10" cellspacing="0" width="500" class="flexibleContainer">
        <tr>
        <td valign="top" width="500" class="flexibleContainerCell">
        <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
        <td align="left" valign="middle" id="invisibleIntroduction" class="flexibleContainerBox" style="display:none !important; mso-hide:all;">
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:100%;">
        <tr>
        <td align="left" class="textContent">
        <div style="font-family:Helvetica,Arial,sans-serif;font-size:13px;color:#828282;text-align:center;line-height:120%;">
        Le Coin Etudiant
        </div>
        </td>
        </tr>
        </table>
        </td>
        <td align="right" valign="middle" class="flexibleContainerBox">
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:100%;">
        <tr>
        <td align="left" class="textContent">
        <div style="font-family:Helvetica,Arial,sans-serif;font-size:13px;color:#828282;text-align:center;line-height:120%;">
        If you cant see this message, <a href="#" target="_blank" style="text-decoration:none;border-bottom:1px solid #828282;color:#828282;"><span style="color:#828282;">view&nbsp;it&nbsp;in&nbsp;your&nbsp;browser</span></a>.
        </div>
        </td>
        </tr>
        </table>
        </td>
        </tr>
        </table>
        </td>
        </tr>
        </table>
        </td>
        </tr>
        </table>
        </td>
        </tr>
        </table>
        <table bgcolor="#FFFFFF"  border="0" cellpadding="0" cellspacing="0" width="500" id="emailBody">
        <tr>
        <td align="center" valign="top">
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="color:#FFFFFF;" bgcolor="#222">
        <tr>
        <td align="center" valign="top">
        <table border="0" cellpadding="0" cellspacing="0" width="500" class="flexibleContainer">
        <tr>
        <td align="center" valign="top" width="500" class="flexibleContainerCell">
        <table border="0" cellpadding="30" cellspacing="0" width="100%">
        <tr>
        <td align="center" valign="top" class="textContent">
        <h1 style="color:#FFFFFF;line-height:100%;font-family:Helvetica,Arial,sans-serif;font-size:35px;font-weight:normal;margin-bottom:5px;text-align:center;">Le Coin Etudiant</h1>
        <h2 style="text-align:center;font-weight:normal;font-family:Helvetica,Arial,sans-serif;font-size:23px;margin-bottom:10px;padding-top:5px;color:#BBB;line-height:135%;">Confirmation d\'email</h2>
        </td>
        </tr>
        </table>
        </td>
        </tr>
        </table>
        </td>
        </tr>
        </table>
        </td>
        </tr>
        <tr>
        <td align="center" valign="top">
        <table border="0" cellpadding="0" cellspacing="0" width="100%" bgcolor="#F8F8F8">
        <tr>
        <td align="center" valign="top">
        <table border="0" cellpadding="0" cellspacing="0" width="500" class="flexibleContainer">
        <tr>
        <td align="center" valign="top" width="500" class="flexibleContainerCell">
        <table border="0" cellpadding="30" cellspacing="0" width="100%">
        <tr>
        <td align="center" valign="top">
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
        <td valign="top" class="textContent">
        <h3 mc:edit="header" style="color:#5F5F5F;line-height:125%;font-family:Helvetica,Arial,sans-serif;font-size:20px;font-weight:normal;margin-top:0;margin-bottom:3px;text-align:center;">Activer votre compte</h3>
        <div mc:edit="body" style="text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;color:#5F5F5F;line-height:135%;">Afin de vérifier votre email et ainsi activer votre compte veuillez copier le code ci-dessous: </div>
        </td>
        </tr>
        </table>
        </td>
        </tr>
        </table>
        </td>
        </tr>
        </table>
        </td>
        </tr>
        </table>
        </td>
        </tr>
        <tr>
        <td align="center" valign="top">
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
        <td align="center" valign="top">
        <table border="0" cellpadding="30" cellspacing="0" width="500" class="flexibleContainer">
        <tr>
        <td style="padding-top:0;" align="center" valign="top" width="500" class="flexibleContainerCell">
        <table align="center" border="0" cellpadding="0" cellspacing="0" class="flexibleContainer">
        <tr>
        <td align="center" valign="top" class="textContent">
        <div style="text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:3em;margin-bottom:0;margin-top:10px;color:#5F5F5F;line-height:135%;">'.$code.'</div>
        </td>
        </tr>
        </table>
        </td>
        </tr>
        </table>
        </td>
        </tr>
        </table>
        </td>
        </tr>
        <tr>
        <td align="center" valign="top">
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr style="padding-top:0;">
        <td align="center" valign="top">
        <table border="0" cellpadding="30" cellspacing="0" width="500" class="flexibleContainer">
        <tr>
        <td style="padding-top:0;" align="center" valign="top" width="500" class="flexibleContainerCell">
        <table border="0" cellpadding="0" cellspacing="0" width="50%" class="emailButton" style="background-color: #3498DB;">
        <tr>
        <td align="center" valign="middle" class="buttonContent" style="padding-top:15px;padding-bottom:15px;padding-right:15px;padding-left:15px;">
        <a style="color:#FFFFFF;text-decoration:none;font-family:Helvetica,Arial,sans-serif;font-size:20px;line-height:135%;" href="#" target="_blank">Confirmation</a>
        </td>
        </tr>
        </table>
        </td>
        </tr>
        </table>
        </td>
        </tr>
        </table>
        </td>
        </tr>
        <tr>
        <td align="center" valign="top">
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
        <td align="center" valign="top">
        <table border="0" cellpadding="0" cellspacing="0" width="500" class="flexibleContainer">
        <tr>
        <td align="center" valign="top" width="500" class="flexibleContainerCell">
        <table border="0" cellpadding="30" cellspacing="0" width="100%">
        <tr>
        <td align="center" valign="top">
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
        <td valign="top" class="textContent">
        <div style="text-align:center;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;margin-top:3px;color:#5F5F5F;line-height:135%;">Sans activation votre compte est valable pour une durée de 3 jours</div>
        </td>
        </tr>
        </table>
        </td>
        </tr>
        </table>
        </td>
        </tr>
        </table>
        </td>
        </tr>
        </table>
        </td>
        </tr>
        </table>
        <table bgcolor="#E1E1E1" border="0" cellpadding="0" cellspacing="0" width="500" id="emailFooter">
        <td align="center" valign="top">
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
        <td align="center" valign="top">
        <table border="0" cellpadding="0" cellspacing="0" width="500" class="flexibleContainer">
        <tr>
        <td align="center" valign="top" width="500" class="flexibleContainerCell">
        <table border="0" cellpadding="30" cellspacing="0" width="100%">
        <tr>
        <td valign="top" bgcolor="#E1E1E1">
        <div style="font-family:Helvetica,Arial,sans-serif;font-size:13px;color:#828282;text-align:center;line-height:120%;">
        <div>Copyright &#169; 2020 <a href="http://localhost/lecoinetudiant/" target="_blank" style="text-decoration:none;color:#828282;"><span style="color:#828282;">Le Coin Etudiant</span></a>. All&nbsp;rights&nbsp;reserved.</div>
        </div>
        </td>
        </tr>
        </table>
        </td>
        </tr>
        </table>
        </td>
        </tr>
        </table>
        </td>
        </tr>
        </table>
        </td>
        </tr>
        </table>
        </center>
        </body>
        </html>
        ';
        $message = $message_html;
        $message .= "\n\n";



        // $to       = 'lecoinetudiant2020@gmail.com';
        // $subject  = 'Testing sendmail.exe';
        // $message  = 'COUCOU, STP MARCHE ! ';
        // $headers  = 'From: lecoinetudiant2020@gmail.com' . "\r\n" .
        // 'MIME-Version: 1.0' . "\r\n" .
        // 'Content-type: text/html; charset=utf-8';

        mail($to, $subject, $message, $headers);
        // if(mail($to, $subject, $message, $headers))
        // echo "Email sent";
        // else
        // echo "Email sending failed";
        header("Location:../controleur/VerificationEmail.ctrl.php");



        // $resultatmail = mail("babsyou@gmail.com", $subject, "je teste", $headers);
        // $resultatmail  = mail("babsyou@gmail.com", "Hello World", "This is email body", $headers);
        //
        // var_dump('retour email:');
        // var_dump($resultatmail);

      }
    }
    return (bool)$retour;// renvoi vrai si il est ajouté et faux sinon ( le sinon correspond a la contrainte email unique)
    // var_dump($retour);
  }


  function setEmailVerfie(int $id,string $code){
    $retour=true;
    //verifie si une session est demarrée
    $clientConnecte=(bool)$_SESSION['Client']??false;

    if ($clientConnecte && $_SESSION['Client']->emailVerifie==false){ //si client connécté et email pas verfié

      $client=$_SESSION['Client'];

      $codeCorrect_Hash=$clientConnecte?(hash('sha256',$client->id.$client->email)):"";
      $codeCorrect= substr($codeCorrect_Hash, 0, 5);

      if($code==$codeCorrect){   //si c'est le bon code//
        $requeteSQL = "UPDATE client SET emailVerifie=1 WHERE id=$id"; //update de la base
        $reponseDeRequete=$this->db->query($requeteSQL);
        $_SESSION['Client']->emailVerifie=true;   //update de la session
      }else{
        $retour=false;
      }

      return $retour;
    }
  }

  //------------------------------------------------------------------------//
  //--------------------   FONCTIONS POUR LES ANNONCES  --------------------//
  //------------------------------------------------------------------------//

  function getAnnonceById(int $id): Annonce{//On récupere l'identifiant
    $requ="SELECT * FROM annonce WHERE id='$id'";
    $res = $this->db->query($requ);
    $result = $res->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Annonce");

    return $result[0];
  }

  function getAnnonces(): array {
    // retourne les annonces postées
    $tab_retour = array();
    $requeteSQL = "SELECT * FROM annonce";
    $retourRequete = $this->db->query($requeteSQL);
    $tab_retour = $retourRequete->fetchAll(PDO::FETCH_CLASS, "Annonce");
    return $tab_retour;
  }

  function getLast14Annonces():array {
    // retourne les 14 derières annonces postée
    $tab_retour = array();
    $requeteSQL = "SELECT * FROM annonce ORDER BY dateHeure DESC LIMIT 14;";
    $retourRequete = $this->db->query($requeteSQL);
    $tab_retour = $retourRequete->fetchAll(PDO::FETCH_CLASS, "Annonce");
    return $tab_retour;
  }


  function getAnnoncesFiltre($type, $cat, $sousCat, $dep, $date, $ordre) {
    if ($type == "0") {
      $reqType = " ";
    } else {
      $reqType = " and type= \"$type\" ";
    }
    if ($cat == "0") {
      $reqCat = " ";
    } else {
      $reqCat = " and categorie = \"$cat\" ";
    }
    if ($sousCat == "0") {
      $reqSousCat = " ";
    } else {
      $reqSousCat = " and sousCategorie = \"$sousCat\" ";
    }
    if ($dep == "") {
      $reqDep = " ";
    } else {
      $reqDep = " and departement = \"$dep\" ";
    }
    if ($date == "") {
      $reqDate = " ";
    } else {
      $reqDate = " and datePrevu = \"$date\" ";
    }
    if ($ordre == "moinsD") {
      $reqOrdre = " ORDER BY dateHeure ASC";
    } else if ($ordre == "plusD") {
      $reqOrdre = " ORDER BY dateHeure DESC";
    } else if ($ordre == "moinsP") {
      $reqOrdre = " ORDER BY nbParticipant ASC, nbInteresse ASC";
    } else if ($ordre == "plusP") {
      $reqOrdre = " ORDER BY nbParticipant DESC, nbInteresse DESC";
    }

    $requete = "SELECT * FROM annonce WHERE 1".$reqType.$reqCat.$reqSousCat.$reqDep.$reqDate.$reqOrdre;
    $res = $this->db->query($requete);
    $resultat = $res->fetchAll(PDO::FETCH_CLASS, "Annonce");
    return $resultat;
  }

  function nbAnnonce():int{//Cette fonction nous permets de compter toute les annonces
    $requ="SELECT count(*) FROM annonce";
    $res = $this->db->query($requ);
    $result = $res->fetch();
    return $result[0];
  }

  function getAnnoncesCategorie($idCategorie): array {
    $tab_retour = array();
    $requeteSQL = "SELECT * FROM annonce WHERE categorie=$idCategorie";
    $retourRequete = $this->db->query($requeteSQL);
    $tab_retour = $retourRequete->fetchAll(PDO::FETCH_CLASS, "Annonce");
    return $tab_retour;
  }


  function getCategorie($idAnnonce): string { //renomme la getCategorieAnnonce sinon on s'y retrouve plus avec le getCategorie des catégories..
    // retourne la categorie de l'annonce renseignée en paramètre
    $requeteSQL = "SELECT categorie FROM annonce WHERE id = $idAnnonce";
    $retour = $this->db->query($requeteSQL);
    $categorie = $retour->fetch()[0];
    return $categorie;
  }

  function getAdresse($idAnnonce): string {
    // retourne l'adresse de l'annonce renseignée en paramètre
    $requeteSQL = "SELECT adresse FROM annonce WHERE id =$idAnnonce";
    $retour = $this->db->query($requeteSQL);
    $addr = $retour->fetch()[0];
    return $addr;
  }

  function getDateAnnonce($idAnnonce): string {
    // retourne la date de l'annonce renseignée en paramètre
    $requeteSQL = "SELECT datePrevu FROM annonce WHERE id =$idAnnonce";
    $retour = $this->db->query($requeteSQL);
    $date = $retour->fetch()[0];
    return $date;
  }

  function getHeure($idAnnonce): string {
    // retourne l'heure de l'annonce renseignée en paramètre
    $requeteSQL = "SELECT dateHeure FROM annonce WHERE id =$idAnnonce";
    $retour = $this->db->query($requeteSQL);
    $heure = $retour->fetch()[0];
    return $heure;
  }

  function getAnnoncesClient($idClient): array {
    // retourne les annonces postées par le client dont l'id est renseigné en paramètre
    $id = (int) $idClient;
    $tab_retour = array();
    $requeteSQL = "SELECT * FROM annonce WHERE idClient =$id";
    $retourRequete = $this->db->query($requeteSQL);
    $tab_retour = $retourRequete->fetchAll(PDO::FETCH_CLASS, "Annonce");
    return $tab_retour;
  }

  function getTypes():array {
    //   ON RECUPERE lES DIFFERENTS TYPES D'ANNONCE POSSIBLE  //
    $requ = 'SELECT DISTINCT * FROM categorie WHERE idTitreGlobal = id ORDER BY idTitreGlobal ASC';
    $res = $this->db->query($requ);
    $result = $res->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Categorie");

    return $result;
  }

  function getCategoriesSports():array {
    //   ON RECUPERE lES DIFFERENTES CATEGORIES D'ANNONCE POSSIBLE POUR UN TYPE  //
    $requ = "SELECT * FROM categorie  WHERE idTitreGlobal = 83 AND idpere = id AND NOT idTitreGlobal = id GROUP BY idpere ORDER BY idTitreGlobal ASC";
    $res = $this->db->query($requ);
    $result = $res->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Categorie");

    return $result;
  }

  function getCategoriesFestif(): array {
    //   ON RECUPERE lES DIFFERENTES CATEGORIES D'ANNONCE POSSIBLE POUR UN TYPE  //
    $requ = "SELECT * FROM categorie  WHERE idTitreGlobal = 84 AND idpere = id AND NOT idTitreGlobal = id GROUP BY idpere ORDER BY idTitreGlobal ASC";
    $res = $this->db->query($requ);
    $result = $res->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Categorie");

    return $result;
  }

  function getCategoriesEducatif(): array {
    //   ON RECUPERE lES DIFFERENTES CATEGORIES D'ANNONCE POSSIBLE POUR UN TYPE  //
    $requ = "SELECT * FROM categorie  WHERE idTitreGlobal = 91 AND idpere = id AND NOT idTitreGlobal = id GROUP BY idpere ORDER BY idTitreGlobal ASC";
    $res = $this->db->query($requ);
    $result = $res->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Categorie");

    return $result;
  }

  function getSousCategoriesAthletisme():array {
    //   ON RECUPERE lES DIFFERENTES OPTIONS D'ATHLETISME POSSIBLE  //
    $requ = "SELECT * FROM categorie  WHERE idpere = 1 AND NOT idpere = id  ORDER BY nom ASC";
    $res = $this->db->query($requ);
    $result = $res->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Categorie");

    return $result;
  }

  function getSousCategoriesSportCollectif():array{
    //   ON RECUPERE lES DIFFERENTES OPTIONS DE SPORT COLLECTIFS  //
    $requ = "SELECT * FROM categorie  WHERE idpere = 22 AND NOT idpere = id  ORDER BY nom ASC";
    $res = $this->db->query($requ);
    $result = $res->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Categorie");

    return $result;
  }

  function getSousCategoriesCyclisme():array{
    //   ON RECUPERE lES DIFFERENTES OPTIONS DE CYCLISME  //
    $requ = "SELECT * FROM categorie  WHERE idpere = 43 AND NOT idpere = id  ORDER BY nom ASC";
    $res = $this->db->query($requ);
    $result = $res->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Categorie");

    return $result;
  }

  function getSousCategoriesSportCible():array{
    //   ON RECUPERE lES DIFFERENTES OPTIONS DE SPORT DE CIBLE  //
    $requ = "SELECT * FROM categorie  WHERE idpere = 47 AND NOT idpere = id  ORDER BY nom ASC";
    $res = $this->db->query($requ);
    $result = $res->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Categorie");

    return $result;
  }

  function getSousCategoriesSportGlisse():array{
    //   ON RECUPERE lES DIFFERENTES OPTIONS DE SPORT DE GLISSE  //
    $requ = "SELECT * FROM categorie  WHERE idpere = 56 AND NOT idpere = id  ORDER BY nom ASC";
    $res = $this->db->query($requ);
    $result = $res->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Categorie");

    return $result;
  }

  function getSousCategoriesSportNautique():array{
    //   ON RECUPERE lES DIFFERENTES OPTIONS DE SPORT NAUTIQUE  //
    $requ = "SELECT * FROM categorie  WHERE idpere = 59 AND NOT idpere = id  ORDER BY nom ASC";
    $res = $this->db->query($requ);
    $result = $res->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Categorie");

    return $result;
  }

  function getSousCategoriesSportCombat():array{
    //   ON RECUPERE lES DIFFERENTES OPTIONS DE SPORT DE COMBAT  //
    $requ = "SELECT * FROM categorie  WHERE idpere = 69 AND NOT idpere = id  ORDER BY nom ASC";
    $res = $this->db->query($requ);
    $result = $res->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Categorie");

    return $result;
  }

  function getSousCategoriesSportRaquette():array{
    //   ON RECUPERE lES DIFFERENTES OPTIONS DE SPORT DE RAQUETTE  //
    $requ = "SELECT * FROM categorie  WHERE idpere = 75 AND NOT idpere = id  ORDER BY nom ASC";
    $res = $this->db->query($requ);
    $result = $res->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Categorie");

    return $result;
  }

  function getSousCategoriesAutres():array{
    //   ON RECUPERE lES DIFFERENTES OPTIONS DES AUTRES SOUS CATEGORIE  //
    $requ = "SELECT * FROM categorie  WHERE idpere = 79 AND NOT nom = 'Autres'   ORDER BY nom ASC";
    $res = $this->db->query($requ);
    $result = $res->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Categorie");

    return $result;
  }

  function addAnnonce(int $idClient,string $type, string $categorie, string $sousCategorie, string $titre, string $contenu, string $adresse, int $nbParticipant, int $nbInteresse, string $departement, string $datePrevu, string $heurePrevu, string $dateHeure) : int{
    //   AJOUTE UNE ANNONCE DANS LA BASE DE DONNEE   //
    $idAnnonce=null;
    if($titre&&$contenu&&$adresse){
      //recupere le prochain id pour la randonnee à ajouter
      $requeteSQL = "SELECT MAX(id) FROM annonce";
      $reponseDeRequete=$this->db->query($requeteSQL);
      $max= $reponseDeRequete->fetch()[0];
      $idAnnonce = intval($max)+1;


      //ajout de l'annonce
      $requeteSQL = "INSERT INTO annonce VALUES ($idAnnonce,$idClient,\"$type\",\"$categorie\",\"$sousCategorie\",\"$titre\",\"$contenu\",\"$adresse\",$nbParticipant,$nbInteresse,\"$departement\",\"$datePrevu\",\"$heurePrevu\",\"$dateHeure\")";
      $retour=$this->db->query($requeteSQL);
    }
    return $idAnnonce; //retourne l'id de l'annonce ajouter
  }

  function updateAnnonce(int $idAnnonce, string $type, string $categorie, string $sousCategorie, string $titre, string $contenu, string $adresse, string $departement, string $datePrevu, string $heurePrevu){
    //   MODIFIE UNE ANNONCE DANS LA BASE DE DONNEE   //
    $requeteSQL = "UPDATE annonce SET type=\"$type\",categorie=\"$categorie\",sousCategorie=\"$sousCategorie\",titre=\"$titre\",contenu=\"$contenu\",adresse=\"$adresse\",departement=\"$departement\",datePrevu=\"$datePrevu\",heurePrevu=\"$heurePrevu\" WHERE id = $idAnnonce";
    $reponseDeRequete=$this->db->query($requeteSQL);
  }

  function deleteAnnonce(int $idAnnonce):bool{
    //   SUPPRIME UNE ANNONCE DANS LA BASE DE DONNEE   //
    $requ="DELETE FROM annonce WHERE id=$idAnnonce";
    $res = $this->db->query($requ);
    $result = $res->fetch();

    //supprime l'image associer
    $imageToDelete = "../modele/data/upload/".$idAnnonce.".jpg";
    unlink($imageToDelete);
    return $result;
  }

  function nombreAnnonce(int $idClient):array{
    //   Compte le nombre d'annonce qu'un client à poster  //
    $requ="SELECT Count(*) FROM annonce WHERE idClient=$idClient";
    $res = $this->db->query($requ);
    $result = $res->fetch();

    return $result;
  }


  //-----------------------------------------------------------------------------//
  //--------------------   FONCTIONS POUR LES DEPARTEMENTS   --------------------//
  //-----------------------------------------------------------------------------//
  function getAllDepartement() : array {
    //   RENVOIES TOUT LES DEPARTEMENTS DE LA BASE DE DONNEE   //
    $tableau_retour = array();
    $tableau_region_dep= array();
    $requeteSQL = "select * from departement order by region_nom";
    $reponseDeRequete=$this->db->query($requeteSQL);
    $tableau_retour= $reponseDeRequete->fetchAll(PDO::FETCH_CLASS,"Departement");
    foreach ($tableau_retour as $key => $value) {
      //reorganisation du tableau pour qu'il contiennent des tableaux de departement dont les clefs sont le nom de leur region
      $tableau_region_dep[$value->region_nom][]=$value;
    }
    return $tableau_region_dep;
  }

  function getAllNomDepartement() : array {

    $requeteSQL = "select departement_nom from departement order by departement_nom asc";
    $reponseDeRequete = $this->db->query($requeteSQL);
    $result = $reponseDeRequete->fetchAll();
    $retour = array();
    foreach ($result as $key => $value) { //Permet que l'array retourné contienne des string
      $retour[]=$value['departement_nom'];
    }
    return $retour;
  }

  function getDepartement($code)  { //Nous avons enlevé le typage de retour pour qu'il puisse renvoyé null si le departement n'existe pas
    //   RENVOIE LE DEPARTEMENT AYANT LE CODE DEMANDEE   //
    $requeteSQL = "SELECT * from departement WHERE departement_code='$code'";
    $reponseDeRequete=$this->db->query($requeteSQL);
    $departement = $reponseDeRequete->fetchAll(PDO::FETCH_CLASS,'Departement')[0];
    return $departement;
  }
  //---------------------------------------------------------------------------//
  //--------------------   FONCTIONS POUR LES CATEGORIES   --------------------//
  //---------------------------------------------------------------------------//

  function getAllCategorie() : array {
    //   RENVOIES TOUTES LES CATEGORIES DE A BASE DE DONNEE   //
    $tableau_retour = array();
    $requeteSQL = 'SELECT * FROM categorie order by id';
    $reponseDeRequete=$this->db->query($requeteSQL);
    $tableau_retour= $reponseDeRequete->fetchAll(PDO::FETCH_CLASS,'Categorie');
    foreach ($tableau_retour as $key => $value) {
      //reorganisation du tableau de retour dans le meme esprit que les regions
      //le tableau_retour contient des tableaux de categorie et la clef de ces tableaux est le nom de la catégorie parente
      if ($value->idpere!=$value->id){
        $tableau_categorie[$tableau_retour[($value->idpere)-1]->nom][]=$value;
      }
    }
    return $tableau_categorie;
  }

  function getCategorieById($id)  {//Nous avons enlever le typage de retour pour qu'il puisse renvoyé null
    //   RENVOIE LA CATEGORIE AYANT L'ID DEMANDEE   //
    $requeteSQL = "SELECT * FROM categorie WHERE id=$id";
    $reponseDeRequete=$this->db->query($requeteSQL);
    $categorie=$reponseDeRequete? $reponseDeRequete->fetchAll(PDO::FETCH_CLASS,'Categorie'):null;
    return $categorie[0]??null;
  }

  function getCategorieByIdGlobal($idGlobal)  {//Nous avons enlever le typage de retour pour qu'il puisse renvoyé null
    //   RENVOIE LES CATEGORIES AYANT L'ID PERE DEMANDEE   //
    $requeteSQL = "SELECT * FROM categorie WHERE idTitreGlobal=$idGlobal";
    $reponseDeRequete=$this->db->query($requeteSQL);
    $tableau_retour= $reponseDeRequete->fetchAll(PDO::FETCH_CLASS,'Categorie');
    foreach ($tableau_retour as $key => $value) {
      //reorganisation du tableau de retour dans le meme esprit que les regions
      //le tableau_retour contient des tableaux de categorie et la clef de ces tableaux est le nom de la catégorie parente
      if ($value->idpere!=$value->id){
        $tableau_categorie[$tableau_retour[($value->idpere)-1]->nom][]=$value;
      }
    }
    return $tableau_categorie;
  }

  function getCategorieByIdPere($idPere)  {//Nous avons enlever le typage de retour pour qu'il puisse renvoyé null
    //   RENVOIE LES CATEGORIES AYANT L'ID PERE DEMANDEE   //
    $requeteSQL = "SELECT * FROM categorie WHERE idpere=$idPere";
    $reponseDeRequete=$this->db->query($requeteSQL);
    $categorie=$reponseDeRequete? $reponseDeRequete->fetchAll(PDO::FETCH_CLASS,'Categorie'):null;
    return $categorie[0]??null;
  }

  //---------------------------------------------------------------------------//
  //--------------------   FONCTIONS POUR LES FAVORIS      --------------------//
  //---------------------------------------------------------------------------//

  function getFavoris(int $id):array{//Cette fonction retourne tout les favoris
    $requ="SELECT * FROM annonce WHERE id in (select idAnnonce from favoris where idClient=$id)";
    $res = $this->db->query($requ);
    $result = $res->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Annonce");
    return $result;
  }

  function ajoutFavoris(int $idClient, int $idAnnonce):bool{//Cette fonction ajoute a la liste des favoris
    $requ="SELECT count(*) FROM Annonce WHERE id=$idAnnonce";
    $res = $this->db->query($requ);
    $result = $res->fetch()['count(*)'];
    if($result){//Si le produit existe on l'ajoute
      $requ2="INSERT INTO Favoris VALUES($idClient,$idAnnonce) ";
      $res2 = $this->db->query($requ2);
      $result2 = $res->fetch();
    }

    return $result2;
  }

  function deleteFavoris(int $idClient, int $idAnnonce):bool{//Cette fonctionne supprime de la liste des favoris
    $requ="DELETE FROM Favoris WHERE idAnnonce=$idAnnonce AND idClient=$idClient";
    $res = $this->db->query($requ);
    $result = $res->fetch();

    return $result;
  }

  function isFavoris(int $idClient, int $idAnnonce):bool{//Cette fonction vérifie que l'annonce est dans la liste des Favoris
    $requ="SELECT count(*) FROM favoris WHERE idClient=$idClient AND idAnnonce=$idAnnonce";
    $res = $this->db->query($requ);
    $result = $res->fetch();
    return $result['count(*)'];
  }

  function getAnnoncesFav(int $idClient): array {
    // retourne les annonces favoris du client dont l'id est renseigné en paramètre
    $tab_retour = array();
    $requeteSQL = "SELECT A.* FROM favoris F, annonce A WHERE F.idClient =$idClient AND F.idAnnonce=A.id";
    $retourRequete = $this->db->query($requeteSQL);
    $tab_retour = $retourRequete->fetchAll(PDO::FETCH_CLASS, "Annonce");
    return $tab_retour;
  }



  function updateAddNbParticipant(int $idAnnonce):bool{
    $requ="UPDATE annonce SET nbParticipant = nbParticipant+1 WHERE id = $idAnnonce";
    $res = $this->db->query($requ);
    $result = $res->fetch();

    return $result;

  }

  function updateDeleteNbParticipant(int $idAnnonce):bool{
    $requ="UPDATE annonce SET nbParticipant = nbParticipant-1 WHERE id = $idAnnonce";
    $res = $this->db->query($requ);
    $result = $res->fetch();

    return $result;

  }


  //---------------------------------------------------------------------------//
  //--------------------   FONCTIONS POUR LES INTERESSE    --------------------//
  //---------------------------------------------------------------------------//
  function getInteresse(int $id):array{//Cette fonction retourne tout les favoris
    $requ="SELECT * FROM annonce WHERE id in (select idAnnonce from interesse where idClient=$id)";
    $res = $this->db->query($requ);
    $result = $res->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Annonce");
    return $result;
  }

  function ajoutInteresse(int $idClient, int $idAnnonce):bool{//Cette fonction ajoute a la liste des interesses
    $requ="SELECT count(*) FROM Annonce WHERE id=$idAnnonce";
    $res = $this->db->query($requ);
    $result = $res->fetch()['count(*)'];
    if($result){//Si le produit existe on l'ajoute
      $requ2="INSERT INTO Interesse VALUES($idClient,$idAnnonce) ";
      $res2 = $this->db->query($requ2);
      $result2 = $res->fetch();
    }

    return $result2;
  }


  function deleteInteresse(int $idClient, int $idAnnonce):bool{//Cette fonctionne supprime de la liste des interesses
    $requ="DELETE FROM Interesse WHERE idAnnonce=$idAnnonce AND idClient=$idClient";
    $res = $this->db->query($requ);
    $result = $res->fetch();

    return $result;
  }

  function isInteresse(int $idClient, int $idAnnonce):bool{//Cette fonction vérifie que l'annonce est dans la liste des Favoris
    $requ="SELECT count(*) FROM interesse WHERE idClient=$idClient AND idAnnonce=$idAnnonce";
    $res = $this->db->query($requ);
    $result = $res->fetch();
    return $result['count(*)'];
  }

  function getAnnoncesInteresse(int $idClient): array {
    // retourne les annonces favoris du client dont l'id est renseigné en paramètre
    $tab_retour = array();
    $requeteSQL = "SELECT A.* FROM interesse I, annonce A WHERE I.idClient =$idClient AND I.idAnnonce=A.id";
    $retourRequete = $this->db->query($requeteSQL);
    $tab_retour = $retourRequete->fetchAll(PDO::FETCH_CLASS, "Annonce");
    return $tab_retour;
  }

  function updateAddNbInteresse(int $idAnnonce):bool{
    $requ="UPDATE annonce SET nbInteresse = nbInteresse+1 WHERE id = $idAnnonce";
    $res = $this->db->query($requ);
    $result = $res->fetch();

    return $result;

  }

  function updateDeleteNbInteresse(int $idAnnonce):bool{
    $requ="UPDATE annonce SET nbInteresse = nbInteresse-1 WHERE id = $idAnnonce";
    $res = $this->db->query($requ);
    $result = $res->fetch();

    return $result;

  }

}
//fin de classe


//POUR TOUS LES CONTROLEURS
$dao = new DAO();
session_start();
$client=$_SESSION['Client']??0;
$clientConnecte=$_SESSION['Connexion']??0;
$clientVerifie=$_SESSION['Client']->emailVerifie??0;
$idClient=$_SESSION['Client']->id??0;


?>
