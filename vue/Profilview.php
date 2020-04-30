<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Le Coin Etudiant</title>
  <link rel="stylesheet" href="../vue/css/bootstrap.min.css">
  <link rel="stylesheet" href="../vue/css/Profilview.css">
  <link rel="stylesheet" href="../vue/css/Header.css">
  <link rel="stylesheet" href='../vue/css/jquery.flipster.css'>
</head>
<body>
  <header>
    <?php include('header.php') ?>
  </header>


  <div class="corps">
    <div class="column" id="gauche" style="background-color:#ddd;">
      <p class="titreDiv" id="nomPrenom"> <?=$_SESSION['Client']->prenom?> <?=$_SESSION['Client']->nom?> </p>
      <div class="afficheMail">
        <label for="mail">Email du compte :</label>
        <p id="mail"> <?=$_SESSION['Client']->email?> </p>
      </div>
      <div class="afficheEtat">
        <label for="etat">Etat du compte: :</label>
        <?php if ($_SESSION['Client']->emailVerifie) { ?>
          <p id="etat">Votre compte est activé</p>
        <?php } else { ?>
          <p id="etat">Votre compte n'est pas activé, vérifiez vore email pour l'activer</p>
        <?php } ?>
      </div>
    </div>

    <div class="column" id="droite" style="background-color:#ddd;">
      <div id="annoncesPub">
        <p class="titreDiv">Tes annonces :</p>
        <?php
        foreach ($annoncesPostees as $annonce) { ?>
          <a href="../controleur/AnnonceDetail.ctrl.php?id=<?=$annonce->id ?>" style="text-decoration:none; color: inherit;">
            <div class="annonce annonceZoom">
            <img src="../modele/data/upload/<?=$annonce->id?>.jpg" class="image">
            <p class="titre"> <?php echo($annonce->titre); ?></p> <!-- le titre ne doit pas dépasser 65 char -->
            <p class="categorie"><?php
            $cat = getCategorie($annonce->id, $dao);
            echo "$cat"; ?></p>
            <p class="adresse"> <?php
            $addr = getAdresse($annonce->id, $dao);
            echo "$addr"; ?></p>
            <p class="horraire"><?php
            $date = getDateAnnonce($annonce->id, $dao);
            echo "$date"; ?></p>
          </div> </a>
        <?php } ?>
      </div>
        <div id="annoncesFav">
        <p class="titreDiv">Les annonces qui t'intéressent :</p>
        <div class="choixAffichage">

          <a class="lienAffichage" id="<?=$etatPart ?>" href="Profil.ctrl.php?annonces=part"> Participe</a>
          <a class="lienAffichage" id="<?=$etatInt ?>"href="Profil.ctrl.php?annonces=int"> Intéressé</a>
        </div>
      <?php
      if ($_GET['annonces']=='part') {
       foreach ($annoncesFavoris as $annonce) {
        $cat = getCategorie($annonce->id, $dao);
        $addr = getAdresse($annonce->id, $dao);
        $date = getDateAnnonce($annonce->id, $dao);
        ?>
        <a href="../controleur/AnnonceDetail.ctrl.php?id=<?=$annonce->id ?>" style="text-decoration:none; color: inherit;">
        <div class="annonce annonceZoom">
          <img src="../modele/img/icone_sport.jpg" class="image">
          <p class="titre"> <?=$annonce->titre ?></p>
        <p class="categorie"><?=$cat?></p>
          <p class="adresse"><?=$addr?></p>
          <p class="horraire"><?=$date?></p>
        </div> </a>
        <?php
       }
      }
      else {
      foreach ($annnoncesInteresse as $annonce) { ?>
        <a href="../controleur/AnnonceDetail.ctrl.php?id=<?=$annonce->id ?>" style="text-decoration:none; color: inherit;">
        <div class="annonce annonceZoom">
          <img src="../modele/img/icone_sport.jpg" class="image">
          <p class="titre"> <?php echo($annonce->titre); ?></p>
        <p class="categorie"><?php
          $cat = getCategorie($annonce->id, $dao);
          echo "$cat"; ?></p>
          <p class="adresse"> <?php
          $addr = getAdresse($annonce->id, $dao);
          echo "$addr"; ?></p>
          <p class="horraire"><?php
          $date = getDateAnnonce($annonce->id, $dao);
          echo "$date"; ?></p>
        </div> </a>
        <?php
       }
      } ?>
      </div>

    </div>
  </div>


  <footer class="footer">
    <?php include('footer.php') ?>
  </footer>
</body>
</html>
