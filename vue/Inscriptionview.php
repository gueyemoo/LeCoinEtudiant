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

  <article class="" style="margin-top: 50px">
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
