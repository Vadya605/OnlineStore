$(document).ready(function(){
    pagination();
})




var products=allProducts;


function pasteData(data){
    data=sortPrice(data);
    $('.card-product').remove();
    data.forEach(element=>{
        let svg;
        if(element.is_in_favorites==0) svg='<svg id="'+element.is_in_favorites+'" class="add-to-favorites" xmlns="http://www.w3.org/2000/svg" width="30" height="26" fill="none"><path stroke="#fff" stroke-width="2" d="M20.242 1a6.418 6.418 0 0 1 6.422 6.414c0 6.176-5.954 9.426-12.122 15.384a1.03 1.03 0 0 1-1.428 0C6.947 16.84 1 13.59 1 7.414A6.416 6.416 0 0 1 7.414 1c3.207 0 4.81 1.604 6.415 4.81C15.431 2.605 17.035 1 20.242 1Z"/></svg>'
        else svg='<svg id="'+element.is_in_favorites+'" class="add-to-favorites" xmlns="http://www.w3.org/2000/svg" width="30" height="26" fill="#fff"><path stroke="#fff" stroke-width="2" d="M20.242 1a6.418 6.418 0 0 1 6.422 6.414c0 6.176-5.954 9.426-12.122 15.384a1.03 1.03 0 0 1-1.428 0C6.947 16.84 1 13.59 1 7.414A6.416 6.416 0 0 1 7.414 1c3.207 0 4.81 1.604 6.415 4.81C15.431 2.605 17.035 1 20.242 1Z"/></svg>'

        $('.cards').append(
            '<div class="card-product" id='+element.id+'>'+                
                '<img class="photo-product" src="data:image/png;base64,'+element.photo_product+'">'+
                '<div class="description">'+
                    '<a class="link-product" href="product/'+element.id+'">'+
                        '<div class="info">'+
                            '<ul list-info>'+
                                '<li class="type item-list-info">'+element.type_name+'</li>'+
                                '<li class="name item-list-info" >'+element.name+'</li>'+
                                '<li class="price item-list-info">'+element.price+' $</li>'+
                            '</ul>'+
                        '</div>'+
                    '</a>'+
                    '<div class="btns">'+
                        svg+        
                        '<div class="add-to-cart">'+
                            '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"><path fill="#fff" d="M6 16c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2ZM0 0v2h2l3.6 7.6L4.2 12c-.1.3-.2.7-.2 1 0 1.1.9 2 2 2h12v-2H6.4c-.1 0-.2-.1-.2-.2v-.1l.9-1.7h7.4c.8 0 1.4-.4 1.7-1l3.6-6.5c.2-.2.2-.3.2-.5 0-.6-.4-1-1-1H4.2l-.9-2H0Zm16 16c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2Z"/></svg>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
        '</div>'  
    )
    });
    products=allProducts;
    pagination();
} 
function showMessage(textMessage){
    $('.text-message').text(textMessage);
    $('.message').addClass('active-message');
    setTimeout(()=>$('.message').removeClass('active-message'), 5000);
}
$(document).on('click','.add-to-cart', function(){

    if(!isAuth){
        return showMessage('Необходимо авторизоваться');
    }

    $.ajax({
        url: '/cart/add',         
        method: 'post',            
        dataType: 'text',
        data: {
            '_token': $('meta[name="csrf-token"]').attr('content'), 
            'product_id':$(this).closest('.card-product').prop('id'),
        }
     }).done(function(msg){
        return showMessage(msg);
     });

     
    
});

$('.add-to-favorites').hover(function(){
    $(this).css('fill', '#fff');
}, function(){
    productOut=allProducts.find(product=>product.id==+$(this).closest('.card-product').prop('id'));

    if(!productOut.is_in_favorites) {
        $(this).css('fill', 'none');
    }
})

function prob(product, id){
    if(product.id==id) product.is_in_favorites=!product.is_in_favorites;
}

