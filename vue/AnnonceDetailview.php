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
        <h5><u> Sous Catégorie </u></h5>
        <p style="margin-bottom:0px;"> Chicago City </p>
        <p>Prévu le: 11/02 à 17h</p>

        <br>
        <p>Nombre de participants: <strong> XX</strong></p>
        <p>Nombre d'interessé: <strong>XXX</strong></p>

        <br>
        <h5><u>Contacts</u></h5>
        <p>Mail: adresse@gmail.com</p>
      </div>



      <div class="d-flex flex-column col-md-6 details">
        <h2 id="titreAnnonce">Ceci est un titre de plus ou moins longue taille</h2>

        <h4> <u>Description:</u></h4>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere est officiis ipsam consectetur et ducimus tempore minima neque placeat voluptatibus iste quis, harum, praesentium, soluta, sunt saepe cum magni nobis!</p>
        <div class="row">
          <div class="text-center d-flex flex-column column col-md-5">
            <h6>Participe</h6>
            <p> <a href="#"> <img class="iconeChoix" src="../modele/img/correct_vide.png" alt="correct"> </a> </p>
          </div>
          <div class="text-center d-flex flex-column column col-md-5">
            <h6>Interessé</h6>
            <p> <a href="#"> <img class="iconeChoix" src="../modele/img/heart_vide.png" alt="heart"> </a> </p>
          </div>
        </div>
      </div>
    </div>
  </div>



  <footer class="footer">
    <?php include('footer.php') ?>
  </footer>

</body>
</html>
