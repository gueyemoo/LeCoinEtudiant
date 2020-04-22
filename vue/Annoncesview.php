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
      <h3>Filtres</h3>
      <div class="divFiltres" id="Sport">
        <label >Categories :</label><br>
        <select name = "categorie">
          <option value="0" selected>Toutes les catégories</option>
          <?php foreach ($toutesCategories as $categorie) { ?>
            <?php foreach ($categorie as $sousCat): ?>
              <?php var_dump($sousCat); ?>
            <option value="<?=$sousCat->nom?>"><?=$sousCat->nom?></option>
          <?php endforeach; ?>
          <?php } ?>
        </select>
      </div>
      <button type="submit" name="button">Filtrer !</button>
    </div>
    <div class="" id="tri">
      <a href="../controleur/AjoutAnnonce.ctrl.php" id="btnAjout">Ajouter une annonce</a>
      <div class="" id="btnTri">
        <!-- FIN -->




        <!-- LE BODY DE DROITE  -->
        <label for="tri">Trié par: </label>
        <div class="dropdown">
          <button class="dropbouton">Le plus récent</button>
          <div class="dropdown-content">
            <a class="i" href="#">Le moins récent</a>
            <a class="i" href="#">Le plus populaire</a>
            <a class="i" href="#">Le moins populaire</a>
          </div>
        </div>
      </div>

    </div>
    <div class="" id="annonces">
      <?php
      foreach ($annoncesPostees as $annonce) { ?>
        <a href="../controleur/AnnonceDetail.ctrl.php?id=<?=$annonce->id ?>" style="text-decoration:none; color: inherit;"> <div class="annonce">
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
