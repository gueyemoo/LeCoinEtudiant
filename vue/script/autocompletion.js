
        function autocomplete(inp, arr) {
          /*les deux arguments sont l'input et l'array contenant les données de complétion*/
          var currentFocus;
          /*execute une fonction lorsqu'une saisie est en cours*/
          inp.addEventListener("input", function(e) {
              var a, b, i, val = this.value;
              /*fermeture des autocompletions déjà existantes*/
              closeAllLists();
              if (!val) { return false;}
              currentFocus = -1;
              /*création d'une DIV contenant les éléments de completion :*/
              a = document.createElement("DIV");
              a.setAttribute("id", this.id + "autocomplete-list");
              a.setAttribute("class", "autocomplete-items");
              /*Ajoute DIV en tant qu'enfant de la div contenant l'input:*/
              this.parentNode.appendChild(a);
              for (i = 0; i < arr.length; i++) {
                /*vérifie si l'élément commence par la même lettre que le texte saisie:*/
                if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                  /*Création d'une DIV pour chaque élément correspondant:*/
                  b = document.createElement("DIV");
                  /*Met en gras les lettres correspondantes:*/
                  b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                  b.innerHTML += arr[i].substr(val.length);
                  b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                  /*execute une fonction lors d'un clic sur un élément de DIV:*/
                  b.addEventListener("click", function(e) {
                      /*insertion de l'autocompletion dans l'input:*/
                      inp.value = this.getElementsByTagName("input")[0].value;
                      closeAllLists();
                  });
                  a.appendChild(b);
                }
              }
          });
          /*execute une fonction lors d'appuye sur une touche de clavier*/
          inp.addEventListener("keydown", function(e) {
              var x = document.getElementById(this.id + "autocomplete-list");
              if (x) x = x.getElementsByTagName("div");
              if (e.keyCode == 40) {
                /*lors d'appuye sur la fleche du bas,
                on incrémente le focus d'élément de DIV:*/
                currentFocus++;
                addActive(x);
              } else if (e.keyCode == 38) { //up
                /*lors d'appuye sur la fleche du haut,
                on décrémente le focus d'élément de DIV:*/
                currentFocus--;
                addActive(x);
              } else if (e.keyCode == 13) {
                /*lors d'appuye sur ENTER, on empeche l'envoie du form,*/
                e.preventDefault();
                if (currentFocus > -1) {
                  /*et on le remplace par un clic:*/
                  if (x) x[currentFocus].click();
                }
              }
          });
          function addActive(x) {
            /*fonction pour classer un item comme "active":*/
            if (!x) return false;
            /*on enleve "active" de tout les items:*/
            removeActive(x);
            if (currentFocus >= x.length) currentFocus = 0;
            if (currentFocus < 0) currentFocus = (x.length - 1);
            /*on ajoute la classe "autocomplete-active":*/
            x[currentFocus].classList.add("autocomplete-active");
          }
          function removeActive(x) {
            /*fonction pour retire "active" des éléments de DIV:*/
            for (var i = 0; i < x.length; i++) {
              x[i].classList.remove("autocomplete-active");
            }
          }
          function closeAllLists(elmnt) {
            /*ferme toutes les listes du doc sauf celle en argument*/
            var x = document.getElementsByClassName("autocomplete-items");
            for (var i = 0; i < x.length; i++) {
              if (elmnt != x[i] && elmnt != inp) {
                x[i].parentNode.removeChild(x[i]);
              }
            }
          }
          /*execute une fonction lors d'un clic sur la page:*/
          document.addEventListener("click", function (e) {
              closeAllLists(e.target);
          });
        }
