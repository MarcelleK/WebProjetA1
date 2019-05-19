/*VERSION 3*/
/*console.log(document.forms["inscription"]["email"]);
document.forms["inscription"].addEventListener("submit", function(e){
			
	var erreur;
	
	var inputs = this;
	
	for (var i=0; i<inputs.length; i++){
	console.log(input[i]);
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
*/
/* VERSION 2*/
document.getElementById("adhesion").addEventListener("submit", function(e){
	//e.preventDefault();
	
	var erreur;
	var inputs = this.getElementsByTagName("input");
	
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

	/*   VERSION 1*/
	/*document.getElementById("inscription").addEventListener("submit", function(e){
	e.preventDefault();var pseudo = document.getElementById("pseudo");
	var email = document.getElementById("email");
	var nom = document.getElementById("nom");
	var prenom = document.getElementById("prenom");
	
	if (!prenom.value){
		erreur="Veuillez renseigner le prénom";
	}
	if (!nom.value){
		erreur="Veuillez renseigner  le nom";
	}
	if (!email.value){
		erreur="Veuillez renseigner le mail";
	}
		if (!pseudo.value){
		erreur="Veuillez renseigner le pseudo";
	}
	if (erreur){
		e.preventDefault();
		document.getElementById("erreur").innerHTML = erreur;
		return false;
	}
	else{
		alert('Formulaire envoyé !');
	}*/
	
});