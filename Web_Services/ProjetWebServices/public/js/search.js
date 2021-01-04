$(function(){
    $('#search-bar').on('input',function (){
        let input = $(this).val();
        if(input !== ''){
            $('tbody tr .username').each(function(){
                $(this).parent().hide();
                if($(this).text().includes(input)){
                    $( this ).parent().css('display','table-row');
                }
            });
        }else {
            $('tbody tr').css('display','table-row');
        }
    });
});