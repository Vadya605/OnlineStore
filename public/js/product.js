

let owlImages=$("div.image .owl-carousel");

owlImages.owlCarousel({
    autoWidth:true,
    // loop:true,
    margin:0,
    items:1, 
    responsive:{
        430:{
            // items:3
            margin: 20
        }
    }
});
function showMessage(textMessage){
    $('.text-message').text(textMessage);
    $('.message').addClass('active-message');
    setTimeout(()=>$('.message').removeClass('active-message'), 5000);
}
$('.btn-right').click(function() {
    owlImages.trigger('next.owl.carousel');
})

$('.btn-left').click(function() {
    owlImages.trigger('prev.owl.carousel');
})



let owl_reviews=$('div.reviews .owl-carousel');

owl_reviews.owlCarousel({
    items:2,
    margin:-530
});

$('.add-to-favourites').hover(function(){
    $(this).css('fill', '#fff');
}, function(){
    if(isInFavorites==0) {
        $(this).css('fill', 'none');
    }
})

$('.add-to-favourites').click(function(){
    if(!isAuth){
        return showMessage('Необходимо авторизоваться');
    }
    if(isInFavorites==0){        
        $.ajax({
            url: '/favorites/add',         
            method: 'post',            
            dataType: 'text',
            data: {
                '_token': $('meta[name="csrf-token"]').attr('content'), 
                'product_id':$(this).prop('id'),
            }
        }).done(function(msg){
            return showMessage(msg);
        });
        isInFavorites=1;
        $(this).css('fill', '#fff');
    }
    else{
        $.ajax({
            url: '/favorites/delete',         
            method: 'delete',            
            dataType: 'text',
            data: {
                '_token': $('meta[name="csrf-token"]').attr('content'), 
                'product_id':$(this).prop('id'),
            }
        }).done(function(msg){
            return showMessage('Товар удален из избранного');
        });
        isInFavorites=0;
        $(this).css('fill', 'none');
    }
    
    
    
});

$('.btn-cart button, .button-add-cart').click(function(){
    if(!isAuth){
        return showMessage('Необходимо авторизоваться')
    }
    $.ajax({
        url: '/cart/add',         
        method: 'post',            
        dataType: 'text',
        data: {
            '_token': $('meta[name="csrf-token"]').attr('content'), 
            'product_id':$(this).prop('id'),
        }
     }).done(function(msg){
        return showMessage(msg);
     });
})

$('.send-to-review').click(function(){
    if(!isAuth){
        return showMessage('Необходимо авторизоваться')
    }
    let text=$('.input-review').val();
    $.ajax({
        url: '/comment/add/',         
        method: 'post',            
        dataType: 'text',
        data: {
            '_token': $('meta[name="csrf-token"]').attr('content'), 
            'product_id':$(this).prop('id'),
            'text_comment':text, 
            'product_rating':idClickedStar
        }
     })//.done(addReviews(reviews))
     .done(function(message){
        showMessage('Отзыв добавлен');
        $('.input-review').val('');
        $('.star').css('fill', '');
        addReview(text);
        changeRating();
     });
})


function changeRating(){
    if(!idClickedStar) return;

    let count=+$('.review').length-1;
    let productRating=$('.rating span');
    let rating=+productRating.text().split(' ')[1];

    productRating.text('Рейтинг '+((rating*(count-1)+idClickedStar)/count).toFixed(1));

}

function addReview(text){

    $('.for-reviews span').remove();
    let svgStars='';
    for(let i=0; i<idClickedStar; i++) svgStars+='<svg xmlns="http://www.w3.org/2000/svg" width="22" height="20" fill="none"><path fill="#fff" d="M9.098 1.854c.599-1.843 3.205-1.843 3.804 0l1.017 3.129a2 2 0 0 0 1.902 1.382h3.29c1.937 0 2.742 2.479 1.175 3.618l-2.661 1.933a2 2 0 0 0-.727 2.236l1.017 3.13c.598 1.842-1.51 3.374-3.078 2.235l-2.661-1.933a2 2 0 0 0-2.352 0l-2.661 1.933c-1.567 1.139-3.676-.393-3.078-2.236l1.017-3.128a2 2 0 0 0-.727-2.237L1.714 9.983C.147 8.844.952 6.365 2.89 6.365h3.29A2 2 0 0 0 8.08 4.983l1.017-3.129Z"/></svg>'
    $('.container-reviews').prepend(
            '<div class="review">'+
                '<div class="container-review">'+
                    '<div class="header-review">'+
                        '<h1>'+$('.name-user h1').text()+'</h1>'+
                        '<div class="user-rating">'+
                            svgStars+
                        '</div>'+
                    '</div>'+
                    '<div class="text">'+
                        '<div class="border">'+
                            '<p>'+text+'</p>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
            '</div>'
    )
}

// $('.')



$('.item').click(function(){
    $('.active-item').removeClass('active-item');
    $('.box-full-description.active').removeClass('active');

    $(this).addClass('active-item');

    let box=$('.'+this.classList[1])[1];
    $(box).addClass('active');
})


var isClickStar=false;
var idClickedStar=0;

$('.star').hover(function(){
    $(Array.from($('.star')).filter(star=>star.id>this.id)).css('fill', '');
    $(Array.from($('.star')).filter(star=>star.id<=this.id)).css('fill', '#fff');
})

$('.stars').hover(function(){}, function(){
    if(!isClickStar) $(Array.from($('.star'))).css('fill', '');
    else{
        $(Array.from($('.star')).filter(star=>star.id>idClickedStar)).css('fill', '');
        $(Array.from($('.star')).filter(star=>star.id<=idClickedStar)).css('fill', '#fff');
    }
})

$('.star').click(function(){
    $(Array.from($('.star')).filter(star=>star.id>this.id)).css('fill', '');
    $(Array.from($('.star')).filter(star=>star.id<=this.id)).css('fill', '#fff');
    idClickedStar=+this.id;
    isClickStar=true;
})


// $('.owl-carousel.for-images .owl-item').attr('style', 'width:162px');

var isClickCharacteristic=false;
$('.characteristic').click(function(){
    isClickCharacteristic=!isClickCharacteristic;
    if(isClickCharacteristic){
        $(this).find('.show-characteristic').css('transform', 'rotate(180deg)');
        return $(this).find('.value').css('display', 'block');
    }
    $(this).find('.show-characteristic').css('transform', 'rotate(0deg)');
    return $(this).find('.value').css('display', 'none');
})

window.onresize = function() {
    if(window.innerWidth>690){
        return $('.characteristic .value').css('display', 'block');
    }
    return $('.characteristic .value').css('display', 'none');
};





