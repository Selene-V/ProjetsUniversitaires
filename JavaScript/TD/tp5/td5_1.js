/**
 * Variables utiles
 * @type {HTMLElement}
 */
let selectRegion = document.getElementById("region");
let selectDepartement = document.getElementById("departement");
let selectCommune = document.getElementById("commune");
let paragPop = document.getElementById("population");
let popTotale = document.getElementById("population_totale");

let codeRegion;
let codeDepartement;
let population;
let codeP;

let tabReg;
let tabDep;
let tabCom;
/**
 * Permet de recuperer les regions dans l'api
 * url : https://geo.api.gouv.fr/regions
 * @param url
 * @param nomSelect
 */
function recupRegion(url, nomSelect){
    fetch(url, {
        method: 'get'
    }).then(function(response){
        response.json()
            .then(function(json){
                tabReg = json;
                creationOptions(nomSelect, json);
            })
    }).catch(function(err){

    });
}

/**
 * Permet de recuperer les departements dans l'api
 * url : https://geo.api.gouv.fr/regions/METTRE_NUM_REGION/departements
 * @param url
 * @param nomSelect
 * @param numRegion
 */
function recupDepartement(url, nomSelect, numRegion){
    url = url + numRegion + "/departements";
    fetch(url, {
        method: 'get'
    }).then(function(response){
        response.json()
            .then(function(json){
                tabDep = json;
                creationOptions(nomSelect, json);
            })
    }).catch(function(err){

    });
}

/**
 * Permet de recuperer les communes dans l'api
 * url : https://geo.api.gouv.fr/departements/METTRE_NUM_DEPARTEMENT/communes
 * @param url
 * @param nomSelect
 * @param numDepartement
 */
function recupCommune(url, nomSelect, numDepartement){
    url = url + numDepartement + "/communes";
    fetch(url, {
        method: 'get'
    }).then(function(response){
        response.json()
            .then(function(json){
                tabCom = json;
                creationOptions(nomSelect, json);
            })
    }).catch(function(err){

    });
}

/**
 * permet de creer les options dans le select passé en parametre
 * @param nomSelect
 * @param res
 */
function creationOptions(nomSelect, res){
    let select = document.getElementById(nomSelect);
    let option;
    for(let i = 0 ; i<res.length ; i++){
        option = document.createElement('option');
        option.id = nomSelect + " " + res[i].nom;
        option.value = res[i].nom;
        option.innerText = res[i].nom;
        select.appendChild(option);
    }
}

/**
 * Permet de supprimer toutes les options des selects
 * @param nomSelect
 */
function deleteOptions(nomSelect){
    let selectChild = document.getElementById(nomSelect);
    while (selectChild.firstChild) {
        selectChild.removeChild(selectChild.firstChild);
    }
    let select = document.getElementById(nomSelect);
    let option;
    option = document.createElement('option');
    option.id = nomSelect + " 0";
    let nomOption
    if (nomSelect === "departement"){
        nomOption = "Départements";
    }
    if (nomSelect === "commune"){
        nomOption = "Communes"
    }
    option.value = nomOption;
    option.innerText = nomOption;
    select.appendChild(option);
}

/**
 * Permet de cacher le tableau de communes
 */
function cacherDonnees(){
    let tabCodePostal = document.getElementById("tab_code_post");
    tabCodePostal.style.display = "none";

    let bouton = document.getElementById("bouton");
    bouton.style.display = "none";
}

/**
 * Permet de montrer le tableau de communes
 */
function montrerDonnees(){
    let tabCodePostal = document.getElementById("tab_code_post");
    tabCodePostal.style.display = "block";

    let bouton = document.getElementById("bouton");
    bouton.style.display = "block";
}

/**
 * Permet de creer les lignes du tableau avec les communes ayant le meme code postale
 * que celle selectionnee
 * @param infos
 */
