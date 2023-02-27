$(document).ready(function(){


    if(productsInCart.length)
        $('.cards-in-stock').append('<h1 class="grand-total">Итоговая стоимость '+calculationOfGrandTotal()+'$</h1>');

    if(!$('.card-product.out-of-stock').length){
        $('.out-of-stock').remove();
    }


})

function calculationOfGrandTotal(){
    let grandTotal=0;
    productsInCart.forEach(element=>{
        if(element.in_stock) grandTotal+=+(element.price*element.amount).toFixed(1);
    });

    return grandTotal.toFixed(1);
}

$(document).on('click','.count-change img', function(){

    let id=$(this).closest('.card-product').prop('id');
    let action=this.className;
    $.ajax({
        url: '/cart/'+this.className+'/amount',         
        method: 'put',            
        dataType: 'text',
        data: {
            '_token': $('meta[name="csrf-token"]').attr('content'), 
            'product_id':id
        }
     })
    .done(function(msg){
        change_amount_and_price(id, action);
    });
    
});




const actions={
    'increase':IncreaseCountProduct,
    'decrease':DecreaseCountProduct
}


function IncreaseCountProduct(id){
    let count=$('span#'+id+'.count');
    count.text(+count.text()+1);
    return +count.text();
}

function DecreaseCountProduct(id){
    let count=$('span#'+id+'.count');
    if(+count.text()>1) count.text(+count.text()-1);
    return +count.text();
}

function change_amount_and_price(id, action){
    let count=$('.card-product#'+id+' span.count');
    let price=$('.card-product#'+id+' span.price');
    let price_for_one=+price.text().slice(0, this.length-1)/+count.text();
    
    if(action=='increase') count.text(+count.text()+1);
    else {
        if(+count.text()>1)count.text(+count.text()-1);
    }
    
    price.text((price_for_one*+count.text()).toFixed(1)+'$');
    changeGrandTotal();

}


function changeGrandTotal(){
    let grand_total=0;
    $('.card-product.in-stock span.price').each(function(){
        grand_total+=+$(this).text().slice(0, $(this).text().length-1);
    })
    $('.grand-total').text('Итоговая стоимость '+grand_total.toFixed(1)+'$');
}




$(document).on('click', '.btn-delete', function(){
    var product=$(this).closest('.card-product');
    $.ajax({
        url: '/cart/delete',         
        method: 'delete',            
        dataType: 'text',
        data: {
            '_token': $('meta[name="csrf-token"]').attr('content'), 
            'product_id':product.prop('id'),
        }
    }).done(function(msg){
        showMessage(msg);
        $(product).remove();

        changeCart();
        if(product.prop('class').includes('in-stock')) changeGrandTotal();
    });
});


function changeCart(){
    console.log(!$('.card-product.in-stock').length && !$('.card-product.out-of-stock').length);
    if(!$('.card-product.in-stock').length && !$('.card-product.out-of-stock').length){
        $('.grand-total').remove();
        $('.out-of-stock').remove();
        $('.cards-in-stock').append(
            '<h1 class="cart-empty">В корзине нет товаров, котовые можно заказать, перейдите в каталог и подберите себе что-нибудь</h1>'
        );
    }
    else if(!$('.card-product.out-of-stock').length){
        return $('.out-of-stock').remove();
    }
    
}

function productsFormation(){
    var products={};

    $('.card-product.in-stock').each(function(){
        products['product'+this.id]={
            'product_id':this.id,
            'amount':$(this).find('span.count').text()
        }
    })
    return products;    
}


function checkPhoneNumber(phoneNumber){
    var reg=new RegExp(/^\s*\+?375((33\d{7})|(29\d{7})|(44\d{7}|)|(25\d{7}))\s*$/);
    return reg.test(phoneNumber);
    
}

function checkInputField(){
    let isValid=true;
    $('.input-ordering:not(#number-phone)').each(function(){
        if(!$(this).val().length || /^\d+$/.test($(this).val())) 
            isValid=false;
    })
    return isValid;
}
function showMessage(textMessage){
    $('.text-message').text(textMessage);
    $('.message').addClass('active-message');
    setTimeout(()=>$('.message').removeClass('active-message'), 5000);
}
$('.btn-ordering').click(()=>{
    
    if(!$('.cards-in-stock .card-product').length) return showMessage('У вас нет товаров, для заказа');

    if(!checkPhoneNumber($('#number-phone').val()) || !checkInputField()) 
        return showMessage('Проверьте правильность ввода');

    $.ajax({
        url: '/delivery/add',                 
        method: 'post',            
        dataType: 'text',
        data: {
            '_token': $('meta[name="csrf-token"]').attr('content'), 
            'country':$('#coutry').val(),
            'city':$('#city').val(),
            'address':$('#address').val(),
            'numberPhone':$('#number-phone').val(),
            'products':productsFormation(),
        },
        succsess:function(data, textStatus, request){
            console.log(request.status);
        },
        error : function (response, textStatus, errorThrown) {
            console.log('err');
            if(response.status==302){
                showMessage('Для заказа необходимо привязать карту');
                setTimeout(()=>window.location.href = '/profile?section=personal-data-box', 2000);
            }
        }
     })
    .done(function(msg){
        showMessage(msg);
    });
})




