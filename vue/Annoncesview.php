<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Le Coin Etudiant</title>
  <link rel="stylesheet" href="../vue/css/bootstrap.min.css">
  <link rel="stylesheet" href="../vue/css/Annoncesview.css">
  <link rel="stylesheet" href="../vue/css/Header.css">
  <link rel="stylesheet" href='../vue/css/jquery.flipster.css'>
</head>
<body>
  <header>
    <?php include('header.php') ?>
  </header>
  <div class="corps">

    <!-- LE BODY DE GAUCHE -->
    <div class="" id="filtres">
      <p>Filtres</p>
    </div>
    <div class="" id="tri">
      <div class="" id="btnTri">
        <!-- FIN -->




        <!-- LE BODY DE DROITE  -->
        <label for="tri">Trié par: </label>
        <div class="dropdown">
          <button class="dropbouton">Le plus récent</button>
          <div class="dropdown-content">
            <a class="i" href="#">Le moinds récent</a>
            <a class="i" href="#">Le plus populaire</a>
            <a class="i" href="#">Le moins populaire</a>
          </div>
        </div>
      </div>
    </div>
    <div class="" id="annonces">
      <?php
      foreach ($annoncesPostees as $annonce) { ?>
        <a href="../controleur/AnnonceDetail.ctrl.php" style="text-decoration:none; color: inherit;"> <div class="annonce">
          <img src="../modele/img/icone_sport.jpg" class="image">
          <p class="titre"> <?php echo($annonce->titre); ?></p> <!-- le titre ne doit pas dépasser 65 char -->
          <p class="categorie"><?php
          $cat = getCategorie($annonce->id, $dao);
          echo "$cat"; ?></p>
          <p class="adresse"> <?php
          $addr = getAdresse($annonce->id, $dao);
          echo "$addr"; ?></p>
          <p class="horraire"><?php
          $date = getDateAnnonce($annonce->id, $dao);
          $heure = getHeure($annonce->id, $dao);
          echo "$date, $heure"; ?></p>
        </div> </a>
      <?php } ?>
    </div>
    <!-- FIN -->

  </div>





  <footer class="footer">
    <?php include('footer.php') ?>
  </footer>
</body>
</html>
