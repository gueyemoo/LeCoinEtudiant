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

<div class="form" style="border: 3px solid black;padding:2em; margin:9em 5em 0em 5em;">

    <form class="text-center border border-light p-4" action="#!">
      <p class="mb-3">Un code a été envoyé à votre adresse mail saisie.</p>

      <p class="h3 mb-4">Code de Verification:</p>

      <!-- Email -->
      <input class="form-control form-control-lg mb-4 text-center" type="text" placeholder="CODE" minlength="5" maxlength="5" style="font-size: 3em; font-weight: bold;">

      <button class="btn btn-dark btn-block" type="submit">Valider</button>
    </form>
  </div>

<footer class="footer">
  <?php include('../vue/footer.php') ?>
</footer>


</body>
</html>
