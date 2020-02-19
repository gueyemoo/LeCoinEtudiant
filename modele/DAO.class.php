<?php
require_once('../modele/Client.class.php');

class DAO
{
  private $db;

  function __construct()
  {
    try {
      $this->db = new PDO('sqlite:../modele/data/data.db');
      // $this->db->exec("INSERT INTO client(id,nom,prenom,email,motdepasse,emailVerifie) VALUES(1,t,g,g@gmail,ee,ee,1);");

    } catch (Exception $e) {
      die("erreur de connexion:".$e->getMessage());
      // var_dump('EH OH JE LOUVRE PAS');
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
        																				<div mc:edit="body" style="text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;color:#5F5F5F;line-height:135%;">Afin de verifier votre email et ainsi activiter votre compte veuillez copier le code ci-dessous: </div>
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
        																	<div style="text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:3em;margin-bottom:0;margin-top:10px;color:#5F5F5F;line-height:135%;">5847</div>
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
    var_dump($retour);
  }


  function setEmailVerfie(int $id,string $code){
    $retour=true;
    //verifie si une session est demarrée
    $clientConnecte=(bool)$_SESSION['Client']??false;

    if ($clientConnecte && $_SESSION['Client']->emailVerifie==false){ //si client connécté et email pas verfié

        $client=$_SESSION['Client'];

        if($code==substr(hash('sha256',$client->id.$client->email), 0, 5)){   //si c'est le bon code//
          $requeteSQL = "UPDATE client SET emailVerifie=1 WHERE id=$id"; //update de la base
          $reponseDeRequete=$this->db->query($requeteSQL);
          $_SESSION['Client']->emailVerifie=true;   //update de la session
        }else{
          $retour=false;
        }

    return $retour;
  }
}
}
//fin de classe

//POUR TOUS LES CONTROLEURS
$dao = new DAO();
session_start();
$client=$_SESSION['Client']??0;
$clientConnecte=$_SESSION['Connexion']??0;


?>
