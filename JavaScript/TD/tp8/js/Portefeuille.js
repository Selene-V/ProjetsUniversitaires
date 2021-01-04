import { Devise } from "./Devise.js";
class Portefeuille {
    constructor() {
        this.listeDevise = [];
        this.tableauTaux = [];
    }
    appelApiTaux() {
        const url = 'https://api.exchangeratesapi.io/latest';
        fetch(url, {
            method: 'get'
        }).then((response) => {
            response.json()
                .then((json) => {
                this.creationListes((json));
            });
        }).catch(function (err) {
            console.error(err);
        });
    }
    creationListes(json) {
        this.tableauTaux = Object.entries(json['rates']);
        const selectDevise = document.getElementById("selectDevise");
        let option;
        option = document.createElement('option');
        option.id = "deviseEUR";
        option.value = "EUR";
        option.innerText = "EUR";
        selectDevise.appendChild(option);
        for (let i = 0; i < Object.entries(json['rates']).length; i++) {
            option = document.createElement('option');
            option.id = "devise" + Object.entries(json['rates'])[i][0];
            option.value = Object.entries(json['rates'])[i][0];
            option.innerText = Object.entries(json['rates'])[i][0];
            selectDevise.appendChild(option);
        }
    }
    deviseExist(monnaieRecherchee) {
        let i = -1;
        this.listeDevise.forEach((value, index) => {
            if (value.nomDevise === monnaieRecherchee) {
                i = index;
            }
        });
        if (i === -1) {
            return false;
        }
        else {
            return i;
        }
    }
    gestionDevises(monnaieRecherchee, montant, transaction) {
        const index = this.deviseExist(monnaieRecherchee);
        // A CHANGER AVEC API
        let taux;
        if (monnaieRecherchee === "EUR") {
            taux = 1;
        }
        else {
            for (let i = 0; i < this.tableauTaux.length; i++) {
                if (this.tableauTaux[i][0] === monnaieRecherchee) {
                    taux = this.tableauTaux[i][1];
                    break;
                }
            }
        }
        if (index === false) {
            //alors la devise nexiste pas, on doit la creer
            // on verifie que l'on n'execute pas un debit
            if (transaction !== 2) {
                const newDevise = new Devise(monnaieRecherchee, montant, taux);
                this.listeDevise.push(newDevise);
                // On ajoute la devise au tableau
                this.ajoutDeviseTableau(monnaieRecherchee, montant);
                this.gestionMontantTotalEuros(newDevise, montant, transaction);
                console.log("-------------CREATION DEVISE-------------");
            }
            else {
                const erreurMontant = document.getElementById("erreurMontant");
                const erreurDevise = document.getElementById("erreurDevise");
                const erreurChoix = document.getElementById("erreurChoix");
                erreurChoix.innerText = "VOUS NE POUVEZ PAS EFFECTUER UN DEBIT SUR UNE DEVISE INEXISTANTE !!";
                erreurMontant.style.display = "none";
                erreurDevise.style.display = "none";
                erreurChoix.style.display = "none";
                erreurChoix.style.display = "block";
                console.log("VOUS NE POUVEZ PAS EFFECTUER UN DEBIT SUR UNE DEVISE INEXISTANTE !");
            }
        }
        // Sinon, la devise existe, on doit modifier le montant
        else {
            const reussi = this.listeDevise[index].gererArgentDevise(montant, transaction);
            // on verifie si l'on est dans un cas de débit et si oui, si on peut retirer l'argent
            // On peut ajouter/retirer
            if (reussi) {
                //this.modifierTableau(monnaieRecherchee, montant);
                this.modifierTableau(this.listeDevise[index], montant, index);
                console.log("------------MODIFIER TABLEAU FIN---------------------");
            }
            // On ne peut pas retirer
            else {
                const erreurMontant = document.getElementById("erreurMontant");
                const erreurDevise = document.getElementById("erreurDevise");
                const erreurChoix = document.getElementById("erreurChoix");
                erreurMontant.innerText = "ATTENTION, VOUS RETIREZ PLUS QUE CE QUE VOUS AVEZ !!";
                erreurMontant.style.display = "none";
                erreurDevise.style.display = "none";
                erreurChoix.style.display = "none";
                erreurMontant.style.display = "block";
                console.log("ATTENTION, VOUS RETIREZ PLUS QUE CE QUE VOUS AVEZ !");
            }
        }
    }
    ajoutDeviseTableau(monnaieRecherchee, montant) {
        const tableauPortefeuille = document.getElementById("tableau");
        // creation de la ligne
        const tr = document.createElement("tr");
        tr.id = monnaieRecherchee;
        // creation des cellules
        const td1 = document.createElement("td");
        td1.innerText = String(montant);
        const td2 = document.createElement("td");
        td2.innerText = monnaieRecherchee;
        tr.appendChild(td1);
        tr.appendChild(td2);
        tableauPortefeuille.appendChild(tr);
    }
    //public modifierTableau(monnaieRecherchee : string, montant : number){
    modifierTableau(deviseModifiee, montant, index) {
        const tableauPortefeuille = document.getElementById("tableau");
        const celluleAsupprimer = document.getElementById(deviseModifiee.nomDevise);
        this.gestionMontantTotalEuros(this.listeDevise[index], montant, transaction);
        // suppression de la ligne
        tableauPortefeuille.removeChild(celluleAsupprimer);
        if (deviseModifiee.montant !== 0) {
            // creation de la ligne
            const tr = document.createElement("tr");
            tr.id = deviseModifiee.nomDevise;
            // creation des cellules
            const td1 = document.createElement("td");
            td1.innerText = String(deviseModifiee.montant);
            const td2 = document.createElement("td");
            td2.innerText = deviseModifiee.nomDevise;
            tr.appendChild(td1);
            tr.appendChild(td2);
            tableauPortefeuille.appendChild(tr);
            // Modification de la liste
            this.listeDevise[deviseModifiee.nomDevise] = deviseModifiee.montant;
        }
        else {
            this.listeDevise.splice(index, 1);
        }
    }
    gestionMontantTotalEuros(newDevise, montantAjoute, transaction) {
        const montantTotal = document.getElementById("montantTotal");
        const calculMontantDevise = montantAjoute / newDevise.tauxConversionEuro;
        let calculMontantTotal;
        if (transaction === 2) {
            calculMontantTotal = parseFloat(montantTotal.innerText) - calculMontantDevise;
        }
        else {
            calculMontantTotal = parseFloat(montantTotal.innerText) + calculMontantDevise;
        }
        montantTotal.innerText = String(calculMontantTotal);
    }
}
let devise;
let transaction;
let montant;
const portefeuille = new Portefeuille();
portefeuille.appelApiTaux();
document.getElementById("valider").addEventListener('click', (event) => {
    //const index = (document.getElementById("selectDevise") as HTMLSelectElement).options.selectedIndex;
    devise = document.getElementById("selectDevise").value;
    //devise = (document.getElementById("selectDevise") as HTMLSelectElement).selectedOptions[index].innerText;
    transaction = document.getElementById("selectChoix").options.selectedIndex;
    montant = document.getElementById("montant").value;
    const montantRGEX = /^\d+\.?\d*$/;
    const montantResult = montantRGEX.test(montant);
    const erreurMontant = document.getElementById("erreurMontant");
    const erreurDevise = document.getElementById("erreurDevise");
    const erreurChoix = document.getElementById("erreurChoix");
    if (montant === "") {
        erreurMontant.innerText = "Veuillez entrez un montant !!";
        erreurMontant.style.display = "none";
        erreurDevise.style.display = "none";
        erreurChoix.style.display = "none";
        erreurMontant.style.display = "block";
        console.log("Veuillez entrez un montant");
    }
    else if (!montantResult) {
        erreurMontant.style.display = "none";
        erreurDevise.style.display = "none";
        erreurChoix.style.display = "none";
        erreurMontant.innerText = "Veuillez taper uniquement des chiffre positifs ex: 2 ou 2.3 !!";
        erreurMontant.style.display = "block";
        console.log('Veuillez taper uniquement des chiffre positifs ex: 2 ou 2.3');
    }
    else if (devise === "choixDevise") {
        erreurMontant.style.display = "none";
        erreurDevise.style.display = "none";
        erreurChoix.style.display = "none";
        erreurDevise.innerText = "Veuillez choisir une devise !!";
        erreurDevise.style.display = "block";
        console.log("Veuillez choisir une devise");
    }
    else if (transaction === 0) {
        erreurMontant.style.display = "none";
        erreurDevise.style.display = "none";
        erreurChoix.style.display = "none";
        erreurChoix.innerText = "Veuillez choisir une transaction !!";
        erreurChoix.style.display = "block";
        console.log("Veuillez choisir une transaction");
    }
    else {
        erreurMontant.style.display = "none";
        erreurChoix.style.display = "none";
        erreurDevise.style.display = "none";
        portefeuille.gestionDevises(devise, parseFloat(montant), transaction);
    }
});
//# sourceMappingURL=Portefeuille.js.map