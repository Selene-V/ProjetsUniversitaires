const token = localStorage.getItem("token");
const currentUser = JSON.parse(sessionStorage.getItem("currentUser"));

const select = document.getElementById('selectTheme');
const validate = document.getElementById('validate');
const help = document.getElementById("themeHelp");
const validateAnswer = document.getElementById("validation-question");
const choixHelp = document.getElementById("choixHelp");


const selectionScreen = document.getElementById("selectionTheme");
const waitingScreen = document.getElementById("waiting");
const quizzScreen = document.getElementById("quiz");
const resultScreen = document.getElementById("results");
const leavingnScreen = document.getElementById("lostConnection");
const radioGroup = document.getElementsByName("questionsOptions");

var reponseLabel = [];
var radio = [];

const labelTheme = document.getElementById("theme");
const lableQuestion = document.getElementById("labelQuestion");
const timerVue = document.getElementById("countdown");
//reponse 1
radio[0] = document.getElementById("inlineRadio11");
reponseLabel[0] = document.getElementById("label11");
//reponse 2
radio[1] = document.getElementById("inlineRadio12");
reponseLabel[1] = document.getElementById("label12");
//reponse 3
radio[2] = document.getElementById("inlineRadio21");
reponseLabel[2] = document.getElementById("label21");
//reponse 4
radio[3] = document.getElementById("inlineRadio22");
reponseLabel[3] = document.getElementById("label22");

const scoreDisplay = document.getElementById("score");
const resultDisplay = document.getElementById("resultDisplay");


var socket = null;

var themeId = null;
var themeName = null
var quizzId = null;
var quizz = null;
var questionId = null;
var adversaryId = null;

var timer = 10;
var timerIntervalId = null;
var userStartedFirst = false;
var turn = 0;
var correctAnswers = 0;
var quizzOver = false;



window.addEventListener("load", ()=>{
    setThemes();
    

    socket = new WebSocket('ws://127.0.0.1:8889/');

    socket.addEventListener("open", ()=>{
        console.log('connection is opened. Waiting for messages!');

        socket.send(JSON.stringify({
            type: "connect",
            user_id: currentUser.id
        }));
    });

    socket.addEventListener("message", (msg)=>{
        data = JSON.parse(msg.data);
        
        switch(data.type){
            case 'connect':
                console.log('Conection established : ', data.message?'true' : 'false');
                break;
            case 'is_user_waiting':
                isUserWaiting(data);
                break;
            case 'no_player':
                saveQuestions(data.message);
                break;
            case 'starting_first':
                console.log("Quiz started, your turn");
                userStartedFirst = true;
                adversaryId = data.adversary;
                saveQuestions(data.questions);
                responding(0);
                break;
            case 'starting_second':
                console.log("Quiz started, waiting for other player");
                themeName = data.theme;
                adversaryId = data.adversary;
                saveQuestions(data.questions);
                wait();
                break;
            case 'need_to_wait':
                console.log("waiting for other player");
                wait();
                break;
            case 'need_to_respond':
                console.log("your turn");
                if(userStartedFirst){
                    responding(data.question+1);
                }else{
                    responding(data.question);
                }
                
                break;
            case 'finish_quizz':
                quizzOver = true;
                console.log(data);
                if(userStartedFirst){
                    sendEndQuiz(data);
                }
                break;
            case 'close_connection':
                if(!userStartedFirst){
                    endQuizzUser2(data);
                }
                clearQuizz();
                socket.close();
                break;
            default:
                console.log('message recieved : ', data);
            break;
        }
        
    });

    socket.addEventListener("close", ()=>{
        if(quizzOver){
            quizzOver = false;
        }else{
            console.log("second joueur deconnecté");
        }
    });

    socket.addEventListener("error", (error)=>{
        console.log('An error as occured: ', error.data);
    });
});

function saveQuestions(questions){
    console.log(questions);
    
    localStorage.setItem("listQuestions", JSON.stringify(questions));
}

function clearQuizz(){
    themeId = null;
    themeName = null
    quizzId = null;
    quizz = null;
    questionId = null;
    adversaryId = null;
    
    timer = 10;
    clearInterval(timerIntervalId);
    userStartedFirst = false;
    turn = 0;
    correctAnswers = 0;
    quizzOver = false;

    localStorage.removeItem("listQuestions");
}

/**
 * TIMER
 * 
*/
function startTimer(){
    timerVue.value = timer;
    timerIntervalId = setInterval(function(){timerActions()}, 1000, );
}

function timerActions(){
    if(timer <= 0){
        timerEnded();
    }
    timerVue.value = timer;
    timer--;
}

