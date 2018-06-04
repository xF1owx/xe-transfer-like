let regexxCourriel = /.+@.+\..+/;
let formulaireElt = document.querySelector("form");

messErreur="";


if ( !regexxCourriel.test(formulaireElt.userMail.value) ) {
    messErreur = "Vous devez entrer un mail valide!";
document.querySelector('.erreurmail').innerHTML= messErreur; 
}