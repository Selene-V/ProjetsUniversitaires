import {Devise} from "./Devise.js";

class Portefeuille{
    private listeDevise : Array<Devise> = [];
    private montantTotal : number = 0;

    public deviseExist(monnaieRecherchee : string):boolean | number{
        let index : number = -1;
        for (let i :number = 0 ; i<this.listeDevise.length ; i++){
            console.log(this.listeDevise);
            if (this.listeDevise[i].nomDevise === monnaieRecherchee){
                index = i;
                break;
            }
        }
        if (index !== -1){
            return index;
        } else {
            return false;
        }
    }

    public gestionDevises(monnaieRecherchee: string, montant: number, transaction: number) : Devise[]{
        console.log("on rentre ?");
        const index : number | boolean = this.deviseExist(monnaieRecherchee);
        if (index !== false){
            const deviseCourante : Devise = this.listeDevise[index as number];
            console.log(deviseCourante);
            const reussi : boolean = deviseCourante.gererArgentDevise(montant, transaction);
            const conversionMontant : number = montant*deviseCourante.tauxConversionEuro;
            //A REFAIRE
            this.montantTotal += conversionMontant;
            console.log(reussi);
            if (reussi){
                //TODO on met a jour l'interface et les montants
                console.log("on a reussi !")!
                this.modifTableau(deviseCourante);
                this.gestionMontantTotalEuros();
            } else {
                console.log("on a pas assez d'argent !")!
                //TODO on laisse l'interface, et on ecrit "erreur, vous n'avez pas assez d'argent"
            }
        } else {
            console.log("le devise n'existe pas");
            // TODO la devise n'existe pas donc on la cree et on ajoute le montant + maj montant total
            const taux = 1;
            const tableauChild = (document.getElementById("tableau") as HTMLTableElement).children[0];

            const tr = document.createElement("tr");
            const td1 = document.createElement("td");
            td1.innerText = "" + montant;
            const td2 = document.createElement("td");
            td2.innerText = monnaieRecherchee
            tr.appendChild(td1);
            tr.appendChild(td2);
            console.log(tr);
            tableauChild.appendChild(tr);
            const newDevise = new Devise(monnaieRecherchee, taux);
            //this.listeDevise.push(newDevise);

        }

        return this.listeDevise;
    }

    public modifTableau(deviseCourante : Devise){
        console.log(deviseCourante);
        const tableauChild = (document.getElementById("tableau") as HTMLTableElement);
        console.log(tableauChild);
        // Recherche ancien noeud
        let valueOldNode : number;
        console.log(tableauChild.children[0]);
        console.log((tableauChild.children[0]).children.length);
        for (let i = 2 ; i<tableauChild.children[0].children.length ; i++){
            console.log("dans la boucle ?");
            console.log(tableauChild.children[0].children[i].children[1].innerHTML);
            if(tableauChild.children[0].children[i].children[1].innerHTML === deviseCourante.nomDevise){
                console.log("on est deda,s");
                console.log(tableauChild.children[0].children[i].children[0].innerHTML);
                valueOldNode = parseFloat(tableauChild.children[0].children[i].children[0].innerHTML as string);

                console.log(valueOldNode);
                tableauChild.children[0].removeChild(tableauChild.children[0].children[i]);
                break;
            }
        }
        // Creation nouveau noeud
        const tr = document.createElement("tr");
        const td1 = document.createElement("td");
        console.log(valueOldNode!);
        td1.innerText = "" + (deviseCourante.montant+valueOldNode! as number);
        const td2 = document.createElement("td");
        td2.innerText = deviseCourante.nomDevise;
        tr.appendChild(td1);
        tr.appendChild(td2);
        console.log("hello");
        console.log(tr);
        tableauChild.children[0].appendChild(tr);
    }

    public gestionMontantTotalEuros(){
        // TODO Maj montanttotal
    }

}

//let monnaie : number;
let devise:string;
let transaction :number;
let montant : string;
const portefeuille = new Portefeuille();

(document.getElementById("valider") as HTMLSelectElement).addEventListener('click', (event) => {

    //const index = (document.getElementById("selectDevise") as HTMLSelectElement).options.selectedIndex;
    devise = (document.getElementById("selectDevise") as HTMLSelectElement).value;
    //devise = (document.getElementById("selectDevise") as HTMLSelectElement).selectedOptions[index].innerText;
    transaction = (document.getElementById("selectChoix") as HTMLSelectElement).options.selectedIndex;
    montant = (document.getElementById("montant") as HTMLInputElement).value;
    console.log(devise);
    console.log(transaction);
    console.log(montant);

    portefeuille.gestionDevises(devise, parseFloat(montant), transaction);
});