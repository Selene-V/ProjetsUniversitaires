import { Portefeuille } from "./Portefeuille";
document.getElementById("valider").addEventListener('click', (event) => {
    const portefeuille = new Portefeuille();
    //let monnaie : number;
    let devise;
    let transaction;
    let montant;
    //monnaie = (document.getElementById("selectDevise") as HTMLSelectElement).options.selectedIndex;
    //devise = (document.getElementById("selectDevise") as HTMLSelectElement).value;
    devise = document.getElementById("selectDevise").selectedOptions[0].innerText;
    transaction = document.getElementById("selectChoix").options.selectedIndex;
    montant = document.getElementById("montant").value;
    console.log(document.getElementById("selectDevise").options);
    //portefeuille.gestionDevises(devise, parseInt(montant), transaction);
});
//# sourceMappingURL=initialisation.js.map