async function timerEnded(){
    clearTimer();
    
    let answerId = -1 ;
    if(checkRadioAnswer() !== "no_answers"){
        answerId = checkRadioAnswer();
    }

    let verif = await sendAnswer(questionId, answerId, quizzId);
    
    console.log(verif.isRight);
    
    if(verif.isRight){
        console.log("Bonne reponse :)");
        correctAnswers++;
    }
    if(!userStartedFirst && turn >= 3){
        socket.send(JSON.stringify({
            type: "end_quizz",
            quizz_id: quizzId,
            score: correctAnswers,
            user1_id: adversaryId,
            user2_id: currentUser.id
        }));
    }else{
        console.log("tour :",turn+1);
        socket.send(JSON.stringify({
            type: "quizz_duel_respond",
            questionNumber: turn,
            receiver: adversaryId
        }));

        turn++;
    }

}

function clearTimer(){
    timer = 10;
    timerVue.value = timer;
    clearInterval(timerIntervalId);
}

/**
 * RESPONDING TO QUESTIONS
 * 
*/

function responding(questionNb){
    selectionScreen.style.display = "none";
    quizzScreen.style.display = "block";
    waitingScreen.style.display = "none";
    choixHelp.style.display = "none";

    startTimer();

    let question = localStorage.getItem("listQuestions");
    question = JSON.parse(question)[questionNb];
    console.log(question);

    labelTheme.innerText = themeName;
    lableQuestion.innerHTML = question.labelQuestion;
    lableQuestion.innerHTML += "<br>"+ (turn+1) + "/4";
    questionId = question.idQuestion;
    
    for(i = 0; i <= 3; i++){
        radioGroup[i].checked = false;
        reponseLabel[i].innerText = question.listeReponses[i].label;
        radio[i].value = question.listeReponses[i].id;
    }
}

validateAnswer.addEventListener("click", async function(){
    
    if(checkRadioAnswer() === "no_answers" && timer>0){
        choixHelp.style.display = "block";
    }else{
        timerEnded();
    }
})

function checkRadioAnswer(){
    

    for(i = 0; i < radioGroup.length; i++){
        if(radioGroup[i].checked){
            return radioGroup[i].value;
        }
    }
    return "no_answers";
}

async function sendAnswer(questionId, answerId, quizzId){
    const url = "http://"+environnement[0].url+"/api/answerQuestion/"+token;
    if(timer <= 0){
        answerId = -1;
    }
    let response = await fetch(url,{
        method: 'POST',
        body: JSON.stringify({
            idQuestion: questionId,
            selectedAnswer: answerId,
            user: currentUser.id,
            idQuiz: quizzId,
        }),
        headers: {
            'Content-type': 'application/json; charset=UTF-8',
        },
    })

    let json = response.json();

    return json;
}

/**
 * WAITING FOR ANSWERS
 * 
 */
function wait(){
    selectionScreen.style.display = "none";
    quizzScreen.style.display = "none";
    waitingScreen.style.display = "block";
}

/**
 * CHECK PLAYER QUEUE
 * 
 */

validate.addEventListener('click', async()=>{
    socket.send(JSON.stringify({
        type: "is_user_waiting"
    }));
});

async function isUserWaiting(data){
    console.log(data);
    if(!data.message){
        let tempThemeid = select.value
    
        themeName = select.options[select.selectedIndex].text;

        if(tempThemeid === "null"){
            help.style.display = "block";
        }else{
            help.style.display = "none";
            if(quizzId === null){
                quizz = await createQuizz(tempThemeid, currentUser.id);
                themeId = tempThemeid;
                quizzId = quizz.id;
                 
                let questions = await getAnswers(quizzId);
                questions = questions.listQuestions
    
                let i = 0;
                questions.forEach((question)=>{
                    question.listeReponses.forEach((response)=>{
                        delete response.question;
                    });
                    i++;
                });
    
                socket.send(JSON.stringify({
                    type: "quizz_duel_start",
                    user_id: currentUser.id,
                    theme_id: themeId,
                    theme_name: themeName,
                    quizz_id: quizzId,
                    questions: questions,
                }));
            }else{
                if(themeId !== tempThemeid){
                    themeId = tempThemeid;
                    
                    let questions = await getAnswers(quizzId, true);
                    questions = questions.listQuestions
    
                    questions.forEach((question)=>{
                        delete question.theme;
                    });
        
                    socket.send(JSON.stringify({
                        type: "quizz_duel_start",
                        user_id: currentUser.id,
                        quizz_id: quizzId,
                        questions: questions,
                    }));
                }
            }
        }
    }else{
        quizz = await createQuizz(data.theme_id, data.user1 ,currentUser.id, data.quizz_id);
        quizzId = quizz.id;
        
        socket.send(JSON.stringify({
            type: "quizz_duel_start",
            user_id: currentUser.id
        }));
    }
}

