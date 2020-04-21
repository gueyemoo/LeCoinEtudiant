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

  <body>
    <fieldset class="container border-10 rounded" style="width:90%">
      <legend  class="w-auto">Ajoutez votre annonce</legend>

    <form class="container" style="width:80%; margin-top:10px">
      <div class="justify-content-center">

        <div class="form-group">
          <label for="titreAnnonce">Titre de l'annonces *</label>
          <input type="email" class="form-control" id="titreAnnonce" placeholder="Saisissez un titre clair pour votre annonce.">
        </div>

        <div class="form-group">
          <label for="descriptionTextArea">Description de l'annonce * </label>
          <textarea class="form-control" id="descritionAnnonce" rows="5" placeholder="Saississez une description précise afin de mettre en valeur votre annonce."></textarea>
        </div>

        <div class="form-group">
          <label for="type">Type *</label>
          <select class="form-control" id="categorieAnnonce" name="type" onChange="checkInputSelectedType(this);">
            <option selected style="font-weight: bold;">Choisir un type</option>
            <?php foreach ($types as $type) { ?>
              <option value="<?=$type->nom?>"><?=$type->nom?></option>
            <?php } ?>
          </select>
        </div>

        <div class="form-group" id="div-categorie" style="display:none;">
          <label for="Categorie">Categorie *</label>

          <select class="form-control" id="categorieAnnonce" name="categorie" onChange="checkInputSelectedSportsCategorie(this)">
            <option selected style="font-weight: bold;">Choisir une sous categorie</option>
            <?php foreach ($categoriesSports as $categories) { ?>
              <option value="<?=$categories->nom?>"><?=$categories->nom?></option>
            <?php } ?>
          </select>
        </div>

        <div class="form-group" id="div-sous-categorie1" style="display:none;">
          <label for="sousCategorie1"> Sous Categorie </label>
          <select class="form-control" id="sousCategorieAnnonce1" name="sousCategorie1">
            <?php foreach ($athletismes as $athletisme) { ?>
              <option value="<?=$athletisme->nom?>"><?=$athletisme->nom?></option>
            <?php } ?>
          </select>
        </div>

        <div class="form-group" id="div-sous-categorie2" style="display:none;">
          <label for="sousCategorie2"> Sous Categorie </label>
          <select class="form-control" id="sousCategorieAnnonce2" name="sousCategorie2">
            <?php foreach ($SportCollectifs as $SportCo) { ?>
              <option value="<?=$SportCo->nom?>"><?=$SportCo->nom?></option>
            <?php } ?>
          </select>
        </div>

        <div class="form-group" id="div-sous-categorie3" style="display:none;">
          <label for="sousCategorie3"> Sous Categorie </label>
          <select class="form-control" id="sousCategorieAnnonce3" name="sousCategorie3">
            <?php foreach ($Cyclisme as $Cyc) { ?>
              <option value="<?=$Cyc->nom?>"><?=$Cyc->nom?></option>
            <?php } ?>
          </select>
        </div>

        <div class="form-group" id="div-sous-categorie4" style="display:none;">
          <label for="sousCategorie4"> Sous Categorie </label>
          <select class="form-control" id="sousCategorieAnnonce4" name="sousCategorie4">
            <?php foreach ($SportCible as $SportCi) { ?>
              <option value="<?=$SportCi->nom?>"><?=$SportCi->nom?></option>
            <?php } ?>
          </select>
        </div>

        <div class="form-group" id="div-sous-categorie5" style="display:none;">
          <label for="sousCategorie5"> Sous Categorie </label>
          <select class="form-control" id="sousCategorieAnnonce5" name="sousCategorie5">
            <?php foreach ($SportGlisse as $SportGl) { ?>
              <option value="<?=$SportGl->nom?>"><?=$SportGl->nom?></option>
            <?php } ?>
          </select>
        </div>

        <div class="form-group" id="div-sous-categorie6" style="display:none;">
          <label for="sousCategorie6"> Sous Categorie </label>
          <select class="form-control" id="sousCategorieAnnonce6" name="sousCategorie6">
            <?php foreach ($SportNautique as $SportNau) { ?>
              <option value="<?=$SportNau->nom?>"><?=$SportNau->nom?></option>
            <?php } ?>
          </select>
        </div>

        <div class="form-group" id="div-sous-categorie7" style="display:none;">
          <label for="sousCategorie7"> Sous Categorie </label>
          <select class="form-control" id="sousCategorieAnnonce7" name="sousCategorie7">
            <?php foreach ($SportCombats as $SportCombat) { ?>
              <option value="<?=$SportCombat->nom?>"><?=$SportCombat->nom?></option>
            <?php } ?>
          </select>
        </div>

        <div class="form-group" id="div-sous-categorie8" style="display:none;">
          <label for="sousCategorie8"> Sous Categorie </label>
          <select class="form-control" id="sousCategorieAnnonce8" name="sousCategorie8">
            <?php foreach ($SportRaquette as $SportRa) { ?>
              <option value="<?=$SportRa->nom?>"><?=$SportRa->nom?></option>
            <?php } ?>
          </select>
        </div>

        <div class="form-group" id="div-sous-categorie9" style="display:none;">
          <label for="sousCategorie9"> Sous Categorie </label>
          <select class="form-control" id="sousCategorieAnnonce9" name="sousCategorie9">
            <?php foreach ($SportAutre as $SportAu) { ?>
              <option value="<?=$SportAu->nom?>"><?=$SportAu->nom?></option>
            <?php } ?>
          </select>
        </div>

      </div>


    </form>
  </fieldset>

    <script type="text/javascript" src="../vue/script/checkInputSelectedType.js"></script>
    <script type="text/javascript" src="../vue/script/checkInputSelectedSportsCategorie.js"></script>
  </body>

  <footer class="footer">
    <?php include('footer.php') ?>
  </footer>


</body>
</html>
