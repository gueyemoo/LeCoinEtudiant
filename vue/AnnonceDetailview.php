<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Le Coin Etudiant</title>
  <link rel="stylesheet" href="../vue/css/bootstrap.min.css">
  <link rel="stylesheet" href="../vue/css/Header.css">
  <link rel="stylesheet" href='../vue/css/jquery.flipster.css'>
  <link rel="stylesheet" href="../vue/css/AnnonceDetailview.css">
</head>
<body>
  <header>
    <?php include('header.php') ?>
  </header>


  <div class="container">
    <div class="row" >
      <div class="d-flex flex-column column col-md-5 img">
        <img id="imgDescription" src="https://via.placeholder.com/350" alt="" class="img-rounded"> <br>
        <h5><u> <?=$cat->nom?> </u></h5>
        <p style="margin-bottom:0px;"> <?= $annonce->adresse?> </p>
        <p>Prévu le: 11/02 à 17h   </p>

        <br>
        <p>Nombre de participants: <strong> <?=$annonce->nbParticipant?> </strong></p>
        <p>Nombre d'interessé: <strong> <?=$annonce->nbInteresse?> </strong></p>

        <br>
        <h5><u>Contacts</u></h5>
        <p>Mail: <?=$user->email?></p>
      </div>



      <div class="d-flex flex-column col-md-6 details">
        <h2 id="titreAnnonce"> <?=$annonce->titre?></h2>

        <h4> <u>Description:</u></h4>

        <p><?= $annonce ->contenu?></p>
        <div class="row">
          <div class="text-center d-flex flex-column column col-md-5">
            <h6>Participe</h6>


            <?php if ($Favoris??0): ?>
              <!-- On verifie si le produit est deja en favoris dans ce cas on propose de le retirer -->

              <p> <a href="../controleur/MettreEnFavoris.php?idAnnonce=<?=$annonce->id?>&action=delete"> <img class="iconeChoix" src="../modele/img/correct.png" alt="correct check"> </a> </p>

            <?php elseif($clientConnecte==0): ?>
              <!-- On verifie que l'utilisateur est connecter pour mettre en favoris ou retirer des favoris sinon on lui propose de se connecter  -->
              <p> <a href="../controleur/Accueil.ctrl.php">Connectez-vous </a> pour ajouter cette annonce à vos favoris.</p>
            <?php else: ?>
              <!-- On verifie que l'utilisateur n'a pas ce produit en favoris dans ce cas on lui propose de l'ajouter à ces favoris -->

              <p> <a href="../controleur/MettreEnFavoris.php?idAnnonce=<?=$annonce->id?>&action=add"> <img class="iconeChoix" src="../modele/img/correct_vide.png" alt="correct check vide"> </a> </p>
            <?php endif; ?>

          </div>
          <div class="text-center d-flex flex-column column col-md-5">
            <h6>Interessé</h6>

            <?php if ($Interesse??0): ?>
              <!-- On verifie si l'annonce est deja en interesse dans ce cas on propose de le retirer -->

              <p> <a href="../controleur/MettreEnInteresse.php?idAnnonce=<?=$annonce->id?>&action=delete"> <img class="iconeChoix" src="../modele/img/heart.png" alt="heart check"> </a> </p>

            <?php elseif($clientConnecte==0): ?>
              <!-- On verifie que l'utilisateur est connecter pour mettre en interesse ou retirer des interessé sinon on lui propose de se connecter  -->
              <p> <a href="../controleur/Accueil.ctrl.php">Connectez-vous </a> pour ajouter cette annonce à votre centre d'intérêt.</p>
            <?php else: ?>
              <!-- On verifie que l'utilisateur n'a pas ce produit en interessé dans ce cas on lui propose de l'ajouter à ces interesses -->

              <p> <a href="../controleur/MettreEnInteresse.php?idAnnonce=<?=$annonce->id?>&action=add"> <img class="iconeChoix" src="../modele/img/heart_vide.png" alt="heart check vide"> </a> </p>
            <?php endif; ?>

          </div>
        </div>
      </div>
    </div>

    <h6 style="float:right;">Posté le 11/03/2020 à 18h30</h6>
  </div>



  <footer class="footer">
    <?php include('footer.php') ?>
  </footer>

</body>
</html>