async function setThemes(){
    let themes = await fetchthemes();

    //console.log(themes);
    themes.forEach((theme,index) => {
        let option = document.createElement('option');
        option.value = theme.id;
        option.innerText = theme.nom;
        select.appendChild(option);
    });
}

async function fetchthemes(){
    let url = 'http://' + environnement[0].url + '/api/themes/'+token;
    let response = await fetch(url,{
        method:'GET',
        headers: {
            'Access-Control-Allow-Origin': '*',
            'Cross-Origin-Resource-Policy': 'cross-origin'
        }
    });

    let json = await response.json();

    return json;
}


async function createQuizz(tempThemeId, user1Id, user2Id = null, quizzId = null){
    const url = 'http://' + environnement[0].url + '/api/quizz/' + token;
    if(user2Id !== null){
        let response = await fetch(url,{
            method: 'POST',
            body: JSON.stringify({
                idTheme: tempThemeId,
                mode: 1,
                user1: user1Id,
                user2: user2Id,
                quizzId: quizzId,
            }),
            headers: {
                'Content-type': 'application/json; charset=UTF-8',
            },
        }); 
        
        let json = response.json();
        
        return json;
    }else{
         let response = await fetch(url,{
            method: 'POST',
            body: JSON.stringify({
                idTheme: tempThemeId,
                mode: 0,
                user1: user1Id,
            }),
            headers: {
                'Content-type': 'application/json; charset=UTF-8',
            },
        });

        let json = response.json();
        
        return json;
    }
}

async function getAnswers(quizzId, newTheme = false){
    if(!newTheme){
        const url = 'http://' + environnement[0].url + '/api/questions/' + token + '?quizzID=' + quizzId;
        let response = await fetch(url,{
            method: 'GET',
            headers: {
                'Content-type': 'application/json; charset=UTF-8',
            },
        });

        let json = response.json();

        return json;
    }else{
        const url = 'http://' + environnement[0].url + '/api/questions/' + token + '?quizzID=' + quizzId +'&themeID=' + themeId;
        let response = await fetch(url,{
            method: 'GET',
            headers: {
                'Content-type': 'application/json; charset=UTF-8',
            },
        });

        let json = response.json();

        return json;
    }
}

/**
 * END QUIZZ
*/

async function sendEndQuiz(data){
    let json = await generateScores();
    console.log(json);

    selectionScreen.style.display = "none";
    waitingScreen.style.display = "none";
    quizzScreen.style.display = "none";
    resultScreen.style.display = "block";

    scoreDisplay.innerText = json.scoreUser1;

    if(json.scoreUser1 === json.scoreUser2){
        resultDisplay.innerHTML = "C'est une égalité !";
    }else if(json.scoreUser1 > json.scoreUser2){
        resultDisplay.innerHTML = "<br>Vous avez gagné !<br>Félicitation !<br>";
    }else{
        resultDisplay.innerHTML = "<br>Vous avez perdu<br>Vous ferez mieux la prochaine fois<br>";
    }
    
    socket.send(JSON.stringify({
        type: "send_scores_user2",
        quizz_id: quizzId,
        user2_id: adversaryId,
        score: json.scoreUser1
    }));
}

function endQuizzUser2(data){
    
    selectionScreen.style.display = "none";
    waitingScreen.style.display = "none";
    quizzScreen.style.display = "none";
    resultScreen.style.display = "block";

    scoreDisplay.innerText = correctAnswers;

    if(data.score_user1 == correctAnswers){
        resultDisplay.innerHTML = "C'est une égalité !";
    }else if(data.score_user1 < correctAnswers){
        resultDisplay.innerHTML = "<br>Vous avez gagné !<br>Félicitation !<br>";
    }else{
        resultDisplay.innerHTML = "<br>Vous avez perdu<br>Vous ferez mieux la prochaine fois<br>";
    }
}

async function generateScores(){

    const url = 'http://' + environnement[0].url + '/api/finish/' + token;
    let response = await fetch(url, {
        method: 'PATCH',
        body: JSON.stringify({
            mode: 1,
            user1: currentUser.id,
            user2: adversaryId,
            quizz: quizzId,
        }),
        headers: {
            'Content-type': 'application/json; charset=UTF-8',
        },
    })

    let json = response.json()

    return json;
 }