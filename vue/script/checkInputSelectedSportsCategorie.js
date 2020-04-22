function checkInputSelectedSportsCategorie(elem) {
    // use one of possible conditions
    // if (elem.value == 'Other')
    if (elem.value == "Athlétisme") { //Sport
        document.getElementById("div-sous-categorie1").style.display = 'block';
        document.getElementById("div-sous-categorie2").style.display = 'none';
        document.getElementById("div-sous-categorie3").style.display = "none";
        document.getElementById("div-sous-categorie4").style.display = "none";
        document.getElementById("div-sous-categorie5").style.display = "none";
        document.getElementById("div-sous-categorie6").style.display = "none";
        document.getElementById("div-sous-categorie7").style.display = "none";
        document.getElementById("div-sous-categorie8").style.display = "none";
        document.getElementById("div-sous-categorie9").style.display = "none";


    } else if(elem.value == "Sports collectifs"){
        document.getElementById("div-sous-categorie1").style.display = 'none';
        document.getElementById("div-sous-categorie2").style.display = "block";
        document.getElementById("div-sous-categorie3").style.display = "none";
        document.getElementById("div-sous-categorie4").style.display = "none";
        document.getElementById("div-sous-categorie5").style.display = "none";
        document.getElementById("div-sous-categorie6").style.display = "none";
        document.getElementById("div-sous-categorie7").style.display = "none";
        document.getElementById("div-sous-categorie8").style.display = "none";
        document.getElementById("div-sous-categorie9").style.display = "none";


    } else if(elem.value == "Cyclisme"){
      document.getElementById("div-sous-categorie1").style.display = 'none';
      document.getElementById("div-sous-categorie2").style.display = 'none';
      document.getElementById("div-sous-categorie3").style.display = "block";
      document.getElementById("div-sous-categorie4").style.display = "none";
      document.getElementById("div-sous-categorie5").style.display = "none";
      document.getElementById("div-sous-categorie6").style.display = "none";
      document.getElementById("div-sous-categorie7").style.display = "none";
      document.getElementById("div-sous-categorie8").style.display = "none";
      document.getElementById("div-sous-categorie9").style.display = "none";


    } else if(elem.value == "Sports de cible"){
      document.getElementById("div-sous-categorie1").style.display = 'none';
      document.getElementById("div-sous-categorie2").style.display = 'none';
      document.getElementById("div-sous-categorie3").style.display = "none";
      document.getElementById("div-sous-categorie4").style.display = "block";
      document.getElementById("div-sous-categorie5").style.display = "none";
      document.getElementById("div-sous-categorie6").style.display = "none";
      document.getElementById("div-sous-categorie7").style.display = "none";
      document.getElementById("div-sous-categorie8").style.display = "none";
      document.getElementById("div-sous-categorie9").style.display = "none";


    }else if(elem.value == "Sports de glisse"){
      document.getElementById("div-sous-categorie1").style.display = 'none';
      document.getElementById("div-sous-categorie2").style.display = 'none';
      document.getElementById("div-sous-categorie3").style.display = "none";
      document.getElementById("div-sous-categorie4").style.display = "none";
      document.getElementById("div-sous-categorie5").style.display = "block";
      document.getElementById("div-sous-categorie6").style.display = "none";
      document.getElementById("div-sous-categorie7").style.display = "none";
      document.getElementById("div-sous-categorie8").style.display = "none";
      document.getElementById("div-sous-categorie9").style.display = "none";

    }else if(elem.value == "Sports nautiques"){
      document.getElementById("div-sous-categorie1").style.display = 'none';
      document.getElementById("div-sous-categorie2").style.display = 'none';
      document.getElementById("div-sous-categorie3").style.display = "none";
      document.getElementById("div-sous-categorie4").style.display = "none";
      document.getElementById("div-sous-categorie5").style.display = "none";
      document.getElementById("div-sous-categorie6").style.display = "block";
      document.getElementById("div-sous-categorie7").style.display = "none";
      document.getElementById("div-sous-categorie8").style.display = "none";
      document.getElementById("div-sous-categorie9").style.display = "none";

    }else if(elem.value =="Sports de combat"){
      document.getElementById("div-sous-categorie1").style.display = 'none';
      document.getElementById("div-sous-categorie2").style.display = 'none';
      document.getElementById("div-sous-categorie3").style.display = "none";
      document.getElementById("div-sous-categorie4").style.display = "none";
      document.getElementById("div-sous-categorie5").style.display = "none";
      document.getElementById("div-sous-categorie6").style.display = "none";
      document.getElementById("div-sous-categorie7").style.display = "block";
      document.getElementById("div-sous-categorie8").style.display = "none";
      document.getElementById("div-sous-categorie9").style.display = "none";

    }else if(elem.value =="Sports de raquette"){
      document.getElementById("div-sous-categorie1").style.display = 'none';
      document.getElementById("div-sous-categorie2").style.display = 'none';
      document.getElementById("div-sous-categorie3").style.display = "none";
      document.getElementById("div-sous-categorie4").style.display = "none";
      document.getElementById("div-sous-categorie5").style.display = "none";
      document.getElementById("div-sous-categorie6").style.display = "none";
      document.getElementById("div-sous-categorie7").style.display = "none";
      document.getElementById("div-sous-categorie8").style.display = "block";
      document.getElementById("div-sous-categorie9").style.display = "none";

    } else if(elem.value == "Autres"){
      document.getElementById("div-sous-categorie1").style.display = 'none';
      document.getElementById("div-sous-categorie2").style.display = 'none';
      document.getElementById("div-sous-categorie3").style.display = "none";
      document.getElementById("div-sous-categorie4").style.display = "none";
      document.getElementById("div-sous-categorie5").style.display = "none";
      document.getElementById("div-sous-categorie6").style.display = "none";
      document.getElementById("div-sous-categorie7").style.display = "none";
      document.getElementById("div-sous-categorie8").style.display = "none";
      document.getElementById("div-sous-categorie9").style.display = "block";
    }
}
