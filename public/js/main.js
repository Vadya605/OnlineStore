let owl=$(".owl-carousel");

owl.owlCarousel({
    margin:10,
    items:3,
    autoWidth:true,
    responsive:{
        1366:{
            margin:50
        },
    }
});

$('.btn-right').click(function() {
    owl.trigger('next.owl.carousel');
})

$('.btn-left').click(function() {
    owl.trigger('prev.owl.carousel');
})


$('.add-to-cart').on('click', function(){
    $.ajax({
        url: '/cart/add/',         
        method: 'post',            
        dataType: 'text',
        data: {
            '_token': $('meta[name="csrf-token"]').attr('content'), 
            'product_id':$(this).closest('.card-product').prop('id'),
        }
     }).done(function(message){
        showMessage(message);
     });
})


$('.item').click(function(){
    $('.active-item').removeClass('active-item');
    $('.box-suggestions.active').removeClass('active');

    $(this).addClass('active-item');

    let box=$('.'+this.classList[1])[1];
    $(box).addClass('active');
})


$('.add-to-favourites').hover(function(){
    $(this).css('fill', '#fff');
}, function(){
    if(this.id==0) {
        $(this).css('fill', 'none');
    }
})

$(document).on('click', '.add-to-favourites', function(){
    if(!isAuth){
        $('.text-message').text('Необходимо авторизоваться');
        $('.message').addClass('active-message');
        return setTimeout(()=>$('.message').removeClass('active-message'), 5000);
    }

    product_id=+$(this).closest('.card-product').prop('id');
    if(this.id==0){        
        $.ajax({
            url: '/favorites/add',         
            method: 'post',            
            dataType: 'text',
            data: {
                '_token': $('meta[name="csrf-token"]').attr('content'), 
                'product_id':product_id,
            }
        })
        this.id=1;
        $(this).css('fill', '#fff');
        return showMessage('Товар добавлен в избранное');
        
    }
    
    $.ajax({
        url: '/favorites/delete',         
        method: 'delete',            
        dataType: 'text',
        data: {
            '_token': $('meta[name="csrf-token"]').attr('content'), 
            'product_id':product_id,
        }
    })
    this.id=0;
    $(this).css('fill', 'none');
    return showMessage('Товар удален из избранного');
})

function showMessage(textMessage){
    $('.text-message').text(textMessage);
    $('.message').addClass('active-message');
    setTimeout(()=>$('.message').removeClass('active-message'), 5000);
}






