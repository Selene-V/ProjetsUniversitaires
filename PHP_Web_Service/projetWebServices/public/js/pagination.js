const MAX_VISIBLE_ELEMENT = 20;

let nbElement = $('tbody tr').length;
let nbPages = Math.ceil(nbElement/MAX_VISIBLE_ELEMENT);

if(!(nbPages <= 1)){
    for(let i=1; i<=nbPages; i++){
        var button = $("<a class=\"btn btn-dark paginationBtn\"></a>").text(i)
        $("div #button-container").append(button);
        console.log(button);
    }
}


$(function(){
    $('.paginationBtn').click(function (){
       var pageId = parseInt($(this).text());

       $('tbody tr').hide();
       var minE = (pageId-1)*MAX_VISIBLE_ELEMENT;
       var maxE = (pageId)*MAX_VISIBLE_ELEMENT;
       $('tbody tr').slice(minE, maxE).css('display','table-row');
    });
});