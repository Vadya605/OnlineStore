isClick=false;
$('.navigation-block').click(function(){
    isClick=!isClick;
    if(isClick){
        return $(this).addClass('isClick');
    }
    return $(this).removeClass('isClick');
})