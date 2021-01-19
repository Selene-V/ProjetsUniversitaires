const token = localStorage.getItem('token');
let user;

findUserConnected();
recuperationThemes();

let bChoixTheme = document.getElementById("validation-inscription");

function recuperationThemes(){
    const url = 'http://' + environnement[0].url + '/api/themes/' + token;
    fetch(url, {
        method: 'GET'
    }).then(function(response){
        response.json()
            .then(function(json){
                deleteOptions();
                creationOptionsSelect(json);
                bChoixTheme.addEventListener("click", function (e){
                    const select = document.getElementById("select-themes");
                    const idThemeChoisi = select.options[select.selectedIndex].value;
                    const nomThemeChoisi = select.options[select.selectedIndex].text;
                    const help = document.getElementById("themeHelp");
                    if (idThemeChoisi !== "0"){console.log("ok");
                        help.style.display = "none";
                        //localStorage.setItem('idThemeChoisi', idThemeChoisi);
                        sessionStorage.setItem('nomThemeChoisi', nomThemeChoisi);
                        addQuizz(idThemeChoisi);
                    } else {
                        help.style.display = "block";
                    }
                });
            })
    }).catch(function(error){
    });
}

/**
 * permet de creer les options dans le select theme
 * @param res
 */
function creationOptionsSelect(res){
    let select = document.getElementById("select-themes");
    let option;
    for(let i = 0 ; i<res.length ; i++){
        option = document.createElement('option');
        option.id = res[i].nom;
        option.value = res[i].id;
        option.innerText = res[i].nom;
        select.appendChild(option);
    }
}

/**
 * Permet de supprimer toutes les options du select
 */
function deleteOptions(){
    let selectChild = document.getElementById("select-themes");
    while (selectChild.firstChild) {
        selectChild.removeChild(selectChild.firstChild);
    }
    let select = document.getElementById("select-themes");
    let option;
    option = document.createElement('option');
    option.id = "Choix du thème";
    option.value = 0;
    option.innerText = "Choix du thème";
    select.appendChild(option);
}

function addQuizz(theme){
    // Ajout du quizz à l'API
    const url = 'http://' + environnement[0].url + '/api/quizz/' + token;
    console.log(theme);
    console.log(url);
    fetch(url, {
        method: 'POST',
        body: JSON.stringify({
            idTheme: theme,
            mode: 0,
            user1: user,
        }),
        headers: {
            'Content-type': 'application/json; charset=UTF-8',
        },
    }).then(function(response){
        response.json()
            .then(function(json){
                sessionStorage.setItem('idQuizz', json.id);
                window.location.href="quizz_solo.html";
            })
    }).catch(function(error){
    });
}

function findUserConnected(){
    const url = 'http://' + environnement[0].url + '/api/user/loggedIn/' + token;
    fetch(url, {
        method: 'GET'
    }).then(function(response){
        response.json()
            .then(function(json) {
                user = json.user.id;
            })
    }).catch(function(error){
    });
}