const token = localStorage.getItem('token');
const nomThemeChoisi = sessionStorage.getItem("nomThemeChoisi");
const idQuizz = sessionStorage.getItem("idQuizz");
let idQuestionCourante = 0;
let numeroQuestion = 0;
let nbReponsesJustes = 0;
let user;
let intervalId = null;
let time = 10;

const theme = document.getElementById("theme");
theme.innerText = "Quizz sur le thème : " + nomThemeChoisi;

let bQuestion = document.getElementById("validation-question");

bQuestion.addEventListener("click", function(e){
    validerChoix();
});

findUserConnected();
recuperationQuestions(false);

function recuperationQuestions(finQuizz){
    const url = 'http://' + environnement[0].url + '/api/questions/' + token + '?quizzID=' + idQuizz;
    fetch(url, {
        method: 'GET'
    }).then(function(response){
        response.json()
            .then(function(json){
                majVue(json.listQuestions, finQuizz);
            })
    }).catch(function(error){
        console.log(error);
    });
}

function majVue(json, finQuizz){
    const labelQ = document.getElementById("labelQuestion");

    const label11 = document.getElementById("label11");
    const label12 = document.getElementById("label12");
    const label21 = document.getElementById("label21");
    const label22 = document.getElementById("label22");

    const r11 = document.getElementById("inlineRadio11");
    const r12 = document.getElementById("inlineRadio12");
    const r21 = document.getElementById("inlineRadio21");
    const r22 = document.getElementById("inlineRadio22");

    if (!finQuizz){
        console.log(json);
        labelQ.innerText = json[idQuestionCourante].labelQuestion;
        labelQ.value = json[idQuestionCourante].idQuestion;
        label11.innerText = json[idQuestionCourante].listeReponses[0].label;
        r11.value = json[idQuestionCourante].listeReponses[0].id;
        label12.innerText = json[idQuestionCourante].listeReponses[1].label;
        r12.value = json[idQuestionCourante].listeReponses[1].id;
        label21.innerText = json[idQuestionCourante].listeReponses[2].label;
        r21.value = json[idQuestionCourante].listeReponses[2].id;
        label22.innerText = json[idQuestionCourante].listeReponses[3].label;
        r22.value = json[idQuestionCourante].listeReponses[3].id;
        // if (numeroQuestion === 0) {
            start();
        // }
        //  else {
        //     clearInterval(intervalId);
        //     start();
        // }

    } else {
        const motDeLaFin = document.getElementById("fin");
        const compt = document.getElementById("countdown");
        const finButton = document.getElementById("fin-button");
        labelQ.style.display = "none";
        label11.style.display = "none";
        label12.style.display = "none";
        label21.style.display = "none";
        label22.style.display = "none";

        bQuestion.style.display = "none";

        compt.style.display = "none";

        motDeLaFin.innerText = "Vous avez répondu correctement à " + nbReponsesJustes + " réponses sur 4 !";
        motDeLaFin.style.display = "block";
        finButton.style.display = "block";
        finishQuizz();
        sessionStorage.removeItem("idQuizz");
        sessionStorage.removeItem("nomThemeChoisi");
    }
}

function radioChecked(){
    const r11 = document.getElementById("inlineRadio11");
    const r12 = document.getElementById("inlineRadio12");
    const r21 = document.getElementById("inlineRadio21");
    const r22 = document.getElementById("inlineRadio22");
    if (r11.checked){
        r11.checked = false;
        return r11.value;
    }
    if (r12.checked){
        r12.checked = false;
        return r12.value;
    }
    if (r21.checked){
        r21.checked = false;
        return r21.value;
    }
    if (r22.checked){
        r22.checked = false;
        return r22.value;
    }
    return "aucun choix";
}

async function addResponseApi(idQ, choix){
    const url = 'http://' + environnement[0].url + '/api/answerQuestion/' + token;
    console.log(url);
    console.log("IDQ : " + idQ);
    console.log("Choix : " + choix);
    fetch(url, {
        method: 'POST',
        body: JSON.stringify({
            idQuestion: idQ,
            selectedAnswer: choix,
            user: user,
            idQuiz: idQuizz,
        }),
        headers: {
            'Content-type': 'application/json; charset=UTF-8',
        },
    }).then(function(response) {
        return response.json();
    }).then(function (json){
        console.log("ICI");
        
        if (json.isRight){
            console.log("Réponse juste !!");
            nbReponsesJustes++;
        }
        if (numeroQuestion === 4) {
            recuperationQuestions(true);
        }
    }).catch(function(error){
        console.log(error);
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
        console.log(error);
    });
}

function finishQuizz(){
    const url = 'http://' + environnement[0].url + '/api/finish/' + token;
    console.log(url);
    fetch(url, {
        method: 'PATCH',
        body: JSON.stringify({
            mode: 0,
            user1: user,
            quizz: idQuizz,
        }),
        headers: {
            'Content-type': 'application/json; charset=UTF-8',
        },
    }).then(function(response) {
        return response.json();
    }).then(function (json){
        console.log(json);
        
    }).catch(function(error){
        console.log(error);
    });
}

function majVueCountDown(){
    time--;
    let countdown = document.getElementById("countdown");
    countdown.value = time;
    console.log(time);
    if (numeroQuestion < 4){
        if (time=== 0){
            validerChoix();
        }
    }
}

function start(){
    let countdown = document.getElementById("countdown");
    countdown.value = time;
    intervalId = setInterval(majVueCountDown, 1000, );
}

function finish(){
    clearInterval(intervalId);
    time = 10;
}

function validerChoix(){
    const choixHelp = document.getElementById("choixHelp");
    const idQ = document.getElementById("labelQuestion").value;

    let choix = "-1";
    if (time>0){
        choix = radioChecked();
    }
    if (choix === "aucun choix" && time>0){
        choixHelp.style.display = "block";
    } else {
        finish();
        choixHelp.style.display = "none";
        numeroQuestion++;
        addResponseApi(idQ, choix);
        if (numeroQuestion < 4) {
            console.log(numeroQuestion);
            idQuestionCourante++;
            recuperationQuestions(false);
        }
    }

}