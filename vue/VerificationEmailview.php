<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>LeCoinEtudiant - Vérification e-mail</title>
  <link rel="stylesheet" href="../vue/css/bootstrap.min.css">
  <link rel="stylesheet" href="../vue/css/Header.css">

</head>
<body>
  <?php include('../vue/header.php'); ?>



  <?php if ($clientConnecte==1 && $client->emailVerifie==1): ?>
    <div class="form" style="border: 3px solid black;padding:2em; margin:9em 5em 0em 5em;">

      <form class="text-center border border-light p-4" action="#!">

        <p class="h3 mb-4">Votre compte est activé</p>

      </form>
    </div>
  <?php elseif ($clientConnecte==1 && $client->emailVerifie==0): ?>
    <div class="form" style="border: 3px solid black;padding:2em; margin:9em 5em 0em 5em;">

      <form class="text-center border border-light p-4" action="#!">
        <p class="mb-3">Un code de vérification a été envoyé à l'adresse mail <strong><?= $_SESSION['Client']->email ?></strong></p>

        <p class="h3 mb-4">Code de Verification:</p>

        <!-- Email -->
        <input class="form-control form-control-lg mb-4 text-center" type="text" placeholder="CODE" minlength="5" maxlength="5" style="font-size: 3em; font-weight: bold;" autofocus required>

        <button class="btn btn-dark btn-block" type="submit">Valider</button>
      </form>
    </div>
  <?php else: ?>
    <div class="form" style="border: 3px solid black;padding:2em; margin:9em 5em 0em 5em;">

      <form class="text-center border border-light p-4" action="#!">

        <p class="h3 mb-4">Connectez-vous d'abord.</p>

      </form>
    </div>
  <?php endif; ?>













  <footer class="footer">
    <?php include('../vue/footer.php') ?>
  </footer>


</body>
</html>
