
$(document).ready(function(){
    //отмена перехода с выпадающим списком
    $('.withsubmenu').children('a').on('click', function(e){
        e.preventDefault();
    });

    //регулярка на фио
    $('#fio').on('keyup', function(e){
        var input = $(this).val();
        if(input.length > 0) {
            var reg = new RegExp("^[-A-zА-яЁё.,/'\\s]+$");
            var sliceReg = new RegExp("^[-A-zА-яЁё.,/'\\s]+");
            if (!reg.test(input)) {
                alert("В этом поле можно использовать только буквы");
                input = sliceReg.exec(input);
                input = (input != undefined)? input[0] : '';
                $(this).val(input);
            }
        }
    });

    //регулярка на телефон
    $('#TEL').on('keyup', function(e){
        var input = $(this).val();
        if(input.length > 0) {
            var reg = /^[-\+0-9()]+$/g;
            var sliceReg = /^[-\+0-9()]+/g;
            if (!reg.test(input)) {
                alert("В этом поле можно использовать только цифры");
                input = sliceReg.exec(input);
                input = (input != undefined)? input[0] : '';
                $(this).val(input);
            }
        }
    });

    $('#EMAIL').on('blur', function(e){
        var input = $(this).val();
        if(input.length > 0) {
            var reg = /^.+@.+\..+$/g;
            if (!reg.test(input)) {
                alert("E-mail не прошел валидацию, попробуйте еще раз");
                input = '';
                $(this).val(input);
            }
        }
    });
});
