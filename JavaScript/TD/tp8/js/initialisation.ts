import {Portefeuille} from "./Portefeuille";


(document.getElementById("valider") as HTMLSelectElement).addEventListener('click', (event) => {
    const portefeuille = new Portefeuille();
    //let monnaie : number;
    let devise:string;
    let transaction :number;
    let montant : string;

    //monnaie = (document.getElementById("selectDevise") as HTMLSelectElement).options.selectedIndex;
    //devise = (document.getElementById("selectDevise") as HTMLSelectElement).value;
    devise = (document.getElementById("selectDevise") as HTMLSelectElement).selectedOptions[0].innerText;
    transaction = (document.getElementById("selectChoix") as HTMLSelectElement).options.selectedIndex;
    montant = (document.getElementById("montant") as HTMLInputElement).value;
    console.log((document.getElementById("selectDevise") as HTMLSelectElement).options);

    //portefeuille.gestionDevises(devise, parseInt(montant), transaction);
});

