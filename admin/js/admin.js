$(document).ready(function(){
    var count = 2;
    $('#add_author').on('click', function(e){
        e.preventDefault();
        var authors = $('#authors_block');
        authors.append('<div class="author_block'+count+'"><p style="text-align: center; font-weight: bold">Автор №'+count+'</p><div class="form-group">' +
            '<label for="fio" class="col-md-2 control-label">Ф.И.О автора:</label>' +
            '<div class="col-md-6"> ' +
            '<input type="text" id="fio" class="form-control" name="fio_ru'+count+'"> ' +
            '</div> ' +
            '</div>' +
        '<div class="form-group">' +
            '<label for="fio_en" class="col-md-2 control-label">Ф.И.О. авторов на английском:</label> ' +
            '<div class="col-md-6">' +
            '<input type="text" id="fio_en" class="form-control" name="fio_en'+count+'"> ' +
            '</div> ' +
            '</div> ' +
        '<div class="form-group"> ' +
            '<label for="place_of_work" class="col-md-2 control-label">Место работы:</label> ' +
            '<div class="col-md-6"> ' +
            '<input type="text" id="place_of_work" class="form-control" name="current_job'+count+'"> ' +
            '</div> ' +
            '</div> ' +
        '<div class="form-group"> ' +
            '<label for="email" class="col-md-2 control-label">e-mail:</label> ' +
            '<div class="col-md-6"> ' +
            '<input type="text" id="email" class="form-control" name="email'+count+'"> ' +
            '</div> ' +
            '</div> ' +
            '</div>');
        count++;
    });
});
