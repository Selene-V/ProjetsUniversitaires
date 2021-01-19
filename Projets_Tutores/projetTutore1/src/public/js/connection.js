const environnement = JSON.parse(envURL);
const connectionButton = document.getElementById("connection");
const sessionStorage = window.sessionStorage;
const localStorage = window.localStorage;


connectionButton.addEventListener('click', function (){
    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;
    let loginError = document.getElementById("loginHelp");
    loginError.style.display = "none";

    if((email + password) === ""){
        loginError.innerText = "Veuillez entrer vos identifiants";
        loginError.style.display = "block";
    }else if(password === ""){
        loginError.innerText = "Veuillez entrer votre mot de passe";
        loginError.style.display = "block";
    }else if(email === ""){
        loginError.innerText = "Veuillez entrer votre adresse mail";
        loginError.style.display = "block";
    }else{
        let formdata = new FormData();
        formdata.append("email", email);
        formdata.append("password", password);

        fetch('http://' + environnement[0].url + '/api/user/login',{
            method: 'POST',
            body: formdata,
            headers: {
                'Access-Control-Allow-Origin': '*',
                'Cross-Origin-Resource-Policy': 'cross-origin',
            }
        }).then(function(response){
            return response.json();
        }).then(function (data){
            if(typeof data.token !== 'undefined'){
                localStorage.setItem('token', data.token);
                sessionStorage.setItem('currentUser', JSON.stringify(data.currentUser));
                window.location.href = './html/loggedIn.html';
            }else{
               loginError.innerText = data.message;
                loginError.style.display = "block";
            }
        }).catch(function(error){
            console.log('error', error);
        });
    }
});

/* test connection
"email", "email@email.com"
"password", "mdp123456"
*/