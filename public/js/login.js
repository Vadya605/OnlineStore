$(document).ready(function(){
    if(!errors.length) return console.log('нет ошибок');
    errors.forEach(error => {
        // alert('Введенные данные не прошли проверку, проверьте правильность ввода');
        alert(error);
    });
})

$('.form-login .input-form#password_confirmation').on( "focusout", function(){
    if($('.form-login .input-form#password').val()!==$(this).val()){
        $('.password-mismatch').css('display', 'block');
        return $('.form-login button').attr('disabled', true);
    }
    $('.password-mismatch').css('display', 'none');
    return $('.form-login button').removeAttr('disabled');
})