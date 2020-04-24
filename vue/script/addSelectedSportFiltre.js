function addSelectedSportFiltre(elem) {

    if (elem.value == "Athlétisme") { //Sport
      // On commence par enlever la sous-categorie deja existante (si elle existe)
        if(document.getElementById('sousCat').lastChild) {
          var elemSup = document.getElementById('sousCat').lastChild;
          document.getElementById('sousCatCache').appendChild(elemSup);
        }
      // puis on ajouter la sous-categorie selectionnee
        var elemAjout = document.getElementById('div-sous-categorie1');
        document.getElementById('sousCat').appendChild(elemAjout);


    } else if(elem.value == "Sports collectifs"){
      // On commence par enlever la sous-categorie deja existante (si elle existe)
        if(document.getElementById('sousCat').lastChild) {
          var elemSup = document.getElementById('sousCat').lastChild;
          document.getElementById('sousCatCache').appendChild(elemSup);
        }
      // puis on ajouter la sous-categorie selectionnee
        var elemAjout = document.getElementById('div-sous-categorie2');
        document.getElementById('sousCat').appendChild(elemAjout);


    } else if(elem.value == "Cyclisme"){
      // On commence par enlever la sous-categorie deja existante (si elle existe)
        if(document.getElementById('sousCat').lastChild) {
          var elemSup = document.getElementById('sousCat').lastChild;
          document.getElementById('sousCatCache').appendChild(elemSup);
        }
      // puis on ajouter la sous-categorie selectionnee
        var elemAjout = document.getElementById('div-sous-categorie3');
        document.getElementById('sousCat').appendChild(elemAjout);


    } else if(elem.value == "Sports de cible"){
      // On commence par enlever la sous-categorie deja existante (si elle existe)
        if(document.getElementById('sousCat').lastChild) {
          var elemSup = document.getElementById('sousCat').lastChild;
          document.getElementById('sousCatCache').appendChild(elemSup);
        }
      // puis on ajouter la sous-categorie selectionnee
        var elemAjout = document.getElementById('div-sous-categorie4');
        document.getElementById('sousCat').appendChild(elemAjout);


    }else if(elem.value == "Sports de glisse"){
      // On commence par enlever la sous-categorie deja existante (si elle existe)
        if(document.getElementById('sousCat').lastChild) {
          var elemSup = document.getElementById('sousCat').lastChild;
          document.getElementById('sousCatCache').appendChild(elemSup);
        }
      // puis on ajouter la sous-categorie selectionnee
        var elemAjout = document.getElementById('div-sous-categorie5');
        document.getElementById('sousCat').appendChild(elemAjout);

    }else if(elem.value == "Sports nautiques"){
      // On commence par enlever la sous-categorie deja existante (si elle existe)
        if(document.getElementById('sousCat').lastChild) {
          var elemSup = document.getElementById('sousCat').lastChild;
          document.getElementById('sousCatCache').appendChild(elemSup);
        }
      // puis on ajouter la sous-categorie selectionnee
        var elemAjout = document.getElementById('div-sous-categorie6');
        document.getElementById('sousCat').appendChild(elemAjout);

    }else if(elem.value =="Sports de combat"){
      // On commence par enlever la sous-categorie deja existante (si elle existe)
        if(document.getElementById('sousCat').lastChild) {
          var elemSup = document.getElementById('sousCat').lastChild;
          document.getElementById('sousCatCache').appendChild(elemSup);
        }
      // puis on ajouter la sous-categorie selectionnee
        var elemAjout = document.getElementById('div-sous-categorie7');
        document.getElementById('sousCat').appendChild(elemAjout);

    }else if(elem.value =="Sports de raquette"){
      // On commence par enlever la sous-categorie deja existante (si elle existe)
        if(document.getElementById('sousCat').lastChild) {
          var elemSup = document.getElementById('sousCat').lastChild;
          document.getElementById('sousCatCache').appendChild(elemSup);
        }
      // puis on ajouter la sous-categorie selectionnee
        var elemAjout = document.getElementById('div-sous-categorie8');
        document.getElementById('sousCat').appendChild(elemAjout);

    } else if(elem.value == "Autres"){
      // On commence par enlever la sous-categorie deja existante (si elle existe)
        if(document.getElementById('sousCat').lastChild) {
          var elemSup = document.getElementById('sousCat').lastChild;
          document.getElementById('sousCatCache').appendChild(elemSup);
        }
      // puis on ajouter la sous-categorie selectionnee
        var elemAjout = document.getElementById('div-sous-categorie9');
        document.getElementById('sousCat').appendChild(elemAjout);

    } else if(elem.value == 0){
      // On commence par enlever la sous-categorie deja existante (si elle existe)
        if(document.getElementById('sousCat').lastChild) {
          var elemSup = document.getElementById('sousCat').lastChild;
          document.getElementById('sousCatCache').appendChild(elemSup);
        }
        // puis on ajouter la sous-categorie selectionnee
          var elemAjout = document.getElementById('div-toutes-cat');
          document.getElementById('sousCat').appendChild(elemAjout);
    }
}
