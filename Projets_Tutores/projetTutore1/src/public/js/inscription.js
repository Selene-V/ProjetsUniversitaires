// Validations des données entrées par l'utilisateur à l'aide de regex avant l'appel à l'API pour l'enregistrer
const environnement = JSON.parse(envURL);
const token = localStorage.getItem('token');

var uniqUsername = false;
var uniqEmail = false;
var onadd = false;

let bInscription = document.getElementById("validation-inscription");

bInscription.addEventListener("click", async function(e){
    clearError();
    // Verification username
    const validUsername = isValid(/^[a-zA-Z0-9]+$/, "username", "Ne rentrer uniquement que des chiffres et des lettres non accentuées!");
    // Verification prenom
    const validPrenom = isValid(/^([ \u00c0-\u01ffa-zA-Z'\-])+(?<!('|\s|-))$/, "prenom", "Caractères acceptés : a-z A-Z , ' - espace");
    // Verification nom
    const validNom = isValid(/^([ \u00c0-\u01ffa-zA-Z'\-])+(?<!('|\s|-))$/, "nom", "Caractères acceptés : a-z A-Z , ' - espace");
    // Verification adresse email
    const validEmail = isValid(/^.+@.+\.[a-zA-Z]{2,}$/, "email", "Veuillez entrez une adresse email valide de la forme exemple@exemple.fr");
    // Verification password
    // Minimum de huit caractères, au moins une lettre majuscule, une lettre minuscule, un chiffre et un caractère spécial
    const validPassword = isValid(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&.]{8,}$/, "password", "Minimum de huit caractères, au moins une lettre majuscule, une lettre minuscule, un chiffre et un caractère spécial (@$!%*?&)");
    // Verification password Verify
    // Minimum de huit caractères, au moins une lettre majuscule, une lettre minuscule, un chiffre et un caractère spécial
    const validPasswordVerify = isValid(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&.]{8,}$/, "passwordVerify", "");

    // Si tous les champs sont valides, alors on ajoute l'user a l'API
    if (validUsername && validPrenom && validNom && validEmail && validPassword && validPasswordVerify){
        await verifAPI();
    }
});

/**
 * Vérifie que le champ nomId est valide
 * @param regex
 * @param nomId
 * @param messageErreur
 */
function isValid(regex, nomId, messageErreur){
    let valid = true;
    let inputName = document.getElementById(nomId);
    let inputNameHelp = document.getElementById(nomId+"Help");
    if (inputName.value === ""){
        inputNameHelp.innerText = "Champ obligatoire !";
        inputNameHelp.style.display = "block";
        valid = false;
    } else {
        if (nomId === "passwordVerify"){
            valid = isSamePassword();
        } else {
            if (!regex.test(inputName.value)){
                inputNameHelp.innerText = messageErreur;
                inputNameHelp.style.display = "block";
                valid = false;
            }
        }
    }
    return valid;
}

/**
 * Vérifie que les 2 mots de passes entrés correspondent
 */
function isSamePassword(){
    let valid = true;
    let password = document.getElementById("password");
    let passwordVerify = document.getElementById("passwordVerify");
    let passwordVerifyHelp = document.getElementById("passwordVerifyHelp");
    if (password.value !== passwordVerify.value){
        passwordVerifyHelp.innerText = "Les deux mots de passes ne correspondent pas !";
        passwordVerifyHelp.style.display = "block";
        valid = false;
    }
    return valid;
}

/**
 * Vérifie si un utilisateur à déjà été créé avec cette adresse email et ce username
 */
async function verifAPI(){
    await usernameExistInAPI();
    await emailExistInAPI();
}

/**
 * Vérifie si un utilisateur à déjà été créé avec cet username
 */
function usernameExistInAPI(){
    const username = document.getElementById("username").value;
    const url = 'http://' + environnement[0].url + '/api/user?usernameUser=' + username;
    fetch(url, {
        method: 'GET'
    }).then(function(response){
        response.json()
            .then(function(json){
                if (json.userExist  === true){
                    let usernameHelp = document.getElementById("usernameHelp");
                    uniqUsername = false;
                    usernameHelp.innerText = "Username déjà utilisé !";
                    usernameHelp.style.display = "block";
                } else {
                    uniqUsername = true;
                    addUser();
                }
            })
    }).catch(function(error){
    });
}

/**
 * Vérifie si un utilisateur à déjà été créé avec cette adresse email
 */
function emailExistInAPI(){
    const email = document.getElementById("email").value;
    
    const url = 'http://' + environnement[0].url + '/api/user?emailUser=' + email;
    fetch(url, {
        method: 'GET'
    }).then(function(response){
        response.json()
            .then(function(json){
                if (json.userExist === true){
                    let emailHelp = document.getElementById("emailHelp");
                    uniqEmail = false;
                    emailHelp.innerText = "Adresse email déjà utilisée !";
                    emailHelp.style.display = "block";
                } else {
                    uniqEmail = true;
                    addUser();
                }
            })
    }).catch(function(error){
    });
}

/**
 * Efface toutes les erreurs de l'écran de l'utilisateur
 */
function clearError(){
    let allSmall = document.getElementsByTagName("small");
    for (let i = 0 ; i < allSmall.length ; i++){
        allSmall[i].style.display = "none";

    }
}


// Appel à l'API pour enregistrer l'utilisateur
function addUser(){
    if (uniqEmail && uniqUsername) {
        if (!onadd) {
            onadd = true;
            const username = document.getElementById("username").value;
            const prenom = document.getElementById("prenom").value;
            const nom = document.getElementById("nom").value;
            const email = document.getElementById("email").value;
            const password = document.getElementById("password").value;

            const url = 'http://' + environnement[0].url + '/api/user/inscription';

            fetch(url, {
                method: 'POST',
                body: JSON.stringify({
                    username: username,
                    firstName: prenom,
                    lastName: nom,
                    email: email,
                    point: 0,
                    password: password,
                }),
                headers: {
                    'Content-type': 'application/json; charset=UTF-8',
                },
            })
              .then(function(response){
                    alert("En cliquant sur ok, vous serez redirigé vers la page de connexion.");
                    window.location.href = "../index.html";
                }).catch(function (error) {
                });
        }
    }
}