$(document).on('click', '.add-to-favorites', function(){
    product_id=+$(this).closest('.card-product').prop('id');
    productClick=allProducts.find(product=>product.id==product_id);

    if(!isAuth){
        return showMessage('Необходимо авторизоваться');
    }

    if(!productClick.is_in_favorites){        

        $.ajax({
            url: '/favorites/add',         
            method: 'post',            
            dataType: 'text',
            data: {
                '_token': $('meta[name="csrf-token"]').attr('content'), 
                'product_id':product_id,
            }
        })

        allProducts.filter(product=>prob(product, product_id));
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
    });

    allProducts.filter(product=>prob(product, product_id));
    
    $(this).css('fill', 'none');
    return showMessage('Товар удален из избранного');


})

$(".custom-checkbox").on("click", function(){

    let checkboxes_checked=Array.from($("input.custom-checkbox:not('.price-filter'):checked"));
    if(!checkboxes_checked.length){
        return pasteData(products);
    }

    let isOneClass=checkboxes_checked.every(checkbox=> checkbox.className==checkboxes_checked[0].className);
    if(isOneClass){
        return pasteData(searchByFilter(checkboxes_checked));
    } 

    return pasteData(searchByFilters());
    
})

function sortPrice(filtrationProducts){
    let checkboxPrice=$('.price-filter:checked');
    if(!checkboxPrice.length){
        return filtrationProducts;
    }

    if(checkboxPrice[0].id=='increase'){ 
        return filtrationProducts.sort((a, b)=>+a.price>+b.price?1:-1)
         
    }
    else if(checkboxPrice[0].id=='decrease'){
        return filtrationProducts.sort((a, b)=>+a.price<+b.price?1:-1);
    }

    
}

function isProductFound(object, value){
    delete object.photo_product;
    for(let element of Object.values(object)){
        element=String(element).toLowerCase();
        if(element.includes(value) || value.includes(element)){
            return true;
        }
    }
    return false;
}

function searchByFilter(checkboxes, filtration_products=products){
    let products_found=new Array();

    checkboxes.forEach(checkbox=>{
        filtration_products.forEach(element=>{
            if(isProductFound(Object.assign({},element), ($(checkbox).next().text()).toLowerCase()) && !products_found.includes(element)){
                products_found.push(element);
            }
        });
    })

    return products_found;
}

function searchByFilters(){
    let products_found=searchByFilter(Array.from($('.custom-checkbox.category:checked')));
    products_found=searchByFilter(Array.from($('.custom-checkbox.brand:checked')), products_found);
    return products_found;
}

let input=$('.input'), timeOut;

input.on( 'keyup', function () {
    clearTimeout( timeOut );
    timeOut = setTimeout(search, 1500, $(this).val().split(/\s+/g));
});

input.on( 'keydown', function () {
    clearTimeout( timeOut );
});

function search(valueArray) {

    if(!valueArray[0].length){
        products=allProducts;
        pasteData(products);
    }
    let products_found;
    
    for(valueSearch of valueArray){
        if(searchByParameter(products_found, valueSearch).length)
            products_found=searchByParameter(products_found, valueSearch);
    }
    if(!products_found){
        return;
    }
    products=products_found;
    pasteData(products_found);
    
}

function searchByParameter(searchProducts, valueSearch){
    if(searchProducts==null) searchProducts=products;
    let searchResult=new Array();
    searchProducts.forEach(product=>{
        if(isProductFound(Object.assign({},product), valueSearch.toLowerCase()) && !searchResult.includes(product)){
            searchResult.push(product);
        }
    })
    return searchResult;
}

$('.show-filters').click(()=>{
    return $('.filters').css('display', 'block');
})
$('.close-filters').click(()=>{
    return $('.filters').css('display', 'none');
})
window.onresize = () =>{
    if(window.innerWidth>960){
        return $('.filters').css('display', 'block');
    }
    return $('.filters').css('display', 'none');
};







