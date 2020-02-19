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
      // if($retour){
      //   //si l'ajout c'est bien passé , contrainte email unique
      //   $Client = $this->getClient($idClient);
      //   $_SESSION['Client'] = $Client;
      //   $_SESSION['Connexion'] = true;
      //   $code=hash('sha256',$Client->id.$Client->email);
      //
      //
      //
      //   // Mail html
      //   $headers = 'From: babsyou@gmail.com' . "\r\n" .
      //   'MIME-Version: 1.0' . "\r\n" .
      //   'Content-Type: text/html; charset=utf-8';
      //   $to      = $Client->email;
      //   $subject = 'Verfication d\'email LeCoinEtudiant';
      //   $message_html ='<html>
      //   <body>
      //   <h1>Bienvenue sur LeCoinEtudiant</h1><br>
      //   <h2>Bonjour '.$Client->prenom.' , </h2><br>
      //   <p>Voici ton code <strong>'.$code.'</strong> </p><br>
      //   </body>
      //   </html>';
      //   $message = "Content-Type: text/html; charset=\"iso-8859-1\"\n";
      //   $message .= "Content-Transfer-Encoding: quoted-printable\n\n";
      //   $message .= $message_html;
      //   $message .= "\n\n";
      $to       = 'lecoinetudiant2020@gmail.com';
      $subject  = 'Testing sendmail.exe';
      $message  = 'COUCOU, STP MARCHE ! ';
      $headers  = 'From: lecoinetudiant2020@gmail.com' . "\r\n" .
      'MIME-Version: 1.0' . "\r\n" .
      'Content-type: text/html; charset=utf-8';
      if(mail($to, $subject, $message, $headers))
      echo "Email sent";
      else
      echo "Email sending failed";



      // $resultatmail = mail("babsyou@gmail.com", $subject, "je teste", $headers);
      // $resultatmail  = mail("babsyou@gmail.com", "Hello World", "This is email body", $headers);
      //
      // var_dump('retour email:');
      // var_dump($resultatmail);

      // }
    }
    return (bool)$retour;// renvoi vrai si il est ajouté et faux sinon ( le sinon correspond a la contrainte email unique)
    var_dump($retour);
  }
}
//fin de classe

//POUR TOUS LES CONTROLEURS
$dao = new DAO();
session_start();
// $client=$_SESSION['Client']??0;

?>
