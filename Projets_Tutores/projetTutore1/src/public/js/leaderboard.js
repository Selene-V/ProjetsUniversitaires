/**
 * script de gestion du leaderboard des utilisateurs
 */
const leaderboard = document.getElementById("user-list");
const MAX_VISIBLE_ELEMENT = 10; //nombre d'user max par pages dans la liste
var userToken = localStorage.getItem("token");
var currentUser = JSON.parse(sessionStorage.getItem("currentUser"));

//au chargement de la page
window.addEventListener('load', async function(){
    let data = await fetchUserList();
    
    //si l'utilisateur n'a pas de token valide
    if(!data.tokenValidity){
        localStorage.removeItem("token");
        document.location.href = '../index.html';
    }
    //classement de la liste d'user par points (décroissant)
    let userList = data.userList.sort( compare );

    let i = 1;
    userList.forEach(user => {
        let tr = document.createElement('tr')
        let th = null;
        let rank = null;

        //si l'utilisateur n'a pas de points il n'est pas classé
        if(user.point === 0){
            rank = "-";
        }else{
            rank = "#" + i;
        }

        th = createLeaderboardElements('th', rank);
        let name = createLeaderboardElements('td', user.username);
        let points = createLeaderboardElements('td', user.point);

        tr.appendChild(th);
        tr.appendChild(name);
        tr.appendChild(points);

        leaderboard.appendChild(tr);

        if(user.username === currentUser.username){
            let currentRank = document.getElementById("current-rank");
            let currentUser = document.getElementById("current-user");
            let currentPoint = document.getElementById("current-point");

            currentRank.innerText += " "+rank;
            currentUser.innerText = user.username;
            currentPoint.innerText = user.point;
        }
        i++;
    });
    pagination();
});

//récupération des utilisateurs et de leurs points
async function fetchUserList(){
    let response = await fetch('http://'+ environnement[0].url +'/api/user/list/' + userToken,{
        method:'GET',
        headers: {
            'Access-Control-Allow-Origin': '*',
            'Cross-Origin-Resource-Policy': 'cross-origin'
        }
    });

    let json = await response.json()

    return json;
}

//algo de comparaison des points pour la fonction sort()
function compare(a,b){
    if ( b.point < a.point ){
        return -1;
      }
      if ( b.point > a.point ){
        return 1;
      }
      return 0;
}

//création des diférents éléments de chaques lignes
function createLeaderboardElements(type, innerText, point = null){
    let element = document.createElement(type);
    element.setAttribute('scope', 'col');

    if(innerText === currentUser.username){
        element.innerHTML = "<b>"+innerText+"</b>";
    }else{
        element.innerText = innerText;
    }
    
    return element;
}

//ajout de la pagination 
function pagination(){
    let nbElement = $('tbody tr').length;
    let nbPages = Math.ceil(nbElement/MAX_VISIBLE_ELEMENT);
    
    if(!(nbPages <= 1)){
        for(let i=1; i<=nbPages; i++){
            var button = $("<a class=\"btn btn-dark paginationBtn\"></a>").text(i)
            $("div #button-container").append(button);
        }
        pages(1);
    }
    
    
    $(function(){
        $('.paginationBtn').click(function (){
            var pageId = parseInt($(this).text());
            pages(pageId);
        });
    });
}

//gestion de l'affichage des pages
function pages(pageId){
    $('tbody tr').hide();
    var minE = (pageId-1)*MAX_VISIBLE_ELEMENT;
    var maxE = (pageId)*MAX_VISIBLE_ELEMENT;
    $('tbody tr').slice(minE, maxE).css('display','table-row');
}