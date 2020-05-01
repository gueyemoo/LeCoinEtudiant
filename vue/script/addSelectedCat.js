function addSelectedCat(elem) {

    if (elem.value == "Sports") { //Sport
      // On commence par enlever la categorie deja existante (si elle existe)
        if(document.getElementById('cat').lastChild) {
          var elemSup = document.getElementById('cat').lastChild;
          document.getElementById('catCache').appendChild(elemSup);
        }
      // puis on ajouter la categorie selectionnee
        var elemAjout = document.getElementById('div-categorieSport');
        document.getElementById('cat').appendChild(elemAjout);
    }
    else if (elem.value == "Festif") { //Festif
      // On commence par enlever la categorie deja existante (si elle existe)
        if(document.getElementById('cat').lastChild) {
          var elemSup = document.getElementById('cat').lastChild;
          document.getElementById('catCache').appendChild(elemSup);
        }
      // puis on ajouter la categorie selectionnee
        var elemAjout = document.getElementById('div-categorieFestif');
        document.getElementById('cat').appendChild(elemAjout);
    }
    else if (elem.value == "Educatif") { //Educatif
      // On commence par enlever la categorie deja existante (si elle existe)
        if(document.getElementById('cat').lastChild) {
          var elemSup = document.getElementById('cat').lastChild;
          document.getElementById('catCache').appendChild(elemSup);
        }
      // puis on ajouter la categorie selectionnee
        var elemAjout = document.getElementById('div-categorieEducatif');
        document.getElementById('cat').appendChild(elemAjout);
    }
    else if(elem.value == 0){
    // On commence par enlever la categorie deja existante (si elle existe)
      if(document.getElementById('cat').lastChild) {
        var elemSup = document.getElementById('cat').lastChild;

        if (document.getElementById('sousCat').lastChild) { //supp de la sous-cat
          elemSupChild = document.getElementById('sousCat').lastChild;
          document.getElementById('sousCatCache').appendChild(elemSupChild);

        }
        document.getElementById('catCache').appendChild(elemSup);
      }
      // puis on ajouter la categorie selectionnee
        var elemAjout = document.getElementById('div-catVide');
        document.getElementById('cat').appendChild(elemAjout);
  }
  }
