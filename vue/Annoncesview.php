<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Le Coin Etudiant</title>
  <link rel="stylesheet" href="../vue/css/bootstrap.min.css">
  <link rel="stylesheet" href="../vue/css/Annoncesview.css">
  <link rel="stylesheet" href="../vue/css/AjoutAnnonceview.css">

  <link rel="stylesheet" href="../vue/css/Header.css">
  <link rel="stylesheet" href='../vue/css/jquery.flipster.css'>
</head>
<body>

  <header>
    <?php include('header.php') ?>
  </header>
  <div class="corps">

    <!-- LE BODY DE GAUCHE -->
    <form class="" action="Annonces.ctrl.php" method="get">

      <div class="" id="filtres">
        <div class="alignFiltre">
          <p>
            <h3 id="h3Filtres">Filtres</h3>
          </p>
        </div>

        <div class="form-group">
          <label for="type">Type d'annonces : </label>
          <select class="form-control" id="categorieAnnonce" name="type" onChange="addSelectedCat(this);">
            <option selected value="0" style="font-weight: bold;">Tout types</option>
            <?php foreach ($types as $type) { ?>
              <option value="<?=$type->nom?>"><?=$type->nom?></option>
            <?php } ?>
          </select>
        </div>

        <!-- div qui contient les categories du type d'annonce choisie -->
        <div class="" id="cat">
        </div>

        <!-- div qui contient les sports de la categorie choisie -->
        <div class="" id="sousCat">
        </div>

        <div class="form-group">
          <label for="departement">Département :</label>
          <div class="autocomplete">
            <input type="text" class="form-control inputFiltre" name="dep" id="myInput" placeholder="Commencer à écrire pour avoir des propositions" >
          </div>
        </div>

        <div class="form-group">
          <label for="date">Date de l'évenement :</label>
          <input class="form-group" type="date" name="date" value="">
        </div>

        <div class="alignFiltre">
          <p>
            <button class="btn btn-light" id="sub" type="submit" >Filtrer !</button>
          </p>
        </div>

      </div>
    </form>

    <!-- div cachee qui contient les options des differentes categories -->
    <div id="catCache" style="display: none;">
    <div class="form-group" id="div-categorieSport">
      <label for="Categorie">Categorie :</label>
      <select class="form-control" id="categorieAnnonce" name="categorie" onChange="addSelectedSportFiltre(this)">
        <option selected value="0" style="font-weight: bold;">Toutes categories</option>
        <?php foreach ($categoriesSports as $categories) { ?>
          <option value="<?=$categories->nom?>"><?=$categories->nom?></option>
        <?php } ?>
      </select>
    </div>

    <div class="form-group" id="div-categorieFestif">
      <label for="Categorie">Categorie :</label>
      <select class="form-control" id="categorieAnnonce" name="categorie" onChange="addSelectedSportFiltre(this)">
        <option selected value="0" style="font-weight: bold;">Toutes categories</option>
        <?php foreach ($categoriesFestif as $categories) { ?>
          <option value="<?=$categories->nom?>"><?=$categories->nom?></option>
        <?php } ?>
      </select>
    </div>

    <div class="form-group" id="div-categorieEducatif">
      <label for="Categorie">Categorie :</label>
      <select class="form-control" id="categorieAnnonce" name="categorie" onChange="addSelectedSportFiltre(this)">
        <option selected value="0" style="font-weight: bold;">Toutes categories</option>
        <?php foreach ($categoriesEducatif as $categories) { ?>
          <option value="<?=$categories->nom?>"><?=$categories->nom?></option>
        <?php } ?>
      </select>
    </div>

    <!-- div vide pour option Tout types -->
    <div class="" id="div-catVide">
    </div>
  </div>

    <!-- div cachee qui contient les options des differentes sous-categories -->
    <div class="" id="sousCatCache" style="display: none;">
      <div class="form-group" id="div-sous-categorie1" >
        <label for="sousCategorie1"> Sous-Catégorie : </label>
        <select class="form-control" id="sousCategorieAnnonce1" name="sousCategorie">
          <option value="0">Toutes sous-catégories</option>
          <?php foreach ($athletismes as $athletisme) { ?>
            <option value="<?=$athletisme->nom?>"><?=$athletisme->nom?></option>
          <?php } ?>
        </select>
      </div>
      <div class="form-group" id="div-sous-categorie2">
        <label for="sousCategorie2"> Sous Categorie </label>
        <select class="form-control" id="sousCategorieAnnonce2" name="sousCategorie">
          <option value="0">Toutes sous-catégories</option>
          <?php foreach ($SportCollectifs as $SportCo) { ?>
            <option value="<?=$SportCo->nom?>"><?=$SportCo->nom?></option>
          <?php } ?>
        </select>
      </div>

      <div class="form-group" id="div-sous-categorie3">
        <label for="sousCategorie3"> Sous Categorie </label>
        <select class="form-control" id="sousCategorieAnnonce3" name="sousCategorie">
          <option value="0">Toutes sous-catégories</option>
          <?php foreach ($Cyclisme as $Cyc) { ?>
            <option value="<?=$Cyc->nom?>"><?=$Cyc->nom?></option>
          <?php } ?>
        </select>
      </div>

      <div class="form-group" id="div-sous-categorie4">
        <label for="sousCategorie4"> Sous Categorie </label>
        <select class="form-control" id="sousCategorieAnnonce4" name="sousCategorie">
          <option value="0">Toutes sous-catégories</option>
          <?php foreach ($SportCible as $SportCi) { ?>
            <option value="<?=$SportCi->nom?>"><?=$SportCi->nom?></option>
          <?php } ?>
        </select>
      </div>

      <div class="form-group" id="div-sous-categorie5">
        <label for="sousCategorie5"> Sous Categorie </label>
        <select class="form-control" id="sousCategorieAnnonce5" name="sousCategorie">
          <option value="0">Toutes sous-catégories</option>
          <?php foreach ($SportGlisse as $SportGl) { ?>
            <option value="<?=$SportGl->nom?>"><?=$SportGl->nom?></option>
          <?php } ?>
        </select>
      </div>

      <div class="form-group" id="div-sous-categorie6">
        <label for="sousCategorie6"> Sous Categorie </label>
        <select class="form-control" id="sousCategorieAnnonce6" name="sousCategorie">
          <option value="0">Toutes sous-catégories</option>
          <?php foreach ($SportNautique as $SportNau) { ?>
            <option value="<?=$SportNau->nom?>"><?=$SportNau->nom?></option>
          <?php } ?>
        </select>
      </div>

      <div class="form-group" id="div-sous-categorie7">
        <label for="sousCategorie7"> Sous Categorie </label>
        <select class="form-control" id="sousCategorieAnnonce7" name="sousCategorie">
          <option value="0">Toutes sous-catégories</option>
          <?php foreach ($SportCombats as $SportCombat) { ?>
            <option value="<?=$SportCombat->nom?>"><?=$SportCombat->nom?></option>
          <?php } ?>
        </select>
      </div>

      <div class="form-group" id="div-sous-categorie8">
        <label for="sousCategorie8"> Sous Categorie </label>
        <select class="form-control" id="sousCategorieAnnonce8" name="sousCategorie">
          <option value="0">Toutes sous-catégories</option>
          <?php foreach ($SportRaquette as $SportRa) { ?>
            <option value="<?=$SportRa->nom?>"><?=$SportRa->nom?></option>
          <?php } ?>
        </select>
      </div>

      <div class="form-group" id="div-sous-categorie9">
        <label for="sousCategorie9"> Sous Categorie </label>
        <select class="form-control" id="sousCategorieAnnonce9" name="sousCategorie">
          <option value="0">Toutes sous-catégories</option>
          <?php foreach ($SportAutre as $SportAu) { ?>
            <option value="<?=$SportAu->nom?>"><?=$SportAu->nom?></option>
          <?php } ?>
        </select>
      </div>

      <div class="form-group" id="div-toutes-cat">
      </div>
    </div>



    <div class="" id="tri">
      <?php if($clientConnecte!=0): ?> <!-- Si le client est connecté -->
        <a href="../controleur/AjoutAnnonce.ctrl.php" id="btnAjout">Ajouter une annonce</a>
      <?php endif; ?>


      <!-- <div class="" id="btnTri" style="display: none;">
        <label for="tri">Trié par: </label>
        <div class="dropdown">
          <button class="dropbouton">Le plus récent</button>
          <div class="dropdown-content">
            <a class="i" href="#">Le moins récent</a>
            <a class="i" href="#">Le plus populaire</a>
            <a class="i" href="#">Le moins populaire</a>
          </div>
        </div>
      </div> -->
    </div>


    <div class="" id="annonces" draggable="true" ondragstart="drag(event)">


      <?php
      foreach ($annoncesPostees as $annonce) { ?>
        <a href="../controleur/AnnonceDetail.ctrl.php?id=<?=$annonce->id ?>" style="text-decoration:none; color: inherit;"> <div class="annonce">
          <img src="../modele/data/upload/<?=$annonce->id?>.jpg" class="image">
          <p class="titre"> <?php echo($annonce->titre); ?></p> <!-- le titre ne doit pas dépasser 65 char -->
          <p class="categorie"><?php
          // $cat = getCategorie($annonce->id, $dao);
          if ($annonce->sousCategorie == '' || $annonce->sousCategorie == ' ') {
            echo($annonce->categorie);
          } else {
          echo($annonce->sousCategorie);
        }

          ?></p>
          <p class="adresse"> <?php
          $addr = getAdresse($annonce->id, $dao);
          echo "$addr"; ?></p>
          <p class="horraire"><?php
          $date = getDateAnnonce($annonce->id, $dao);
          echo "$date"; ?></p>
        </div> </a>
      <?php } ?>
    </div>
    <!-- FIN -->

  </div>





  <footer class="footer">
    <?php include('footer.php') ?>
  </footer>



  <script type="text/javascript" src="../vue/script/checkInputSelectedType.js"></script>
  <script type="text/javascript" src="../vue/script/addSelectedSportFiltre.js"></script>
  <script type="text/javascript" src="../vue/script/addSelectedCat.js"></script>
  <script type="text/javascript" src="../vue/script/autocompletion.js"></script>
  <script type="text/javascript">
  <?php
  $php_array = $departements;
  $js_array = json_encode($php_array);
  echo "var javascript_array = ". $js_array . ";\n";
  ?>
  autocomplete(document.getElementById("myInput"), javascript_array);
  </script>
</body>
</html>
