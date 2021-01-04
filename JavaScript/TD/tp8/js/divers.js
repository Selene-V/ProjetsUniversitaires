import { Devise } from "./Devise.js";
class Portefeuille {
    constructor() {
        this.listeDevise = [];
        this.montantTotal = 0;
    }
    deviseExist(monnaieRecherchee) {
        let index = -1;
        for (let i = 0; i < this.listeDevise.length; i++) {
            console.log(this.listeDevise);
            if (this.listeDevise[i].nomDevise === monnaieRecherchee) {
                index = i;
                break;
            }
        }
        if (index !== -1) {
            return index;
        }
        else {
            return false;
        }
    }
    gestionDevises(monnaieRecherchee, montant, transaction) {
        console.log("on rentre ?");
        const index = this.deviseExist(monnaieRecherchee);
        if (index !== false) {
            const deviseCourante = this.listeDevise[index];
            console.log(deviseCourante);
            const reussi = deviseCourante.gererArgentDevise(montant, transaction);
            const conversionMontant = montant * deviseCourante.tauxConversionEuro;
            //A REFAIRE
            this.montantTotal += conversionMontant;
            console.log(reussi);
            if (reussi) {
                //TODO on met a jour l'interface et les montants
                console.log("on a reussi !");
                this.modifTableau(deviseCourante);
                this.gestionMontantTotalEuros();
            }
            else {
                console.log("on a pas assez d'argent !");
                //TODO on laisse l'interface, et on ecrit "erreur, vous n'avez pas assez d'argent"
            }
        }
        else {
            console.log("le devise n'existe pas");
            // TODO la devise n'existe pas donc on la cree et on ajoute le montant + maj montant total
            const taux = 1;
            const tableauChild = document.getElementById("tableau").children[0];
            const tr = document.createElement("tr");
            const td1 = document.createElement("td");
            td1.innerText = "" + montant;
            const td2 = document.createElement("td");
            td2.innerText = monnaieRecherchee;
            tr.appendChild(td1);
            tr.appendChild(td2);
            console.log(tr);
            tableauChild.appendChild(tr);
            const newDevise = new Devise(monnaieRecherchee, taux);
            //this.listeDevise.push(newDevise);
        }
        return this.listeDevise;
    }
    modifTableau(deviseCourante) {
        console.log(deviseCourante);
        const tableauChild = document.getElementById("tableau");
        console.log(tableauChild);
        // Recherche ancien noeud
        let valueOldNode;
        console.log(tableauChild.children[0]);
        console.log((tableauChild.children[0]).children.length);
        for (let i = 2; i < tableauChild.children[0].children.length; i++) {
            console.log("dans la boucle ?");
            console.log(tableauChild.children[0].children[i].children[1].innerHTML);
            if (tableauChild.children[0].children[i].children[1].innerHTML === deviseCourante.nomDevise) {
                console.log("on est deda,s");
                console.log(tableauChild.children[0].children[i].children[0].innerHTML);
                valueOldNode = parseFloat(tableauChild.children[0].children[i].children[0].innerHTML);
                console.log(valueOldNode);
                tableauChild.children[0].removeChild(tableauChild.children[0].children[i]);
                break;
            }
        }
        // Creation nouveau noeud
        const tr = document.createElement("tr");
        const td1 = document.createElement("td");
        console.log(valueOldNode);
        td1.innerText = "" + (deviseCourante.montant + valueOldNode);
        const td2 = document.createElement("td");
        td2.innerText = deviseCourante.nomDevise;
        tr.appendChild(td1);
        tr.appendChild(td2);
        console.log("hello");
        console.log(tr);
        tableauChild.children[0].appendChild(tr);
    }
    gestionMontantTotalEuros() {
        // TODO Maj montanttotal
    }
}
//let monnaie : number;
let devise;
let transaction;
let montant;
const portefeuille = new Portefeuille();
document.getElementById("valider").addEventListener('click', (event) => {
    //const index = (document.getElementById("selectDevise") as HTMLSelectElement).options.selectedIndex;
    devise = document.getElementById("selectDevise").value;
    //devise = (document.getElementById("selectDevise") as HTMLSelectElement).selectedOptions[index].innerText;
    transaction = document.getElementById("selectChoix").options.selectedIndex;
    montant = document.getElementById("montant").value;
    console.log(devise);
    console.log(transaction);
    console.log(montant);
    portefeuille.gestionDevises(devise, parseFloat(montant), transaction);
});
//# sourceMappingURL=divers.js.map