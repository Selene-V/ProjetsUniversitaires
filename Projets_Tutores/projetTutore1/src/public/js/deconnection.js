const environnement = JSON.parse(envURL);
const deconnectionButton = document.getElementById("logout");
const localStorage = window.localStorage;


var userToken = localStorage.getItem("token");


window.addEventListener('load', async function(){
    if(userToken === null){
        document.location.href = '../index.html';
        console.log(userToken);
    }else{
        let verifLogin = await fetchUser()
        if(!verifLogin){
            localStorage.removeItem("token");
            document.location.href = '../index.html';
        }
        deconnectionButton.addEventListener('click', function(){
            localStorage.removeItem("token");
            document.location.href = '../index.html';
        })
    }
})



async function fetchUser(){
    let response = await fetch('http://' + environnement[0].url + '/api/user/loggedIn/' + userToken,{
        method:'GET',
        headers: {
            'Access-Control-Allow-Origin': '*',
            'Cross-Origin-Resource-Policy': 'cross-origin'
        }
    });

    let json = await response.json()

    return json.tokenValidity;
}