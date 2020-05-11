<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Le Coin Etudiant</title>
  <link rel="stylesheet" href="../vue/css/bootstrap.min.css">
  <link rel="stylesheet" href="../vue/css/Accueilview.css">
  <link rel="stylesheet" href="../vue/css/Header.css">
  <link rel="stylesheet" href='../vue/css/jquery.flipster.css'>


</head>
<body>
  <header>
    <?php include('header.php') ?>
  </header>

  <div class="loader">
    <img src="../modele/img/loading.gif" alt="Loading..."  />
  </div>

  <article id="carousel" class="jumbotron vertical-center" style="background:#DDDDDD; padding-top:0;">

    <h2 class="text-center" style="margin:1em 0"><p><img src="../modele/img/title.gif" alt="Les Dernieres Annonces"> </p></h2>

    <div id="carousel" class="coverflow-slider">
      <ul class="flip-items">

        <?php
        foreach ($les14annonces as $annonce) { ?>
          <li data-flip-title="Informatique" data-flip-category="Multimedia">
            <div class="img-box adv-img adv-img-half-content" data-anima="fade-left" data-trigger="hover">
              <a href="../controleur/AnnonceDetail.ctrl.php?id=<?=$annonce->id ?>" class="img-box anima-scale-up anima">
                <img src="../modele/data/upload/<?=$annonce->id?>.jpg">
              </a>
              <div class="caption">
                <h2 class="text-center"><?=$annonce->titre?></h2>
                <p class ="text-center font-weight-bold"><?=$annonce->categorie?></p>
                <p class="text-center">
                  <?=$annonce->adresse?>
                </p>
              </div>
            </div>
            </li>

        <?php } ?>

      </ul>
    </div>




    <script type="text/javascript">
    window.addEventListener("load", function () {
      const loader = document.querySelector(".loader");
      loader.className += " hidden"; // class "loader hidden"
    });
    </script>

    <script src="../vue/script/jquery.min.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
    <script src='../vue/script/jquery.flipster.min.js'></script>
    <script src="../vue/script/bootstrap.min.js"></script>
    <script src="../vue/script/bootbox.min.js"></script>

    <script>
    var carousel = $('#carousel').flipster({
      style: 'carousel',
      spacing: -0.3,
      nav: false,
      buttons:   true,
      loop: true,
      autoplay: 3000,
      pauseOnHover: true,
      touch: true,
    });
    </script>
  </article>

  <article class="">
    <div class="container">
      <form id="contact" class="text-center" action="<?=$_SERVER['PHP_SELF']?>" method="POST">
        <h3>Inscription</h3>
        <h4>Inscris toi et commence à déposer t'es annonces !</h4>
        <fieldset>
          <input placeholder="Prenom" id="prenom" value="<?=$_POST['prenom']??"" ?>" name="prenom" type="text" tabindex="1" maxlength="50">
        </fieldset>
        <fieldset>
          <input placeholder="Nom"  id="nom" value="<?=$_POST['nom']??"" ?>" name="nom" type="text" tabindex="2" required  maxlength="35">
        </fieldset>
        <fieldset>
          <input placeholder="Email"  id="mail" value="<?=$_POST['mail']??"" ?>" name="mail" type="email" tabindex="3" required>
        </fieldset>
        <fieldset>
          <input placeholder="mot de passe" id="pass" name="pass" type="password" tabindex="4" required onkeyup="check();" minlength="6">
        </fieldset>
        <fieldset>
          <input placeholder="confirmer votre mot de passe" id="pass2" name="pass2" type="password" tabindex="5" required onkeyup="check();" minlength="6">
          <span id="messagePsw" style="position: absolute; margin: 5px 0px 0px 10px; font-size:1.4em;"></span>
        </fieldset>
        <fieldset>
          <button name="submit" type="submit" id="contact-submit" value"submit">Submit</button>
        </fieldset>
        <?php if ($mailDejaUtilisé??0): ?>
          <p id="mailUsed" class="text-center" style="font-size:2em; margin: 0px; color:red;">Email déjà utilisé</p>
          <script type="text/javascript">
          bootbox.alert({
            title: "Inscription impossible",
            message: "L'adresse mail saisie est déja utilisé.",
            locale: "fr",
            animate: true,
            backdrop: true,
            centerVertical: true
          });
          </script>

        <?php endif; ?>
      </form>

      <script type="text/javascript">
      var check = function() {
        var bt = document.getElementById('contact-submit');
        if (document.getElementById('pass').value == document.getElementById('pass2').value) {
          document.getElementById('messagePsw').style.color = 'green';
          document.getElementById('messagePsw').innerHTML = '✔';
          bt.disabled = false;
        } else {
          document.getElementById('messagePsw').style.color = 'red';
          document.getElementById('messagePsw').innerHTML = '✘';
          bt.disabled = true;
        }
        if (document.getElementById('pass').value == "" || document.getElementById('pass2').value == "" ){
          document.getElementById('messagePsw').innerHTML = '';
        }
      }
      </script>
    </div>
  </article>

  <!-- cree un espace entre le formulaire et le footer -->
  <div class="col py-5 px-md-5"></div>

  <footer class="footer">
    <?php include('footer.php') ?>
  </footer>
</body>
</html>
