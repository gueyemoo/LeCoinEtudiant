function checkInputSelectedType(elem) {
    // use one of possible conditions
    // if (elem.value == 'Other')
    if (elem.value == 'Sports') { //Sport
        document.getElementById("div-categorie").style.display = 'block';
    } else {
        document.getElementById("div-categorie").style.display = 'none';
    }
}
