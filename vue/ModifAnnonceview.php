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
  <link rel="stylesheet" href="../vue/css/bootstrap-imageupload.css">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>
  <header>
    <?php include('header.php') ?>
  </header>

  <body>
    <fieldset class="container border-10 rounded" style="width:90%;margin-bottom:7em;">
      <legend  class="w-auto">Modifier votre annonce</legend>

      <form class="container" style="width:80%; margin-top:10px" action="../controleur/ModifAnnonce.ctrl.php?id=<?=$annonce->id?>" method="POST" enctype="multipart/form-data" >
        <div class="justify-content-center">

          <div class="form-group">
            <label for="titreAnnonce">Titre de l'annonces *</label>
            <input type="text" class="form-control" name="titre" id="titreAnnonce" placeholder="Saisissez un titre clair pour votre annonce." maxlength="60" value="<?= $annonce->titre ?>" required>
          </div>

          <div class="form-group">
            <label for="descriptionTextArea">Description de l'annonce * </label>
            <textarea class="form-control" name="contenu" id="descritionAnnonce" rows="5" placeholder="Saississez une description précise afin de mettre en valeur votre annonce." minlength="10" maxlength="500" required><?= $annonce->contenu ?> </textarea>
          </div>



          <div class="row">

            <div class="form-group" style="margin-left:15px;margin-right:30px;">
              <label for="type">Type *</label>
              <select class="form-control" id="categorieAnnonce" name="type" onChange="addSelectedCat(this);" style="width:150%;" required>
                <option value=""></option>
                <option value="<?=$annonce->type?>"> <?= ucfirst($annonce->type) ?> </option>
                <option disabled>─────</option>
                <?php foreach ($types as $type) { ?>
                  <option value="<?=$type->nom?>"><?=$type->nom?></option>
                <?php } ?>
              </select>
            </div>



            <!-- div qui contient les categories du type d'annonce choisie -->
            <div class="" id="cat">
            </div>

            <div class="" id="sousCat">

            </div>


          </div>

          <div class="row">

            <div class="form-group" style="margin-right:10em; margin-left:15px;">
              <label for="DepartementInput"> Choisir un département * </label>
              <div class="autocomplete">

                <input type="text" class="form-control inputFiltre" id="myInput" name="departement" value="<?= $annonce->departement ?>" autocomplete="off" placeholder="Commencer à écrire pour avoir des propositions" required maxlength="35">
              </div>
            </div>

            <div class="form-group">
              <label for="DepartementInput"> Adresse * </label>
              <input type="text" class="form-control" name="adresse" value="<?=$annonce->adresse?>" placeholder="Saisissez l'adresse de l'évenement" style="width:200%;" required>
            </div>

          </div>

          <div class="row">

            <div class="form-group" style="margin-right:12em; margin-left:15px;">
              <label for="date-input"> Date de l'évenement *</label>
              <input class="form-control" type="date" name="datePrevu" value="<?=$Date?>" required>
            </div>

            <div class="form-group">
              <label for="heure-input"> Heure de l'évenement *</label>
              <input class="form-control" type="time" name="heurePrevu" value="<?=$annonce->heurePrevu?>" required>
            </div>

          </div>

          <!-- bootstrap-imageupload. -->
          <div class="imageupload panel panel-default">
            <div class="panel-heading clearfix">
              <h3 class="panel-title pull-left">Ajouter une image</h3>
            </div>
            <div class="file-tab panel-body">
              <label class="btn btn-default btn-file">
                <span>Browse</span>
                <!-- The file is stored here. -->
                <input name="image" type="file" id="file">
              </label>
              <button type="button" class="btn btn-default">Retirer</button>
            </div>
          </div>

          <div class="text-center" style="margin-bottom:1em;">
            <button class="btn btn-light" style="width:50%;" name="updatesubmit" type="submit" id="contact-submit" value"submit">Valider</button>
          </div>


        </form>
      </fieldset>

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

      <div class="" id="sousCatCache" style="display: none;">

        <div class="form-group" id="div-sous-categorie1" style="margin-left:30px;">
          <label for="sousCategorie1"> Sous Categorie </label>
          <select class="form-control" id="sousCategorieAnnonce1" name="sousCategorie">
            <option value=""></option>
            <?php foreach ($athletismes as $athletisme) { ?>
              <option value="<?=$athletisme->nom?>"><?=$athletisme->nom?></option>
            <?php } ?>
          </select>
        </div>

        <div class="form-group" id="div-sous-categorie2" style="margin-left:30px;">
          <label for="sousCategorie2"> Sous Categorie </label>
          <select class="form-control" id="sousCategorieAnnonce2" name="sousCategorie">
            <option value=""></option>
            <?php foreach ($SportCollectifs as $SportCo) { ?>
              <option value="<?=$SportCo->nom?>"><?=$SportCo->nom?></option>
            <?php } ?>
          </select>
        </div>

        <div class="form-group" id="div-sous-categorie3" style="margin-left:30px;">
          <label for="sousCategorie3"> Sous Categorie </label>
          <select class="form-control" id="sousCategorieAnnonce3" name="sousCategorie">
            <option value=""></option>
            <?php foreach ($Cyclisme as $Cyc) { ?>
              <option value="<?=$Cyc->nom?>"><?=$Cyc->nom?></option>
            <?php } ?>
          </select>
        </div>

        <div class="form-group" id="div-sous-categorie4" style="margin-left:30px;">
          <label for="sousCategorie4"> Sous Categorie </label>
          <select class="form-control" id="sousCategorieAnnonce4" name="sousCategorie">
            <option value=""></option>
            <?php foreach ($SportCible as $SportCi) { ?>
              <option value="<?=$SportCi->nom?>"><?=$SportCi->nom?></option>
            <?php } ?>
          </select>
        </div>

        <div class="form-group" id="div-sous-categorie5" style="margin-left:30px;">
          <label for="sousCategorie5"> Sous Categorie </label>
          <select class="form-control" id="sousCategorieAnnonce5" name="sousCategorie">
            <option value=""></option>
            <?php foreach ($SportGlisse as $SportGl) { ?>
              <option value="<?=$SportGl->nom?>"><?=$SportGl->nom?></option>
            <?php } ?>
          </select>
        </div>

        <div class="form-group" id="div-sous-categorie6" style="margin-left:30px;">
          <label for="sousCategorie6"> Sous Categorie </label>
          <select class="form-control" id="sousCategorieAnnonce6" name="sousCategorie">
            <option value=""></option>
            <?php foreach ($SportNautique as $SportNau) { ?>
              <option value="<?=$SportNau->nom?>"><?=$SportNau->nom?></option>
            <?php } ?>
          </select>
        </div>

        <div class="form-group" id="div-sous-categorie7" style="margin-left:30px;">
          <label for="sousCategorie7"> Sous Categorie </label>
          <select class="form-control" id="sousCategorieAnnonce7" name="sousCategorie">
            <option value=""></option>
            <?php foreach ($SportCombats as $SportCombat) { ?>
              <option value="<?=$SportCombat->nom?>"><?=$SportCombat->nom?></option>
            <?php } ?>
          </select>
        </div>

        <div class="form-group" id="div-sous-categorie8" style="margin-left:30px;">
          <label for="sousCategorie8"> Sous Categorie </label>
          <select class="form-control" id="sousCategorieAnnonce8" name="sousCategorie">
            <option value=""></option>
            <?php foreach ($SportRaquette as $SportRa) { ?>
              <option value="<?=$SportRa->nom?>"><?=$SportRa->nom?></option>
            <?php } ?>
          </select>
        </div>

        <div class="form-group" id="div-sous-categorie9" style="margin-left:30px;">
          <label for="sousCategorie9"> Sous Categorie </label>
          <select class="form-control" id="sousCategorieAnnonce9" name="sousCategorie">
            <option value=""></option>
            <?php foreach ($SportAutre as $SportAu) { ?>
              <option value="<?=$SportAu->nom?>"><?=$SportAu->nom?></option>
            <?php } ?>
          </select>
        </div>

        <div class="form-group" id="div-toutes-cat">
        </div>

      </div>


      <script type="text/javascript" src="../vue/script/addSelectedSportFiltre.js"></script>
      <script type="text/javascript" src="../vue/script/checkInputSelectedType.js"></script>
      <script type="text/javascript" src="../vue/script/checkInputSelectedSportsCategorie.js"></script>
      <script type="text/javascript" src="../vue/script/bootstrap-imageupload.js"></script>
      <script type="text/javascript" src="../vue/script/autocompletion.js"></script>
      <script type="text/javascript" src="../vue/script/addSelectedCat.js"></script>

      <script type="text/javascript">
      <?php
      $php_array = $departements;
      $js_array = json_encode($php_array);
      echo "var javascript_array = ". $js_array . ";\n";
      ?>
      autocomplete(document.getElementById("myInput"), javascript_array);
      </script>

      <script>
      var $imageupload = $('.imageupload');
      $imageupload.imageupload();

      </script>

    </body>

    <footer class="footer">
      <?php include('footer.php') ?>
    </footer>


  </body>
  </html>
