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

/*VERSION 2*/
document.getElementById("connecter").addEventListener("submit", function(e){
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
		alert('Vous êtes connectés !');
	}
	
	/*VERSION 1*/
/*	document.getElementById("connecter").addEventListener("submit", function(e){
	//e.preventDefault();
	var identifiant = document.getElementById("identifiant");
	var mot de passe = document.getElementById("mot de passe");
	
	if (!mot de passe.value){
		erreur="Veuillez renseigner votre mot de passe";
	}

	if (!identifiant.value){
		erreur="Veuillez renseigner votre identifiant";
	}
	
	if (erreur){
		e.preventDefault();
		document.getElementById("erreur").innerHTML = erreur;
		return false;
	}
	else{
		alert("Vous êtes connectés !");
	}
*/	
});