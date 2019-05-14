document.getElementById("connecter").addEventListener("submit", function (e) {
    //e.preventDefault();

    var erreur;
    var inputs = this.getElementsByTagName("input");

    for (var i = 0; i < inputs.length; i++) {
        if (!inputs[i].value) {
            erreur = "Veuillez renseigner tous les champs";
        }
    }
    if (erreur) {
        e.preventDefault();
        document.getElementById("erreur").innerHTML = erreur;
        return false;
    } else {
        alert('Vous êtes connectés !');
    }
});