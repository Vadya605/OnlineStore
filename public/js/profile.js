let url=new URL(document.location);
let section = url.searchParams.get("section"); 
if(section!=null){
    $('.section-profile.active-section').removeClass('active-section');
    $('.section-profile.'+section).addClass('active-section');
    
    $('.item-list-profile.active').removeClass('active');
    $('.item-list-profile.'+section).addClass('active');

    url.searchParams.delete("section"); 
    window.history.pushState({}, '', url.toString());
}
$(document).ready(function(){
    bankCards.cards.forEach(bankCard=>{
        let cardNumer=$('#bank-card'+bankCard.id).find('.info');
        cardNumer.text(
            bankCard.card_number.slice(0, 7)+'•• •••• '+bankCard.card_number.slice(14)
        );
    })
})
var owlCarouselBankCards=$('.owl-carousel');
owlCarouselBankCards.owlCarousel({
    margin:20,
    responsive:{
        1300:{
            margin: 20
        },
        1000:{
            margin: 20
        }
    }
});
var isClickAddCard=false;
$('.caption-add-card').click(()=>{
    isClickAddCard=!isClickAddCard;

    if(isClickAddCard){
        $('.arrow').css('transform', 'rotate(180deg)');
        $('.add-bank-card-form').css('display', 'flex');
        return setTimeout(()=>$('.add-bank-card-form').css('opacity', 1), 1);  
    }

    $('.arrow').css('transform', 'rotate(0deg)');
    $('.add-bank-card-form').css('opacity', 0);
    return setTimeout(()=>$('.add-bank-card-form').css('display', 'none'), 200);
    
})
function changeContent(){
    $('.item-list-profile.active').removeClass('active');
    $('.item-list-profile.'+this.classList[1]).addClass('active');
    let section_old_active=$('.section-profile.active-section');
    section_old_active.css('transform', 'translateX(2000px)');
    setTimeout(()=>section_old_active.css('display', 'none'), 200);
    setTimeout(()=>section_old_active.removeClass('active-section'), 100);
    let section_new_active= $('.section-profile.'+this.classList[1]);
    setTimeout(()=>section_new_active.css('display', 'block'), 200)
    setTimeout(()=>section_new_active.css('transform', 'translateX(0)'), 600);
    setTimeout(()=>section_new_active.addClass('active-section'), 1000);
}
$('.item-list-profile').click(changeContent)
$('.box-profile').click(changeContent)
$('.save-change').click(()=>{
    $.ajax({
        url: '/profile/update',         
        method: 'put',            
        dataType: 'text',
        data: {
            '_token': $('meta[name="csrf-token"]').attr('content'), 
            'login':$('#login').val(),
            'mail':$('#mail').val(),
            'name':$('#name').val(),
            'surname':$('#surname').val()
        }
     })
    .done(function(msg){
        $('.name').text($('#login').val());
        $('.email').text($('#mail').val());
        $('.circle').text($('#login').val()[0]);
        showMessage(msg);
    });
})
function showMessage(textMessage){
    $('.text-message').text(textMessage);
    $('.message').addClass('active-message');
    setTimeout(()=>$('.message').removeClass('active-message'), 5000);
}
var options = {
  month: 'long',
  day: 'numeric',
  weekday: 'long',
  timezone: 'UTC',
};
function pasteCardProduct(products, date, sectionProfile){
    date = new Date(date[0], date[1]-1, date[2]);
    sectionProfile.append(
            '<h1 class="date">Дата '+
            $('.item-list-profile.'+sectionProfile.attr('class').split(' ')[1]).text().toLowerCase()+' '+
            date.toLocaleString("ru", options)+
            '</h1>'
        ); 
    products.forEach(product=>{
        sectionProfile.append(
            '<div class="card-product" id="">'+
                '<div class="container-card">'+
                    '<a href="/product/'+product.product_id+'">'+
                    '<div class="title-and-image">'+
                        '<img class="photo-product" src="data:image/png;base64,'+product.photo_product+'">'+
                        '<h1 class="title-product">'+product.name+'</h1>'+
                    '</div>'+
                    '</a>'+
                    '<div>'+
                        '<div class="count">'+
                            '<span>'+product.amount+'</span>'+
                        '</div>'+
                        '<span class="price">'+(product.price*product.amount.toFixed(1))+'$</span>'+
                    '</div>'+
                '</div>'+
            '</div>'
        )
    });
}
var purchaseDates = new Set(purchasedProducts.map(purchasedProduct => purchasedProduct.purchase_date));
var deliveryDates = new Set(deliveredProducts.map(deliveredProduct => deliveredProduct.delivery_date));
purchaseDates.forEach(purchaseDate => {
    pasteCardProduct(purchasedProducts.filter(
        purchasedProduct=> purchasedProduct.purchase_date==purchaseDate
    ), purchaseDate.split('-'), $('.section-profile.purchases-box'));
});
deliveryDates.forEach(deliveryDate => {
    pasteCardProduct(deliveredProducts.filter(
        deliveredProduct=> deliveredProduct.delivery_date==deliveryDate
    ), deliveryDate.split('-'), $('.section-profile.delivery-box'));
});
var isValidCvv=false;
var isValidCardNumber=false;
var isValidValidity=false;
function addBankCard(cardNumber){
    bankCards.newId+=1;
    $('.container-bank-cards').append(
        '<div class="bank-card" id="bank-card'+bankCards.newId+'">'+
            '<div class="container-bank-card">'+
                '<div class="row-box">'+
                    '<svg xmlns="http://www.w3.org/2000/svg" width="60" height="42" fill="none"><path fill="#fff" d="M51 0H9a9 9 0 0 0-9 9v24a9 9 0 0 0 9 9h42a9 9 0 0 0 9-9V9a9 9 0 0 0-9-9ZM27 30H15a3 3 0 0 1 0-6h12a3 3 0 0 1 0 6Zm18 0h-6a3 3 0 0 1 0-6h6a3 3 0 0 1 0 6Zm9-18H6V9a3 3 0 0 1 3-3h42a3 3 0 0 1 3 3v3Z"/></svg>'+
                    '<div class="data">'+
                        '<h1 class="title-item">Карта №'+($('.bank-card').length+1)+'</h1>'+
                        '<p class="info">'+cardNumber.slice(0, 7)+'•• •••• '+cardNumber.slice(14)+'</p>'+
                    '</div>'+
                '</div>'+
                '<svg class="delete-bank-card" xmlns="http://www.w3.org/2000/svg" width="24" height="19" fill="none"><path fill="#fff" fill-rule="evenodd" d="M16.8 14.25h2.4c.66 0 1.2.534 1.2 1.188 0 .653-.54 1.187-1.2 1.187h-2.4c-.66 0-1.2-.534-1.2-1.188 0-.653.54-1.187 1.2-1.187Zm0-9.5h6c.66 0 1.2 1.188 1.2 1.188s-.54 1.187-1.2 1.187h-6c-.66 0-1.2-.534-1.2-1.188 0-.653.54-1.187 1.2-1.187Zm0 4.75h4.8c.66 0 1.2.534 1.2 1.188 0 .653-.54 1.187-1.2 1.187h-4.8c-.66 0-1.2-.534-1.2-1.188 0-.653.54-1.187 1.2-1.187ZM1.2 16.625C1.2 17.931 2.28 19 3.6 19h7.2c1.32 0 2.4-1.069 2.4-2.375V4.75h-12v11.875Zm12-15.438h-2.4L9.948.345A1.217 1.217 0 0 0 9.108 0H5.292c-.312 0-.624.13-.84.344l-.852.844H1.2c-.66 0-1.2.534-1.2 1.187s.54 1.188 1.2 1.188h12c.66 0 1.2-.535 1.2-1.188 0-.653-.54-1.188-1.2-1.188Z" clip-rule="evenodd"/></svg>'+
            '</div>'+
        '</div>'
    );
}
$('.btn-add-bank-card').click(()=>{
    if(!isValidCardNumber || !isValidValidity || !isValidCvv) return showMessage('Проверьте правильность ввода данных');
    $.ajax({
        url: '/bank/card/add',         
        method: 'post',            
        dataType: 'text',
        data: {
            '_token': $('meta[name="csrf-token"]').attr('content'), 
            'cardNumber':$('#number-card').val(),
            'validity':$('#validity').val(),
            'cvv':$('#cvv-cvc').val()
        }
     })
    .done(function(msg){
        addBankCard($('#number-card').val());
        return showMessage(msg);
    });
})
$('#number-card').on( "focusout", function() {
    cardNumber=$(this).val().replace(/ /g,'');
    isValidCardNumber=(cardNumber.length==16 || cardNumber.length==20) && !isNaN(cardNumber - parseFloat(cardNumber));
    if(!isValidCardNumber) {
        return $(this).css('color', 'red');
    }
}) 
$('#validity').on( "focusout", function() {
    validity=$(this).val().split('/');
    isValidValidity=validity[0]<=12 && validity[0]>0 && validity[1]>=23 
        && !isNaN(validity[1] - parseFloat(validity[1]));
    if(!isValidValidity){
        return $(this).css('color', 'red');
    }
})
$('#cvv-cvc').on( "focusout", function() {
    var cvv=$(this).val();
    isValidCvv=cvv.length==3 && !isNaN(cvv - parseFloat(cvv));
    if(!isValidCvv){
        return $(this).css('color', 'red');
    }
})
$('.input-card').on( "focus", function() {
    $(this).css('color', '#fff');
})
$('#number-card').keypress(function(){
    value=$(this).val();
    if(value.replace(/ /g,'').length%4==0 && value.length!=0 && value.length!=$(this).attr('maxlength')) 
        $(this).val(value+' ');
})
$('#validity').keypress(function(){
    if($(this).val().length==2) $(this).val($(this).val()+'/');
})
$(document).on('click','.delete-bank-card', function(){
    id=+$(this).closest('.bank-card').prop('id').match(/\d+/);
    $.ajax({
        url: '/bank/card/delete',         
        method: 'delete',            
        dataType: 'text',
        data: {
            '_token': $('meta[name="csrf-token"]').attr('content'), 
            'id':id
        }
     })
    .done(function(msg){
        $('#bank-card'+id).remove();
        return showMessage(msg);
    });
})
$(document).on('click','.add-to-cart', function(){
    $.ajax({
        url: '/cart/add',         
        method: 'post',            
        dataType: 'text',
        data: {
            '_token': $('meta[name="csrf-token"]').attr('content'), 
            'product_id':$(this).closest('.card-product').prop('id'),
        }
     }).done(function(msg){
        showMessage(msg);
     });
});
$(document).on('click', '.btn-delete', function(){
    product=$(this).closest('.card-product');
    $.ajax({
        url: '/favorites/delete',         
        method: 'delete',            
        dataType: 'text',
        data: {
            '_token': $('meta[name="csrf-token"]').attr('content'), 
            'product_id':product.prop('id'),
        }
    }).done(function(msg){
        showMessage(msg);
        $(product).remove();
        if(product.prop('class').includes('in-stock')) changeGrandTotal();
    });
});
$('.back').click(()=>{
    let section_old_active=$('.section-profile.active-section');
    section_old_active.css('transform', 'translateX(2000px)');
    setTimeout(()=>section_old_active.css('display', 'none'), 200);
    setTimeout(()=>section_old_active.removeClass('active-section'), 100);
    let section_new_active= $('.section-profile.main-box');
    setTimeout(()=>section_new_active.css('display', 'block'), 200);
    setTimeout(()=>section_new_active.css('transform', 'translateX(0)'), 600);
    setTimeout(()=>section_new_active.addClass('active-section'), 1000);
})