function creationLigneTab(infos){
    let tabCodePostal = document.getElementById("tab_code_post");
    let ligne = document.createElement('tr');
    tabCodePostal.appendChild(ligne);

    let lnom = document.createElement('td');
    lnom.innerText = infos.nom;
    ligne.appendChild(lnom);

    let lcode = document.createElement('td');
    lcode.innerText = infos.codesPostaux[0];
    ligne.appendChild(lcode);

    let lpop = document.createElement('td');
    if (infos.population === undefined){
        lpop.innerText = "Pas d'informations";
    } else {
        lpop.innerText = infos.population;
    }
    ligne.appendChild(lpop);
}


function viderDonnees(){
    // Vider le tableau de communes + cp + pop
    let tabCodePostal = document.getElementById("tab_code_post");
    while (tabCodePostal.firstChild) {
        tabCodePostal.removeChild(tabCodePostal.firstChild);
    }

    let ligne = document.createElement('tr');
    tabCodePostal.appendChild(ligne);

    let nom = document.createElement('th');
    nom.innerText = "Nom";
    ligne.appendChild(nom);

    let cP = document.createElement('th');
    cP.innerText = "Code Postal";
    ligne.appendChild(cP);

    let pop = document.createElement('th');
    pop.innerText = "Population";
    ligne.appendChild(pop);


}

/**
 *
 * Ajout des evenements
 */
selectRegion.addEventListener('change', (event) => {
    affichageRegion(event);
});

selectDepartement.addEventListener('change', (event) => {
    affichageDepartement(event);
});

selectCommune.addEventListener('change', (event) => {
    affichageFinal(event);
});

function affichageRegion(event){
    deleteOptions("departement");
    tabReg.forEach((elem, key) => {
        if (tabReg[key].nom === event.target.value){
            codeRegion = tabReg[key].code;
            localStorage.setItem("Region", JSON.stringify(event.target.value));
        }
    });
    paragPop.innerText= "";
    popTotale.innerText = "";
    deleteOptions("commune");
    recupDepartement('https://geo.api.gouv.fr/regions/', "departement", codeRegion);
    cacherDonnees();
}

function affichageRegionSansEvent(regionCourante){
    creationOptions("region", tabReg);
    let regionC = "region " + regionCourante;
    let optionChoisie = document.getElementById(regionC);
    optionChoisie.selected = true;
    deleteOptions("departement");
    tabReg.forEach((elem, key) => {
        if (tabReg[key].nom === regionCourante){
            codeRegion = tabReg[key].code;
            localStorage.setItem("Region", JSON.stringify(regionCourante));
        }
    });
    paragPop.innerText= "";
    popTotale.innerText = "";
    deleteOptions("commune");
    affichageDepartementSansEvent(JSON.parse(localStorage.getItem("Departement")));
    //cacherDonnees();
}

function affichageDepartementSansEvent(departementCourant){
    creationOptions("departement", tabDep);
    let departementC = "departement " + departementCourant;
    let optionChoisie = document.getElementById(departementC);
    optionChoisie.selected = true;
    paragPop.innerText= "";
    popTotale.innerText ="";
    deleteOptions("commune");
    tabDep.forEach((elem, key) => {
        if (tabDep[key].nom === departementCourant) {
            codeDepartement = tabDep[key].code;
            localStorage.setItem("Departement", JSON.stringify(departementCourant));
        }
    });
    cacherDonnees();
    affichageCommuneSansEvent(JSON.parse(localStorage.getItem("Commune")));
}

