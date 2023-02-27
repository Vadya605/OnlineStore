function pagination(){
    var items=$('.cards .card-product');
    var numItems=items.length;
    var perPage=9;
    items.slice(perPage).hide();

    $('#pagination-container').pagination({
        items:numItems,
        itemsOnPage:perPage,
        
        prevText:'<img src="/img/Vector 1.svg" alt="" class="img-prev">',
        nextText:'<img src="/img/Vector 2.svg" alt="" class="img-next">',
        onPageClick:function(pageNumber){
            var showFrom=perPage*(pageNumber-1);
            var showTo=showFrom+perPage;
            items.hide().slice(showFrom, showTo).show();
            window.scrollTo(0, 0);
        }
    })
}

window.onload=function(){
    history.pushState('', document.title, window.location.pathname);
};


