document.getElementById("inscription").addEventListener("submit", function(e){
    //e.preventDefault();

    var erreur;
    var inputs = this.getElementsByTagName("input");
    var selects = this.getElementsByTagName("select");


    for (var j=0; j<selects.length; j++){
        if (!selects[j].value){
            erreur = "Veuillez choisir un partenariat";
        }
    }

    for (var i=0; i<inputs.length; i++){
        if (!inputs[i].value){
            erreur = "Veuillez renseigner tous les champs";
        }
    }

    if (erreur){
        e.preventDefault();
        document.getElementById("erreur").innerHTML = erreur;
        return false;
    }
    else{
        alert('Formulaire envoyé !');
    }
});