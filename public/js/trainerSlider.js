var $swiperSelector = $('.swiper-container');

$swiperSelector.each(function(index) {
    var $this = $(this);
    $this.addClass('swiper-slider-' + index);
    
    var dragSize = $this.data('drag-size') ? $this.data('drag-size') : 50;
    var freeMode = $this.data('free-mode') ? $this.data('free-mode') : false;
    var loop = $this.data('loop') ? $this.data('loop') : false;
    var slidesDesktopBig = $this.data('slides-desktop') ? $this.data('slides-desktop') : 4.3;
    var slidesDesktop = $this.data('slides-desktop') ? $this.data('slides-desktop') : 3.3;
    var slidesTabletBig = $this.data('slides-tablet') ? $this.data('slides-tablet') : 2.3;
    var slidesTablet = $this.data('slides-tablet') ? $this.data('slides-tablet') : 2;
    var slidesMobileBig = $this.data('slides-mobile') ? $this.data('slides-mobile') : 1.3;
    var slidesMobile = $this.data('slides-mobile') ? $this.data('slides-mobile') : 1;
    var spaceBetween = $this.data('space-between') ? $this.data('space-between'): 10;

    var swiper = new Swiper('.swiper-slider-' + index, {
      direction: 'horizontal',
      loop: loop,
      freeMode: freeMode,
      spaceBetween: spaceBetween,
      breakpoints: {
        1920: {
          slidesPerView: slidesDesktopBig
        },
        1440:{
          slidesPerView: slidesDesktop
        },
        1366:{
          slidesPerView: slidesDesktop
        },
        1100:{
          slidesPerView: slidesTablet
        },
        1200:{
          slidesPerView: slidesTabletBig
        },
        1100:{
          slidesPerView: slidesTabletBig
        },
        992: {
          slidesPerView: slidesTabletBig
        },
        800:{
          slidesPerView: slidesTablet
        },
        750:{
          slidesPerView: slidesMobileBig
        },
        600:{
          slidesPerView: slidesMobileBig
        },
        450: {
           slidesPerView: slidesMobile 
        }
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev'
      },
      // autoplay: {
      //   delay: 3000,
      // },
   });
});