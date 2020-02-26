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
        <p> <?=$_SESSION['Client']->prenom?> <?=$_SESSION['Client']->nom?> </p>
        <div class="afficheMail">
          <label for="mail">Email du compte :</label>
          <p id="mail"> <?=$_SESSION['Client']->email?> </p>
        </div>
        <div class="afficheEtat">
          <label for="etat">Etat du compte: :</label>
          <?php if ($_SESSION['Client']->emailVerifie) { ?>
            <p>Votre compte est activé</p>
          <?php } else { ?>
              <p>Votre compte n'est pas activé, vérifiez vore email pour l'activer</p>
          <?php } ?>
        </div>
      </div>

      <div class="column" id="droite" style="background-color:#ddd;">
        Column
      </div>
    </div>


    <footer class="footer">
      <?php include('footer.php') ?>
    </footer>
  </body>
</html>