function affichageCommuneSansEvent(communeCourante){
    creationOptions("commune", tabCom);
    let communeC = "commune " + communeCourante;
    let optionChoisie = document.getElementById(communeC);
    optionChoisie.selected = true;
    tabCom.forEach((elem, key) => {
        if (tabCom[key].nom === communeCourante) {
            population = tabCom[key].population;
            codeP = tabCom[key].codesPostaux[0];
        }
    });
    if (population === undefined){
        paragPop.innerText= "Population : Pas d'informations";
    } else if(communeCourante === "Communes"){
        paragPop.innerText="";
        popTotale.innerText ="";
    }
    else {
        paragPop.innerText= "Population : " + population;
    }

    // Affichage tableau + population totale
    let sumPop = 0;

    if (communeCourante === "Communes"){
        cacherDonnees();
    } else {
        montrerDonnees();
        viderDonnees();
        tabCom.forEach((elem, key) => {
            if (tabCom[key].codesPostaux[0] === codeP) {
                if (tabCom[key].population !== undefined){
                    sumPop += tabCom[key].population;
                }
                creationLigneTab(tabCom[key]);
            }
        });
    }

    if (sumPop === 0){
        popTotale.innerText = "Population totale : Pas d'informations";
    } else {
        popTotale.innerText = "Population totale : " + sumPop + " habitants.";
    }
    localStorage.setItem("Commune", JSON.stringify(communeCourante));
    maintienDonneesTabs();
}

function affichageDepartement(event){
    paragPop.innerText= "";
    popTotale.innerText ="";
    deleteOptions("commune");
    tabDep.forEach((elem, key) => {
        if (tabDep[key].nom === event.target.value) {
            codeDepartement = tabDep[key].code;
            localStorage.setItem("Departement", JSON.stringify(event.target.value));
        }
    });
    recupCommune('https://geo.api.gouv.fr/departements/', "commune", codeDepartement);
    cacherDonnees();
}

function affichageFinal(event){
    // affichage population
    tabCom.forEach((elem, key) => {
        if (tabCom[key].nom === event.target.value) {
            population = tabCom[key].population;
            codeP = tabCom[key].codesPostaux[0];
        }
    });
    if (population === undefined){
        paragPop.innerText= "Population : Pas d'informations";
    } else if(event.target.value === "Communes"){
        paragPop.innerText="";
        popTotale.innerText ="";
    }
    else {
        paragPop.innerText= "Population : " + population;
    }

    // Affichage tableau + population totale
    let sumPop = 0;

    if (event.target.value === "Communes"){
        cacherDonnees();
    } else {
        montrerDonnees();
        viderDonnees();
        tabCom.forEach((elem, key) => {
            if (tabCom[key].codesPostaux[0] === codeP) {
                if (tabCom[key].population !== undefined){
                    sumPop += tabCom[key].population;
                }
                creationLigneTab(tabCom[key]);
            }
        });
    }

    if (sumPop === 0){
        popTotale.innerText = "Population totale : Pas d'informations";
    } else {
        popTotale.innerText = "Population totale : " + sumPop + " habitants.";
    }
    localStorage.setItem("Commune", JSON.stringify(event.target.value));
    maintienDonneesTabs();
}

function maintienDonneesTabs(){
    localStorage.setItem("Communes", JSON.stringify(tabCom));
    localStorage.setItem("Departements", JSON.stringify(tabDep));
    localStorage.setItem("Regions", JSON.stringify(tabReg));
}

function recuperationDonnees(){
    tabReg = JSON.parse(localStorage.getItem("Regions"));
    tabDep = JSON.parse(localStorage.getItem("Departements"));
    tabCom = JSON.parse(localStorage.getItem("Communes"));
    //comCourante = localStorage.getItem("Commune");
    //depCourant = localStorage.getItem("Departement");
    //regCourante = localStorage.getItem("Region");

    if ((tabReg !== null ) && (tabDep !== null) && (tabCom !== null)){
        return true;
    } else {
        return false;
    }
}


/**
 * permet d'initialisé les selects
 *
 * url region : https://geo.api.gouv.fr/regions
 * url departement/reg : https://geo.api.gouv.fr/regions/METTRE_NUM_REGION/departements
 * url commune/dep : https://geo.api.gouv.fr/departements/METTRE_NUM_DEPARTEMENT/communes
 */
function init(){
    // initialisation des regions

    if (recuperationDonnees()){
        affichageRegionSansEvent(JSON.parse(localStorage.getItem("Region")));
    } else {
        recupRegion('https://geo.api.gouv.fr/regions', "region");
    }
}

init();
