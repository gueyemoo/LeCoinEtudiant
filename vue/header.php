<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Le Coin Etudiant</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Se Connecter <span class="sr-only">(current)</span></a>
      </li>

      <!-- /////////////////////// -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Vehicules</a>

        <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <!-- //////////// -->

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Multimedia</a>
        <!-- /////////////////////// -->
        <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
          <a class="dropdown-item" href="#"> Lorem ipsum dolor.</a>
          <a class="dropdown-item" href="#">Lorem ipsum dolor.</a>
          <a class="dropdown-item" href="#">Lorem ipsum dolor.</a>
          <a class="dropdown-item" href="#">Lorem ipsum dolor.</a>
        </div>
        <!-- ////////////////////// -->
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Loisirs</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown3">
          <a class="dropdown-item" href="#"> Lorem ipsum dolor.</a>
          <a class="dropdown-item" href="#">Lorem ipsum dolor.</a>
          <a class="dropdown-item" href="#">Lorem ipsum dolor.</a>
          <a class="dropdown-item" href="#">Lorem ipsum dolor.</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown4" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Maison</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown4">
          <a class="dropdown-item" href="#">Lorem ipsum dolor.</a>
          <a class="dropdown-item" href="#">Lorem ipsum dolor.</a>
          <a class="dropdown-item" href="#">Lorem ipsum dolor.<a>
            <a class="dropdown-item" href="#">Lorem ipsum dolor.</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown4" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mode</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown4">
            <a class="dropdown-item" href="#">Lorem ipsum dolor.</a>
            <a class="dropdown-item" href="#">Lorem ipsum dolor.</a>
            <a class="dropdown-item" href="#">Lorem ipsum dolor.<a>
              <a class="dropdown-item" href="#">Lorem ipsum dolor.</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown4" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Services</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown4">
              <a class="dropdown-item" href="#">Lorem ipsum dolor.</a>
              <a class="dropdown-item" href="#">Lorem ipsum dolor.</a>
              <a class="dropdown-item" href="#">Lorem ipsum dolor.<a>
                <a class="dropdown-item" href="#">Lorem ipsum dolor.</a>
              </div>
              <li class="nav-item">
                <a class="nav-link" href="#">Autres</a>
              </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="text" placeholder="Rechercher">
              <button class="btn btn-secondary my-2 my-sm-0" type="submit">Rechercher</button>
            </form>
          </div>
        </nav>

        <a id="button_back_to_top"></a>

        <style media="screen">
        .navbar .nav-item:not(:last-child) {
          margin-right: 35px;
        }

        .dropdown-toggle::after {
          transition: transform 0.15s linear;
        }

        .show.dropdown .dropdown-toggle::after {
          transform: translateY(3px);
        }

        .dropdown-menu {
          margin-top: 0;
        }

        .dropdown-item:hover {
          background-color: #444;
          color: #FFF;
          background-image: none;
        }
        </style>

        <script type="text/javascript">
        const $dropdown = $(".dropdown");
        const $dropdownToggle = $(".dropdown-toggle");
        const $dropdownMenu = $(".dropdown-menu");
        const showClass = "show";

        $(window).on("load resize", function() {
          if (this.matchMedia("(min-width: 768px)").matches) {
            $dropdown.hover(
              function() {
                const $this = $(this);
                $this.addClass(showClass);
                $this.find($dropdownToggle).attr("aria-expanded", "true");
                $this.find($dropdownMenu).addClass(showClass);
              },
              function() {
                const $this = $(this);
                $this.removeClass(showClass);
                $this.find($dropdownToggle).attr("aria-expanded", "false");
                $this.find($dropdownMenu).removeClass(showClass);
              }
            );
          } else {
            $dropdown.off("mouseenter mouseleave");
          }
        });
        </script>

        <!-- /////////////////////////////////BUTTON BACK TO TOP //////////////////////////////////// -->

        <style media="screen">
        #button_back_to_top {
          display: inline-block;
          background-color: #222;
          width: 50px;
          height: 50px;
          text-align: center;
          border-radius: 4px;
          position: fixed;
          bottom: 30px;
          right: 30px;
          transition: background-color .3s,
          opacity .5s, visibility .5s;
          opacity: 0;
          visibility: hidden;
          z-index: 1000;
        }
        #button_back_to_top::after {
          /* content: "\f148"; */
          content: url("../modele/img/top.png");

          font-family: FontAwesome;
          font-weight: normal;
          font-style: normal;
          font-size: 2em;
          line-height: 50px;
          color: #fff;
        }
        #button_back_to_top:hover {
          cursor: pointer;
          background-color: #333;
        }
        #button_back_to_top:active {
          background-color: #555;
        }
        #button_back_to_top.show {
          opacity: 1;
          visibility: visible;
        }
        </style>

        <script type="text/javascript">
        var btn = $('#button_back_to_top');

        $(window).scroll(function() {
          if ($(window).scrollTop() > 300) {
            btn.addClass('show');
          } else {
            btn.removeClass('show');
          }
        });

        btn.on('click', function(e) {
          e.preventDefault();
          $('html, body').animate({scrollTop:0}, '300');
        });
        </script>
        <!-- /////////////////////////////////BUTTON BACK TO TOP //////////////////////////////////// -->
