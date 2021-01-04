// Meteo
// url : http://api.openweathermap.org/data/2.5/weather?q=bordeaux&lang=fr&units=metric&appid=54c648d5c4d90b040a403f7ccb3cfb64
// cle api = 54c648d5c4d90b040a403f7ccb3cfb64

/**
 * Methode pour recupérer les données contenues dans le localstorage
 * @param donnees
 */
function recuperationCommuneCourante(){
    let ville = localStorage.getItem("Commune");
    return (ville && JSON.parse(ville));
}

// url : http://api.openweathermap.org/data/2.5/weather?q=
// + ville
// + cle : &lang=fr&units=metric&appid=54c648d5c4d90b040a403f7ccb3cfb64
// &lang=fr permet de traduire en francais les valeurs
// &units=metric permet de convertir en degres celsius
/**
 * Methode permettant de recuperer les données météo de la ville concernée via l'API
 * @param ville
 */
function recupAPIMeteo(ville){
    let url = 'http://api.openweathermap.org/data/2.5/weather?q='
    let cle = '&lang=fr&units=metric&appid=54c648d5c4d90b040a403f7ccb3cfb64';
    url = url + ville + cle;
    fetch(url, {
        method: 'get'
    }).then(function(response){
        response.json()
            .then(function(json){
                creationPage(ville, json);
            })
    }).catch(function(err){

    });
}

/**
 * permet de remplir les paragraphes avec les valeurs recupérées de l'API
 * @param ville
 * @param json
 */
function creationPage(ville, json){
    let villeCourante = document.getElementById("ville");
    villeCourante.innerText = "Prévision météo du jour pour la ville " + ville + " :";
    let temperature = document.getElementById("temperature");
    temperature.innerText = "Température : " + json['main']['temp'] + " °C";
    let ressentie = document.getElementById("ressenti");
    ressentie.innerText = "Ressentie : " + json['main']['feels_like'] + " °C";
    let minimale = document.getElementById("minimale");
    minimale.innerText = "Minimale : " + json['main']['temp_min'] + " °C";
    let maximale = document.getElementById("maximale");
    maximale.innerText = "Maximale : " + json['main']['temp_max'] + " °C";
    let temps = document.getElementById("temps");
    temps.innerText = "Temps : " + json['weather'][0]['description'];
    let imgTemps = document.getElementById("img");
    imgTemps.setAttribute("src", "http://openweathermap.org/img/wn/" + json['weather'][0]['icon'] + "@2x.png");
    let pourcentageHumidité = document.getElementById("pourcentageHumidité");
    pourcentageHumidité.innerText = "Pourcentage d'humidité : " + json['main']['humidity'] + "%";
}

/**
 * Fait appelle aux fonctions pour faire la page
 */
function initialisationPageMeteo(){
    let ville = recuperationCommuneCourante();
    recupAPIMeteo(ville);
}

initialisationPageMeteo();