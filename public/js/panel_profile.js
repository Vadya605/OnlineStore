$('.profile').hover(function(e){
    $('.panel-profile').css('opacity', 1).css('z-index', 2);
}, function(e){

    let origin={
        'Y':$(this).offset().top,
        'X':$('.panel-profile').offset().left
    }
    let end={
        'Y':origin.Y+$('.panel-profile').height(),
        'X':origin.X+$('.panel-profile').width()
    }


    if(e.clientX<$(this).offset().left && e.clientY>=origin.Y && e.clientY<=origin.Y+$(this).height()) 
        $('.panel-profile').css('opacity', 0).css('z-index', -1);  

    else if(!(e.clientX>=origin.X && e.clientX<=end.X && e.clientY>=origin.Y && e.clientY<=end.Y)) 
        $('.panel-profile').css('opacity', 0).css('z-index', -1);

})

$('.cart').hover(function(){
    $('.panel-profile').css('opacity', 0).css('z-index', -1);
})

$('.panel-profile').hover(function(){
}, function(e){
    
    let origin={
        'Y':$('.profile').offset().top,
        'X':$($(this)).offset().left
    }
    let end={
        'Y':origin.Y+$($(this)).height(),
        'X':origin.X+$($(this)).width()
    }

    if(e.clientY<$(this).offset().top && e.clientX<$('.profile').offset().left) $(this).css('opacity', 0).css('z-index', -1);
    else if(!(e.clientX>=origin.X && e.clientX<=end.X && e.clientY>=origin.Y && e.clientY<=end.Y)) $(this).css('opacity', 0).css('z-index', -1);

})


// $('.exit-panel').click(()=>{
//     alert('click');
//     $.ajax({
//         url: '/logout',         
//         method: 'post',            
//         dataType: 'text',
//         data: {
//             '_token': $('meta[name="csrf-token"]').attr('content'), 
//         }
//     })    
// })

