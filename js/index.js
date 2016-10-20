
$(document).ready(function(){
    //отмена перехода с выпадающим списком
    $('.withsubmenu').children('a').on('click', function(e){
        e.preventDefault();
    });
});
